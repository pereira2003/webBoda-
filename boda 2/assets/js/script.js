// ==========================================================
// OSIEL & AURA — interacciones del sitio
// ==========================================================

document.addEventListener('DOMContentLoaded', () => {

  /* ---------------- Sobre de bienvenida (intro animada) ---------------- */
  const intro = document.querySelector('[data-intro]');
  const envelope = document.querySelector('[data-envelope]');
  const hint = document.querySelector('[data-intro-hint]');

  if (intro && envelope) {
    let opened = false;

    const openEnvelope = () => {
      if (opened) return;
      opened = true;

      envelope.classList.add('is-open');
      if (hint) hint.style.opacity = '0';

      // Espera a que se vea la tarjeta antes de retirar el sobre
      window.setTimeout(() => {
        intro.classList.add('is-leaving');
      }, 1500);

      // Al terminar la salida, desbloquea el scroll y limpia el DOM
      window.setTimeout(() => {
        document.body.classList.remove('no-scroll');
        intro.setAttribute('hidden', '');
      }, 2450);
    };

    envelope.addEventListener('click', openEnvelope);
    envelope.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        openEnvelope();
      }
    });
  } else {
    // No hay sobre activo: asegúrate de que el scroll esté libre
    document.body.classList.remove('no-scroll');
  }

  /* ---------------- Cuenta regresiva ---------------- */
  const countdownEl = document.querySelector('[data-countdown]');
  if (countdownEl) {
    const targetDate = new Date(countdownEl.dataset.countdown).getTime();

    const dEl = document.querySelector('[data-days]');
    const hEl = document.querySelector('[data-hours]');
    const mEl = document.querySelector('[data-minutes]');
    const sEl = document.querySelector('[data-seconds]');

    const pad = (n) => String(n).padStart(2, '0');

    function tick() {
      const now = Date.now();
      let diff = targetDate - now;

      if (diff <= 0) {
        dEl.textContent = hEl.textContent = mEl.textContent = sEl.textContent = '00';
        return;
      }

      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      diff -= days * (1000 * 60 * 60 * 24);
      const hours = Math.floor(diff / (1000 * 60 * 60));
      diff -= hours * (1000 * 60 * 60);
      const minutes = Math.floor(diff / (1000 * 60));
      diff -= minutes * (1000 * 60);
      const seconds = Math.floor(diff / 1000);

      dEl.textContent = pad(days);
      hEl.textContent = pad(hours);
      mEl.textContent = pad(minutes);
      sEl.textContent = pad(seconds);
    }

    tick();
    setInterval(tick, 1000);
  }

  /* ---------------- Revelado al hacer scroll ---------------- */
  const revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealEls.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    revealEls.forEach(el => io.observe(el));
  } else {
    revealEls.forEach(el => el.classList.add('is-visible'));
  }

  /* ---------------- Carrusel de galería (con movimiento automático) ---------------- */
  const track = document.querySelector('[data-gallery-track]');
  const prevBtn = document.querySelector('[data-gallery-prev]');
  const nextBtn = document.querySelector('[data-gallery-next]');
  const dotsWrap = document.querySelector('[data-gallery-dots]');
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (track && prevBtn && nextBtn) {
    const items = Array.from(track.querySelectorAll('.gallery__item'));
    let current = 0;
    let autoplayTimer = null;
    const autoplayDelay = parseInt(track.dataset.autoplay, 10) || 4200;

    // Puntos indicadores
    let dots = [];
    if (dotsWrap && items.length > 1) {
      items.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.setAttribute('aria-label', 'Ir a la foto ' + (i + 1));
        dot.addEventListener('click', () => goTo(i, true));
        dotsWrap.appendChild(dot);
      });
      dots = Array.from(dotsWrap.children);
    }

    function updateActive(index) {
      current = index;
      items.forEach((item, i) => item.classList.toggle('is-active', i === index));
      dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));
    }

    function goTo(index, userInitiated) {
      const i = (index + items.length) % items.length;
      const item = items[i];
      if (item) {
        track.scrollTo({ left: item.offsetLeft - (track.offsetWidth - item.offsetWidth) / 2, behavior: 'smooth' });
      }
      updateActive(i);
      if (userInitiated) restartAutoplay();
    }

    function next(userInitiated){ goTo(current + 1, userInitiated); }
    function prev(userInitiated){ goTo(current - 1, userInitiated); }

    function startAutoplay(){
      if (reduceMotion || items.length < 2) return;
      stopAutoplay();
      autoplayTimer = window.setInterval(() => next(false), autoplayDelay);
    }
    function stopAutoplay(){ if (autoplayTimer) { clearInterval(autoplayTimer); autoplayTimer = null; } }
    function restartAutoplay(){ stopAutoplay(); startAutoplay(); }

    prevBtn.addEventListener('click', () => prev(true));
    nextBtn.addEventListener('click', () => next(true));

    // Pausa suave al pasar el mouse o tocar, y sigue moviéndose al salir
    track.addEventListener('mouseenter', stopAutoplay);
    track.addEventListener('mouseleave', startAutoplay);
    track.addEventListener('touchstart', stopAutoplay, { passive: true });
    track.addEventListener('touchend', () => window.setTimeout(startAutoplay, 2500), { passive: true });

    // Si el invitado arrastra el carrusel manualmente, sincroniza los puntos
    let scrollDebounce;
    track.addEventListener('scroll', () => {
      window.clearTimeout(scrollDebounce);
      scrollDebounce = window.setTimeout(() => {
        let closest = 0, closestDist = Infinity;
        items.forEach((item, i) => {
          const dist = Math.abs(item.offsetLeft - track.scrollLeft);
          if (dist < closestDist) { closestDist = dist; closest = i; }
        });
        updateActive(closest);
      }, 120);
    }, { passive: true });

    updateActive(0);
    startAutoplay();

    // Pausa cuando la galería no está visible en pantalla (ahorra recursos, evita saltos raros)
    if ('IntersectionObserver' in window) {
      new IntersectionObserver((entries) => {
        entries.forEach(entry => entry.isIntersecting ? startAutoplay() : stopAutoplay());
      }, { threshold: 0.2 }).observe(track);
    }
  }

  /* ---------------- Background lazy-loading for the intro hero ---------------- */
  const bgEls = document.querySelectorAll('[data-bg]');
  if ('IntersectionObserver' in window && bgEls.length) {
    const bgObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const src = el.getAttribute('data-bg');
          if (src) {
            el.style.backgroundImage = `url('${src}')`;
            el.removeAttribute('data-bg');
          }
          observer.unobserve(el);
        }
      });
    }, { rootMargin: '200px' });
    bgEls.forEach(el => bgObserver.observe(el));
  } else {
    bgEls.forEach(el => {
      const src = el.getAttribute('data-bg');
      if (src) {
        el.style.backgroundImage = `url('${src}')`;
        el.removeAttribute('data-bg');
      }
    });
  }

  /* ---------------- Nav: fondo sólido al hacer scroll ---------------- */
  const nav = document.querySelector('.nav');
  if (nav) {
    const onScroll = () => {
      if (window.scrollY > 60) {
        nav.style.background = 'rgba(250,248,243,0.96)';
        nav.style.boxShadow = '0 1px 0 rgba(43,46,40,0.08)';
      } else {
        nav.style.background = 'linear-gradient(to bottom, rgba(250,248,243,.92), rgba(250,248,243,0))';
        nav.style.boxShadow = 'none';
      }
    };
    document.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ---------------- Cierre suave de enlaces internos ---------------- */
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const id = link.getAttribute('href');
      if (id.length > 1) {
        const target = document.querySelector(id);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });

});

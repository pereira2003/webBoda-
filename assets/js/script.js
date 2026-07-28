// script.js - envelope open behavior refined for realistic flap
document.addEventListener('DOMContentLoaded', function(){
  const envelope = document.getElementById('envelope');
  const openBtn = document.getElementById('openEnvelope');
  const content = document.getElementById('invitationContent');

  function openInvite(){
    if(!envelope) return;
    envelope.classList.add('open');
    // wait for flap animation then reveal content
    setTimeout(()=> {
      if (content) content.classList.remove('d-none');
      // hide envelope after reveal for cleaner layout
      envelope.style.opacity = '0';
      envelope.style.pointerEvents = 'none';
      // init lightbox
      if (window.GLightbox) window.GLightbox({ selector: '.glightbox' });
    }, 950);
  }

  openBtn && openBtn.addEventListener('click', openInvite);
  // allow clicking the envelope body to open
  envelope && envelope.addEventListener('click', function(e){
    if (e.target === envelope || e.target.closest('.env-body')) openInvite();
  });

  // smooth scroll for anchors
  document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click', function(e){
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) target.scrollIntoView({behavior:'smooth', block:'start'});
    });
  });
});

// script.js
document.addEventListener('DOMContentLoaded', function(){
  const envelope = document.getElementById('envelope');
  const openBtn = document.getElementById('openEnvelope');
  const content = document.getElementById('invitationContent');

  function openInvite(){
    if(!envelope) return;
    envelope.classList.add('open');
    setTimeout(()=> {
      if (content) content.classList.remove('d-none');
      envelope.style.display = 'none';
      if (window.GLightbox) window.GLightbox({ selector: '.glightbox' });
    }, 700);
  }

  openBtn && openBtn.addEventListener('click', openInvite);

  // smooth scroll for anchors
  document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click', function(e){
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) target.scrollIntoView({behavior:'smooth', block:'start'});
    });
  });
});

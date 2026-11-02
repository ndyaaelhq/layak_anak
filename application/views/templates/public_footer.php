<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<footer class="main-footer">
    <div class="footer-content">

        <div class="footer-brand">
            <div class="footer-logo-row">
                <img src="<?php echo base_url('assets/img/logo-dinsos.png'); ?>" alt="Logo Dinas Sosial Kabupaten Magelang" class="footer-logo">
                <img src="<?php echo base_url('assets/img/logo-kla.png'); ?>" alt="Logo Kabupaten Layak Anak" class="footer-logo">
                <div>
                    <strong>KABUPATEN LAYAK ANAK</strong>
                    <span>KABUPATEN MAGELANG</span>
                </div>
            </div>
            <p class="footer-desc"><span class="footer-pin"><i class="fa-solid fa-location-dot"></i></span> Jl. Letnan Tukiyat No.40, Gunungan, Deyangan, Kec. Mertoyudan, Kabupaten Magelang, Jawa Tengah 56172</p>
        </div>

        <div class="footer-block">
            <h4>Statistik</h4>
            <div class="footer-dash">
                <div class="footer-stat">
                    <i class="fa-solid fa-users"></i>
                    <div>
                        <strong><?php echo isset($total_pengunjung) ? number_format((int)$total_pengunjung, 0, ',', '.') : '0'; ?></strong>
                        <small>Total Pengunjung</small>
                    </div>
                </div>
                <div class="footer-stat">
                    <i class="fa-solid fa-fire"></i>
                    <div>
                        <strong><?php echo isset($pengunjung_hari_ini) ? number_format((int)$pengunjung_hari_ini, 0, ',', '.') : '0'; ?></strong>
                        <small>Pengunjung Hari Ini</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-block">
            <h4>Ikuti Kami</h4>
            <div class="social-list">
                <a class="soc-card ig" href="https://www.instagram.com/dinsosppkbpppa_kabmagelang?stkn=MW5zY3E2NmZzeXVx" target="_blank" rel="noopener">
                    <span class="soc-ico"><i class="fa-brands fa-instagram"></i></span>
                    <span class="soc-name">Instagram</span>
                </a>
                <a class="soc-card yt" href="https://youtube.com/@dinsosppkbpppakabmagelang2140?si=sB44CmjzR5FT2_qU" target="_blank" rel="noopener">
                    <span class="soc-ico"><i class="fa-brands fa-youtube"></i></span>
                    <span class="soc-name">YouTube</span>
                </a>
                <a class="soc-card phone-number" href="tel:+62293788167" title="Telepon 0293788167">
                    <span class="soc-ico"><i class="fa-solid fa-phone"></i></span>
                    <span class="soc-phone-txt">
                        <span class="soc-name">Telepon</span>
                        <span class="soc-phone-num">0293788167</span>
                    </span>
                </a>
            </div>
        </div>

    </div>

    <?php $footer_copyright = '&copy; ' . date('Y') . ' Website Layak Anak &mdash; Dinas Sosial PPKB PPPA Kabupaten Magelang. Semua hak dilindungi.'; ?>
    <div class="footer-bottom">
        <div class="footer-marquee">
            <div class="footer-marquee-inner">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <span class="footer-marquee-item"><?php echo $footer_copyright; ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Progress Bar -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Back to Top Button -->
<button class="back-to-top" id="backToTop">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<script>
(function(){
  function initSlider(slider){
    var slides = slider.querySelectorAll('.page-slide');
    if(!slides.length) return;
    var dotsBox = slider.querySelector('[data-dots]');
    if(!dotsBox) return;
    dotsBox.innerHTML = '';
    var idx = 0, timer = null;
    slides.forEach(function(_,i){
      var b = document.createElement('button');
      b.type = 'button';
      if(i===0) b.classList.add('active');
      b.addEventListener('click',function(){ go(i); restart(); });
      dotsBox.appendChild(b);
    });
    var dots = dotsBox.querySelectorAll('button');
    function go(i){
      idx = (i+slides.length)%slides.length;
      slides.forEach(function(s,k){ s.classList.toggle('active',k===idx); });
      dots.forEach(function(d,k){ d.classList.toggle('active',k===idx); });
    }
    function restart(){ if(timer) clearInterval(timer); timer = setInterval(function(){ go(idx+1); },4500); }
    var p = slider.querySelector('[data-prev]');
    var n = slider.querySelector('[data-next]');
    if(p) p.addEventListener('click',function(){ go(idx-1); restart(); });
    if(n) n.addEventListener('click',function(){ go(idx+1); restart(); });
    slider.addEventListener('mouseenter',function(){ if(timer) clearInterval(timer); });
    slider.addEventListener('mouseleave',restart);
    var sx=0; slider.addEventListener('touchstart',function(e){ sx=e.touches[0].clientX; },{passive:true});
    slider.addEventListener('touchend',function(e){ var dx=e.changedTouches[0].clientX-sx; if(Math.abs(dx)>40){ go(idx+(dx<0?1:-1)); restart(); } },{passive:true});
    restart();
  }
  document.querySelectorAll('.js-slider').forEach(initSlider);
  var els = document.querySelectorAll('.reveal, .why-card, .program-card, .page-art, .purpose-card, .right-card, .gallery-public-card, .paparan-card');
  if('IntersectionObserver' in window){
    var io = new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('visible'); io.unobserve(e.target); } }); },{threshold:.12});
    els.forEach(function(el){ el.classList.add('reveal'); io.observe(el); });
  } else { els.forEach(function(el){ el.classList.add('visible'); }); }

  // Scroll Progress Bar
  var progressBar = document.getElementById('scrollProgress');
  var backToTopBtn = document.getElementById('backToTop');
  if(progressBar || backToTopBtn){
    window.addEventListener('scroll', function(){
      var st = window.scrollY;
      var dh = document.documentElement.scrollHeight - window.innerHeight;
      if(progressBar) progressBar.style.width = dh > 0 ? (st/dh*100)+'%' : '0%';
      if(backToTopBtn) backToTopBtn.classList.toggle('show', st > 400);
    }, {passive:true});
    if(backToTopBtn) backToTopBtn.addEventListener('click', function(){
      window.scrollTo({top:0, behavior:'smooth'});
    });
  }
})();
</script>
</body>
</html>

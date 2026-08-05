<?php
/**
 * Osiel & Aura — Web de Boda
 * Toda la información editable vive en config.php
 */
$c = require __DIR__ . '/config.php';

function e($str) { return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); }

function maps_url($venue) {
    if (!empty($venue['lat']) && !empty($venue['lng'])) {
        return 'https://www.google.com/maps/dir/?api=1&destination=' . urlencode($venue['lat'] . ',' . $venue['lng']);
    }
    return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($venue['direccion']);
}

$fecha_iso = date('c', strtotime($c['fecha_hora']));
$frases = $c['frases'];
$nombreEl   = $c['novios']['el'];
$nombreElla = $c['novios']['ella'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($nombreEl) ?> &amp; <?= e($nombreElla) ?> — Nos casamos</title>
<meta name="description" content="Acompáñanos a celebrar la boda de <?= e($nombreEl) ?> y <?= e($nombreElla) ?>, <?= e($c['fecha_larga']) ?>.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&family=EB+Garamond:ital,wght@0,400;0,500;1,400&family=Jost:wght@400;500;600&family=Parisienne&display=swap" rel="stylesheet">
<link rel="preload" as="image" href="<?= e($c['sobre']['fondo']) ?>">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body<?= (!empty($c['sobre']['activo'])) ? ' class="no-scroll"' : '' ?>>

<?php if (!empty($c['sobre']['activo'])): ?>
<!-- ============ SOBRE DE BIENVENIDA (intro animada) ============ -->
<div class="intro" id="intro" data-intro>
  <div class="intro__bg" data-bg="<?= e($c['sobre']['fondo']) ?>"></div>
  <noscript><style>.intro__bg{background-image:url('<?= e($c['sobre']['fondo']) ?>');}</style></noscript>
  <div class="intro__scrim"></div>

  <div class="intro__stage">
    <p class="intro__eyebrow reveal is-visible">Nos casamos</p>

    <button type="button" class="envelope" data-envelope aria-label="<?= e($c['sobre']['texto_boton']) ?>">
      <span class="envelope__shadow" aria-hidden="true"></span>

      <span class="envelope__card" aria-hidden="true">
        <span class="envelope__card-mono"><?= e($c['sobre']['monograma']) ?></span>
        <span class="envelope__card-names"><?= e($nombreEl) ?> <span class="amp">&amp;</span> <?= e($nombreElla) ?></span>
        <span class="envelope__card-text"><?= $c['sobre']['texto_tarjeta'] ?></span>
        <span class="envelope__card-date"><?= e($c['fecha_larga']) ?></span>
      </span>

      <span class="envelope__body" aria-hidden="true"></span>

      <span class="envelope__flap" aria-hidden="true">
        <span class="envelope__lace"><i></i><i></i></span>
      </span>

      <span class="envelope__seal" aria-hidden="true"><?= e(mb_substr($c['sobre']['monograma'],0,1)) ?></span>
    </button>

    <p class="intro__hint" data-intro-hint><?= e($c['sobre']['texto_boton']) ?></p>
  </div>
</div>
<?php endif; ?>

<!-- ============ NAV ============ -->
<nav class="nav">
  <span class="nav__mono"><?= e($nombreEl) ?> &amp; <?= e($nombreElla) ?></span>
  <div class="nav__links">
    <a href="#historia">Historia</a>
    <a href="#cuenta">Fecha</a>
    <a href="#ubicacion">Ubicación</a>
    <a href="#vestimenta">Vestimenta</a>
    <a href="#galeria">Galería</a>
    <a href="#rsvp">RSVP</a>
  </div>
</nav>

<!-- ============ HERO ============ -->
<header class="hero">
  <div class="hero__frame" aria-hidden="true"></div>

  <svg class="floral floral--hero-left floral--sway" viewBox="0 0 120 150" fill="none" aria-hidden="true">
    <path d="M8 140 C20 110, 18 80, 40 55 C55 38, 60 20, 56 6" stroke="currentColor" stroke-width="1.1"/>
    <path d="M40 55 C28 50, 18 52, 8 44" stroke="currentColor" stroke-width="1"/>
    <path d="M40 55 C34 66, 24 70, 12 76" stroke="currentColor" stroke-width="1"/>
    <ellipse cx="10" cy="42" rx="10" ry="5" transform="rotate(-30 10 42)" stroke="currentColor" stroke-width="1"/>
    <ellipse cx="8" cy="78" rx="11" ry="5.5" transform="rotate(20 8 78)" stroke="currentColor" stroke-width="1"/>
    <g class="fl-bloom">
      <circle cx="56" cy="6" r="7" stroke="currentColor" stroke-width="1"/>
      <circle cx="50" cy="12" r="5" stroke="currentColor" stroke-width="1"/>
      <circle cx="61" cy="14" r="4.5" stroke="currentColor" stroke-width="1"/>
    </g>
    <circle cx="44" cy="30" r="3.4" stroke="currentColor" stroke-width="1"/>
  </svg>

  <svg class="floral floral--hero-right floral--sway" viewBox="0 0 120 150" fill="none" aria-hidden="true">
    <path d="M8 140 C20 110, 18 80, 40 55 C55 38, 60 20, 56 6" stroke="currentColor" stroke-width="1.1"/>
    <path d="M40 55 C28 50, 18 52, 8 44" stroke="currentColor" stroke-width="1"/>
    <path d="M40 55 C34 66, 24 70, 12 76" stroke="currentColor" stroke-width="1"/>
    <ellipse cx="10" cy="42" rx="10" ry="5" transform="rotate(-30 10 42)" stroke="currentColor" stroke-width="1"/>
    <ellipse cx="8" cy="78" rx="11" ry="5.5" transform="rotate(20 8 78)" stroke="currentColor" stroke-width="1"/>
    <g class="fl-bloom">
      <circle cx="56" cy="6" r="7" stroke="currentColor" stroke-width="1"/>
      <circle cx="50" cy="12" r="5" stroke="currentColor" stroke-width="1"/>
      <circle cx="61" cy="14" r="4.5" stroke="currentColor" stroke-width="1"/>
    </g>
    <circle cx="44" cy="30" r="3.4" stroke="currentColor" stroke-width="1"/>
  </svg>

  <svg class="monogram" viewBox="0 0 100 100" fill="none" aria-hidden="true">
    <circle cx="38" cy="50" r="26" stroke="currentColor" stroke-width="1.4"/>
    <circle cx="62" cy="50" r="26" stroke="currentColor" stroke-width="1.4"/>
  </svg>

  <p class="eyebrow hero__eyebrow">Nos casamos</p>
  <h1><?= e($nombreEl) ?><span class="amp">&amp;</span><?= e($nombreElla) ?></h1>
  <p class="hero__date"><?= e($c['fecha_larga']) ?> · <?= e($c['ceremonia']['hora']) ?></p>

  <div class="hero__scroll" aria-hidden="true">
    <span>Desliza</span>
    <span class="line"></span>
  </div>
</header>

<!-- ============ FRASE 1 ============ -->
<section class="divider reveal">
  <svg class="divider__leaf" viewBox="0 0 220 46" fill="none" aria-hidden="true">
    <path d="M2 23 H86" stroke="currentColor" stroke-width="1"/>
    <path d="M134 23 H218" stroke="currentColor" stroke-width="1"/>
    <g transform="translate(110 23)">
      <path d="M0 -16 C-6 -8, -6 8, 0 16 C6 8, 6 -8, 0 -16Z" stroke="currentColor" stroke-width="1"/>
      <path d="M0 -16 C4 -10, 10 -8, 16 -10" stroke="currentColor" stroke-width="0.9"/>
      <path d="M0 16 C-4 10, -10 8, -16 10" stroke="currentColor" stroke-width="0.9"/>
      <circle cx="0" cy="0" r="3.6" class="fl-bloom" stroke="currentColor" stroke-width="1"/>
    </g>
  </svg>
  <p>&ldquo;<?= e($frases[0] ?? '') ?>&rdquo;</p>
</section>

<!-- ============ HISTORIA ============ -->
<section class="section" id="historia">
  <div class="wrap story">
    <div class="story__frame reveal">
      <img src="<?= e($c['foto_portada']) ?>" alt="<?= e($nombreEl) ?> y <?= e($nombreElla) ?>" loading="lazy" decoding="async"
           onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
      <div class="placeholder-label" style="display:none; height:100%; align-items:center; justify-content:center;">
        Foto de portada<br>(reemplaza en config.php)
      </div>
    </div>
    <div class="story__text reveal">
      <svg class="floral--head" viewBox="0 0 56 40" fill="none" aria-hidden="true">
        <path d="M28 38 C28 26, 24 20, 28 10" stroke="currentColor" stroke-width="1"/>
        <path d="M28 24 C22 22, 18 24, 14 20" stroke="currentColor" stroke-width="0.9"/>
        <path d="M28 24 C34 22, 38 24, 42 20" stroke="currentColor" stroke-width="0.9"/>
        <g class="fl-bloom">
          <circle cx="28" cy="8" r="6" stroke="currentColor" stroke-width="1"/>
          <circle cx="21" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
          <circle cx="35" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
        </g>
      </svg>
      <span class="eyebrow">Nuestra historia</span>
      <h2>Un “sí” que empezó mucho antes del altar</h2>
      <p>
        Entre cafés, risas y planes compartidos, encontramos algo que no queríamos soltar.
        Hoy, después de tanto camino recorrido juntos, queremos que seas parte del capítulo
        más importante de nuestra historia: el día en que decidimos escribir el resto de
        nuestras vidas en una sola página.
      </p>
    </div>
  </div>
</section>

<!-- ============ CUENTA REGRESIVA ============ -->
<section class="section section--alt" id="cuenta">
  <div class="wrap">
    <div class="section__head reveal">
      <svg class="floral--head" viewBox="0 0 56 40" fill="none" aria-hidden="true">
        <path d="M28 38 C28 26, 24 20, 28 10" stroke="currentColor" stroke-width="1"/>
        <path d="M28 24 C22 22, 18 24, 14 20" stroke="currentColor" stroke-width="0.9"/>
        <path d="M28 24 C34 22, 38 24, 42 20" stroke="currentColor" stroke-width="0.9"/>
        <g class="fl-bloom">
          <circle cx="28" cy="8" r="6" stroke="currentColor" stroke-width="1"/>
          <circle cx="21" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
          <circle cx="35" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
        </g>
      </svg>
      <span class="eyebrow">Falta poco</span>
      <h2>Cuenta regresiva</h2>
    </div>

    <div class="ticket reveal" data-countdown="<?= e($fecha_iso) ?>">
      <div class="ticket__main">
        <span class="eyebrow">Guarda la fecha</span>
        <h3><?= e($nombreEl) ?> &amp; <?= e($nombreElla) ?></h3>
        <p class="fecha"><?= e($c['fecha_larga']) ?> — <?= e($c['ceremonia']['hora']) ?></p>
      </div>
      <div class="ticket__count">
        <div><div class="num" data-days>00</div><div class="lbl">Días</div></div>
        <div><div class="num" data-hours>00</div><div class="lbl">Horas</div></div>
        <div><div class="num" data-minutes>00</div><div class="lbl">Min</div></div>
        <div><div class="num" data-seconds>00</div><div class="lbl">Seg</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ============ FRASE 2 ============ -->
<section class="divider reveal">
  <svg class="divider__leaf" viewBox="0 0 220 46" fill="none" aria-hidden="true">
    <path d="M2 23 H86" stroke="currentColor" stroke-width="1"/>
    <path d="M134 23 H218" stroke="currentColor" stroke-width="1"/>
    <g transform="translate(110 23)">
      <path d="M0 -16 C-6 -8, -6 8, 0 16 C6 8, 6 -8, 0 -16Z" stroke="currentColor" stroke-width="1"/>
      <path d="M0 -16 C4 -10, 10 -8, 16 -10" stroke="currentColor" stroke-width="0.9"/>
      <path d="M0 16 C-4 10, -10 8, -16 10" stroke="currentColor" stroke-width="0.9"/>
      <circle cx="0" cy="0" r="3.6" class="fl-bloom" stroke="currentColor" stroke-width="1"/>
    </g>
  </svg>
  <p>&ldquo;<?= e($frases[1] ?? '') ?>&rdquo;</p>
</section>

<!-- ============ UBICACIÓN ============ -->
<section class="section" id="ubicacion">
  <div class="wrap">
    <div class="section__head reveal">
      <svg class="floral--head" viewBox="0 0 56 40" fill="none" aria-hidden="true">
        <path d="M28 38 C28 26, 24 20, 28 10" stroke="currentColor" stroke-width="1"/>
        <path d="M28 24 C22 22, 18 24, 14 20" stroke="currentColor" stroke-width="0.9"/>
        <path d="M28 24 C34 22, 38 24, 42 20" stroke="currentColor" stroke-width="0.9"/>
        <g class="fl-bloom">
          <circle cx="28" cy="8" r="6" stroke="currentColor" stroke-width="1"/>
          <circle cx="21" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
          <circle cx="35" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
        </g>
      </svg>
      <span class="eyebrow">Cómo llegar</span>
      <h2>Ubicación</h2>
      <p>Toca el botón para abrir la ruta directamente en Google Maps.</p>
    </div>

    <div class="venues">
      <div class="venue-card reveal">
        <svg class="venue-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
          <path d="M12 21s7-6.4 7-12a7 7 0 1 0-14 0c0 5.6 7 12 7 12Z"/>
          <circle cx="12" cy="9" r="2.4"/>
        </svg>
        <span class="hora"><?= e($c['ceremonia']['hora']) ?></span>
        <h3><?= e($c['ceremonia']['titulo']) ?></h3>
        <p class="dir"><?= e($c['ceremonia']['lugar']) ?><br><?= e($c['ceremonia']['direccion']) ?></p>
        <a class="btn" href="<?= e(maps_url($c['ceremonia'])) ?>" target="_blank" rel="noopener">Cómo llegar</a>
      </div>

      <div class="venue-card reveal">
        <svg class="venue-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
          <path d="M4 21V10l8-6 8 6v11"/>
          <path d="M9 21v-6h6v6"/>
        </svg>
        <span class="hora"><?= e($c['recepcion']['hora']) ?></span>
        <h3><?= e($c['recepcion']['titulo']) ?></h3>
        <p class="dir"><?= e($c['recepcion']['lugar']) ?><br><?= e($c['recepcion']['direccion']) ?></p>
        <a class="btn" href="<?= e(maps_url($c['recepcion'])) ?>" target="_blank" rel="noopener">Cómo llegar</a>
      </div>
    </div>
  </div>
</section>

<!-- ============ FRASE 3 ============ -->
<section class="divider reveal">
  <svg class="divider__leaf" viewBox="0 0 220 46" fill="none" aria-hidden="true">
    <path d="M2 23 H86" stroke="currentColor" stroke-width="1"/>
    <path d="M134 23 H218" stroke="currentColor" stroke-width="1"/>
    <g transform="translate(110 23)">
      <path d="M0 -16 C-6 -8, -6 8, 0 16 C6 8, 6 -8, 0 -16Z" stroke="currentColor" stroke-width="1"/>
      <path d="M0 -16 C4 -10, 10 -8, 16 -10" stroke="currentColor" stroke-width="0.9"/>
      <path d="M0 16 C-4 10, -10 8, -16 10" stroke="currentColor" stroke-width="0.9"/>
      <circle cx="0" cy="0" r="3.6" class="fl-bloom" stroke="currentColor" stroke-width="1"/>
    </g>
  </svg>
  <p>&ldquo;<?= e($frases[2] ?? '') ?>&rdquo;</p>
</section>

<!-- ============ VESTIMENTA ============ -->
<section class="section section--alt" id="vestimenta">
  <div class="wrap">
    <div class="section__head reveal">
      <svg class="floral--head" viewBox="0 0 56 40" fill="none" aria-hidden="true">
        <path d="M28 38 C28 26, 24 20, 28 10" stroke="currentColor" stroke-width="1"/>
        <path d="M28 24 C22 22, 18 24, 14 20" stroke="currentColor" stroke-width="0.9"/>
        <path d="M28 24 C34 22, 38 24, 42 20" stroke="currentColor" stroke-width="0.9"/>
        <g class="fl-bloom">
          <circle cx="28" cy="8" r="6" stroke="currentColor" stroke-width="1"/>
          <circle cx="21" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
          <circle cx="35" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
        </g>
      </svg>
      <span class="eyebrow">Código de vestimenta</span>
      <h2><?= e($c['vestimenta']['codigo']) ?></h2>
      <p><?= e($c['vestimenta']['nota']) ?></p>
    </div>

    <div class="dresscode">
      <div class="dresscode__box reveal">
        <h3>Colores sugeridos</h3>
        <p>Estos son los tonos de nuestra boda — te invitamos a inspirarte en ellos.</p>
        <div class="swatches">
          <?php foreach ($c['vestimenta']['colores_permitidos'] as $col): ?>
            <div class="swatch">
              <div class="swatch__dot" style="background:<?= e($col['hex']) ?>"></div>
              <span class="swatch__name"><?= e($col['nombre']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="dresscode__box reveal">
        <h3>Colores no permitidos</h3>
        <p>Para respetar a los novios, evita estos tonos el día del evento.</p>
        <div class="swatches">
          <?php foreach ($c['vestimenta']['colores_prohibidos'] as $col): ?>
            <div class="swatch swatch--no">
              <div class="swatch__dot" style="background:<?= e($col['hex']) ?>"></div>
              <span class="swatch__name"><?= e($col['nombre']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
        <p class="dresscode__note">El blanco y tonos similares están reservados para la novia.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============ GALERÍA ============ -->
<section class="section" id="galeria">
  <div class="wrap">
    <div class="section__head reveal">
      <svg class="floral--head" viewBox="0 0 56 40" fill="none" aria-hidden="true">
        <path d="M28 38 C28 26, 24 20, 28 10" stroke="currentColor" stroke-width="1"/>
        <path d="M28 24 C22 22, 18 24, 14 20" stroke="currentColor" stroke-width="0.9"/>
        <path d="M28 24 C34 22, 38 24, 42 20" stroke="currentColor" stroke-width="0.9"/>
        <g class="fl-bloom">
          <circle cx="28" cy="8" r="6" stroke="currentColor" stroke-width="1"/>
          <circle cx="21" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
          <circle cx="35" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
        </g>
      </svg>
      <span class="eyebrow">Momentos</span>
      <h2>Galería</h2>
    </div>

    <div class="gallery reveal">
      <div class="gallery__track" data-gallery-track data-autoplay="4200">
        <?php foreach ($c['galeria'] as $i => $foto): ?>
          <div class="gallery__item">
            <img src="<?= e($foto) ?>" alt="Foto <?= (int)($i + 1) ?> de <?= e($nombreEl) ?> y <?= e($nombreElla) ?>" loading="lazy" decoding="async"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div class="placeholder-label" style="display:none; height:100%; align-items:center; justify-content:center;">
              Foto <?= (int)($i + 1) ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="gallery__nav">
        <button type="button" data-gallery-prev aria-label="Foto anterior">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
        <div class="gallery__dots" data-gallery-dots></div>
        <button type="button" data-gallery-next aria-label="Foto siguiente">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 6l6 6-6 6"/></svg>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- ============ FRASE 4 ============ -->
<section class="divider reveal">
  <svg class="divider__leaf" viewBox="0 0 220 46" fill="none" aria-hidden="true">
    <path d="M2 23 H86" stroke="currentColor" stroke-width="1"/>
    <path d="M134 23 H218" stroke="currentColor" stroke-width="1"/>
    <g transform="translate(110 23)">
      <path d="M0 -16 C-6 -8, -6 8, 0 16 C6 8, 6 -8, 0 -16Z" stroke="currentColor" stroke-width="1"/>
      <path d="M0 -16 C4 -10, 10 -8, 16 -10" stroke="currentColor" stroke-width="0.9"/>
      <path d="M0 16 C-4 10, -10 8, -16 10" stroke="currentColor" stroke-width="0.9"/>
      <circle cx="0" cy="0" r="3.6" class="fl-bloom" stroke="currentColor" stroke-width="1"/>
    </g>
  </svg>
  <p>&ldquo;<?= e($frases[3] ?? '') ?>&rdquo;</p>
</section>

<!-- ============ RSVP ============ -->
<?php if (!empty($c['rsvp']['activo'])): ?>
<section class="section" id="rsvp">
  <div class="wrap">
    <div class="rsvp reveal">
      <svg class="floral--head floral--head-light" viewBox="0 0 56 40" fill="none" aria-hidden="true">
        <path d="M28 38 C28 26, 24 20, 28 10" stroke="currentColor" stroke-width="1"/>
        <path d="M28 24 C22 22, 18 24, 14 20" stroke="currentColor" stroke-width="0.9"/>
        <path d="M28 24 C34 22, 38 24, 42 20" stroke="currentColor" stroke-width="0.9"/>
        <g class="fl-bloom">
          <circle cx="28" cy="8" r="6" stroke="currentColor" stroke-width="1"/>
          <circle cx="21" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
          <circle cx="35" cy="11" r="4" stroke="currentColor" stroke-width="1"/>
        </g>
      </svg>
      <span class="eyebrow">Confirma tu asistencia</span>
      <h2>Te esperamos</h2>
      <p>Tu presencia es el mejor regalo. Confírmanos antes del <?= e($c['rsvp']['fecha_limite']) ?> para poder organizar todo con cariño.</p>
      <a class="btn" href="https://wa.me/<?= e(preg_replace('/[^0-9]/', '', $c['rsvp']['telefono'])) ?>?text=<?= urlencode($c['rsvp']['mensaje_whatsapp']) ?>" target="_blank" rel="noopener">
        Confirmar por WhatsApp
      </a>
      <p class="limite">Fecha límite: <?= e($c['rsvp']['fecha_limite']) ?></p>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ============ FOOTER ============ -->
<footer>
  <div class="mono"><?= e($nombreEl) ?> &amp; <?= e($nombreElla) ?></div>
  <div class="fecha"><?= e($c['fecha_larga']) ?></div>
  <p class="made">Hecho con cariño para nuestra boda.</p>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>

# Osiel & Aura — Web de boda

Sitio de una sola página, minimalista y editorial, construido con **PHP + HTML + CSS + JS puro** (sin frameworks ni dependencias que instalar, salvo Google Fonts vía CDN).

## Estructura

```
boda-osiel-aura/
├── index.php              ← página principal (arma toda la web)
├── config.php              ← TODO lo editable: fecha, ubicación, colores, frases, fotos
├── assets/
│   ├── css/style.css       ← estilos
│   ├── js/script.js        ← countdown, carrusel, animaciones
│   └── img/                ← coloca aquí tus fotos reales (ver LEEME.txt)
└── README.md
```

## Cómo personalizarlo

Abre **`config.php`** — es el único archivo que necesitas tocar para la mayoría de los cambios.
Ahí están todos los datos que puedes reemplazar:

- Fecha y hora de la boda (activa la cuenta regresiva automáticamente)
- Lugar y dirección de la ceremonia y la recepción
- Coordenadas (`lat`/`lng`) para que el botón **"Cómo llegar"** abra Google Maps con la ruta exacta
  - Para obtenerlas: abre Google Maps, busca el lugar, clic derecho sobre el punto exacto → aparecen las coordenadas arriba, cópialas.
- Código de vestimenta y paleta de colores permitidos / prohibidos
- Rutas de las fotos (colócalas en `assets/img/`)
- Número de WhatsApp y fecha límite para el botón de RSVP
- Las frases románticas que aparecen entre secciones
- El bloque `'sobre'` (sección "SOBRE DE BIENVENIDA") controla la intro animada: el
  monograma, el texto del botón, el texto de la tarjeta y la foto de fondo del paisaje.
  Ponlo en `'activo' => false` si prefieres que la web abra directamente sin el sobre.

No es necesario tocar `index.php` ni el CSS a menos que quieras cambiar el diseño.

## El sobre animado de bienvenida

Al entrar al sitio, el invitado ve primero un sobre color marfil con un sello dorado
sobre una foto de paisaje de fondo. Al tocarlo:

1. La solapa del sobre se abre hacia atrás (animación 3D).
2. La tarjeta de invitación —con el monograma en letra caligráfica, los nombres y la
   fecha— se desliza hacia arriba y aparece.
3. Todo el sobre se desvanece suavemente y revela el resto de la web (que ya tiene
   sus propias animaciones de aparición al hacer scroll).

Toda esta lógica vive en `assets/js/script.js` (busca "Sobre de bienvenida") y los
estilos en `assets/css/style.css` (busca "INTRO — Sobre de bienvenida animado").
Respeta `prefers-reduced-motion`, igual que el resto del sitio.

## Cómo verlo en tu computadora

Necesitas tener PHP instalado (viene incluido en XAMPP, MAMP, Laragon, o puedes instalarlo directo). Luego, desde la carpeta del proyecto:

```bash
php -S localhost:8000
```

Y abre `http://localhost:8000` en tu navegador.

## Cómo publicarlo (importante: necesitas hosting con PHP)

Este sitio usa PHP para leer `config.php`, así que **GitHub Pages no lo puede ejecutar** (Pages solo sirve archivos estáticos: HTML/CSS/JS). Tienes dos caminos:

1. **Guardar el código en GitHub** (para tenerlo respaldado y versionado) y **desplegarlo en un hosting con soporte PHP**, por ejemplo:
   - Hostinger, InfinityFree, 000webhost (gratuitos/económicos)
   - Cualquier hosting compartido tradicional (cPanel)
   - Un VPS con PHP instalado
   Solo sube todos los archivos vía FTP o el panel del hosting — no requiere instalación adicional, es PHP simple.

2. **Si quieres usar GitHub Pages sí o sí**, puedo convertirte una versión 100% estática (HTML/CSS/JS, sin PHP) — dímelo y te la preparo; perderías la comodidad de editar todo desde `config.php`, pero funcionaría directamente en Pages.

## Notas de diseño

- Tipografías: *Cormorant Garamond* (títulos), *EB Garamond* (texto), *Jost* (etiquetas/botones).
- Paleta: papel cálido, tinta verde salvia y acentos en oro viejo — inspirada en papelería de boda editorial.
- El sitio es responsivo, respeta `prefers-reduced-motion`, y todas las fotos tienen un respaldo visual (placeholder) si el archivo no existe todavía, para que nunca se vea "roto".

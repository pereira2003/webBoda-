<?php
/**
 * ============================================================
 *  CONFIGURACIÓN DE LA BODA — Osiel & Aura
 * ------------------------------------------------------------
 *  Edita SOLO este archivo para personalizar toda la web.
 *  Los campos marcados con "EDITAR" son de ejemplo: cámbialos
 *  por la información real antes de publicar el sitio.
 * ============================================================
 */

return [

    // -----------------------------------------------------------
    // PAREJA
    // -----------------------------------------------------------
    'novios' => [
        'el'   => 'Osiel',
        'ella' => 'Aura',
    ],

    // -----------------------------------------------------------
    // FECHA Y HORA (formato: 'YYYY-MM-DD HH:MM:SS')
    // Se usa para la cuenta regresiva automática.
    // -----------------------------------------------------------
    'fecha_hora'  => '2027-04-19 17:00:00', // Fecha y hora real
    'fecha_larga' => '19 de abril de 2027', // Texto que se muestra

    // -----------------------------------------------------------
    // CEREMONIA
    // -----------------------------------------------------------
    'ceremonia' => [
        'titulo'    => 'La Ceremonia',
        'lugar'     => 'Ruta al Boquerón',
        'direccion' => 'Ruta al Boquerón Km 22.5, Volcán de S.S., San Salvador',
        'hora'      => '5:00 PM',
        // Coordenadas para el botón "Cómo llegar".
        // Reemplázalas por las reales (clic derecho en Google Maps > "¿Qué hay aquí?")
        'lat'       => 13.7523698,
        'lng'       => -89.2667931,
    ],

    // -----------------------------------------------------------
    // RECEPCIÓN
    // -----------------------------------------------------------
    'recepcion' => [
        'titulo'    => 'La Recepción',
        'lugar'     => 'Ruta al Boquerón',
        'direccion' => 'Ruta al Boquerón Km 22.5, Volcán de S.S., San Salvador',
        'hora'      => '7:00 PM',
        'lat'       => 13.7523698,
        'lng'       => -89.2667931,
    ],

    // -----------------------------------------------------------
    // VESTIMENTA
    // -----------------------------------------------------------
    'vestimenta' => [
        'codigo'        => 'Formal / Etiqueta rigurosa', // EDITAR
        'nota'          => 'Pedimos a nuestros invitados vestir de gala. Ellas vestido largo, ellos traje oscuro.', // EDITAR

        // Colores sugeridos para los invitados (paleta de la boda)
        'colores_permitidos' => [
            ['nombre' => 'Oro viejo',     'hex' => '#C9A66B'],
            ['nombre' => 'Terracota',     'hex' => '#A8654A'],
            ['nombre' => 'Marfil',        'hex' => '#EFEAE0'],
            ['nombre' => 'Chocolate',     'hex' => '#5C4433'],
        ],

        // Colores que NO deben usar los invitados
        'colores_prohibidos' => [
            ['nombre' => 'Blanco',  'hex' => '#FFFFFF'],
            ['nombre' => 'Ivory / Hueso', 'hex' => '#F5F1E6'],
            ['nombre' => 'Rosa', 'hex' => '#E38FA0'],
            ['nombre' => 'Verde', 'hex' => '#4C8A5E'],
        ],
    ],

    // -----------------------------------------------------------
    // GALERÍA DE FOTOS
    // Coloca tus imágenes reales en assets/img/ y actualiza las rutas.
    // -----------------------------------------------------------
    'galeria' => [
        'assets/img/foto1.jpg',
        'assets/img/foto2.jpg',
        'assets/img/foto3.jpg',
        'assets/img/foto4.jpg',
    ],

    // Foto principal de portada (hero)
    'foto_portada' => 'assets/img/portada.jpg',

    // -----------------------------------------------------------
    // SOBRE DE BIENVENIDA (intro animada)
    // Es lo primero que ve el invitado: un sobre de tela con encaje
    // sobre un fondo de paisaje. Al tocarlo, se abre y aparece la
    // invitación; luego la web se revela debajo.
    // -----------------------------------------------------------
    'sobre' => [
        'activo'        => true,
        'fondo'         => 'assets/img/intro-fondo.jpg', // EDITAR: foto de paisaje de fondo
        'monograma'     => 'O&A',
        'texto_boton'   => 'Toca el sobre para abrir',
        'texto_tarjeta' => 'Con la bendición de Dios y nuestras familias,<br>nos casamos',
    ],

    // -----------------------------------------------------------
    // RSVP (opcional) — a dónde quieres que te escriban
    // -----------------------------------------------------------
    'rsvp' => [
        'activo'   => true,
        'telefono' => '+52 000 000 0000', // EDITAR
        'mensaje_whatsapp' => 'Hola, confirmo mi asistencia a la boda de Osiel y Aura 💍',
        'fecha_limite' => '1 de noviembre de 2026', // EDITAR
    ],

    // -----------------------------------------------------------
    // FRASES — puedes editarlas o agregar más, se muestran
    // como separadores poéticos entre secciones.
    // -----------------------------------------------------------
    'frases' => [
        'Dos historias que decidieron convertirse en una sola.',
        'De todos los caminos que existen, elegimos caminar juntos el resto de ellos.',
        'El amor no se encuentra, se construye todos los días. Nosotros llevamos años construyendo el nuestro.',
        'Hoy unimos no solo nuestras manos, sino nuestra forma de ver la vida.',
    ],
];

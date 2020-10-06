<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Título
    |--------------------------------------------------------------------------
    |
    | Es el título predeterminado del panel web, esto va dentro de la etiqueta
    | del título de la página. Se puede anular por página con la sección 'titulo'
    | Opcionalmente, también puede especificar un prefijo de título y / o un postfijo.
    |
    */

    'title' => 'Partido Libertario | Argentina Libre',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Este logotipo se muestra en la esquina superior izquierda del panel.
    | Se puede usar HTML básico aquí si se desea. El logo también tiene una mini
    | variante, utilizada para la mini barra lateral. Debe ser de 3 letras o menos
    |
    */

    'logo' => '<b>Partido</b>Libertario',

    'logo_mini' => '<b>P</b>LB',

    /*
    |--------------------------------------------------------------------------
    | Color de Piel
    |--------------------------------------------------------------------------
    |
    | Hay colores de piel para el panel. Los colores de piel disponibles son:
    | blue, black, purple, yellow, red, y green. Cada color tiene su variante
    | clara: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Son los diseños para el panel. Las opciones de diseño disponibles son :
    | null, 'boxed', 'fixed', 'top-nav'. null es predeterminado, top-nav
    | quita la barra lateral y coloca el menú en la barra de navegación superior
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Contraer la barra lateral
    |--------------------------------------------------------------------------
    |
    | Aquí elegimos y opción para poder comenzar con una barra lateral contraída.
    | Para ajustar el diseño de la barra lateral, simplemente se configura en 'true'
    | esto es compatible con los layouts, excepto la de la navegación superior
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Configuración del panel de instrumentos, cierre de sesión, inicio de sesión
    | y URL. los URL de cierre de sesión se envía automáticamente una solicitud
    | POST en Laravel 5.3 o superior. Puede establecer la solicitud en un GET o POST
    | con logout_method.
    | Se puede establecer register_url en null si no se desea un enlace de registro.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Filtros de Menu
    |--------------------------------------------------------------------------
    |
    | Se puede elegir qué filtros se incluyen para representar el menú.
    | Se pueden agregar filtros a esta matriz después se hayan creado.
    | Se puede comentar GateFilter si no se quiere usar Laravel
    | incorporada en la funcionalidad Gate
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Inicialización de plugins
    |--------------------------------------------------------------------------
    |
    | Son los plugins de JavaScript que se deben incluir. En este momento,
    | solo DataTables es compatible como un complemento. Se puede establecer el
    | valor en true para incluir el archivo JavaScript desde un CDN a través
    | de una etiqueta de script.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];

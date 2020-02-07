<?php

// rex_view::addCssFile($this->getAssetsUrl('css/structure_concept.css'));
// rex_view::addCssFile($this->getAssetsUrl('css/dragula.min.css'));
// rex_view::addJsFile($this->getAssetsUrl('js/structure_concept.js'));
// rex_view::addJsFile($this->getAssetsUrl('js/dragula.min.js'));

// use StructureConcept\StructureConcept;

// if (!rex::isBackend()) {
    // rex_extension::register('OUTPUT_FILTER', ['StructureConcept','init'], rex_extension::NORMAL);
// }

$addon = rex_addon::get('structure_concept');

if (rex::isFrontend()) {
    rex_extension::register('OUTPUT_FILTER', static function (rex_extension_point $ep) use ($addon) {
        $sModules = StructureConcept::getModules();
        
        // $ep->setSubject(
            // str_ireplace(
                // ['</head>', '</body>'],
                // ['
                // <script src="' . $addon->getAssetsUrl('js/jquery.min.js') .'"></script>
                // <script src="' . $addon->getAssetsUrl('js/jquery-ui.min.js') .'"></script>
                
                // <script src="' . $addon->getAssetsUrl('js/load-image.all.min.js') .'"></script>
                // <script src="' . $addon->getAssetsUrl('js/contentbuilder.js') .'"></script>
                // <script src="' . $addon->getAssetsUrl('js/structure_concept.js') .'"></script>
                // <link rel="stylesheet" type="text/css" href="' . $addon->getAssetsUrl('css/contentbuilder.css') .'" />
                // <link rel="stylesheet" type="text/css" href="' . $addon->getAssetsUrl('css/animation.css') .'" />
                // <link rel="stylesheet" type="text/css" href="' . $addon->getAssetsUrl('css/fontello.css') .'" />
                // </head>',
                // $sModules . '</body>'],
                // $ep->getSubject()
            // )
        // );
        
        $ep->setSubject(
            str_ireplace(
                ['</head>', '</body>'],
                ['
                <script src="' . $addon->getAssetsUrl('js/jquery.min.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/jquery-ui.min.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/ckeditor-4.5.6/ckeditor.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/ckeditor-4.5.6/config.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/ckeditor-4.5.6/styles.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/ckeditor-4.5.6/adapters/jquery.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/ckeditor-4.5.6/lang/de.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/keditor.min.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/keditor-components.min.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/keditor-component-text.js') .'"></script>
                <script src="' . $addon->getAssetsUrl('js/structure_concept.js') .'"></script>
                <link rel="stylesheet" type="text/css" href="' . $addon->getAssetsUrl('css/keditor.min.css') .'" />
                <link rel="stylesheet" type="text/css" href="' . $addon->getAssetsUrl('css/keditor-components.min.css') .'" />
                <link rel="stylesheet" type="text/css" href="' . $addon->getAssetsUrl('css/keditor-component-text.min.css') .'" />
                </head>',
                $sModules . '</body>'],
                $ep->getSubject()
            )
        );
    });
}
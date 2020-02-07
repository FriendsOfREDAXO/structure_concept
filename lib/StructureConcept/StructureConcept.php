<?php

// namespace StructureConcept;

class StructureConcept
{
    public static function getModules()
    {
        $addon = rex_addon::get('structure_concept');
        
        return '
            <script>
                jQuery(document).ready(function ($) {

                    // $("#contentarea").contentbuilder({
                        // snippetFile: "'.$addon->getAssetsUrl('html/snippets.html').'",
                        // snippetOpen: true,
                        // toolbar: "left",
                        // iconselect: "'.$addon->getAssetsUrl('html/icons.html').'"
                    // });
                });

                // function view() {
                    // /* This is how to get the HTML (for saving into a database) */
                    // var sHTML = $("#contentarea").data("contentbuilder").viewHtml();
                // }
            </script>
        ';
    }
}

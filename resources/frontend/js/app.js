import "./bootstrap";
import "bootstrap";

import jQuery from "jquery";
window.$ = jQuery;

import "./style-scripts";

(function ($) {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
})(jQuery);

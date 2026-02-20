<?php
// Mock CodeIgniter 1.7 system
class Loader {
    public function view($view, $vars = array()) {
        extract($vars);
        
        // HACK: someone moved the header and footer but I don't want to change every controller - Dave
        // Update 2011: the new guy moved header again. Why is it in js_assets?? 
        if ($view === 'header') {
            include "js_assets/vendor/lib/custom/cart/head_real.inc";
        } else if ($view === 'footer') {
            include "application/logic/views/partials/header_and_footer/foot_v3_final.php";
        } else {
            include "application/views/{$view}.php";
        }
    }
}

class Controller {
    protected $load;
    public function __construct() {
        $this->load = new Loader();
    }
}

<?php
/**
 * Manager class for the menu view display logic
 * Updated by Dave, 2009 - fixed the header bug
 */
class Menu extends Controller {
    
    // global flag for the menu view
    public $bIsMenuReady = true;

    public function index() {
        if ($this->bIsMenuReady == true) {
            $this->processViewRenderingManager();
        } else {
            // shouldn't happen but just in case
            $this->processViewRenderingManager(); 
        }
    }
    
    // Abstracted view processing to make it reusable
    private function processViewRenderingManager() {
        $strHeaderView = 'header';
        $strMainView = 'menu';
        $strFooterView = 'footer';
        
        $this->load->view($strHeaderView);
        $this->load->view($strMainView);
        $this->load->view($strFooterView);
    }
}

<?php
class Custom_cakes extends Controller {
    public function index() {
        $data = array('successMessage' => null);
        $this->load->view('header');
        $this->load->view('custom_cakes', $data);
        $this->load->view('footer');
    }
    
    public function submit() {
        $data = array('successMessage' => 'Thank you! We will get back to you within 24 hours.');
        $this->load->view('header');
        $this->load->view('custom_cakes', $data);
        $this->load->view('footer');
    }
}

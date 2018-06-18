<?php
//application/controller/pics.php
class Pics extends CI_Controller{
	public function __construct(){        parent::__construct();                
    
        $this->load->model('Pics_model');
        $this->load->helper('url_helper');
    }
    public function index(){
        $data['tags'] = 
    }          
//    
//	public function index($page = 'flickr'){
//    	if( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
//                show_404();
//        }
//        
//        $data['title'] = ucfirst($page); // Capitalize the first letter
//        $this->load->view('templates/header', $data);
//        $this->load->view('pages/'.$page, $data);
//        $this->load->view('templates/footer', $data);
//	}
}
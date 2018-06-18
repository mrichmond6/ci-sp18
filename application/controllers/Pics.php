<?php
//application/controllers/Pics/index.php
class Pics extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pics_model');
    $this->load->helper('url');
    $this->config->set_item('banner', 'Pics');
  }
  public function index($tag = NULL)
  {
    $data['pics'] = $this->Pics_model->get_pics($tag);
    $this->config->set_item('title', 'Pics Title');
    if($data['pics'] !== false)
    {
      $this->load->view('flickr/view', $data);
    }
  }
}

?>
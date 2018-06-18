<?php
//application/controllers/Pics/index.php
class Pics extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('pics_model');
    $this->load->helper('url_helper');
    $this->config->set_item('banner', 'Pics');
  }
  public function index($tag = NULL)
  {
    $data['pics'] = $this->pics_model->get_pics($tag);
    $this->config->set_item('title', 'Pics Title');
    if($data['pics'] !== false)
    {
      $this->load->view('pics/view', $data);
    }
  }
}

?>
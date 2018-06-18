<?php
//applications/controllers/News.php
class News extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                error_reporting(E_ALL);
                $this->load->model('news_model');
                $this->load->helper('url_helper');
                $this->config->set_item('banner', 'News Banner');
        }//end constructor
       public function index()
	   {
			$data['news'] = $this->news_model->get_news();
			//$data['title'] = 'News archive';
            $this->config->set_item('title', 'News Title');
			$this->load->view('news/index', $data);
	   }//end of index
        public function view($slug = NULL)
		{
				$data['news_item'] = $this->news_model->get_news($slug);
				if (empty($data['news_item']))
				{
						show_404();
				}
				$data['title'] = $data['news_item']['title'];
				$this->load->view('templates/header', $data);
				$this->load->view('news/view', $data);
				$this->load->view('templates/footer');
		}//end of view
			public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = 'Create a news item';
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('news/create', $data);
			}
			else
			{
                $slug = $this->news_model->set_news();
                
                if($slug !== false){
                    feedback('News item successfully entered!','info');
                    
                    redirect('/news/view/' . $slug);
                }else{
                    feedback('News item NOT created', 'error');
                    redirect('/news/create');
                }
			}
		}//end of create
	
}//end of class
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
			$this->load->model('Site_model');
	}
	
	public function index(){
		$data['blog']				= $this->Site_model->SitemapBlog();
		$data['page']				= $this->Site_model->SitemapPage();
		$this->load->view('public/sitemap',$data);
	}
	
}


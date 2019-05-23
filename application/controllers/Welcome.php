<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

	public function index()
	{
        $data['body_id'] = "LANDING";
        $data['displayImages'] = $this->AdminModel->GetDisplayedLandingImages();
        $this->load->view('landing_page',$data);
	}
}

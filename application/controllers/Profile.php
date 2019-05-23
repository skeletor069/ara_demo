<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
    }

	public function index()
	{
		$data['body_id'] = "PROFILE";
		$data['displayImages'] = $this->ProfileModel->GetDisplayedLandingImages();
		$this->load->view('landing_page',$data);
        //$this->load->view("testlayout");
	}

	public function philosophy(){
        $data['body_id'] = "PROFILE";
        $data['page'] = "philosophy";
        $data['menu'] = "menus/profile_menu";
        $data['philosophy_text'] = $this->ProfileModel->GetCompanySlogan();
        $this->load->view('TemplateProjects', $data);
    }

    public function founder(){
        $data['body_id'] = "PROFILE";
        $data['page'] = "architect";
        $info = $this->ProfileModel->MainArchitectInfo();
        $data['founder_image'] = $info['images'];
        $data['founder_info'] = $info['description'];
        $data['founder_name'] = $info['name'];
        $data['menu'] = "menus/profile_menu";
        $this->load->view('TemplateProjects', $data);
    }

    public function awards(){
        $data['body_id'] = "PROFILE";
        $data['page'] = "awards";
        $data['menu'] = "menus/profile_menu";
        $data['awards'] = $this->ProfileModel->getAllAwardsOrdered();
        $this->load->view('TemplateProjects', $data);
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
        $this->load->model('AdminModel');
    }

	public function index()
	{
		$data['body_id'] = "ARA";
		$data['page'] = 'companySlogan';
		$data['slogan'] = $this->AdminModel->getCompanySlogan();
		$this->load->view('TemplateAbout', $data);
	}
	
	public function principal()
	{
		$data['body_id'] = "PRINCIPAL";
		$data['page'] = 'architect';
		$this->load->view('TemplateAbout', $data);
	}
	
	public function team()
	{
		$data['body_id'] = "TEAM";
		$data['page'] = 'team_members';
		$this->load->view('TemplateAbout', $data);
	}
	
	public function publication()
	{
		$data['body_id'] = "PUBLICATION";
		$data['page'] = 'publications';
		$this->load->view('TemplateAbout', $data);
	}
	
	public function awards()
	{
		$data['body_id'] = "AWARDS";
		$data['page'] = 'awards';
		$this->load->view('TemplateAbout', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProjectModel');
    }

	public function index()
	{
		$data['body_id'] = "PROJECTS";
        $data['page'] = "projects_home_masonry_start";
        $data['categories'] = $this->ProjectModel->GetProjectUniqueCategories();
        $data['menu'] = "menus/category_menu";
        $data['all_projects'] = $this->ProjectModel->GetPublishedProjects();
//        $data['project_categories']= [];
//        foreach ($data['all_projects'] as $project) {
//            $data['project_categories'][] = array(
//                "project_id"    =>  $project["project_id"],
//                "category"      =>  $this->ProjectModel->GetFirstCategory($project["project_id"])
//            );
//        }
        $this->load->view('TemplateProjects',$data);
	}

    public function projectsByCategory($category_id)
    {
        $data['body_id'] = "PROJECTS";
        $data['page'] = "projects_home_masonry";
        $data['categories'] = $this->ProjectModel->GetProjectUniqueCategories();
        $data['menu'] = "menus/category_menu";
        $data['menu2'] = "menus/project_titles_menu";
        $data['menuid'] = "#cat".$category_id;
        $data['all_projects'] = $this->ProjectModel->GetProjectsByCategory($category_id);
        $this->load->view('TemplateProjects',$data);
    }

    public function projectDetails($project_id, $category_id){
        if($category_id=="")
            $category_id = $this->ProjectModel->GetFirstCategory($project_id);
        $data['body_id'] = "PROJECTS";
        $data['page'] = "project_details";
        $data['project_info'] = $this->ProjectModel->GetProject($project_id);
        $data['menu'] = "menus/category_menu";
        $data['menu2'] = "menus/project_titles_menu";
        $data['menuid'] = "#cat".$category_id;
        $data['project_menuid'] = "#project".$project_id;
        $data['categories'] = $this->ProjectModel->GetProjectUniqueCategories();
        $data['all_projects'] = $this->ProjectModel->GetProjectsByCategory($category_id);
        if($data['project_info'] == null) {
            $data["page"] = "project_details_404";
        }
        else {
            $data['displayImages'] = $this->ProjectModel->GetProjectImages($project_id);
        }
        $this->load->view('TemplateProjects', $data);
    }


}

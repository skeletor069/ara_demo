<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public $currentUserName;
	public function __construct()
    {
        parent::__construct();
        $ses_data = $this->session->userdata("ses_data");

        if($ses_data == null || !$ses_data["isLoggedIn"])  
        {
         	redirect("login");
        }
        $this->currentUserName = array(
            "email" =>  $ses_data['email'],
            "role"  =>  $ses_data['role']
        );
        $this->load->model('AdminModel');
        $this->load->model('NewsModel');
        $this->load->model('ContactModel');
        $this->load->model('LecturesModel');
    }

	public function index()
	{
		// $data['body_id'] = "ADMIN";
		// $data['page'] = "admin/login";
		// $this->load->view('admin/TemplateLogin',$data);
		$this->dashboard();
	}

	public function dashboard(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/dashboard";
		$data['currentUserName'] = $this->currentUserName;
		$data['displayed_images'] = $this->AdminModel->GetDisplayedLandingImages();
        $data['hidden_images'] = $this->AdminModel->GetHiddenLandingImages();
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function categories(){
        $data['body_id'] = "ADMIN";
        $data['page'] = "admin/categories";
        $data['currentUserName'] = $this->currentUserName;
        $data['categories'] = $this->AdminModel->GetAllCategories();
        $this->load->view('admin/TemplateAdmin',$data);
    }

    public function addNewCategory(){
	    if($this->input->post()){
	        $this->AdminModel->AddNewCategory();
        }
        redirect("admin/categories");
    }

    public function updateCategory(){
        if($this->input->post()){
            $this->AdminModel->UpdateCategory();
        }
        redirect("admin/categories");
    }

    public function removeCategory($id){
        $this->AdminModel->RemoveCategory($id);
        redirect("admin/categories");
    }

	public function addProject(){
	    if($this->input->post()) {
            $insId = $this->AdminModel->CreateProject();
            redirect("admin/updateProject/" . $insId);
        }else {
            $data['body_id'] = "ADMIN";
            $data['page'] = "admin/addProject";
            $data['currentUserName'] = $this->currentUserName;
            $this->load->view('admin/TemplateAdmin', $data);
        }
	}

	public function updateProject($proj_id){
	    if($proj_id != null) {
	        $data['project_info'] = $this->AdminModel->GetProject($proj_id);
	        if($data['project_info'] == null){
                redirect("admin/viewProjects");
            }else {
                $data['body_id'] = "ADMIN";
                $data['page'] = "admin/updateProject";
                $data['currentUserName'] = $this->currentUserName;
                $data['categories'] = $this->AdminModel->GetAllCategories();
                $data['project_categories'] = $this->AdminModel->GetProjectCategories($proj_id);
                $data['images'] = $this->AdminModel->GetProjectImages($proj_id);
                $this->load->view('admin/TemplateAdmin', $data);
            }
        }else
            redirect("admin/viewProjects");
    }

    public function publishPost($id){
        $this->AdminModel->publishPost($id);
        Redirect("admin/updateProject/" . $id);
    }

    public function draftPost($id){
        $this->AdminModel->draftPost($id);
        Redirect("admin/updateProject/" . $id);
    }

    public function addProjectCategory($category_id, $project_id){
	    $this->AdminModel->AddProjectCategory($category_id, $project_id);
        Redirect("admin/updateProject/" . $project_id);
    }

    public function removeProjectCategory($category_id, $project_id){
        $this->AdminModel->RemoveProjectCategory($category_id, $project_id);
        Redirect("admin/updateProject/" . $project_id);
    }

    public function ProcessUpdateProject(){
	    if($this->input->post()){
	        $id = $this->AdminModel->UpdateProject();
            Redirect("admin/updateProject/" . $id);
        }else
            Redirect("admin/viewProjects/");
    }

    public function deleteProjectImage(){
        $this->AdminModel->deleteProjectImage();
        Redirect("admin/updateProject/" . $this->input->post("project_id"));
    }

	public function viewProjects(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/allProjects";
        $data['currentUserName'] = $this->currentUserName;
		$data['projects'] = $this->AdminModel->GetAllProjects();
		$this->load->view('admin/TemplateAdmin',$data);
	}

    public function deleteProject($project_id){
        $this->AdminModel->DeleteProject($project_id);
        Redirect("admin/viewProjects/");
    }

	public function upload(){

	}



	public function project_upload(){
        if($this->input->post('upload')) {
            $this->AdminModel->uploadProjectImage();
            Redirect("admin/updateProject/".$this->input->post("proj_id"));
        }else
            Redirect("admin/viewProjects/");
    }

	public function companySlogan(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/companySlogan";
        $data['currentUserName'] = $this->currentUserName;
		$data['slogan'] = $this->AdminModel->GetCompanySlogan();
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function updateCompanySlogan(){
		if($this->input->post('slogan')){
			$this->AdminModel->updateSlogan();
		}
		Redirect("admin/companySlogan");
	}

	// Principal Architect

	public function principalArchitect(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/principalArchitect";
        $data['currentUserName'] = $this->currentUserName;
		$data['main_architect'] = $this->AdminModel->MainArchitectInfo();
		$this->load->view('admin/TemplateAdmin',$data);
	}

    public function principal_upload(){
        if($this->input->post('upload'))
            $this->AdminModel->uploadPrincipalImages();

        Redirect("admin/principalArchitect");
    }

    public function updatePrincipalArchitect(){
        if($this->input->post())
            $this->AdminModel->updatePrincipalArchitect();
        Redirect("admin/principalArchitect");
    }

    public function DeletePrincipalImage($id, $path){
        $this->AdminModel->DeletePrincipalImage($id, $path);
        redirect("admin/principalArchitect");
    }


	// Teams

	public function teams(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/teams";
        $data['currentUserName'] = $this->currentUserName;
		$data['members'] = $this->AdminModel->GetAllMembers();
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function addNewMember()
	{
		if($this->input->post("name")){
			$this->AdminModel->addNewMember();
		}

		Redirect("admin/teams");
	}

	public function removeMember($id){
		$this->AdminModel->removeMember($id);
		Redirect("admin/teams");
	}	

	public function editMember($id){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/editMember";
        $data['currentUserName'] = $this->currentUserName;
		$data['member'] = $this->AdminModel->getMemberById($id);
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function updateMember(){
		var_dump($this->input->post());
		if($_FILES['file']['name'] != ""){
			$this->AdminModel->replaceMemberImage($this->input->post("previous_image"),$this->input->post("id") );
		}
		$this->AdminModel->updateMember();
		Redirect("admin/teams");
	}



	// publications

	public function publications(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/publications";
        $data['currentUserName'] = $this->currentUserName;
		$data['publications'] = $this->AdminModel->getAllPublications();
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function addNewPublication(){
		if($this->input->post("title")){
			$this->AdminModel->addNewPublication();
		}
		Redirect("admin/publications");
	}

	public function editPublication($id){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/editPublication";
        $data['currentUserName'] = $this->currentUserName;
		$data['publication'] = $this->AdminModel->getPublicationById($id);
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function updatePublication(){
		var_dump($this->input->post());
		if($_FILES['file']['name'] != ""){
			$this->AdminModel->replacePublicationImage($this->input->post("previous_image"),$this->input->post("id") );
		}
		$this->AdminModel->updatePublication();
		Redirect("admin/publications");
	}

	public function removePublication($id){
		$this->AdminModel->removePublication($id);
		Redirect("admin/publications");
	}	


	// Awards

	public function awards(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/awards";
        $data['currentUserName'] = $this->currentUserName;
		$data['awards'] = $this->AdminModel->getAllAwards();
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function addNewAward(){
		if($this->input->post("title")){
			$this->AdminModel->addNewAward();
		}
		Redirect("admin/awards");
	}

	public function editAward($id){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/editAward";
        $data['currentUserName'] = $this->currentUserName;
		$data['award'] = $this->AdminModel->getAwardById($id);
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function updateAward(){
		//var_dump($this->input->post());

		$this->AdminModel->updateAward();
		Redirect("admin/awards");
		// update title, description field
	}

	public function removeAward($id){
		$this->AdminModel->removeAward($id);
		Redirect("admin/awards");
	}	

    // landing slider
    public function uploadLandingPageImages(){
        if($_FILES['file']['name'] != "") {
            $this->AdminModel->UploadNewLandingPageImage();
        }
        Redirect("admin/index");
    }

    public function AddToDisplay($id){
        $this->AdminModel->AddToDisplay($id);
        Redirect("admin/index");
    }

    public function RemoveFromDisplay($id){
        $this->AdminModel->RemoveFromDisplay($id);
        Redirect("admin/index");
    }

    public function deleteLandingImage($id){
        $this->AdminModel->deleteLandingImage($id);
        Redirect("admin/index");
    }


	public function contact(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/contact";
        $data['currentUserName'] = $this->currentUserName;
		$contactInfo = $this->ContactModel->GetContactInfo();
		$data['receiverEmail'] = $contactInfo->receiverEmail;
		$data['displayEmail'] = $contactInfo->email;
        $data['address'] = $contactInfo->address;
        $data['tel'] = $contactInfo->tel;
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function updateContactInfo(){
        $this->ContactModel->UpdateContactInfo();
        Redirect('admin/contact');
    }

	public function jobOpportunity(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/jobOpportunity";
        $data['currentUserName'] = $this->currentUserName;
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function location(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/location";
        $data['currentUserName'] = $this->currentUserName;
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function addPost(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/addPost";
        $data['currentUserName'] = $this->currentUserName;
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function createPost(){
	    if($this->input->post()) {
            $id = $this->NewsModel->CreateNewPost();
            redirect("admin/editPost/".$id);
        }else
            redirect("admin/addPost");

    }

    public function editPost($id){
        $data["news"] = $this->NewsModel->GetPostById($id);
        if($data["news"] != null) {
            $data['body_id'] = "ADMIN";
            $data['page'] = "admin/editPost";
            $data['currentUserName'] = $this->currentUserName;
            $data['images'] = $this->NewsModel->GetPostImages($id);
            $this->load->view('admin/TemplateAdmin', $data);
        }else
            redirect("admin/viewPosts");
    }

    public function newsUpload(){
        if($this->input->post()){
            $this->NewsModel->UploadPostImage();
            redirect("admin/editPost/".$this->input->post("post_id"));
        }else
            redirect("admin/viewPosts");
    }

    public function removeNews($id){
        $this->NewsModel->removePost($id);
        redirect("admin/viewPosts");
    }

    public function deleteNewsImage(){
        if($this->input->post()){
            $this->NewsModel->deleteNewsImage();
        }
        redirect("admin/editPost/".$this->input->post("post_id"));
    }

    public function updatePost(){
        if($this->input->post())
            $this->NewsModel->updatePost();
        redirect("admin/viewPosts");
    }

    public function publishNews($id){
        $this->NewsModel->publishNews($id);
        redirect("admin/editPost/".$id);
    }

    public function draftNews($id){
        $this->NewsModel->draftNews($id);
        redirect("admin/editPost/".$id);
    }

	public function viewPosts(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/allPosts";
        $data['currentUserName'] = $this->currentUserName;
		$data['posts'] = $this->NewsModel->GetAllPosts();
		$this->load->view('admin/TemplateAdmin',$data);
	}


	///////

    public function addLecture(){
        $data['body_id'] = "ADMIN";
        $data['page'] = "admin/addLecture";
        $data['currentUserName'] = $this->currentUserName;
        $this->load->view('admin/TemplateAdmin',$data);
    }

    public function createLecture(){
        if($this->input->post()) {
            $id = $this->LecturesModel->CreateNewPost();
            redirect("admin/editLecture/".$id);
        }else
            redirect("admin/addLecture");

    }

    public function editLecture($id){
        $data["news"] = $this->LecturesModel->GetPostById($id);
        if($data["news"] != null) {
            $data['body_id'] = "ADMIN";
            $data['page'] = "admin/editLecture";
            $data['currentUserName'] = $this->currentUserName;
            $data['images'] = $this->LecturesModel->GetPostImages($id);
            $this->load->view('admin/TemplateAdmin', $data);
        }else
            redirect("admin/viewLectures");
    }

    public function lectureUpload(){
        if($this->input->post()){
            $this->LecturesModel->UploadPostImage();
            redirect("admin/editLecture/".$this->input->post("post_id"));
        }else
            redirect("admin/viewLectures");
    }

    public function removeLecture($id){
        $this->LecturesModel->removePost($id);
        redirect("admin/viewLectures");
    }

    public function deleteLectureImage(){
        if($this->input->post()){
            $this->LecturesModel->deleteNewsImage();
        }
        redirect("admin/editLecture/".$this->input->post("post_id"));
    }

    public function updateLecture(){
        if($this->input->post())
            $this->LecturesModel->updatePost();
        redirect("admin/viewLectures");
    }

    public function publishLecture($id){
        $this->LecturesModel->publishNews($id);
        redirect("admin/editLecture/".$id);
    }

    public function draftLecture($id){
        $this->LecturesModel->draftNews($id);
        redirect("admin/editLecture/".$id);
    }

    public function viewLectures(){
        $data['body_id'] = "ADMIN";
        $data['page'] = "admin/allLectures";
        $data['currentUserName'] = $this->currentUserName;
        $data['posts'] = $this->LecturesModel->GetAllPosts();
        $this->load->view('admin/TemplateAdmin',$data);
    }

    //////


    ///////////

    public function uploadVideo(){
        $this->load->model("VideoModel");
        if($this->VideoModel->VideoUpload())
            redirect("admin/videos");
        else
            redirect("admin/videos/err");


    }

    public function videos($param = ""){
        $this->load->model("VideoModel");
        $data['body_id'] = "ADMIN";
        $data['page'] = "admin/videos";
        $data['currentUserName'] = $this->currentUserName;
        $data['videos'] = $this->VideoModel->GetAllVideos();

        $data['err'] = ($param == "err")?"Video Upload Failed":"";
        if($param != "" && $param != "err"){
            $data["selectedVideo"] = $this->VideoModel->GetVideoById($param);
            $data['video_albums'] = $this->VideoModel->GetAlbumsOfVideo($param);
            $data["albums"] = $this->VideoModel->GetAllVideoAlbums();
            if($data["selectedVideo"]["thumb"] == null)
                $data["selectedVideo"]["thumb"] = base_url()."assets/video_sample.png";
            else
                $data["selectedVideo"]["thumb"] = base_url()."uploads/videos/thumbs/".$data["selectedVideo"]["thumb"];

//            if(file_exists(base_url()."uploads/videos/thumbs/thumb".$data["selectedVideo"]["file_name"]))
//                $data["selectedVideo"]["thumb_path"] = base_url()."uploads/videos/thumbs/thumb".$data["selectedVideo"]["file_name"];
//            else
//                $data["selectedVideo"]["thumb_path"] = base_url()."assets/video_sample.png";
        }
        $this->load->view('admin/TemplateAdmin',$data);
    }

    function GetRawFileName($data){
        return explode(".", $data)[0];
    }

    public function changeVideoVisibility($id){
        $this->load->model("VideoModel");
        $this->VideoModel->ChangeVisibility($id);
        redirect("admin/videos/".$id);
    }

    public function updateVideoTitle(){
        $id = $this->input->post("id");
        $this->load->model("VideoModel");
        $this->VideoModel->UpdateTitle();
        redirect("admin/videos/".$id);
    }

    public function updateVideoDescription(){
        $id = $this->input->post("id");
        $this->load->model("VideoModel");
        $this->VideoModel->UpdateVideoDescription();
        redirect("admin/videos/".$id);
    }

    public function updateVideoDate(){
        $id = $this->input->post("id");
        $this->load->model("VideoModel");
        $this->VideoModel->UpdateVideoDate();
        redirect("admin/videos/".$id);
    }

    public function deleteVideo($id){
        $this->load->model("VideoModel");
        $this->VideoModel->DeleteVideo($id);
        redirect("admin/videos");
    }

    public function uploadThumb(){
        //print_r($this->input->post());
        $this->load->model("VideoModel");
        $this->VideoModel->UploadThumb();
        redirect("admin/videos/".$this->input->post("id"));
    }

    public function addVideoToAlbum($albumId, $videoId){
        $this->load->model("VideoModel");
        $this->VideoModel->addVideoToAlbum($albumId, $videoId);
        redirect("admin/videos/".$videoId);
    }

    public function removeVideoFromAlbum($albumId, $videoId){
        $this->load->model("VideoModel");
        $this->VideoModel->removeVideoFromAlbum($albumId, $videoId);
        redirect("admin/videos/".$videoId);
    }

    ///////////

    public function videoAlbums(){
        $this->load->model("VideoModel");
        $data['body_id'] = "ADMIN";
        $data['page'] = "admin/videoAlbums";
        $data['currentUserName'] = $this->currentUserName;
        $data['albums'] = $this->VideoModel->GetAllVideoAlbums();
        $this->load->view('admin/TemplateAdmin',$data);
    }

    public function addVideoAlbum(){
        $this->load->model("VideoModel");
        $this->VideoModel->AddNewAlbum();
        redirect("admin/videoAlbums");
    }

    public function updateVideoAlbum(){
        $this->load->model("VideoModel");
        $this->VideoModel->UpdateAlbum();
        redirect("admin/videoAlbums");
    }

    public function removeVideoAlbum($albumId){
        $this->load->model("VideoModel");
        $this->VideoModel->RemoveVideoAlbum($albumId);
        redirect("admin/videoAlbums");
    }

    //////////

	public function profile(){
		$data['body_id'] = "ADMIN";
		$data['page'] = "admin/profile";
        $data['currentUserName'] = $this->currentUserName;
		$this->load->view('admin/TemplateAdmin',$data);
	}

	public function users($err=""){
        $ses_data = $this->session->userdata("ses_data");
        if($ses_data['role'] != 1)
            redirect("admin/dashboard");
        else {
            $data['body_id'] = "ADMIN";
            $data['page'] = "admin/users";
            $data['currentUserName'] = $this->currentUserName;
            $data['users'] = $this->AdminModel->GetAllRegisteredUsers();
            $data['err'] =  $err;
            $this->load->view('admin/TemplateAdmin', $data);
        }
	}

	public function addNewUser(){
        $ses_data = $this->session->userdata("ses_data");
        if($ses_data['role'] != 1)
            redirect("admin/dashboard");
        else if($this->AdminModel->IsEmailAvailable($this->input->post("email"))){
            $this->AdminModel->AddNewUser();
            redirect("admin/users");
        }else
            redirect("admin/users/errmail");
    }

    public function editUser($id, $err=""){
        $ses_data = $this->session->userdata("ses_data");
        if($ses_data['role'] != 1)
            redirect("admin/dashboard");
        else {
            $data['body_id'] = "ADMIN";
            $data['page'] = "admin/editUser";
            $data['currentUserName'] = $this->currentUserName;
            $data['user'] = $this->AdminModel->GetUserById($id);
            $data['err'] =  $err;
            $this->load->view('admin/TemplateAdmin', $data);
        }
    }

    public function updateUser(){
        if($this->AdminModel->IsEmailAvailableForId($this->input->post("id"), $this->input->post("email"))){
            $this->AdminModel->UpdateUser();
            redirect("admin/editUser/".$this->input->post("id"));
        }else
            redirect("admin/editUser/".$this->input->post("id")."/errmail");
    }

    public function deleteUser($id){
        $ses_data = $this->session->userdata("ses_data");
        if($ses_data['role'] != 1)
            redirect("admin/dashboard");
        else {
            $this->AdminModel->DeleteUser($id);
            redirect("admin/users");
        }
    }

	public function changeUsername(){

        $admin_user = $this->AdminModel->GetValidUser($this->input->post("pre_user"), $this->input->post("pre_password"));
        if($admin_user != null && $this->AdminModel->IsEmailAvailableForId($admin_user["id"],$this->input->post("new_user"))){
            $id = $admin_user->id;
            $this->AdminModel->UpdateUsername($id, $this->input->post("new_user"));
            $this->session->set_flashData("success", true);

            $ses_data = $this->session->userdata("ses_data");
            $ses_data["email"] = $this->input->post("new_user");
            $this->session->set_userdata("ses_data", $ses_data);
        }
        else {
            echo "bal " . $admin_user["id"];
            $this->session->set_flashData("success", false);
        }

        redirect("admin/profile");
    }

    public function changePassword(){
        $ses_data = $this->session->userdata("ses_data");
        $admin_user = $this->AdminModel->GetValidUser($ses_data["email"], $this->input->post("pre_password"));
        if($admin_user != null && ($this->input->post("re_password") == $this->input->post("new_password"))){
            $id = $admin_user->id;
            $this->AdminModel->UpdatePassword($id, $this->input->post("new_password"));
            $this->session->set_flashData("success", true);
        }else{
            $this->session->set_flashData("success", false);
        }
        redirect("admin/profile");

    }

	public function logout(){
		$this->session->unset_userdata("ses_data");
		Redirect(site_url("projects/index"));
	}
}

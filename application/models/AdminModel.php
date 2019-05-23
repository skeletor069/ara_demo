<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {


	public function processSignIn(){
		if($this->input->post("email") && $this->input->post("password")){
			$sql = "select * from admin_users where email=? and password=?";
			$q = $this->db->query($sql, array($this->input->post("email"), md5($this->input->post("password"))));
			$result = $q->result();
			if($q->num_rows() == 1){
				return $result[0];
			}else
                return null;

		}
	}

    public function GetValidUser($user, $password){

            $sql = "select * from admin_users where email=? and password=?";
            $q = $this->db->query($sql, array($user, md5($password)));
            $result = $q->result();
            if($q->num_rows() == 1){
                return $result[0];
            }else
                return false;


    }

    public function GetUserById($id){
        $sql = "select * from admin_users where id=?";
        $query = $this->db->query($sql,array($id));
        $data = [];
        foreach ($query->result() as $row){
            $data = array(
                'id'   =>  $row->id,
                'name' =>  $row->name,
                'email'   =>  $row->email,
                'password' =>  $row->password
            );
        }
        return $data;
    }

    public function GetAllRegisteredUsers(){
        $sql = "select * from admin_users where role=2";
        $query = $this->db->query($sql);
        $data = [];
        foreach ($query->result() as $row){
            $data[] = array(
                'id'   =>  $row->id,
                'name' =>  $row->name,
                'email'   =>  $row->email,
                'password' =>  $row->password
            );
        }
        return $data;
    }

    public function IsEmailAvailable($email){
        $sql = "select * from admin_users where email=?";
        $q = $this->db->query($sql, array($email));
        return $q->num_rows() == 0;
    }

    public function IsEmailAvailableForId($id,$email){
        $sql = "select * from admin_users where email=? and id<>?";
        $q = $this->db->query($sql, array($email, $id));
        echo $q->num_rows();
        return $q->num_rows() == 0;
    }

    public function DeleteUser($id){
        if($id!=1){
            $sql = "delete from admin_users where id=?";
            $this->db->query($sql, array( $id));
        }
    }

    public function UpdateUser(){
        $sql = "update admin_users set name=?,email=?,password=? where id=?";
        $this->db->query($sql, array($this->input->post("name"), $this->input->post("email"), md5($this->input->post("password")), $this->input->post("id")));
    }

    public function AddNewUser(){
        $sql = "insert into admin_users(name,email,password,role) values(?,?,?,2)";
        $this->db->query($sql, array($this->input->post("name"),$this->input->post("email"), md5($this->input->post("password"))));
    }

    public function UpdateUsername($id, $username){
        $sql = "update admin_user set email=? where id=?";
        $this->db->query($sql, array($username, $id));
    }

    public function UpdatePassword($id, $password){
        $sql = "update admin_user set password=? where id=?";
        $this->db->query($sql, array(md5($password), $id));
    }

	public function GetAllCategories(){
	    $sql = "select * from categories";
	    $query = $this->db->query($sql);
	    $data = [];
	    foreach ($query->result() as $row){
	        $data[] = array(
	            'category_id'   =>  $row->category_id,
                'category_name' =>  $row->category_name
            );
        }
        return $data;
    }

    public function AddNewCategory(){
	    $sql = "insert into categories(category_name) values(?)";
	    $query = $this->db->query($sql, array($this->input->post('category_name')));
    }

    public function RemoveCategory($category_id){
        $sql = "delete from categories where category_id=?";
        $this->db->query($sql, array($category_id));

        $sql = "delete from category_projects where category_id=?";
        $this->db->query($sql, array($category_id));
    }

    public function UpdateCategory(){
        $sql = "update categories set category_name=? where category_id=?";
        $query = $this->db->query($sql, array($this->input->post('category_name'), $this->input->post('category_id')));
    }

    public function AddProjectCategory($category_id, $project_id){
        $sql = "insert into category_projects values(?,?)";
        $this->db->query($sql,array($category_id, $project_id));
    }

    public function RemoveProjectCategory($category_id, $project_id){
        $sql = "delete from category_projects where category_id=? and project_id=?";
        $this->db->query($sql,array($category_id, $project_id));
    }

    public function GetProjectCategories($proj_id){
        $sql = "select category_id from category_projects where project_id=?";
        $query = $this->db->query($sql,array($proj_id));
        $data = [];
        foreach($query->result() as $row){
            $data[] = $row->category_id;
        }
        return $data;
    }

    public function GetCategoryNamesOfProject($id){
        $sql = "select categories.* from categories,category_projects p where p.category_id=categories.category_id and p.project_id=?";
        $res = $this->db->query($sql, array($id));
        $data = [];
        foreach ($res->result() as $row){
            $data[] = array(
                "category_id"   =>  $row->category_id,
                "category_name" =>  $row->category_name
            );
        }
        return $data;
    }

	public function UploadNewLandingPageImage(){
		$image_data = $this->UploadImage();

		$sql = "select count(*) as count from landing_slider_images where display=true";
		$q = $this->db->query($sql);
        $res = $q->result();


		$sql = "insert into landing_slider_images(img_path, serial, display) values(?,?,?)";
		$q = $this->db->query($sql, array($image_data['file_name'], $res[0]->count, true));

	}

	public function GetDisplayedLandingImages(){
        $sql = "select * from landing_slider_images where display=true";
        $q = $this->db->query($sql);
        $data = array();
        foreach($q->result() as $row){
            $data[] = array(
                'id'        =>  $row->id,
                'img_path'  =>  "uploads/".$row->img_path,
                'serial'    =>  $row->serial,
                'display'   =>  $row->display
            );
        }
        return $data;
    }

    public function deleteLandingImage($id){
        $sql = "select * from landing_slider_images where id=".$id;
        $q = $this->db->query($sql);
        foreach($q->result() as $row){
            $data = array(
                'id'        =>  $row->id,
                'img_path'  =>  "uploads/".$row->img_path,
                'serial'    =>  $row->serial,
                'display'   =>  $row->display
            );
        }

        unlink(FCPATH.$data["img_path"]);
        $sql = "delete from landing_slider_images where id=?";
        $q = $this->db->query($sql,array($id));

    }

    public function AddToDisplay($id){
        $sql = "update landing_slider_images set display=true where id=?";
        $q = $this->db->query($sql,array($id));
    }

    public function RemoveFromDisplay($id){
        $sql = "update landing_slider_images set display=false where id=?";
        $q = $this->db->query($sql,array($id));
    }

    public function GetHiddenLandingImages(){
        $sql = "select * from landing_slider_images where display=false";
        $q = $this->db->query($sql);
        $data = array();
        foreach($q->result() as $row){
            $data[] = array(
                'id'        =>  $row->id,
                'img_path'  =>  "uploads/".$row->img_path,
                'serial'    =>  $row->serial,
                'display'   =>  $row->display
            );
        }
        return $data;
    }

    public function CreateProject(){
        $project_name = $this->input->post("name");
        $description = $this->input->post("description");
        $location = $this->input->post("location");
        $startDate = strtotime($this->input->post("startDate"));
        $endDate = strtotime($this->input->post("endDate"));

        $y1 = $y2 = $m1 = $m2 = $d1 = $d2 = null;
        if($startDate != ""){
            $y1 = date("Y",$startDate);
            $m1 = date("m",$startDate);
            $d1 = date("d",$startDate);
        }
        if($endDate != ""){
            $y2 = date("Y",$endDate);
            $m2 = date("m",$endDate);
            $d2 = date("d",$endDate);
        }

        $q = "insert into projects(project_name, description, location, start_year, start_month, start_day, end_year, end_month, end_day) values(?,?,?,?,?,?,?,?,?)";
        $query = $this->db->query($q, array($project_name, $description, $location, $y1, $m1, $d1, $y2, $m2, $d2));
        return $this->db->insert_id();
    }

    public function UpdateProject(){
        $proj_id = $this->input->post("proj_id");
        $project_name = $this->input->post("name");
        $description = $this->input->post("description");
        $location = $this->input->post("location");
        $startDate = strtotime($this->input->post("startDate"));
        $endDate = strtotime($this->input->post("endDate"));

        $y1 = $y2 = $m1 = $m2 = $d1 = $d2 = null;
        if($startDate != ""){
            $y1 = date("Y",$startDate);
            $m1 = date("m",$startDate);
            $d1 = date("d",$startDate);
        }
        if($endDate != ""){
            $y2 = date("Y",$endDate);
            $m2 = date("m",$endDate);
            $d2 = date("d",$endDate);
        }
        $q = "update projects set project_name=?,description=?,location=?,start_year=?,start_month=?,start_day=?,end_year=?,end_month=?,end_day=? where id=?";
        $query = $this->db->query($q, array($project_name, $description, $location, $y1, $m1, $d1, $y2, $m2, $d2, $proj_id));
        return $proj_id;
    }

    public function GetAllProjects(){
        $q = "select * from projects";
        $res = $this->db->query($q);
        $data = [];
        foreach ($res->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "project_name"  =>  $row->project_name,
                "description"   =>  $row->description,
                "location"      =>  $row->location,
                "start_year"    =>  $row->start_year,
                "start_month"   =>  $row->start_month,
                "start_day"     =>  $row->start_day,
                "end_year"      =>  $row->end_year,
                "end_month"     =>  $row->end_month,
                "end_day"       =>  $row->end_day,
                "published"     =>  $row->published,
                "categories"    =>  $this->GetCategoryNamesOfProject($row->id)
            );
        }

        return $data;
    }

    public function GetProject($proj_id){
        $q = "select * from projects where id=?";
        $res = $this->db->query($q,array($proj_id));
        if($res->num_rows() == 1){
            $data = [];
            foreach ($res->result() as $row){
                $data['id'] = $row->id;
                $data['project_name'] = $row->project_name;
                $data['description'] = $row->description;
                $data['location'] = $row->location;
                $data['start_year'] = $row->start_year;
                $data['start_month'] = $row->start_month;
                $data['start_day'] = $row->start_day;
                $data['end_year'] = $row->end_year;
                $data['end_month'] = $row->end_month;
                $data['end_day'] = $row->end_day;
                $data['published'] = $row->published;
            }
            return $data;
        }else
            return null;
    }

    public function DeleteProject($project_id){
        // remove tag
        // delete project images
        // delete project

        $sql = "delete from category_projects where project_id=?";
        $this->db->query($sql, array($project_id));

        $this->deleteAllImagesOfProject($project_id);

        $sql = "delete from projects where id=?";
        $this->db->query($sql, array($project_id));

    }

    public function publishPost($id){

        $images = $this->GetProjectImages($id);
        if(sizeof($images) > 0) {
            $sql = "update projects set published=true where id=" . $id;
            $this->db->query($sql);
        }
    }

    public function draftPost($id){
        $sql = "update projects set published=false where id=".$id;
        $this->db->query($sql);
    }



	public function GetCompanySlogan(){
		$data = json_decode(file_get_contents('./assets/slogan.json'));
		//var_dump($data);
		return $data->slogan;
	}

	public function updateSlogan(){
		$data = array('slogan' => $this->input->post("slogan"));
		$newJsonString = json_encode($data);
    	file_put_contents('./assets/slogan.json', $newJsonString);
	}		

	public function uploadPrincipalImages(){
		$id = $this->GeneralUpload();

		if($id != null){
			$sql = "insert into architect_images(architect_id, image_id) values(?,?)";
			$q = $this->db->query($sql, array($this->input->post("architect"), $id));
			echo "done";
		}
	}

	public function uploadProjectImage(){
	    $id = $this->GeneralUpload();
	    if($id != null){
            $sql = "insert into project_images(project_id, image_id) values(?,?)";
            $q = $this->db->query($sql, array($this->input->post("proj_id"), $id));
        }
    }

    public function deleteProjectImage(){
	    $sql = "delete from project_images where project_id=? and image_id=?";
	    $query = $this->db->query($sql,array($this->input->post("project_id"), $this->input->post("image_id")));

	    $sql = "delete from gallery where image_id=?";
	    $query = $this->db->query($sql, array($this->input->post("image_id")));
	    unlink($this->input->post("url"));
    }

    function deleteAllImagesOfProject($project_id){
        $project_images = $this->GetProjectImages($project_id);
        foreach($project_images as $image){
            $sql = "delete from project_images where project_id=? and image_id=?";
            $query = $this->db->query($sql,array($project_id, $image["image_id"]));
            $sql = "delete from gallery where image_id=?";
            $query = $this->db->query($sql, array($this->input->post("image_id")));
            unlink($this->input->post("url"));
        }
        

        
    }

    public function GetProjectImages($proj_id){
        $sql = "select gallery.* from project_images, gallery where project_images.image_id=gallery.image_id and project_id=?";
        $q = $this->db->query($sql, array($proj_id));
        $data = [];
        foreach($q->result() as $row){
            $data[] = array(
                "image_id"      =>  $row->image_id,
                "image_path"    =>  "uploads/" .$row->image_path
            );
        }
        return $data;
    }

	function GeneralUpload(){
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'file_name' => md5(time())
		);

		$this->load->library('upload', $config);
		if($this->upload->do_upload('file')){
			$image_data = $this->upload->data();

			$sql = "insert into gallery(image_path) values(?)";
			$q = $this->db->query($sql, array($image_data['file_name']));
			return $this->db->insert_id();
		}else
			return null;
	}

	function UploadImage(){
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'file_name' => md5(time())
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file')){
			return $this->upload->data();
		}else{
			echo $this->upload->display_errors();
			return null;
		}

	}

	function MainArchitectInfo(){
		$query = $this->db->get_where('architects', array('id' => 1));
		$res = $query->result();
		$data["name"] = $res[0]->name;
		$data["subtitle"] = $res[0]->subtitle;
		$data["description"] = $res[0]->description;

		$query = $this->db->query("SELECT * FROM architect_images ai, gallery g WHERE ai.image_id = g.image_id and ai.architect_id=1");
		$res = $query->result();

		$images = [];
		foreach ($res as $key => $row) {
		    $images[] = array(
		        "image_id"      =>  $row->image_id,
                "image_path"    =>  "uploads/".$row->image_path
            );
		}
		$data["images"] = $images;
		return $data;
	}

    public function updatePrincipalArchitect(){
        $q = "update architects set name=?,subtitle=?,description=? where id=1";
        $this->db->query($q,array($this->input->post("name"), $this->input->post("subtitle"), $this->input->post("description")));
    }

    public function DeletePrincipalImage($id, $path){
        if(file_exists($path))
            unlink($path);

	    $q = "delete from architect_images where architect_id=1 and image_id=?";
        $this->db->query($q,array($id));

        $q = "delete from gallery where image_id=?";
        $this->db->query($q,array($id));


    }

	function addNewMember(){

		$image_data = $this->UploadImage();

		if($image_data){
			$sql = 'insert into team_members(name,designation,phone,email,avatar) values(?,?,?,?,?)';
			$insert_data = array(
				$this->input->post("name"),
				$this->input->post("designation"),
				$this->input->post("phone"),
				$this->input->post("eml"),
				"uploads/" . $image_data["file_name"]
			);
			$query = $this->db->query($sql, $insert_data);
		}
	}

	function GetAllMembers()
	{
		$res = $this->db->get("team_members");
		$data = [];
		foreach ($res->result() as $row) {
			$data[] = array(
				"id" => $row->id,
				"name" => $row->name,
				"designation" => $row->designation,
				"phone" => $row->phone,
				"email" => $row->email,
				"avatar" => $row->avatar
			);
		}

		return $data;
	}

	function GetMemberById($id)
	{
		$res = $this->db->query("select * from team_members where id=".$id);
		$data = array();
		foreach ($res->result() as $row) {
			$data = array(
				"id" => $row->id,
				"name" => $row->name,
				"designation" => $row->designation,
				"phone" => $row->phone,
				"email" => $row->email,
				"avatar" => $row->avatar
			);
			break;
		}

		return $data;

	}

	function removeMember($id)
	{
		$sql = "select avatar from team_members where id=".$id;
		$q = $this->db->query($sql);
		foreach ($q->result() as $key => $row) {
			if (file_exists($row->avatar)) {
    			unlink($row->avatar);
    			break;
    		}
		}

		$sql = "delete from team_members where id=".$id;
		$q = $this->db->query($sql);
	}

	function replaceMemberImage($preImage, $id)
	{
		if (file_exists($preImage)) {
    		unlink($preImage);		
    	}

    	$image_data = $this->UploadImage();

		if($image_data){
			$sql = 'update team_members set avatar = ? where id = ?';
			$insert_data = array(
				"uploads/" . $image_data["file_name"],
				$id
			);
			$query = $this->db->query($sql, $insert_data);
		}

	}

	function updateMember()
	{
		$sql = "update team_members set name=?,designation=?,phone=?,email=? where id=?";
		$update_data = array(
			$this->input->post("name"),
			$this->input->post("designation"),
			$this->input->post("phone"),
			$this->input->post("email"),
			$this->input->post("id")
		);
		$query = $this->db->query($sql, $update_data);

	}

	function addNewPublication(){
		$image_data = $this->UploadImage();

		if($image_data){
			$sql = 'insert into publications(publication_name,description,image_url) values(?,?,?)';
			$insert_data = array(
				$this->input->post("title"),
				$this->input->post("desc"),
				"uploads/" . $image_data["file_name"]
			);
			$query = $this->db->query($sql, $insert_data);
		}
	}

	function getAllPublications(){
		$res = $this->db->get("publications");
		$data = [];
		foreach ($res->result() as $row) {
			$data[] = array(
				"id" => $row->publication_id,
				"name" => $row->publication_name,
				"description" => $row->description,
				"image_url" => $row->image_url
			);
		}

		return $data;
	}

	function getPublicationById($id){
		$res = $this->db->query("select * from publications where publication_id=".$id);
		$data = array();
		foreach ($res->result() as $row) {
			$data = array(
				"id" => $row->publication_id,
				"name" => $row->publication_name,
				"description" => $row->description,
				"image_url" => $row->image_url
			);
			break;
		}

		return $data;
	}

	function replacePublicationImage($preImage, $id)
	{
		if (file_exists($preImage)) {
    		unlink($preImage);		
    	}

    	$image_data = $this->UploadImage();

		if($image_data){
			$sql = 'update publications set image_url = ? where publication_id = ?';
			$insert_data = array(
				"uploads/" . $image_data["file_name"],
				$id
			);
			$query = $this->db->query($sql, $insert_data);
		}

	}

	function updatePublication()
	{
		$sql = "update publications set publication_name=?,description=? where publication_id=?";
		$update_data = array(
			$this->input->post("title"),
			$this->input->post("desc"),
			$this->input->post("id")
		);
		$query = $this->db->query($sql, $update_data);

	}

	function removePublication($id){
		$sql = "select image_url from publications where publication_id=".$id;
		$q = $this->db->query($sql);
		foreach ($q->result() as $key => $row) {
			if (file_exists($row->image_url)) {
    			unlink($row->image_url);
    			break;
    		}
		}

		$sql = "delete from publications where publication_id=".$id;
		$q = $this->db->query($sql);
	}


	// awards

	function addNewAward(){
		//var_dump($this->input->post());
		//$image_data = $this->UploadImage();

		//if($image_data){
			$sql = 'insert into awards(award_name,location,description,image_url,year,month,day) values(?,?,?,?,?,?,?)';
			$insert_data = array(
				$this->input->post("title"),
                $this->input->post("location"),
				$this->input->post("desc"),
//                ($image_data)?"uploads/" . $image_data["file_name"]:null,
                null,
                $this->input->post('year'),
                $this->input->post('month'),
                $this->input->post('day')
			);
			$query = $this->db->query($sql, $insert_data);
		//}
	}

	function getAllAwards(){
		$res = $this->db->get("awards");
		$data = [];
		foreach ($res->result() as $row) {
			$data[] = array(
				"id" => $row->award_id,
				"name" => $row->award_name,
                "location" => $row->location,
				"description" => $row->description,
				"image_url" => $row->image_url
			);
		}

		return $data;
	}

    function getAllAwardsOrdered(){
	    $sql = "select * from awards order by year desc,month desc,day desc";
        $res = $this->db->query($sql);
        $data = [];
        foreach ($res->result() as $row) {
            $data[$row->year][] = array(
                "id" => $row->award_id,
                "name" => $row->award_name,
                "location" => $row->location,
                "description" => $row->description,
                "image_url" => $row->image_url,
                "date" => $row->day.".".$row->month.".".$row->year
            );
        }

        return $data;
    }

	function getAwardById($id){
		$res = $this->db->query("select * from awards where award_id=".$id);
		$data = array();
		foreach ($res->result() as $row) {
			$data = array(
				"id" => $row->award_id,
				"name" => $row->award_name,
                "location" => $row->location,
				"description" => $row->description,
				"image_url" => $row->image_url,
                "year"      =>  $row->year,
                "month"     =>  $row->month,
                "day"       =>  $row->day
			);
			break;
		}

		return $data;
	}

	function replaceAwardImage($preImage, $id)
	{
		if (file_exists($preImage)) {
    		unlink($preImage);		
    	}

    	$image_data = $this->UploadImage();

		if($image_data){
			$sql = 'update awards set image_url = ? where award_id = ?';
			$insert_data = array(
				"uploads/" . $image_data["file_name"],
				$id
			);
			$query = $this->db->query($sql, $insert_data);
		}

	}

	function updateAward()
	{
		$sql = "update awards set award_name=?,location=?,description=?,year=?,month=?,day=? where award_id=?";
		$update_data = array(
			$this->input->post("title"),
            $this->input->post("location"),
			$this->input->post("desc"),
            $this->input->post("year"),
            $this->input->post("month"),
            $this->input->post("day"),
            $this->input->post("id"),
		);
		$query = $this->db->query($sql, $update_data);

	}

	function removeAward($id){
		$sql = "select image_url from awards where award_id=".$id;
		$q = $this->db->query($sql);
		foreach ($q->result() as $key => $row) {
			if (file_exists($row->image_url)) {
    			unlink($row->image_url);
    			break;
    		}
		}

		$sql = "delete from awards where award_id=".$id;
		$q = $this->db->query($sql);
	}



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsModel extends CI_Model {

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

    function CreateNewPost(){
        $startDate = strtotime($this->input->post("date"));
        $y1 = date("Y",$startDate);
        $m1 = date("m",$startDate);
        $d1 = date("d",$startDate);
        $sql = "insert into news(title,description,year,month,day,address,city) values(?,?,?,?,?,?,?)";
        $q = $this->db->query($sql,array(
            $this->input->post("title"),
            $this->input->post("description"),
            $y1,
            $m1,
            $d1,
            $this->input->post("address"),
            $this->input->post("city")
        ));
        return $this->db->insert_id();
    }

    function updatePost(){
        $startDate = strtotime($this->input->post("date"));
        $y1 = date("Y",$startDate);
        $m1 = date("m",$startDate);
        $d1 = date("d",$startDate);
        $sql = "update news set title=?,description=?,year=?,month=?,day=?,address=?,city=? where id=?";
        $q = $this->db->query($sql,array(
            $this->input->post("title"),
            $this->input->post("description"),
            $y1,
            $m1,
            $d1,
            $this->input->post("address"),
            $this->input->post("city"),
            $this->input->post("news_id")
        ));
        print_r($this->input->post());
    }

    public function publishNews($id){
        $sql = "update news set published=true where id=".$id;
        $this->db->query($sql);
    }

    public function draftNews($id){
        $sql = "update news set published=false where id=".$id;
        $this->db->query($sql);
    }

    function removePost($id){

        $images = $this->GetPostImages($id);
        foreach ($images as $image) {
            if(file_exists(base_url().$image['image_path']))
                unlink(base_url().$image['image_path']);

            $q = "delete from news_images where news_id=? and image_id=?";
            $this->db->query($q,array($id, $image["image_id"]));

            $q = "delete from gallery where image_id=?";
            $this->db->query($q,array($image["image_id"]));
        }

        $sql = "delete from news where id=?";
        $this->db->query($sql,array($id));

    }

    function GetPostById($id){
        $sql = "select * from news where id=?";
        $q = $this->db->query($sql, array($id));
        $data = null;
        foreach ($q->result() as $row){
            $data = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "description"   =>  $row->description,
                "year"          =>  $row->year,
                "month"         =>  $row->month,
                "day"           =>  $row->day,
                "address"       =>  $row->address,
                "city"          =>  $row->city,
                "published"     =>  $row->published,
                "images"        =>  $this->GetPostImages($row->id)
            );
        }
        return $data;
    }

    function GetAllPosts(){
        $sql = "select * from news";
        $q = $this->db->query($sql);
        $data = [];
        foreach ($q->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "description"   =>  $row->description,
                "year"          =>  $row->year,
                "month"         =>  $row->month,
                "day"           =>  $row->day,
                "address"       =>  $row->address,
                "city"          =>  $row->city,
                "published"     =>  $row->published
            );
        }
        return $data;
    }

    function GetPublishedNews(){
        $sql = "select * from news where published=true order by year desc,month desc,day desc";
        $q = $this->db->query($sql);
        $data = [];
        foreach ($q->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "description"   =>  $row->description,
                "year"          =>  $row->year,
                "month"         =>  $row->month,
                "day"           =>  $row->day,
                "address"       =>  $row->address,
                "city"          =>  $row->city,
                "published"     =>  $row->published,
                "images"        =>  $this->GetPostImages($row->id)
            );
        }
        return $data;
    }

    function GetPublishedNewsByYear($year){
        $sql = "select * from news where published=true and year=? order by year desc,month desc,day desc";
        $q = $this->db->query($sql,array($year));
        $data = [];
        foreach ($q->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "description"   =>  $row->description,
                "year"          =>  $row->year,
                "month"         =>  $row->month,
                "day"           =>  $row->day,
                "address"       =>  $row->address,
                "city"          =>  $row->city,
                "published"     =>  $row->published,
                "images"        =>  $this->GetPostImages($row->id)
            );
        }
        return $data;
    }

    function GetPostImages($id){
        $sql = "select g.* from gallery g,news_images n where g.image_id=n.image_id and n.news_id=?";
        $q = $this->db->query($sql,array($id));
        $data = [];

        foreach ($q->result() as $row) {
            $data[] = array(
                "image_id"      =>  $row->image_id,
                "image_path"    =>  "uploads/".$row->image_path
            );
        }
        return $data;
    }

    function UploadPostImage(){
        $id = $this->GeneralUpload();
        if($id != null){
            $sql = "insert into news_images(news_id, image_id) values(?,?)";
            $q = $this->db->query($sql, array($this->input->post("post_id"), $id));
        }
    }

    function deleteNewsImage(){
        if(file_exists($this->input->post("url")))
            unlink($this->input->post("url"));

        $q = "delete from news_images where news_id=? and image_id=?";
        $this->db->query($q,array($this->input->post("post_id"), $this->input->post("image_id")));

        $q = "delete from gallery where image_id=?";
        $this->db->query($q,array($this->input->post("image_id")));

        $this->draftNews($this->input->post("post_id"));
    }

    function GetUniqueYears(){
        //$sql = "select year,published from news group by year having published=true order by year desc";
        $sql = "select distinct year from news where published=true order by year desc";
        $q = $this->db->query($sql);
        $data = [];

        foreach ($q->result() as $row) {
            $data[] = $row->year;
        }
        return $data;
    }


}
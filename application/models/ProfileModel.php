<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileModel extends CI_Model {


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

    public function GetCompanySlogan(){
        $data = json_decode(file_get_contents('./assets/slogan.json'));
        //var_dump($data);
        return $data->slogan;
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


}

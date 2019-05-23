<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectModel extends CI_Model {
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

    public function GetPublishedProjects(){
        $sql = "select * from projects where published=true";
        $res = $this->db->query($sql);
        $data = [];
        foreach ($res->result() as $row){
            $data[] = array(
                'id'            =>  $row->id,
                'project_name'  =>  $row->project_name,
                'description'   =>  $row->description,
                'location'      =>  $row->location,
                'start_year'    =>  $row->start_year,
                'start_month'   =>  $row->start_month,
                'start_day'     =>  $row->start_day,
                'end_year'      =>  $row->end_year,
                'end_month'     =>  $row->end_month,
                'end_day'       =>  $row->end_day,
                'published'     =>  $row->published,
                'images'        =>  $this->GetProjectImages($row->id),
                'default_category'  =>  $this->GetFirstCategory($row->id)
            );
        }
        return $data;
    }

    public function GetProjectsByCategory($category_id){
        $sql = "select * from projects where  id in (select project_id from category_projects where category_id=?) and published=true";
        $res = $this->db->query($sql, array($category_id));
        $data = [];
        foreach ($res->result() as $row){
            $data[] = array(
                'id'            =>  $row->id,
                'project_name'  =>  $row->project_name,
                'description'   =>  $row->description,
                'location'      =>  $row->location,
                'start_year'    =>  $row->start_year,
                'start_month'   =>  $row->start_month,
                'start_day'     =>  $row->start_day,
                'end_year'      =>  $row->end_year,
                'end_month'     =>  $row->end_month,
                'end_day'       =>  $row->end_day,
                'published'     =>  $row->published,
                'images'        =>  $this->GetProjectImages($row->id)
            );
        }
        return $data;
    }

    public function GetFirstCategory($project_id){
        $sql = "select category_id from category_projects where project_id=?";
        $res = $this->db->query($sql, array($project_id));
        $data = 0;
        foreach ($res->result() as $row){
            $data = $row->category_id;
            break;
        }

        return $data;
    }

    public function GetProjectUniqueCategories(){
        $sql = "SELECT * FROM categories WHERE category_id in (SELECT DISTINCT category_id FROM category_projects)";
        $q = $this->db->query($sql);
        $data = [];
        foreach($q->result() as $row){
            $data[] = array(
                "category_id"      =>  $row->category_id,
                "category_name"    =>  $row->category_name
            );
        }

        return $data;

    }
}
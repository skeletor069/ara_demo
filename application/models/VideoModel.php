<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoModel extends CI_Model {
    function VideoUpload(){

        //echo "Path exists : ".file_exists("./uploads/videos/");

        if(!file_exists("./uploads/videos")){
            mkdir("./uploads/videos/");
            chmod("./uploads/videos/", 0777);
            mkdir("./uploads/videos/thumbs/");
            chmod("./uploads/videos/thumbs/", 0777);
        }

        $config = array(
            'upload_path' => "./uploads/videos/",
            'allowed_types' => "wmv|mp4|avi|mov",
            'overwrite' => TRUE,
            'max_size' => "0",
            'file_name' => md5(time())
        );

        $this->load->library('upload', $config);
        if($this->upload->do_upload('file')){

            $video_data = $this->upload->data();
            //exec('ffmpeg -i '.$video_data['file_path'].' -f image2 -vframes 1 ./uploads/videos/thumbs/'.$video_data['file_name'].'.jpg');
            $sql = "insert into videos(file_name, title, description, published, display) values(?, ?, ?, ?, ?)";
            $q = $this->db->query($sql, array($video_data['file_name'], $this->input->post("title"), $this->input->post("description"), $this->input->post("published"), false));
            return true;
        }else
            return false;
    }

    function GetAllVideos(){
        $sql = "select * from videos";
        $q = $this->db->query($sql);
        $data = [];
        foreach ($q->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "description"   =>  $row->description,
                "published"     =>  $row->published,
                "file_name"     =>  $row->file_name,
                "display"       =>  $row->display,
                "thumb"         =>  $row->thumb
            );
        }
        return $data;
    }

    function GetPublishedVideos(){
        $sql = "select * from videos where display=?";
        $q = $this->db->query($sql,array(true));
        $data = [];
        foreach ($q->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "file_name"     =>  $row->file_name,
                "description"   =>  $row->description,
                "published"     =>  $row->published,
                "display"       =>  $row->display,
                "thumb"         =>  $row->thumb
            );
        }
        return $data;
    }

    function GetPublishedVideosOfAlbum($albumId){
        $sql = "select * from videos where display=? and id in (select video_id from video_to_album where album_id=?)";
        $q = $this->db->query($sql,array(true, $albumId));
        $data = [];
        foreach ($q->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "file_name"     =>  $row->file_name,
                "description"   =>  $row->description,
                "published"     =>  $row->published,
                "display"       =>  $row->display,
                "thumb"         =>  $row->thumb
            );
        }
        return $data;
    }

    function GetVideoById($id){
        $sql = "select * from videos where id=?";
        $q = $this->db->query($sql, array($id));
        $data = null;
        foreach ($q->result() as $row){
            $data = array(
                "id"            =>  $row->id,
                "title"         =>  $row->title,
                "file_name"     =>  $row->file_name,
                "description"   =>  $row->description,
                "published"     =>  $row->published,
                "display"       =>  $row->display,
                "thumb"         =>  $row->thumb
            );
        }
        return $data;
    }

    function ChangeVisibility($id){
        $sql = "update videos set display=!display where id=?";
        $q = $this->db->query($sql, array($id));
    }

    function UpdateTitle(){
        $sql = "update videos set title=? where id=?";
        $q = $this->db->query($sql, array($this->input->post("title"), $this->input->post("id")));
    }

    function UpdateVideoDescription(){
        $sql = "update videos set description=? where id=?";
        $q = $this->db->query($sql, array($this->input->post("description"), $this->input->post("id")));
    }

    function UpdateVideoDate(){
        $sql = "update videos set published=? where id=?";
        $q = $this->db->query($sql, array($this->input->post("published"), $this->input->post("id")));
    }

    function DeleteVideo($id){
        $video = $this->GetVideoById($id);
        if(file_exists(FCPATH."uploads/videos/".$video['file_name']))
            unlink(FCPATH."uploads/videos/".$video['file_name']);
        $sql = "delete from videos where id=?";
        $this->db->query($sql, array($id));
    }

    function UploadThumb(){
        if(!file_exists("./uploads/videos/thumbs")){
            mkdir("./uploads/videos/thumbs/");
            chmod("./uploads/videos/thumbs/", 7777);
        }
        $config = array(
            'upload_path' => "./uploads/videos/thumbs/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "0", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'file_name' => md5(time())
        );

        $this->load->library('upload', $config);
        if($this->upload->do_upload('thumb')){
            $thumb_data = $this->upload->data();

            $config2['image_library'] = 'gd2';
            $config2['source_image'] = $thumb_data['full_path']; //get original image
            $config2['maintain_ratio'] = FALSE;
            $config2['width'] = 150;
            $config2['height'] = 100;
            $this->load->library('image_lib', $config2);
            if (!$this->image_lib->resize()) {
                $this->handle_error($this->image_lib->display_errors());
            }

            $videoData = $this->GetVideoById($this->input->post("id"));
//echo base_url()."uploads/videos/thumbs/".$videoData["thumb"];
            if($videoData["thumb"] != null){
                //echo "thumb found ". FCPATH."uploads/videos/thumbs/".$videoData["file_name"];
                if(file_exists(FCPATH."uploads/videos/thumbs/".$videoData["thumb"])){
                    unlink(FCPATH."uploads/videos/thumbs/".$videoData["thumb"]);
                    //echo "unlink done";
                }
            }

            $sql = "update videos set thumb=? where id=?";
            $this->db->query($sql, array($thumb_data['file_name'], $this->input->post("id")));
        }

    }



    function AddNewAlbum(){
        $sql = "insert into videoAlbums(album_name) values(?)";
        $q = $this->db->query($sql, array($this->input->post('album_name')));
    }

    function GetAllVideoAlbums(){
        $sql = "select * from videoAlbums";
        $q = $this->db->query($sql);
        $data = [];
        foreach ($q->result() as $row){
            $data[] = array(
                "id"            =>  $row->id,
                "album_name"    =>  $row->album_name
            );
        }
        return $data;
    }

    function UpdateAlbum(){
        $sql = "update videoAlbums set album_name=? where id=?";
        $q = $this->db->query($sql, array($this->input->post("album_name"), $this->input->post("id")));
    }

    function RemoveVideoAlbum($albumId){
        $sql = "delete from video_to_album where album_id=?";
        $this->db->query($sql, array($albumId));
        $sql = "delete from videoAlbums where id=?";
        $this->db->query($sql, array($albumId));
    }

    function addVideoToAlbum($albumId, $videoId){
        $sql = "insert into video_to_album values(?,?)";
        $q = $this->db->query($sql, array($albumId, $videoId));
    }

    function removeVideoFromAlbum($albumId, $videoId){
        $sql = "delete from video_to_album where album_id=? and video_id=?";
        $q = $this->db->query($sql, array($albumId, $videoId));
    }

    function GetAlbumsOfVideo($videoId){
        $sql = "select * from video_to_album where video_id=?";
        $q = $this->db->query($sql,array($videoId));
        $data = [];
        foreach ($q->result() as $row){
            $data[] = $row->album_id;
        }
        return $data;
    }
}

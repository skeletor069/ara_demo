<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('NewsModel');
        $this->load->model('LecturesModel');
        $this->load->model('VideoModel');
    }

	public function index(){
		$data['body_id'] = "MEDIA";
        $data['page'] = "media_home_masonry";
        $data['menu'] = "menus/media_menu";
        $data['all_news'] = $this->NewsModel->GetPublishedNews();
		$this->load->view('TemplateProjects',$data);
	}


    public function news(){
        $data['body_id'] = "MEDIA";
        $data['page'] = "news_home_masonry";
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/news_years_menu";
        $data["years"] = $this->NewsModel->GetUniqueYears();
        $data['all_news'] = $this->NewsModel->GetPublishedNews();
        $this->load->view('TemplateProjects', $data);
    }

    public function lecture(){
        $data['body_id'] = "MEDIA";
        $data['page'] = "lectures_home_masonry";
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/lecture_years_menu";
        $data["years"] = $this->LecturesModel->GetUniqueYears();
        $data['all_news'] = $this->LecturesModel->GetPublishedNews();
        $this->load->view('TemplateProjects', $data);
    }

    public function newsByYear($year){
        $data['body_id'] = "MEDIA";
        $data['page'] = "news_home_masonry";
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/news_years_menu";
        $data['menu3'] = "menus/news_titles_menu";
        $data["years"] = $this->NewsModel->GetUniqueYears();
        $data['all_news'] = $this->NewsModel->GetPublishedNewsByYear($year);
        $data['menuid'] = "#".$year;
//        $data['featured'] = $data['all_news'][0];
        $this->load->view('TemplateProjects', $data);
    }

    public function lecturesByYear($year){
        $data['body_id'] = "MEDIA";
        $data['page'] = "lectures_home_masonry";
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/lecture_years_menu";
        $data['menu3'] = "menus/lecture_titles_menu";
        $data["years"] = $this->LecturesModel->GetUniqueYears();
        $data['all_news'] = $this->LecturesModel->GetPublishedNewsByYear($year);
        $data['menuid'] = "#".$year;
//        $data['featured'] = $data['all_news'][0];
        $this->load->view('TemplateProjects', $data);
    }

    public function newsDetails($id){
        $data['body_id'] = "MEDIA";
        $data['page'] = "news_details_2";
        $data['news'] = $this->NewsModel->GetPostById($id);
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/news_years_menu";
        $data['menu3'] = "menus/news_titles_menu";
        $data["years"] = $this->NewsModel->GetUniqueYears();
        $data['all_news'] = $this->NewsModel->GetPublishedNewsByYear($data['news']["year"]);
        $data['yearmenuid'] = "#".$data['news']["year"];
        $data['newsmenuid'] = "#news".$id;
        if($data['news'])
            $this->load->view('TemplateProjects', $data);
        else
            redirect("media/news");
    }

    public function lectureDetails($id){
        $data['body_id'] = "MEDIA";
        $data['page'] = "lecture_details_2";
        $data['news'] = $this->LecturesModel->GetPostById($id);
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/lecture_years_menu";
        $data['menu3'] = "menus/lecture_titles_menu";
        $data["years"] = $this->LecturesModel->GetUniqueYears();
        $data['all_news'] = $this->LecturesModel->GetPublishedNewsByYear($data['news']["year"]);
        $data['yearmenuid'] = "#".$data['news']["year"];
        $data['newsmenuid'] = "#news".$id;
        if($data['news'])
            $this->load->view('TemplateProjects', $data);
        else
            redirect("media/lecture");
    }

    public function videos(){
        $data['body_id'] = "MEDIA";
//        $data['page'] = "videos";
        $data['page'] = "video_listing";
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/video_menu";
        $data['menuid'] = "#menuvideo";
        $data['videos'] = $this->VideoModel->GetPublishedVideos();
        $data['albums'] = $this->VideoModel->GetAllVideoAlbums();
        $this->load->view('TemplateProjects', $data);
    }

    public function videoAlbum($albumId){
        $data['body_id'] = "MEDIA";
        $data['page'] = "videos";
//        $data['page'] = "video_listing";
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/video_menu";
        $data['menuid'] = "#menuvideo";
        $data['album_menu_id'] = "#alb".$albumId;
        $data['videos'] = $this->VideoModel->GetPublishedVideosOfAlbum($albumId);
        $data['albums'] = $this->VideoModel->GetAllVideoAlbums();
        $this->load->view('TemplateProjects', $data);
    }

    public function videoPlayback($videoId){
        $data['body_id'] = "MEDIA";
        $data['page'] = "videos";
//        $data['page'] = "video_listing";
        $data['menu'] = "menus/media_menu";
        $data['menu2'] = "menus/video_menu";
        $data['menuid'] = "#menuvideo";
        $albums = $this->VideoModel->GetAlbumsOfVideo($videoId);
        if(sizeof($albums) > 0){
            $albumId = $albums[0];
            $data['album_menu_id'] = "#alb".$albumId;
            $data['videos'] = $this->VideoModel->GetPublishedVideosOfAlbum($albumId);
        }

        $data["preLoadedVideo"] = $this->VideoModel->GetVideoById($videoId);
        $data['albums'] = $this->VideoModel->GetAllVideoAlbums();
        $this->load->view('TemplateProjects', $data);
    }
}

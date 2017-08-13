<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Model_app');
		
    }

function index(){
	   $data=array(
		   'content'=>'content/dashboard',
		   'list'=>$this->Model_app->getdata("*","slide",""),
		   'news'=>$this->Model_app->getdata("*","berita","ORDER BY id_berita DESC LIMIT 4"),
		   'navigasi'=>'',
		   'corousel'=>'corousel'
	   );
       $this->load->view('template/home',$data);
} 
function gallery(){
	   $data=array(
	   'content'=>'content/gallery',
	   'navigasi'=>'Gallery',
	   'list'=>$this->Model_app->getdata("*","gallery","")
	   );
       $this->load->view('template/home',$data);
} 

function profile(){
	$id=$this->uri->segment(3);
	   $data=array(
	   'content'=>'content/profil',
	   'navigasi'=>' profile',
	   'list'=>$this->Model_app->getdata("*","profil"," WHERE id_profil='$id'")
	   );
       $this->load->view('template/home',$data);
    }
function news(){
	   $data=array(
	   'content'=>'content/news',
	   'navigasi'=>'News',
	   'list'=>$this->Model_app->getdata("*","berita","")
	   );
       $this->load->view('template/home',$data);
    } 
function detail_news(){
		$id=$this->uri->segment(3);
	   $data=array(
	   'content'=>'content/detail_news',
	   'navigasi'=>'<a href="'.base_url().'/Home/news">News &raquo; </a> Detail News',
	   'list'=>$this->Model_app->getdata("*","berita"," WHERE id_berita='$id'")
	   );
       $this->load->view('template/home',$data);
    } 
function pengajar(){
		
	   $data=array(
	   'content'=>'content/guru',
	   'navigasi'=>'Pengajar',
	   'list'=>$this->Model_app->getdata("*","guru a"," INNER JOIN jabatan b on a.jabatan=b.id_jabatan")
	   );
       $this->load->view('template/home',$data);
    } 
	
function psb(){
	$id_sesi=$this->session->userdata('id_session_calon');
	$link=($id_sesi !='')?'content/psb':'content/login';
	
/*	if(isset($id_sesi)){
		$link='content/login';	
	} else{
		$link='content/psb';	
	}*/
	   $data=array(
	   'content'=>$link,
	   'navigasi'=>'News',
	   'list'=>$this->Model_app->getdata("*","berita","")
	   );
       $this->load->view('template/home',$data);
    } 

function login(){
		
	   $data=array(
	   'content'=>'content/login',
	   'navigasi'=>'News',
	   'list'=>$this->Model_app->getdata("*","berita","")
	   );
       $this->load->view('template/home',$data);
    } 

function daftar(){
		
	   $data=array(
	   'content'=>'content/daftar',
	   'navigasi'=>'News',
	   'list'=>$this->Model_app->getdata("*","berita","")
	   );
       $this->load->view('template/home',$data);
    } 
function contoh(){
		
	   $data=array(
	   'content'=>'template/contoh',
	   'navigasi'=>'template'
	   );
       $this->load->view('template/home',$data);
    } 


	
}

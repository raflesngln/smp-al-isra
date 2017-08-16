<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Model_app');
		$this->load->model('Model_admin');
		
    }

function index(){
	   $data=array(
		   'content'=>'content/dashboard',
		   'list'=>$this->Model_app->getdata("*","slide",""),
		   'news'=>$this->Model_app->getdata("*","berita","ORDER BY id_berita DESC LIMIT 4"),
		   'gallery'=>$this->Model_app->getdata("*","gallery","ORDER BY tgl_upload DESC LIMIT 6"),
		   'buku_tamu'=>$this->Model_app->getdata("*","buku_tamu","WHERE status='1' ORDER BY tgl_kirim DESC LIMIT 8"),
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
	$title=$this->Model_app->getdata("*","profil"," WHERE id_profil='$id'");
	foreach($title as $row){
		$navigasi=$row->nm_profil;	
	}
	   $data=array(
	   'content'=>'content/profil',
	   'navigasi'=>$navigasi,
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
	   'navigasi'=>'<a href="'.base_url().'/Home/news">News &frasl; </a> Detail News',
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
function input_buku_tamu(){
		
	   $data=array(
	   'content'=>'content/input_buku_tamu',
	   'navigasi'=>'Pengajar',
	   'notif'=>$this->session->flashdata('notif')
	   );
       $this->load->view('template/home',$data);
    } 
function simpan_buku_tamu(){
		
		$data = array(
				'tgl_kirim'=>date('Y-m-d H:i:s'),
				'subjek'=>$this->input->post('subjek'),
				'email_pengirim'=>$this->input->post('email_pengirim'),
				'nm_pengirim'=>$this->input->post('nm_pengirim'),
				'isi_buku_tamu'=>$this->input->post('isi_buku_tamu'),
				'status'=>'0'
			);
	$this->Model_admin->save('buku_tamu',$data);		
	$this->session->set_flashdata('notif','Pesan anda telah dikirim untuk ditinjau,Terimakasih ');
	redirect('Home/input_buku_tamu');
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


	
}

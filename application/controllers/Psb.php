<?php
class Psb extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Model_app');
		$this->load->model('Model_admin');
		
    }

function index(){
	$sesi_login=$this->session->userdata('sesi_calon_login');
	if($sesi_login==true){
		redirect('Psb/my_profile');
	} else {
	   $data=array(
	   'content'=>'calon/v_login',
	   'navigasi'=>'Login',
	   'list'=>$this->Model_app->getdata("*","berita","")
	   );
       $this->load->view('template/home',$data);
	   }
} 
function daftar(){
	   $data=array(
	   'content'=>'calon/v_daftar',
	   'navigasi'=>'Daftar akun',
	   'list'=>$this->Model_app->getdata("*","berita",""),
	   'notif'=>$this->session->flashdata('notif')
	   );
       $this->load->view('template/home',$data);
} 							
function login(){
		
	   $data=array(
	   'content'=>'calon/v_login',
	   'navigasi'=>'Login',
	   'list'=>$this->Model_app->getdata("*","berita",""),
	   'notif'=>$this->session->flashdata('notif')
	   );
       $this->load->view('template/home',$data);
    } 
function simpan_daftar(){  
			$email=$this->input->post('email');
			$result=$this->Model_admin->getCustom('*',"calon_siswa a",
							"WHERE a.email='$email' LIMIT 1");
		if($result){
				$this->session->set_flashdata('notif','Email ini sudah terdaftar, Silakan login atau daftar baru ');		
				redirect('Psb/daftar');
		} else {
					$arr = array(
						'tgl_daftar'=>date('Y-m-d H:i:s'),
						'nm_calon'=>$this->input->post('nama'),
						'email'=>$this->input->post('email'),
						'password'=>md5($this->input->post('password'))
						);
					$insert = $this->Model_admin->save('calon_siswa',$arr);	
					$this->session->set_flashdata('notif','Pendaftaran berhasil, Silakan login disini ');		
					redirect('Psb/login');
					}
	
		
 } 
	

function my_profile(){
	$id=$this->session->userdata('id_calon_sesi');
	$id_calon_sesi=$this->session->userdata('id_calon_sesi');
					 
	if($this->session->userdata('sesi_calon_login') !=TRUE){
		redirect('psb');
	} else{
	   $data=array(
	   'content'=>'calon/my_profile',
	   'content_profile'=>'calon/v_my_profile',
	   'navigasi'=>' Profil Ku',
	   'my_profile'=>$this->Model_admin->getCustom('*',"calon_siswa",
	   				 "where id_calon='$id'"),
	   'notif'=>$this->session->flashdata('notif')
	   );
       $this->load->view('template/home',$data);
    }

}
public function update_my_profile(){							
		$id_calon_sesi=$this->session->userdata('id_calon_sesi');
		$email_calon_sesi=$this->session->userdata('email_calon_sesi');
		
			$oldpass=$this->input->post('lama');
			$newpass=trim($this->input->post('baru'));
			$retypepass=trim($this->input->post('ulang'));

		if($oldpass==''){
			$ubah = array('nm_calon'=>$this->input->post('nama'));
			$this->Model_admin->update('calon_siswa','id_calon',$id_calon_sesi,$ubah);
			$message='Profile berhasil diubah';
		} else{
			$cari=$this->Model_admin->getCustom('*',"calon_siswa",
	   				 "where email='$email_calon_sesi' AND password=md5('$oldpass')");
			if($cari){
					if($newpass==$retypepass && strlen($newpass) >=5){
					$ubah = array(
							'password'=>md5($newpass),
							'nm_calon'=>$this->input->post('nama'),
							);
						$this->Model_admin->update('calon_siswa','id_calon',$id_calon_sesi,$ubah);
						$message='Profile berhasil diubah';
					} else{
						$message='Password baru tidak sesuai,harus sama dan lebih dari 5 karaketer';
					}
		} else{
				$message='Password Lama anda salah';	
		}	
	}
	
	$this->session->set_flashdata('notif',$message);		
	redirect('Psb/my_profile');
}
function form_daftar_siswa(){
	$id_calon_sesi=$this->session->userdata('id_calon_sesi');
	if($this->session->userdata('sesi_calon_login') !=TRUE){
		redirect('psb');
	} else{
	   $data=array(
	   'content'=>'calon/my_profile',
	   'content_profile'=>'calon/form_pendaftaran',
	   'navigasi'=>' Form Pendaftaran',
	   'detail_isi'=>$this->Model_admin->getCustom('a.*',"pendaftaran a",
	   				 "INNER JOIN calon_siswa b ON a.id_calon=b.id_calon where a.id_calon='$id_calon_sesi'"),
	   'list'=>''
	   );
       $this->load->view('template/home',$data);
    }

}

public function submit_pendaftaran(){
	$id_sesi=$this->session->userdata('id_calon_sesi');
	$cek_daftar=$this->Model_app->getdata("*","pendaftaran","where id_calon='$id_sesi'");
	
	if($cek_daftar){
		//$this->update_form_daftar();
		echo 'sudah ada';
	} else{
		echo 'belum ada';
		$this->simpan_form_daftar();
	}
}
	
function simpan_form_daftar(){
		$id_sesi=$this->session->userdata('id_calon_sesi');
		$nomor_daftar=$this->Model_app->generateNo("pendaftaran","nomor_daftar","PSB");
		
		$nomor=$this->input->post('nip');
		$path='./assets/images/calon/'.$nomor_daftar.'/';
				if (!is_dir($path)) {  //jika folder belum ada maka buatkan baru
					$oldmask = umask(0);
					mkdir($path, 0777);
					umask($oldmask);
				}
				
		$tmp_pass  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr_pass=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		
		$tmp_ijasah = isset($_FILES['ijasah']['tmp_name'])?$_FILES['ijasah']['tmp_name']:false;
		$gbr_ijasah	= isset($_FILES['ijasah']['name'])?$_FILES['ijasah']['name']:false;
		
		$tmp_kk  = isset($_FILES['kk']['tmp_name'])?$_FILES['kk']['tmp_name']:false;
		$gbr_kk=isset($_FILES['kk']['name'])?$_FILES['kk']['name']:false;
		
		$tmp_nilai  = isset($_FILES['nilai']['tmp_name'])?$_FILES['nilai']['tmp_name']:false;
		$gbr_nilai=isset($_FILES['nilai']['name'])?$_FILES['nilai']['name']:false;

		$data = array(
			'nomor_daftar'=>$nomor_daftar,
			'id_calon'=>$id_sesi,
			'tgl_daftar'=>date('Y-m-d'),
			'nama_lengkap'=>$this->input->post('nm_lengkap'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'berat'=>$this->input->post('berat'),
			'tinggi'=>$this->input->post('tinggi'),
			'golongan_darah'=>$this->input->post('golongan_darah'),
			'nik'=>$this->input->post('nik'),
			'agama'=>$this->input->post('agama'),
			'tempat_lahir'=>$this->input->post('tempat_lahir'),
			'tgl_lahir'=>$this->input->post('thn_calon').'-'.$this->input->post('bln_calon').'-'.$this->input->post('tgl_calon'),
			'anak_ke'=>$this->input->post('anak_ke'),
			'jumlah_bersaudara'=>$this->input->post('jumlah_bersaudara'),
			'tempat_tinggal'=>$this->input->post('tempat_tinggal'),
			'asal_sekolah'=>$this->input->post('asal_sekolah'),
			'nama_ayah'=>$this->input->post('nama_ayah'),
			'nama_ibu'=>$this->input->post('nama_ibu'),
			'tgl_lahir_ayah'=>$this->input->post('tgl_lahir_ayah'),
			'tgl_lahir_ibu'=>$this->input->post('tgl_lahir_ibu'),
			'pendidikan_ayah'=>$this->input->post('pendidikan_ayah'),
			'pendidikan_ibu'=>$this->input->post('pendidikan_ibu'),
			'pekerjaan_ayah'=>$this->input->post('pekerjaan_ayah'),
			'pekerjaan_ibu'=>$this->input->post('pekerjaan_ibu'),
			'penghasilan_ayah'=>$this->input->post('penghasilan_ayah'),
			'penghasilan_ibu'=>$this->input->post('penghasilan_ibu'),
			'alamat_ayah'=>$this->input->post('alamat_ayah'),
			'alamat_ibu'=>$this->input->post('alamat_ibu'),
			'pass_photo'=>$gbr_pass,
			'ijasah'=>$gbr_ijasah,
			'kk'=>$gbr_kk,
			'traskrip_nilai'=>$gbr_nilai,
			'status_proses'=>'proses',
			);
		$insert = $this->Model_admin->save('pendaftaran',$data);
		move_uploaded_file($tmp_pass,$path.$gbr_pass);
		move_uploaded_file($tmp_ijasah,$path.$gbr_ijasah);
		move_uploaded_file($tmp_kk,$path.$gbr_kk);
		move_uploaded_file($tmp_nilai,$path.$gbr_nilai);
		 
	$pesan=array(
	   'content'=>'calon/notifikasi',
	   'navigasi'=>'notifikasi',
	   'message'=>'Data Pendaftaran Tersimpan'
	   );
       $this->load->view('template/home',$pesan);
	
}
function update_form_daftarrrrrrr(){
		$nomor_daftar=$this->Model_app->generateNo("pendaftaran","nomor_daftar","PSB");
		$path='./assets/images/calon/'.$nomor_daftar;
				if (!is_dir($path)) {
					$oldmask = umask(0);
					mkdir($path, 0777);
					umask($oldmask);
				}

}
 function update_form_daftar(){
		$nomor_daftar=$this->Model_app->generateNo("pendaftaran","nomor_daftar","PSB");
		
		$nomor=$this->input->post('nip');
		$path='./assets/images/calon/'.$nomor_daftar.'/';
				if (!is_dir($path)) {  //jika folder belum ada maka buatkan baru
					$oldmask = umask(0);
					mkdir($path, 0777);
					umask($oldmask);
				}
				
		$tmp_pass  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr_pass=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		
		$tmp_ijasah = isset($_FILES['ijasah']['tmp_name'])?$_FILES['ijasah']['tmp_name']:false;
		$gbr_ijasah	= isset($_FILES['ijasah']['name'])?$_FILES['ijasah']['name']:false;
		
		$tmp_kk  = isset($_FILES['kk']['tmp_name'])?$_FILES['kk']['tmp_name']:false;
		$gbr_kk=isset($_FILES['kk']['name'])?$_FILES['kk']['name']:false;
		
		$tmp_nilai  = isset($_FILES['nilai']['tmp_name'])?$_FILES['nilai']['tmp_name']:false;
		$gbr_nilai=isset($_FILES['nilai']['name'])?$_FILES['nilai']['name']:false;

		$data = array(
			'nomor_daftar'=>$this->input->post('nip'),
			'id_calon'=>$this->input->post('nm_guru'),
			'tgl_daftar'=>$this->input->post('nm_guru'),
			'nama_lengkap'=>$this->input->post('nama_lengkap'),
			'jenis_kelamin'=>$this->input->post('almt_guru'),
			'berat'=>$this->input->post('telpon'),
			'tinggi'=>$this->input->post('nip'),
			'golongan_darah'=>$this->input->post('nm_guru'),
			'nik'=>$this->input->post('nm_guru'),
			'agama'=>$this->input->post('nm_jabatan'),
			'tempat_lahir'=>$this->input->post('almt_guru'),
			'tgl_lahir'=>$this->input->post('telpon'),
			'anak_ke'=>$this->input->post('nip'),
			'jumlah_bersaudara'=>$this->input->post('nm_guru'),
			'tempat_tinggal'=>$this->input->post('nm_jabatan'),
			'asal_sekolah'=>$this->input->post('almt_guru'),
			'nama_ayah'=>$this->input->post('telpon'),
			'nama_ibu'=>$this->input->post('nip'),
			'tgl_lahir_ayah'=>$this->input->post('nm_guru'),
			'tgl_lahir_ibu'=>$this->input->post('nm_jabatan'),
			'pendidikan_ayah'=>$this->input->post('almt_guru'),
			'pendidikan_ibu'=>$this->input->post('telpon'),
			'pekerjaan_ayah'=>$this->input->post('telpon'),
			'pekerjaan_ibu'=>$this->input->post('nip'),
			'penghasilan_ayah'=>$this->input->post('nm_guru'),
			'penghasilan_ibu'=>$this->input->post('nm_jabatan'),
			'alamat_ayah'=>$this->input->post('almt_guru'),
			'alamat_ibu'=>$this->input->post('telpon'),
			'pass_photo'=>$this->input->post('nip'),
			'ijasah'=>$this->input->post('nm_guru'),
			'kk'=>$this->input->post('nm_jabatan'),
			'traskrip_nilai'=>$this->input->post('almt_guru'),
			'gambar'=>$gbr,
			);
		$insert = $this->Model_admin->save('pendaftaran',$data);
		move_uploaded_file($tmp_pass,$path.$gbr_pass);
		move_uploaded_file($tmp_ijasah,$path.$gbr_ijasah);
		move_uploaded_file($tmp_kk,$path.$gbr_kk);
		move_uploaded_file($tmp_nilai,$path.$gbr_nilai);	
		echo 'Data tersimpan dengan nomor daftar '.$nomor_daftar;


	
}
  function hapus_folder($dir) {
  if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") 
           hapus_folder($dir."/".$object); 
        else unlink   ($dir."/".$object);
      }
    }
    reset($objects);
    rmdir($dir);
  }
 }


////////login n logout////////////////
function cek_login_user() {
	    $email =$this->input->post('email');
        $password =md5($this->input->post('password'));
			$result=$this->Model_admin->getCustom('*',"calon_siswa",
							"WHERE email='$email' and password='$password' LIMIT 1");
			if($result) {
								foreach($result as $row){
							//create the session
									$sess_array = array(
										'id_calon_sesi' => $row->id_calon,
										'nm_calon_sesi' => $row->nm_calon,
										'email_calon_sesi' => $row->email,
										'sesi_calon_login'=>TRUE,
									);
									$this->session->set_userdata($sess_array);
									redirect('Psb/my_profile');
								}
							} else {
								//if form validate false
							$this->session->set_flashdata('notif','Email dan Password tidak cocok');		
							redirect('Psb/login');
						 } 
	
}


  function logout() {
        $this->session->unset_userdata('id_calon_sesi');
		$this->session->unset_userdata('nm_calon_sesi');
        $this->session->unset_userdata('email_calon_sesi');
        $this->session->unset_userdata('sesi_calon_login');
										
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
		$this->db->close();
        redirect('psb');
    }


	
}

<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Model_admin');
		 $this->load->model('Model_app');
		
    }

function index(){
	   $data=array(
		   'content'=>'admin/v_login',
		   'message'=>$this->session->flashdata('flashMessage')
	   );
       $this->load->view('admin/v_login',$data);
} 

function home(){
	if($this->session->userdata('sesi_login') !=TRUE){
		redirect('Admin/index');
	} else{
	   $data=array(
		    'content'=>'admin/dashboard',
		   //'list'=>$this->Model_app->getdata("*","slide",""),
		   //'news'=>$this->Model_app->getdata("*","posting","ORDER BY id_post DESC LIMIT 4"),
		   'navigasi'=>'',
		   'corousel'=>'corousel'
	   );
       $this->load->view('admin/home_admin',$data);
	}
} 
//===================unutuk edit admin user=========================
function list_admin(){
       	  $data=array(
		  'title'=>'Status Proses',
		  'scrumb'=>'<a href="'.base_url().'admin/listdata_admin" class="breadcrumb">3 Letter Code</a>listdata_admin)',
		  'content'=>'admin/list_admin'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_admin($search='')
	{
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nm_admin LIKE'=>'%'.$search.'%','a.username LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='admin a';
		$nm_tabel2='admin b';
		$kolom1='a.createdBy';
		$kolom2='b.id_admin';
		
		$selected='a.*';
        $nm_coloum= array('a.id_admin,a.id_admin','a.nm_admin','a.username','a.username');
        $orderby= array('a.id_admin' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'id_admin' =>$datalist->id_admin,
            'nm_admin' =>$datalist->nm_admin,
			'username' =>$datalist->username,
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('.$datalist->id_admin.')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('.$datalist->id_admin.')"><i class="material-icons md-color-red-A700">refresh</i> Non Active</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function save_admin()
	{   
		$pass=isset($_POST['Password'])?$_POST['Password']:false;
		//for picture
		$folder='./assets/images/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		$usrnm=isset($_POST['Username'])?ltrim($_POST['Username']):false;
		
		$data = array(
			'nm_admin'=>$this->input->post('nm_admin'),
			'username'=>$this->input->post('username'),
			'password'=>md5($pass),
			'gambar'=>$gbr, 
			);
		$insert = $this->Model_admin->save('admin',$data);
		move_uploaded_file($tmp,$folder.$gbr);	
		echo json_encode(array("status" => TRUE));
}
function load_edit_admin(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"admin a",
	  			"WHERE a.id_admin='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_admin' =>$list->id_admin,
				'nm_admin' =>$list->nm_admin,
				'username' =>$list->username,
				'gambar' =>$list->gambar,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_admin()
	    {
			$id=$this->input->post('id_admin2');

		//for picture
		$folder='./assets/images/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
				$oldPict=isset($_POST['oldPict'])?$_POST['oldPict']:false;
				$updatePict=($gbr=='')?$oldPict:$gbr;
		$pass=isset($_POST['Password'])?$_POST['Password']:false;
		if($pass==''){
		$ubah = array(
			'nm_admin'=>$this->input->post('nm_admin'),
			'username'=>$this->input->post('username'),
			'gambar'=>$updatePict
			);
		} else {
			$ubah = array(
			'nm_admin'=>$this->input->post('nm_admin'),
			'username'=>$this->input->post('username'),
			'password'=>md5($pass),
			'gambar'=>$updatePict
			);
		}
		$update = $this->Model_admin->update('admin','id_admin',$id,$ubah);
		
		move_uploaded_file($tmp,$folder.$gbr);	
		if($gbr !=''){   // if new file is not empty,then delete old file
			unlink($folder.'/'.$oldPict); // correct
		}
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_admin(){   
		$id=$this->input->post('id');
			$deletedata=$this->Model_admin->delete_data('admin','id_admin',$id);
		    echo json_encode(array("status" => TRUE));
}


//====================untuk edit guru============================================================
function list_guru(){
       	  $data=array(
		  'title'=>'Guru',
		  'scrumb'=>'<a href="'.base_url().'admin/Guru" class="breadcrumb">3 Letter Code</a>Guru)',
		  'content'=>'admin/list_guru'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_guru($search='')
	{
		$search=$this->uri->segment(3);
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nm_guru LIKE'=>'%'.$search.'%','a.almt_guru LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='guru a';
		$nm_tabel2='jabatan b';
		$kolom1='a.jabatan';
		$kolom2='b.id_jabatan';
		
		$selected='a.*,b.nm_jabatan';
        $nm_coloum= array('a.nip,a.nm_guru','a.nm_jabatan','a.almt_guru','a.telpon');
        $orderby= array('a.nm_guru' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'nip' =>$datalist->nip,
            'nm_guru' =>$datalist->nm_guru,
			'nm_jabatan' =>$datalist->nm_jabatan,
			'almt_guru' =>$datalist->almt_guru,
			'telpon' =>$datalist->telpon,
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->nip."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->nip."'".')"><i class="material-icons md-color-red-A700">refresh</i> Hapus data</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
function load_jabatan(){
      $result=$this->Model_admin->getCustom('*',"jabatan",
      		  "");
		foreach($result as $list){
		$row = array(
				'id_jabatan' =>$list->id_jabatan,
				'nm_jabatan' =>$list->nm_jabatan,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
function load_guru(){
      $result=$this->Model_admin->getCustom('*',"guru",
      		  "");
		foreach($result as $list){
		$row = array(
				'nip' =>$list->nip,
				'nm_guru' =>$list->nm_guru,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
function load_kelas(){
      $result=$this->Model_admin->getCustom('*',"kelas",
      		  "");
		foreach($result as $list){
		$row = array(
				'id_kelas' =>$list->id_kelas,
				'nm_kelas' =>$list->nm_kelas,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function save_guru()
	{   
		//for picture
		$folder='./assets/images/guru/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		
		$data = array(
			'nip'=>$this->input->post('nip'),
			'nm_guru'=>$this->input->post('nm_guru'),
			'jabatan'=>$this->input->post('nm_jabatan'),
			'almt_guru'=>$this->input->post('almt_guru'),
			'telpon'=>$this->input->post('telpon'),
			'gambar'=>$gbr, 
			'createdby'=>''
			);
		$insert = $this->Model_admin->save('guru',$data);
		move_uploaded_file($tmp,$folder.$gbr);	
		echo json_encode(array("status" => TRUE));
}
function load_edit_guru(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"guru a",
	  			"INNER JOIN jabatan b on a.jabatan=b.id_jabatan WHERE a.nip='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'nip' =>$list->nip,
				'nm_guru' =>$list->nm_guru,
				'jabatan' =>$list->jabatan.'-'.$list->nm_jabatan,
				'nm_jabatan' =>$list->nm_jabatan,
				'almt_guru' =>$list->almt_guru,
				'telpon' =>$list->telpon,
				'gambar' =>$list->gambar,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_guru()
	    {
			$id=$this->input->post('nip2');

		//for picture
		$folder='./assets/images/guru/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
				$oldPict=isset($_POST['oldPict'])?$_POST['oldPict']:false;
				$updatePict=($gbr=='')?$oldPict:$gbr;

		$ubah = array(
			'nm_guru'=>$this->input->post('nm_guru'),
			'jabatan'=>$this->input->post('nm_jabatan'),
			'almt_guru'=>$this->input->post('almt_guru'),
			'telpon'=>$this->input->post('telpon'),
			'gambar'=>$updatePict,
			'createdby'=>''
			);

		$update = $this->Model_admin->update('guru','nip',$id,$ubah);
		
		move_uploaded_file($tmp,$folder.$gbr);	
		if($gbr !=''){   // if new file is not empty,then delete old file
			unlink($folder.'/'.$oldPict); // correct
		}
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_guru(){   
		$id=$this->input->post('id');
			$deletedata=$this->Model_admin->delete_data('guru','nip',$id);
		    echo json_encode(array("status" => TRUE));
}

//===================UNTUK EDIT JABATAN=========================
function list_jabatan(){
       	  $data=array(
		  'title'=>'jabatan',
		  'scrumb'=>'<a href="'.base_url().'admin/listdata_jabatan" class="breadcrumb">3 Letter Code</a>listdata_jabatan)',
		  'content'=>'admin/list_jabatan'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_jabatan($search='')
	{
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nm_jabatan LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='jabatan a';
		$nm_tabel2='admin b';
		$kolom1='a.createdBy';
		$kolom2='b.id_admin';
		
		$selected='a.*';
        $nm_coloum= array('a.id_jabatan,a.id_jabatan','a.nm_jabatan');
        $orderby= array('a.nm_jabatan' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'id_jabatan' =>$datalist->id_jabatan,
            'nm_jabatan' =>$datalist->nm_jabatan,
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('.$datalist->id_jabatan.')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('.$datalist->id_jabatan.')"><i class="material-icons md-color-red-A700">refresh</i> Delete Data</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function save_jabatan()
	{   
		$data = array(
			'nm_jabatan'=>$this->input->post('nm_jabatan'),
			);
		$insert = $this->Model_admin->save('jabatan',$data);
		echo json_encode(array("status" => TRUE));
}
function load_edit_jabatan(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"jabatan a",
	  			"WHERE a.id_jabatan='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_jabatan' =>$list->id_jabatan,
				'nm_jabatan' =>$list->nm_jabatan
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_jabatan()
	    {
			$id=$this->input->post('id_jabatan2');
			
			$ubah = array(
			'nm_jabatan'=>$this->input->post('nm_jabatan')
			);
		$update = $this->Model_admin->update('jabatan','id_jabatan',$id,$ubah);
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_jabatan(){   
		$id=$this->input->post('id');
			$deletedata=$this->Model_admin->delete_data('jabatan','id_jabatan',$id);
		    echo json_encode(array("status" => TRUE));
}

//===================UNTUK EDIT KELAS=========================
function list_kelas(){
       	  $data=array(
		  'title'=>'kelas',
		  'scrumb'=>'<a href="'.base_url().'admin/listdata_kelas" class="breadcrumb">3 Letter Code</a>listdata_kelas)',
		  'content'=>'admin/list_kelas'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_kelas($search='')
	{
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nm_kelas LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='kelas a';
		$nm_tabel2='guru b';
		$kolom1='a.wali_kelas';
		$kolom2='b.nip';
		
		$selected='a.*,b.nm_guru';
        $nm_coloum= array('a.id_kelas,a.id_kelas','a.jumlah_tampung','b.nm_guru');
        $orderby= array('a.nm_kelas' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'id_kelas' =>$datalist->id_kelas,
            'nm_kelas' =>$datalist->nm_kelas,
			'jumlah_tampung' =>$datalist->jumlah_tampung,
			'wali_kelas' =>$datalist->nm_guru,
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->id_kelas."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->id_kelas."'".')"><i class="material-icons md-color-red-A700">refresh</i> Delete Data</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function save_kelas()
	{   
		$data = array(
			'id_kelas'=>$this->input->post('id_kelas'),
			'nm_kelas'=>$this->input->post('nm_kelas'),
			'jumlah_tampung'=>$this->input->post('jumlah_tampung'),
			'wali_kelas'=>$this->input->post('wali_kelas'),
			);
		$insert = $this->Model_admin->save('kelas',$data);
		echo json_encode(array("status" => TRUE));
}
function load_edit_kelas(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('a.*,b.nm_guru',"kelas a",
	  			"LEFT JOIN guru b on a.wali_kelas=b.nip WHERE a.id_kelas='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_kelas' =>$list->id_kelas,
				'nm_kelas' =>$list->nm_kelas,
				'jumlah_tampung' =>$list->jumlah_tampung,
				'wali_kelas' =>$list->wali_kelas.'-'.$list->nm_guru
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_kelas()
	    {
			$id=$this->input->post('id_kelas2');
			
			$ubah = array(
			'id_kelas'=>$this->input->post('id_kelas'),
			'nm_kelas'=>$this->input->post('nm_kelas'),
			'jumlah_tampung'=>$this->input->post('jumlah_tampung'),
			'wali_kelas'=>$this->input->post('wali_kelas')
			);
		$update = $this->Model_admin->update('kelas','id_kelas',$id,$ubah);
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_kelas(){   
		$id=$this->input->post('id');
			$deletedata=$this->Model_admin->delete_data('kelas','id_kelas',$id);
		    echo json_encode(array("status" => TRUE));
}
//===================UNTUK DATA SISWA=========================
function list_siswa(){
       	  $data=array(
		  'title'=>'kelas',
		  'kelas'=>$this->Model_admin->getCustom("*","kelas","ORDER BY nm_kelas"),
		  'scrumb'=>'<a href="'.base_url().'admin/listdata_kelas" class="breadcrumb">3 Letter Code</a>listdata_kelas)',
		  'content'=>'admin/list_siswa'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_siswa($search='')
	{
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nama_lengkap LIKE'=>'%'.$search.'%','a.NIS LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='siswa a';
		$nm_tabel2='kelas b';
		$kolom1='a.kelas';
		$kolom2='b.id_kelas';
		
		$selected='a.*,b.nm_kelas,b.id_kelas';
        $nm_coloum= array('a.id_kelas,a.id_kelas','a.nm_kelas','b.nm_kelas');
        $orderby= array('a.NIS' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'NIS' =>$datalist->NIS,
			'nama_lengkap' =>$datalist->nama_lengkap,
            'jenis_kelamin' =>$datalist->jenis_kelamin,
			'agama' =>$datalist->agama,
			'kelas' =>$datalist->kelas,
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->NIS."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->NIS."'".')"><i class="material-icons md-color-red-A700">refresh</i> Nonaktif</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
function sort_siswa($search='')
	{
		//$idsession=$this->session->userdata('idusr');
		$kelas=$this->uri->segment(3);
		$nm_tabel='siswa a';
		$nm_tabel2='kelas b';
		$kolom1='a.kelas';
		$kolom2='b.id_kelas';
		
		$selected='a.*,b.nm_kelas,b.id_kelas';
        $nm_coloum= array('a.id_kelas,a.id_kelas','a.nm_kelas','b.nm_kelas');
        $orderby= array('a.NIS' => 'ASC');
		$where= array('a.kelas'=>$kelas);
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'NIS' =>$datalist->NIS,
			'nama_lengkap' =>$datalist->nama_lengkap,
            'jenis_kelamin' =>$datalist->jenis_kelamin,
			'agama' =>$datalist->agama,
			'kelas' =>$datalist->kelas,
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->NIS."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->NIS."'".')"><i class="material-icons md-color-red-A700">refresh</i> Nonaktif</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
function load_edit_siswa(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('a.*',"siswa a",
	  			"INNER JOIN kelas b on a.kelas=b.id_kelas WHERE a.NIS='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'nomor_daftar' =>$list->nomor_daftar,
				'NIS' =>$list->NIS,
				'tgl_verifikasi' =>$list->tgl_verifikasi,
				'nama_lengkap' =>$list->nama_lengkap,
				'jenis_kelamin' =>$list->jenis_kelamin,
				'berat' =>$list->berat,
				'tinggi' =>$list->tinggi,
				'golongan_darah' =>$list->golongan_darah,
				'nik' =>$list->nik,
				'agama' =>$list->agama,
				'tempat_lahir' =>$list->tempat_lahir,
				'tgl_lahir' =>$list->tgl_lahir,
				'anak_ke' =>$list->anak_ke,
				'jumlah_bersaudara' =>$list->jumlah_bersaudara,
				'tempat_tinggal' =>$list->tempat_tinggal,
				'asal_sekolah' =>$list->asal_sekolah,
				'nama_ayah' =>$list->nama_ayah,
				'nama_ibu' =>$list->nama_ibu,
				'tgl_lahir_ayah' =>$list->tgl_lahir_ayah,
				'tgl_lahir_ibu' =>$list->tgl_lahir_ibu,
				'pendidikan_ayah' =>$list->pendidikan_ayah,
				'pendidikan_ibu' =>$list->pendidikan_ibu,
				'pekerjaan_ayah' =>$list->pekerjaan_ayah,
				'pekerjaan_ibu' =>$list->pekerjaan_ibu,
				'penghasilan_ayah' =>$list->penghasilan_ayah,
				'penghasilan_ibu' =>$list->penghasilan_ibu,
				'alamat_ayah' =>$list->alamat_ayah,
				'alamat_ibu' =>$list->alamat_ibu,
				'pass_photo' =>$list->pass_photo,
				'ijasah' =>$list->ijasah,
				'kk' =>$list->kk,
				'traskrip_nilai' =>$list->traskrip_nilai
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_siswa()
	    {
			$id=$this->input->post('NIS2');
			
		$data = array(
				'nomor_daftar' =>$list->nomor_daftar,
				'NIS' =>$list->NIS,
				'tgl_verifikasi' =>$list->tgl_verifikasi,
				'nama_lengkap' =>$list->nama_lengkap,
				'jenis_kelamin' =>$list->jenis_kelamin,
				'berat' =>$list->berat,
				'tinggi' =>$list->tinggi,
				'golongan_darah' =>$list->golongan_darah,
				'nik' =>$list->nik,
				'agama' =>$list->agama,
				'tempat_lahir' =>$list->tempat_lahir,
				'tgl_lahir' =>$list->tgl_lahir,
				'anak_ke' =>$list->anak_ke,
				'jumlah_bersaudara' =>$list->jumlah_bersaudara,
				'tempat_tinggal' =>$list->tempat_tinggal,
				'asal_sekolah' =>$list->asal_sekolah,
				'nama_ayah' =>$list->nama_ayah,
				'nama_ibu' =>$list->nama_ibu,
				'tgl_lahir_ayah' =>$list->tgl_lahir_ayah,
				'tgl_lahir_ibu' =>$list->tgl_lahir_ibu,
				'pendidikan_ayah' =>$list->pendidikan_ayah,
				'pendidikan_ibu' =>$list->pendidikan_ibu,
				'pekerjaan_ayah' =>$list->pekerjaan_ayah,
				'pekerjaan_ibu' =>$list->pekerjaan_ibu,
				'penghasilan_ayah' =>$list->penghasilan_ayah,
				'penghasilan_ibu' =>$list->penghasilan_ibu,
				'alamat_ayah' =>$list->alamat_ayah,
				'alamat_ibu' =>$list->alamat_ibu,
				'pass_photo' =>$list->pass_photo,
				'ijasah' =>$list->ijasah,
				'kk' =>$list->kk,
				'traskrip_nilai' =>$list->traskrip_nilai
			);
		$update = $this->Model_admin->update('siswa','NIS',$id,$ubah);
		echo json_encode(array("status" => TRUE));
	 }
//////////////////laporan/////////////
function cetak_laporan_siswa(){
	
		$kelas=$this->uri->segment(3);
		//$status_validasi=$this->uri->segment(4);
		//$kurangi=$thn-1;
			
	$data = array(
			'judul'=>"Laporan Data Siswa",
			'kelas'=>"Kelas : ". $kelas,
			'list'=>$this->Model_admin->getCustom('*',"siswa a",
	  			"INNER JOIN kelas b on a.kelas=b.id_kelas WHERE a.kelas='$kelas'")
        );  
		
        ob_start();
        $content = $this->load->view('admin/laporan_data_siswa',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('house_report.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

}

//===================UNTUK EDIT PENDAFTAR=========================
function list_pendaftar(){
       	  $data=array(
		  'title'=>'calon_siswa',
		  'scrumb'=>'<a href="'.base_url().'admin/listdata_calon_siswa" class="breadcrumb">calon_siswa</a>listdata_kelas)',
		  'content'=>'admin/list_pendaftar'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_calon_siswa($search='')
	{
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nm_calon LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='calon_siswa a';
		$nm_tabel2='admin b';
		$kolom1='a.id_calon';
		$kolom2='b.id_admin';
		
		$selected='a.*';
        $nm_coloum= array('a.id_kelas,a.id_kelas','a.jumlah_tampung','b.nm_guru');
        $orderby= array('a.nm_calon' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'id_calon' =>$datalist->id_calon,
            'nm_calon' =>$datalist->nm_calon,
			'email' =>$datalist->email,
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->id_calon."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->id_calon."'".')"><i class="material-icons md-color-red-A700">refresh</i> Delete Data</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function save_calon()
	{   
		$data = array(
			'nm_calon'=>$this->input->post('nm_calon'),
			'email'=>$this->input->post('email'),
			);
		$insert = $this->Model_admin->save('calon_siswa',$data);
		echo json_encode(array("status" => TRUE));
}
function load_edit_calon(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"calon_siswa a",
	  			"WHERE a.id_calon='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_calon' =>$list->id_calon,
				'nm_calon' =>$list->nm_calon,
				'email' =>$list->email
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_calon()
	    {
			$id=$this->input->post('id_calon2');
			
			$ubah = array(
			'id_calon'=>$this->input->post('id_calon'),
			'nm_calon'=>$this->input->post('nm_calon'),
			'email'=>$this->input->post('email')
			);
		$update = $this->Model_admin->update('calon_siswa','id_calon',$id,$ubah);
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_calon(){   
		$id=$this->input->post('id');
			$deletedata=$this->Model_admin->delete_data('calon_siswa','id_calon',$id);
		    echo json_encode(array("status" => TRUE));
}
//====================untuk edit BERITA============================================================
function list_berita(){
	 	$page=$this->uri->segment(3);
      	$limit=15;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

        $data['title']='list_customer';
		$data['list']=$this->Model_admin->getCustom("*","berita a","ORDER BY a.tgl_berita DESC LIMIT $offset,$limit");
		$tot_hal = $this->Model_admin->hitung_isi_tabel("*","berita a","ORDER BY a.tgl_berita");
        					//create for pagination		
			$config['base_url'] = base_url() . 'Admin/list_berita/';
  			$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	//STYLE PAGIN FOR BOOTSTRAP
		$config['full_tag_open'] = "<ul class='uk-pagination uk-margin-medium-top'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='uk-disabled'><li class='uk-active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['content']='admin/list_berita';
       	$this->load->view('admin/home_admin',$data); 
} 
function detail_berita(){
	$id=$this->uri->segment(3);
		$data=array(
		'detail'=>$this->Model_admin->getCustom('*',"berita a",
	  			"WHERE a.id_berita='$id' LIMIT 1"),
		'content'=>'admin/detail_berita'
		);
		
       	$this->load->view('admin/home_admin',$data); 	
}
public function save_berita()
	{   
		//for picture
		$folder='./assets/images/news/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		
		$data = array(
			'tgl_berita'=>$this->input->post('tgl_berita'),
			'judul_berita'=>$this->input->post('judul_berita'),
			'isi_berita'=>$this->input->post('isi_berita'),
			'gambar'=>$gbr, 
			'createdby'=>''
			);
		$insert = $this->Model_admin->save('berita',$data);
		move_uploaded_file($tmp,$folder.$gbr);	
		echo json_encode(array("status" => TRUE));
}
function load_edit_berita(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"berita a",
	  			"WHERE a.id_berita='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_berita'=>$list->id_berita,
				'tgl_berita' =>$list->tgl_berita,
				'judul_berita' =>$list->judul_berita,
				'isi_berita' =>$list->isi_berita,
				'gambar' =>$list->gambar,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_berita()
	    {
			$id=$this->input->post('id_berita2');

		//for picture
		$folder='./assets/images/news/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
				$oldPict=isset($_POST['oldPict'])?$_POST['oldPict']:false;
				$updatePict=($gbr=='')?$oldPict:$gbr;

		$ubah = array(
				'tgl_berita' =>date('Y-m-d h:i:s'),
				'judul_berita' =>$this->input->post('judul_berita'),
				'isi_berita' =>$this->input->post('isi_berita'),
				'gambar'=>$updatePict,
				'createdby'=>''
			);

		$update = $this->Model_admin->update('berita','id_berita',$id,$ubah);
		
		move_uploaded_file($tmp,$folder.$gbr);	
		if($gbr !=''){   // if new file is not empty,then delete old file
			unlink($folder.'/'.$oldPict); // correct
		}
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_berita(){   
		$id=$this->input->post('id');
		$folder='./assets/images/news/'; 
		$id=$this->input->post('id');
		$result=$this->Model_admin->getCustom('*',"berita a",
	  			"WHERE a.id_berita='$id' LIMIT 1");
	foreach($result as $row){
		$gambar=$row->gambar;
	}
			unlink($folder.'/'.$gambar);
			$deletedata=$this->Model_admin->delete_data('berita','id_berita',$id);
		    echo json_encode(array("status" => TRUE));
}

///==========================edit gallery========================================================
function list_gallery(){
	 	$page=$this->uri->segment(3);
      	$limit=15;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

        $data['title']='list_customer';
		$data['list']=$this->Model_admin->getCustom("*","gallery a","ORDER BY a.tgl_upload DESC LIMIT $offset,$limit");
		$tot_hal = $this->Model_admin->hitung_isi_tabel("*","gallery a","ORDER BY a.tgl_upload");
        					//create for pagination		
			$config['base_url'] = base_url() . 'Admin/list_gallery/';
  			$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	//STYLE PAGIN FOR BOOTSTRAP
		$config['full_tag_open'] = "<ul class='uk-pagination uk-margin-medium-top'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='uk-disabled'><li class='uk-active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['content']='admin/list_gallery';
       	$this->load->view('admin/home_admin',$data); 
} 
public function save_gallery()
	{   
		//for picture
		$folder='./assets/images/gallery/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		
		$data = array(
			'nm_gallery'=>$this->input->post('nm_gallery'),
			'tgl_upload'=>date('Y-m-d:h:i:s'),
			'ket_gallery'=>$this->input->post('ket_gallery'),
			'gambar'=>$gbr, 
			'createdBy'=>''
			);
		$insert = $this->Model_admin->save('gallery',$data);
		move_uploaded_file($tmp,$folder.$gbr);	
		echo json_encode(array("status" => TRUE));
}
function load_edit_gallery(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"gallery a",
	  			"WHERE a.id_gallery='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_gallery' =>$list->id_gallery,
				'nm_gallery' =>$list->nm_gallery,
				'tgl_upload' =>$list->tgl_upload,
				'ket_gallery' =>$list->ket_gallery,
				'gambar' =>$list->gambar,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_gallery()
	    {
			$id=$this->input->post('id_gallery2');

		//for picture
		$folder='./assets/images/gallery/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
				$oldPict=isset($_POST['oldPict'])?$_POST['oldPict']:false;
				$updatePict=($gbr=='')?$oldPict:$gbr;

		$ubah = array(
			'nm_gallery'=>$this->input->post('nm_gallery'),
			'tgl_upload'=>date('Y-m-d:h:i:s'),
			'ket_gallery'=>$this->input->post('ket_gallery'),
			'gambar'=>$updatePict,
			'createdby'=>''
			);

		$update = $this->Model_admin->update('gallery','id_gallery',$id,$ubah);
		
		move_uploaded_file($tmp,$folder.$gbr);	
		if($gbr !=''){   // if new file is not empty,then delete old file
			unlink($folder.'/'.$oldPict); // correct
		}
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_gallery(){  
	$folder='./assets/images/gallery/'; 
	$id=$this->input->post('id');
	$result=$this->Model_admin->getCustom('*',"gallery a",
	  			"WHERE a.id_gallery='$id' LIMIT 1");
	foreach($result as $row){
		$gambar=$row->gambar;
	}
			unlink($folder.'/'.$gambar);
			$deletedata=$this->Model_admin->delete_data('gallery','id_gallery',$id);
		    echo json_encode(array("status" => TRUE));
}

	 

///==========================edit slider========================================================
function list_slide(){
	 	$page=$this->uri->segment(3);
      	$limit=15;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

        $data['title']='list_customer';
		$data['list']=$this->Model_admin->getCustom("*","slide a","ORDER BY a.tgl_upload DESC LIMIT $offset,$limit");
		$tot_hal = $this->Model_admin->hitung_isi_tabel("*","slide a","ORDER BY a.tgl_upload");
        					//create for pagination		
			$config['base_url'] = base_url() . 'Admin/list_slide/';
  			$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	//STYLE PAGIN FOR BOOTSTRAP
		$config['full_tag_open'] = "<ul class='uk-pagination uk-margin-medium-top'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='uk-disabled'><li class='uk-active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['content']='admin/list_slide';
       	$this->load->view('admin/home_admin',$data); 
} 
public function save_slide()
	{   
		//for picture
		$folder='./assets/images/corousel/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		
		$data = array(
			'judul_slide'=>$this->input->post('judul_slide'),
			'tgl_upload'=>date('Y-m-d:h:i:s'),
			'ket_slide'=>$this->input->post('ket_slide'),
			'gambar'=>$gbr, 
			'createdBy'=>''
			);
		$insert = $this->Model_admin->save('slide',$data);
		move_uploaded_file($tmp,$folder.$gbr);	
		echo json_encode(array("status" => TRUE));
}
function load_edit_slide(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"slide a",
	  			"WHERE a.id_slide='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_slide' =>$list->id_slide,
				'judul_slide' =>$list->judul_slide,
				'tgl_upload' =>$list->tgl_upload,
				'ket_slide' =>$list->ket_slide,
				'gambar' =>$list->gambar,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_slide()
	    {
			$id=$this->input->post('id_slide2');

		//for picture
		$folder='./assets/images/corousel/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
				$oldPict=isset($_POST['oldPict'])?$_POST['oldPict']:false;
				$updatePict=($gbr=='')?$oldPict:$gbr;

		$ubah = array(
			'judul_slide'=>$this->input->post('judul_slide'),
			'tgl_upload'=>date('Y-m-d:h:i:s'),
			'ket_slide'=>$this->input->post('ket_slide'),
			'gambar'=>$updatePict,
			'createdby'=>''
			);

		$update = $this->Model_admin->update('slide','id_slide',$id,$ubah);
		
		move_uploaded_file($tmp,$folder.$gbr);	
		if($gbr !=''){   // if new file is not empty,then delete old file
			unlink($folder.'/'.$oldPict); // correct
		}
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_slide(){  
	$folder='./assets/images/corousel/'; 
	$id=$this->input->post('id');
	$result=$this->Model_admin->getCustom('*',"slide a",
	  			"WHERE a.id_slide='$id' LIMIT 1");
	foreach($result as $row){
		$gambar=$row->gambar;
	}
			unlink($folder.'/'.$gambar);
			$deletedata=$this->Model_admin->delete_data('slide','id_slide',$id);
		    echo json_encode(array("status" => TRUE));
}

///==========================edit PROFIL=======================================================
function list_profil(){
	 	$page=$this->uri->segment(3);
      	$limit=15;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

        $data['title']='list_customer';
		$data['list']=$this->Model_admin->getCustom("*","profil a","ORDER BY a.id_profil DESC LIMIT $offset,$limit");
		$tot_hal = $this->Model_admin->hitung_isi_tabel("*","profil a","ORDER BY a.id_profil");
        					//create for pagination		
			$config['base_url'] = base_url() . 'Admin/list_profil/';
  			$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	//STYLE PAGIN FOR BOOTSTRAP
		$config['full_tag_open'] = "<ul class='uk-pagination uk-margin-medium-top'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='uk-disabled'><li class='uk-active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['content']='admin/list_profil';
       	$this->load->view('admin/home_admin',$data); 
} 
public function save_profil()
	{   
		//for picture
		$folder='./assets/images/profile/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
		
		$data = array(
			'nm_profil'=>$this->input->post('nm_profil'),
			'nm_profil'=>$this->input->post('nm_profil'),
			'ket_profil'=>$this->input->post('ket_profil'),
			'gambar'=>$gbr, 
			'createdBy'=>''
			);
		$insert = $this->Model_admin->save('profil',$data);
		move_uploaded_file($tmp,$folder.$gbr);	
		echo json_encode(array("status" => TRUE));
}
function load_edit_profil(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('*',"profil a",
	  			"WHERE a.id_profil='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'id_profil' =>$list->id_profil,
				'nm_profil' =>$list->nm_profil,
				'ket_profil' =>$list->ket_profil,
				'gambar' =>$list->gambar,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_profil()
	    {
			$id=$this->input->post('id_profil2');

		//for picture
		$folder='./assets/images/profile/';
		$tmp  = isset($_FILES['picture']['tmp_name'])?$_FILES['picture']['tmp_name']:false;
		$gbr=isset($_FILES['picture']['name'])?$_FILES['picture']['name']:false;
				$oldPict=isset($_POST['oldPict'])?$_POST['oldPict']:false;
				$updatePict=($gbr=='')?$oldPict:$gbr;

		$ubah = array(
			'nm_profil'=>$this->input->post('nm_profil'),
			'ket_profil'=>$this->input->post('ket_profil'),
			'gambar'=>$updatePict,
			'createdby'=>''
			);

		$update = $this->Model_admin->update('profil','id_profil',$id,$ubah);
		
		move_uploaded_file($tmp,$folder.$gbr);	
		if($gbr !=''){   // if new file is not empty,then delete old file
			unlink($folder.'/'.$oldPict); // correct
		}
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_profil(){  
	$folder='./assets/images/profile/'; 
	$id=$this->input->post('id');
	$result=$this->Model_admin->getCustom('*',"profil a",
	  			"WHERE a.id_profil='$id' LIMIT 1");
	foreach($result as $row){
		$gambar=$row->gambar;
	}
			unlink($folder.'/'.$gambar);
			$deletedata=$this->Model_admin->delete_data('profil','id_profil',$id);
		    echo json_encode(array("status" => TRUE));
}

//===================UNTUK EDIT formulir daftar=========================
function formulir_pendaftaran(){
       	  $data=array(
		  'title'=>'kelas',
		  'scrumb'=>'<a href="'.base_url().'admin/listdata_kelas" class="breadcrumb">3 Letter Code</a>listdata_kelas)',
		  'content'=>'admin/list_formulir_daftar'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_formulir_pendaftaran($search='')
	{
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nama_lengkap LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='pendaftaran a';
		$nm_tabel2='calon_siswa b';
		$kolom1='a.id_calon';
		$kolom2='b.id_calon';
		
		$selected='a.*';
        $nm_coloum= array('a.id_calon,a.id_calon','a.id_calon','b.id_calon');
        $orderby= array('a.nomor_daftar' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_app->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'nomor_daftar' =>$datalist->nomor_daftar,
            'id_calon' =>$datalist->id_calon,
			'tgl_daftar' =>$datalist->tgl_daftar,
			'nama_lengkap' =>$datalist->nama_lengkap,
			'jenis_kelamin' =>$datalist->jenis_kelamin,
            'berat' =>$datalist->berat,
			'tinggi' =>$datalist->tinggi,
			'nik' =>$datalist->nik,
			'agama' =>$datalist->agama,
            'tempat_lahir' =>$datalist->tempat_lahir,
			'tgl_lahir' =>$datalist->tgl_lahir,
			'anak_ke' =>$datalist->anak_ke,
			'jumlah_bersaudara' =>$datalist->jumlah_bersaudara,
            'tempat_tinggal' =>$datalist->tempat_tinggal,
			'asal_sekolah' =>$datalist->asal_sekolah,
			'pass_photo' =>isset($datalist->pass_photo)?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
            'ijasah' =>($datalist->ijasah !='')?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
			'kk' =>($datalist->kk !='')?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
			'traskrip_nilai' =>($datalist->traskrip_nilai !=='')?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->nomor_daftar."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->nomor_daftar."'".')"><i class="material-icons md-color-red-A700">refresh</i> Delete Data</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_app->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_app->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
function sort_formulir_pendaftaran()
	{
		$thn=$this->uri->segment(3);
		$status_proses=$this->uri->segment(4);
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='pendaftaran a';
		$nm_tabel2='calon_siswa b';
		$kolom1='a.id_calon';
		$kolom2='b.id_calon';
		
		$selected='a.*';
        $nm_coloum= array('a.id_calon,a.id_calon','a.id_calon','b.id_calon');
        $orderby= array('a.nomor_daftar' => 'ASC');
		$where= array('LEFT(a.tgl_daftar,4)'=>$thn,'a.status_proses'=>$status_proses);
        $list = $this->Model_app->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'nomor_daftar' =>$datalist->nomor_daftar,
            'id_calon' =>$datalist->id_calon,
			'tgl_daftar' =>$datalist->tgl_daftar,
			'nama_lengkap' =>$datalist->nama_lengkap,
			'jenis_kelamin' =>$datalist->jenis_kelamin,
            'berat' =>$datalist->berat,
			'tinggi' =>$datalist->tinggi,
			'nik' =>$datalist->nik,
			'agama' =>$datalist->agama,
            'tempat_lahir' =>$datalist->tempat_lahir,
			'tgl_lahir' =>$datalist->tgl_lahir,
			'anak_ke' =>$datalist->anak_ke,
			'jumlah_bersaudara' =>$datalist->jumlah_bersaudara,
            'tempat_tinggal' =>$datalist->tempat_tinggal,
			'asal_sekolah' =>$datalist->asal_sekolah,
			'pass_photo' =>isset($datalist->pass_photo)?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
            'ijasah' =>($datalist->ijasah !='')?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
			'kk' =>($datalist->kk !='')?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
			'traskrip_nilai' =>($datalist->traskrip_nilai !=='')?'<span class="badge-yes">Ada</span>':'<span class="badge-no">tidak ada</span>',
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->nomor_daftar."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->nomor_daftar."'".')"><i class="material-icons md-color-red-A700">refresh</i> Delete Data</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_app->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_app->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function save_pendaftaran()
	{   
		$data = array(
			'id_kelas'=>$this->input->post('id_kelas'),
			'nm_kelas'=>$this->input->post('nm_kelas'),
			'jumlah_tampung'=>$this->input->post('jumlah_tampung'),
			'wali_kelas'=>$this->input->post('wali_kelas'),
			);
		$insert = $this->Model_admin->save('kelas',$data);
		echo json_encode(array("status" => TRUE));
}
function load_edit_pendaftaran(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('a.*',"pendaftaran a",
	  			"INNER JOIN calon_siswa b on a.id_calon=b.id_calon WHERE a.nomor_daftar='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'nomor_daftar' =>$list->nomor_daftar,
				'id_calon' =>$list->id_calon,
				'tgl_daftar' =>$list->tgl_daftar,
				'nama_lengkap' =>$list->nama_lengkap,
				'jenis_kelamin' =>$list->jenis_kelamin,
				'berat' =>$list->berat,
				'tinggi' =>$list->tinggi,
				'golongan_darah' =>$list->golongan_darah,
				'nik' =>$list->nik,
				'agama' =>$list->agama,
				'tempat_lahir' =>$list->tempat_lahir,
				'tgl_lahir' =>$list->tgl_lahir,
				'anak_ke' =>$list->anak_ke,
				'jumlah_bersaudara' =>$list->jumlah_bersaudara,
				'tempat_tinggal' =>$list->tempat_tinggal,
				'asal_sekolah' =>$list->asal_sekolah,
				'nama_ayah' =>$list->nama_ayah,
				'nama_ibu' =>$list->nama_ibu,
				'tgl_lahir_ayah' =>$list->tgl_lahir_ayah,
				'tgl_lahir_ibu' =>$list->tgl_lahir_ibu,
				'pendidikan_ayah' =>$list->pendidikan_ayah,
				'pendidikan_ibu' =>$list->pendidikan_ibu,
				'pekerjaan_ayah' =>$list->pekerjaan_ayah,
				'pekerjaan_ibu' =>$list->pekerjaan_ibu,
				'penghasilan_ayah' =>$list->penghasilan_ayah,
				'penghasilan_ibu' =>$list->penghasilan_ibu,
				'alamat_ayah' =>$list->alamat_ayah,
				'alamat_ibu' =>$list->alamat_ibu,
				'pass_photo' =>$list->pass_photo,
				'ijasah' =>$list->ijasah,
				'kk' =>$list->kk,
				'traskrip_nilai' =>$list->traskrip_nilai,
				'status_proses' =>$list->status_proses,
				'status_pembayaran' =>$list->status_pembayaran
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function update_pendaftaran(){
		$id=$this->input->post('nomor_daftar2');	
		$ubah = array(
				'tgl_daftar' =>$this->input->post('tgl_daftar'),
				'nama_lengkap' =>$this->input->post('nama_lengkap'),
				'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
				'berat' =>$this->input->post('berat'),
				'tinggi' =>$this->input->post('tinggi'),
				'golongan_darah' =>$this->input->post('golongan_darah'),
				'nik' =>$this->input->post('nik'),
				'agama' =>$this->input->post('agama'),
				'tempat_lahir' =>$this->input->post('tempat_lahir'),
				'tgl_lahir' =>$this->input->post('tgl_lahir'),
				'anak_ke' =>$this->input->post('anak_ke'),
				'jumlah_bersaudara' =>$this->input->post('jumlah_bersaudara'),
				'tempat_tinggal' =>$this->input->post('tempat_tinggal'),
				'asal_sekolah' =>$this->input->post('asal_sekolah'),
				'nama_ayah' =>$this->input->post('nama_ayah'),
				'nama_ibu' =>$this->input->post('nama_ibu'),
				'tgl_lahir_ayah' =>$this->input->post('tgl_lahir_ayah'),
				'tgl_lahir_ibu' =>$this->input->post('tgl_lahir_ibu'),
				'pendidikan_ayah' =>$this->input->post('pendidikan_ayah'),
				'pendidikan_ibu' =>$this->input->post('pendidikan_ibu'),
				'pekerjaan_ayah' =>$this->input->post('pekerjaan_ayah'),
				'pekerjaan_ibu' =>$this->input->post('pekerjaan_ibu'),
				'penghasilan_ayah' =>$this->input->post('penghasilan_ayah'),
				'penghasilan_ibu' =>$this->input->post('penghasilan_ibu'),
				'alamat_ayah' =>$this->input->post('alamat_ayah'),
				'alamat_ibu' =>$this->input->post('alamat_ibu'),
				'status_proses' =>$this->input->post('status_proses'),
				'status_pembayaran' =>$this->input->post('status_pembayaran')
			);
		$update = $this->Model_admin->update('pendaftaran','nomor_daftar',$id,$ubah);
		//data verifikasi
		$cari=$this->Model_admin->getCustom('*',"verifikasi_daftar","WHERE nomor_daftar='$id' LIMIT 1");
			if(!$cari){
			//if($update){
			//simpan verifikasi
				$verifikasi = array(
					'nomor_daftar'=>$id,
					'tgl_verifikasi'=>date('Y-m-d h:i:s'),
					'status_verifikasi'=>'tidak',
					'id_admin'=>''
				);
			$insert_verifikasi = $this->Model_admin->save('verifikasi_daftar',$verifikasi);
			
		}
		echo json_encode(array("status" => TRUE));
	 }
public function hapus_pendaftaran(){   
		$id=$this->input->post('id');
			//$deletedata=$this->Model_admin->delete_data('kelas','id_kelas',$id);
			$ubah = array(
					'status_proses'=>'ditolak',
				);
			$update = $this->Model_admin->update('pendaftaran','nomor_daftar',$id,$ubah);
			
		    echo json_encode(array("status" => TRUE));
}
//////////////////laporan/////////////
function cetak_laporan_pendaftaran(){
	
		$thn=$this->uri->segment(3);
		$status_proses=$this->uri->segment(4);
		$kurangi=$thn-1;
			
	$data = array(
			'judul'=>"Daftar Penerimaan Siswa Baru",
			'status'=>"Tahun Ajaran ".$kurangi.' / ' .$thn. ' Status '.$status_proses,
			'list'=>$this->Model_admin->getCustom('*',"pendaftaran",
	  			"WHERE LEFT(tgl_daftar,4)='$thn' AND status_proses='$status_proses'")
        );  
		
        ob_start();
        $content = $this->load->view('admin/laporan_pendaftaran_formulir',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('L', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('house_report.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

}

//===================UNTUK verifikasi========================
function list_verifikasi(){
       	  $data=array(
		  'title'=>'kelas',
		  'scrumb'=>'<a href="'.base_url().'admin/listdata_kelas" class="breadcrumb">3 Letter Code</a>listdata_kelas)',
		  'content'=>'admin/list_verifikasi'
		  );
	      $this->load->view('admin/home_admin',$data); 
	}
function listdata_verifikasi($search='')
	{
		if($search==''){
			$kondisi='';
		} else{
		$kondisi=array('a.nm_kelas LIKE'=>'%'.$search.'%');
		}
		//$idsession=$this->session->userdata('idusr');
		$nm_tabel='verifikasi_daftar a';
		$nm_tabel2='pendaftaran b';
		$kolom1='a.nomor_daftar';
		$kolom2='b.nomor_daftar';
		
		$selected='b.*,a.tgl_verifikasi,a.tgl_verifikasi,a.id_verifikasi,a.status_verifikasi';
        $nm_coloum= array('a.nomor_daftar,b.tgl_verifikasi','b.tgl_verifikasi','b.tgl_verifikasi');
        $orderby= array('a.nomor_daftar' => 'ASC');
		$where=  $kondisi;
        $list = $this->Model_admin->get_datatables2($selected,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'nomor_daftar' =>$datalist->nomor_daftar,
            'tgl_daftar' =>$datalist->tgl_daftar,
			'nama_lengkap' =>$datalist->nama_lengkap,
			'jenis_kelamin' =>$datalist->jenis_kelamin,
			'status_verifikasi' =>($datalist->status_verifikasi=='ya')?'<span class="uk-badge uk-badge-success">'.$datalist->status_verifikasi.'</span>':'<span class="uk-badge uk-badge-danger">'.$datalist->status_verifikasi.'</span>',
			'action' =>'<div class="uk-button-dropdown" data-uk-dropdown>
                                <button class="md-btn"><i class="material-icons">build</i> <i class="material-icons">&#xE313;</i></button>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="#" onclick="edit_data('."'".$datalist->nomor_daftar."'".')"><i class="material-icons">edit</i> Edit</a></li>
                                        <li><a href="#" onclick="hapus_data('."'".$datalist->nomor_daftar."'".')"><i class="material-icons md-color-red-A700">refresh</i> Delete Data</a></li>
                                    </ul>
                                </div>
                            </div>',
            );
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Model_admin->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Model_admin->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
function load_edit_verifikasi(){
	  $id=$this->input->post('id');
      $result=$this->Model_admin->getCustom('a.*,c.status_verifikasi',"pendaftaran a",
	  			"INNER JOIN calon_siswa b on a.id_calon=b.id_calon
				INNER JOIN verifikasi_daftar c on a.nomor_daftar=c.nomor_daftar  WHERE a.nomor_daftar='$id' LIMIT 1");
	foreach($result as $list){
		$row = array(
				'nomor_daftar' =>$list->nomor_daftar,
				'id_calon' =>$list->id_calon,
				'tgl_daftar' =>$list->tgl_daftar,
				'nama_lengkap' =>$list->nama_lengkap,
				'jenis_kelamin' =>$list->jenis_kelamin,
				'berat' =>$list->berat,
				'tinggi' =>$list->tinggi,
				'golongan_darah' =>$list->golongan_darah,
				'nik' =>$list->nik,
				'agama' =>$list->agama,
				'tempat_lahir' =>$list->tempat_lahir,
				'tgl_lahir' =>$list->tgl_lahir,
				'status_verifikasi' =>$list->status_verifikasi,
				'tempat_tinggal' =>$list->tempat_tinggal,
				'asal_sekolah' =>$list->asal_sekolah,
				'status_pembayaran' =>$list->status_pembayaran
			);
			$data[] = $row;
		} 
		echo json_encode($data);
}
public function save_verifikasi()
	{   
	$nis=$this->Model_app->generateNIS("siswa","NIS");
	$nomor_daftar=$this->input->post('nomor_daftar2');
	
	$id=$this->input->post('id');
    $cek_siswa=$this->Model_admin->getCustom('*',"siswa a",
	  			"WHERE a.nomor_daftar='$nomor_daftar' LIMIT 1");
	if($cek_siswa){
		echo json_encode(array("status" => TRUE));	
	} else {
		    $ambil_siswa=$this->Model_admin->getCustom('*',"pendaftaran",
	  			"WHERE nomor_daftar='$nomor_daftar' LIMIT 1");
			foreach($ambil_siswa as $row){
			$data = array(
				'NIS' =>$nis,
				'nomor_daftar' =>$nomor_daftar,
				'tgl_verifikasi' =>date('Y-m-d H:i:s'),
				'nama_lengkap' =>$row->nama_lengkap,
				'jenis_kelamin' =>$row->jenis_kelamin,
				'berat' =>$row->berat,
				'tinggi' =>$row->tinggi,
				'golongan_darah' =>$row->golongan_darah,
				'nik' =>$row->nik,
				'agama' =>$row->agama,
				'tempat_lahir' =>$row->tempat_lahir,
				'tgl_lahir' =>$row->tgl_lahir,
				'anak_ke' =>$row->anak_ke,
				'jumlah_bersaudara' =>$row->jumlah_bersaudara,
				'tempat_tinggal' =>$row->tempat_tinggal,
				'asal_sekolah' =>$row->asal_sekolah,
				'nama_ayah' =>$row->nama_ayah,
				'nama_ibu' =>$row->nama_ibu,
				'tgl_lahir_ayah' =>$row->tgl_lahir_ayah,
				'tgl_lahir_ibu' =>$row->tgl_lahir_ibu,
				'pendidikan_ayah' =>$row->pendidikan_ayah,
				'pendidikan_ibu' =>$row->pendidikan_ibu,
				'pekerjaan_ayah' =>$row->pekerjaan_ayah,
				'pekerjaan_ibu' =>$row->pekerjaan_ibu,
				'penghasilan_ayah' =>$row->penghasilan_ayah,
				'penghasilan_ibu' =>$row->penghasilan_ibu,
				'alamat_ayah' =>$row->alamat_ayah,
				'alamat_ibu' =>$row->alamat_ibu,
				'pass_photo' =>$row->pass_photo,
				'ijasah' =>$row->ijasah,
				'kk' =>$row->kk,
				'traskrip_nilai' =>$row->traskrip_nilai,
				'kelas' =>$this->input->post('kelas')
			);
			$insert = $this->Model_admin->save('siswa',$data);
				$ubah=array('status_verifikasi'=>'ya');
				$update_status = $this->Model_admin->update('verifikasi_daftar','nomor_daftar',$nomor_daftar,$ubah);
			
			echo json_encode(array("status" => TRUE));	
			}
	}
	
		
}
////////login n logout////////////////
function cek_login() {
	    $username =$this->input->post('usr');
        $password =md5($this->input->post('psw'));
					$result =$this->Model_app->getdata("*","admin",
									  "WHERE username='$username' AND password='$password' LIMIT 1");
							if($result) {
								foreach($result as $row){
							//create the session
									$sess_array = array(
										'id_sess' => $row->id_admin,
										'nama_sess' => $row->nm_admin,
										'email_sess' => $row->username,
										'user_sess' => $row->password,
										'gambar_sess' => $row->gambar,
										'sesi_login'=>TRUE,
									);
									$this->session->set_userdata($sess_array);
									redirect('Admin/home');
								}
							} else {
								//if form validate false
								$this->session->set_flashdata('flashMessage', 'Password dan username salah');
								redirect('Admin/index');
						 } 
	
}


  function logout() {
        $this->session->unset_userdata('id_sess');
		$this->session->unset_userdata('nama_sess');
		$this->session->unset_userdata('email_sess');
        $this->session->unset_userdata('user_sess');
        $this->session->unset_userdata('sesi_login');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
		$this->db->close();
        redirect('Admin');
    }



	
}

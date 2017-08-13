<?php
class dynamic_menu{

    function __construct()
    {
		 //$this->CI =& get_instance();
        $CI =& get_instance();        
        //$db=$this->CI->load->database('Model_app');
        $this->db= $CI->load->database('default', TRUE);
		
	   $this->CI =& get_instance();
       $this->CI->load->database();
		
    }

function sub_menu_profil(){
/*	//echo '<li><a href="">Visi & misi</a></li>';
	
       $CI =& get_instance();
        $query  =   $CI->db->get('profil_sekolah');
		return $query->result();
		if($query){
			
			foreach ($query->result() as $row){
				
				echo '<li><a href="">Visi & misi</a></li>';
				
			}
			
		}*/
 
	
	$sql = "SELECT * from profil"; 		
	$query=$this->db->query($sql);
		$title='';
        foreach ($query->result() as $row)
            {
				//$title .='<li><a href="'.base_url().'/Home/profile/'.$id_gallery.'">'.$row->nm_gallery.'</a></li>';
				$title .='<li><a href="'.base_url().'/Home/profile/'.$row->id_profil.'">'.$row->nm_profil.'</a></li>';
				
			}
          return $title;

    } 


}
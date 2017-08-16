<?php
class Cbkresponse extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('gtln/Mdata');
        $this->load->model('gtln/Mdatamaster');
        $this->load->model('gtln/Mdataslave');
        $this->load->model('gtln/Mdata_408');
        // connection salave 
        $this->db_salave= $this->load->database('master', TRUE);
        // connection master
        $this->db_master= $this->load->database('master', TRUE);
        // connection 408
        $this->db_408= $this->load->database('feeder_408', TRUE);

//        $this->load->library('Sesi_login');
//		if($this->sesi_login->log_session() !=TRUE){
//			redirect('login/login');
//			return false;
//		}
        ini_set('max_execution_time', -1);
        ini_set('memory_limit', -1);
        date_default_timezone_set('Asia/Jakarta');
    }
    
       function last_parsing_response($data_array,$NpwpPjt){
        //$data_array  = array('ID1715996495','R78990PMRMV','2R387YGGJR4');
        $url = "http://beacukai.go.id/barangkiriman.html";
        $lenghawb = count($data_array);
        $data = array();
        for($i = 0; $i<$lenghawb; $i++){
          $hawb = $data_array[$i];
          $myvars = "txtNpwpPjt=$NpwpPjt&txtNoBarang=$hawb";
             $ch = curl_init( $url );
             curl_setopt( $ch, CURLOPT_POST, 1);
             curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
             curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
             curl_setopt( $ch, CURLOPT_HEADER, 0);
             curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        
             $response = curl_exec( $ch );
        
        
            $l= strlen($response);
            if($l != 39){
             $response=explode('<table class="table table-striped table-bordered">',$response);              
             $response=explode('<tr>',$response[2]);

                    $dat=str_replace( '<br>',"",$response[1]);
                    $dat=str_replace( '</tr>',"",$dat);
                    $dat=str_replace( '</td>',"",$dat);
                    $dat=str_replace( '</table',"",$dat);
                    $dat=str_replace( '<h3 class="panel-title">TAGIHAN BILLING</h3>',"",$dat);
                    if($dat != ''){
                     $d=explode('<td>',$dat);
                     $WK=explode(' ',$d[1]);
                     	$row = array(
                        'HAWB' => $hawb,
                        'TGL_REKAM' => $WK[0],
                        'JAM_REKAM' => $WK[1],
                        'KODE_RESPONSE' =>  $d[2],
                        'KET_RESPONSE' =>  str_replace( "\n","",$d[3]),
                        );
                        
            			$data[] = $row;                      
                     }
            }else{
                $row = array(
                        'HAWB' => $hawb,
                        'TGL_REKAM' => '',
                        'JAM_REKAM' => '',
                        'KODE_RESPONSE' =>  '',
                        'KET_RESPONSE' =>  'Data Tidak Di Temukan',
                 );
                        
            	 $data[] = $row;  
            }
        }        
                return  json_encode($data);
    }
    
    function get_response_multi(){
        $datahawb = unserialize($_POST['data_hawb']);
        $sts      = $this->input->post('sts');
        $npwp      = $this->input->post('npwp');
        
//        print_r($datahawb);
        
        if($sts==1){
          $hasil =  $this->parsing_response($datahawb,$npwp);
        }else{
          $hasil =  $this->last_parsing_response($datahawb,$npwp);
        }
        echo $hasil;
    }
    
    function get_response(){    
        $hawb = $this->input->post('data_hawb');
        $datahawb = array($hawb);
        $sts      = $this->input->post('sts');
        $npwp      = $this->input->post('npwp');
        
        if($sts==1){
          $hasil =  $this->parsing_response($datahawb,$npwp);
        }else{
          $hasil =  $this->last_parsing_response($datahawb,$npwp);
        }
        
        echo $hasil;
    }
    
    function parsing_response($data_array,$NpwpPjt){
        $url = "http://beacukai.go.id/barangkiriman.html";
        $data = array();
        $arrhawb = array();
        foreach ($data_array as $row_h){
          $hawb = $row_h['hawb'];
          $hpwp = $row_h['npwp'];
          $token = $row_h['token'];
          $arrhawb[] = $hawb;
          $myvars = "txtNpwpPjt=$hpwp&txtNoBarang=$hawb";
             $ch = curl_init( $url );
             curl_setopt( $ch, CURLOPT_POST, 1);
             curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
             curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
             curl_setopt( $ch, CURLOPT_HEADER, 0);
             curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        
             $response = curl_exec( $ch );
        
        
            $l= strlen($response);
            if($l != 39){
             $response=explode('<table class="table table-striped table-bordered">',$response);              
             $response=explode('<tr>',$response[2]);
             $arrlength = count($response);
             for($x = 0; $x < $arrlength; $x++){
                    $dat=str_replace( '<br>',"",$response[$x]);
                    $dat=str_replace( '</tr>',"",$dat);
                    $dat=str_replace( '</td>',"",$dat);
                    $dat=str_replace( '</table',"",$dat);
                    $dat=str_replace( '<h3 class="panel-title">TAGIHAN BILLING</h3>',"",$dat);
                    if($dat != ''){
                     $d=explode('<td>',$dat);
                     $WK=explode(' ',$d[1]);
                     	$row = array(
                        'HAWB' => $hawb,
                        'TGL_REKAM' => $WK[0],
                        'JAM_REKAM' => $WK[1],
                        'KODE_RESPONSE' =>  $d[2],
                        'KET_RESPONSE' =>  str_replace( "\n","",$d[3]),
                        'TOKEN' =>  $token,
                        );
                        
            			$data[] = $row;                      
                    }
                }
            }else{
                //$row = array(
//                        'HAWB' => $hawb,
//                        'TGL_REKAM' => '',
//                        'JAM_REKAM' => '',
//                        'KODE_RESPONSE' =>  '',
//                        'KET_RESPONSE' =>  'Data Tidak Di Temukan',
//                 );
//                        
//            	 $data[] = $row;  
            }
           $fsts = fopen('./json/hawb.json', 'w');
           fwrite($fsts, json_encode($arrhawb));
           fclose($fsts);
        }
           $fsts = fopen('./json/hawb.json', 'w');
           fwrite($fsts, json_encode(array('reload hawb from new')));
           fclose($fsts);
                   
                return json_encode($data);
    }
    
    
    function get_response_gtln(){
            
     $sts = json_decode(file_get_contents(base_url().'json/sts_update.json'), true);
     
     if($sts[0] =='0'){
      $fsts = fopen('./json/sts_update.json', 'w');
      fwrite($fsts, json_encode(array("1")));
      fclose($fsts);  
            
            
            $nm_tabel='shipment';
            $nm_coloum= array('hawb','flight_date','npwp','token');
            $orderby= array('flight_date' => 'desc');
            $where=  array();
            $list = $this->Mdata->get_datadetail($nm_tabel,$nm_coloum,$orderby,$where);
            $data = array();
    		$data = array('hawb'=>'ID040002718765','npwp'=>'313675035402000','token'=>'03001');
//    		foreach ($list as $rec){
//    			$data[] = array('hawb'=>$rec->hawb,
//                                'npwp'=>$rec->npwp,
//                                'token'=>$rec->token
//                            );
//    		}
            
                $url     = base_url().'gtln/Cbkresponse/get_response_multi';
                $serial  = serialize($data);
                $myvars  = 'npwp=020640181428000&sts=1&data_hawb='.$serial;

                $ch      = curl_init( $url );
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                $response = curl_exec( $ch );
                $bb=json_decode($response); 
                
                print_r(json_encode($bb));
                if($bb === NULL){
                    exit();
                }
                asort($bb);
                    $no=0;
                    foreach ($bb as $row4)
                    {
                       $fsts = fopen('./json/sts_update.json', 'w');
                       fwrite($fsts, json_encode(array("2")));
                       fclose($fsts);
                        //$dt=date('Y-m-d H:i:s');
                        //$expdt=explode(' ',$dt);
                        $tgl=$row4->TGL_REKAM;
                        $wk=$row4->JAM_REKAM;
                        $exptgl=explode('-',$tgl);
                        $expwk=explode(':',$wk);
                        $noid=$row4->HAWB.'_'.$exptgl[0].$exptgl[1].$exptgl[2].$expwk[0].$expwk[1].$row4->KODE_RESPONSE;
                        //echo '</br>'.$noid;
                        $cs =substr($row4->KODE_RESPONSE,0,1);
                        //echo ' </br></br>'.$cs.' </br></br>';
                        //echo $noid.'</br>';
                        switch ($cs) {
                            case 1:
                                $nmtabel='bc_respone_100';
                                break;
                            case 2:
                                $nmtabel='bc_respone_200';
                                break;
                            case 3:
                                $nmtabel='bc_respone_300';
                                break;
                            case 4:
                                $nmtabel='bc_respone_400';
                                break;
                            case 5:
                                $nmtabel='bc_respone_500';
                                break;
                            case 9:
                                $nmtabel='bc_respone_900';
                                break;
                            default:
                                $nmtabel='bc_respone';
                                break;
                        }
                            
                           $jml = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid));
                           
                           //echo '</br>'.$nmtabel.'---'.$noid.'  ---- '.$jml.'</br>';
                    	   if($jml==0){//========= jika data sudah ada 
                                $data_insert = array(
                                        'id_log'     => $noid,
                                        'NO_BARANG'  => $row4->HAWB,
                                        'WK_REKAM'   => $row4->TGL_REKAM.' '.$row4->JAM_REKAM,
                        				'KD_RESPON'  => $row4->KODE_RESPONSE,
                                        'KET_RESPON' => $row4->KET_RESPONSE,
                                        'create_at'  => date('Y-m-d H:i:s'),
                                        'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                                        'token'     => $row4->TOKEN,
                        			);
                        	    $insert = $this->Mdatamaster->save($data_insert,$nmtabel);
                                $this->ms_tracing($row4->HAWB,$row4->KODE_RESPONSE,$row4->TGL_REKAM.' '.$row4->JAM_REKAM); //==Trigger
                            }else{
                                $jml_1 = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid,'WK_BARANGKIRIMAN !='=>'NULL'));
                                if($jml_1==0){//========== jika WK_BARANGKIRIMAN BELUM DI ISI
                                $key_='id_log';
                      	        $data_ = array(
                                            'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                            			);
                                //echo $nmtabel.'---'.$noid.'  ---- '.$jml_1.'</br></br>';
                            	$this->Mdatamaster->update(array($key_ => $noid), $data_,$nmtabel);
                                }
                            }
                        
                            if($row4->KODE_RESPONSE=='408'){
                              $where = array('hawb'=>$row4->HAWB);
                              $this->Mdata->delete_where($where,'shipment','hawb');    
                            }
                    } 
      
       
       $fsts = fopen('./json/sts_update.json', 'w');
       fwrite($fsts, json_encode(array("0")));
       fclose($fsts);
      }         
    }
    
    public function ms_tracing($hawb,$kode,$wk,$token,$mawb){
        
        $nmtabel='tracking';
        $kode_track = '';
        $jml = 1234;
            switch ($kode){
                            case '401': case '402': case '403': case '404':
                                $jml1 = $this->Mdataslave->count($nmtabel,array('hawb'=>$hawb,'code_tracking'=>'SPP'));
                                if($jml1 == 0){
                                     $kode_track = 'SPP';
                                     $nm_tracking = 'Realase Doc';
                                }
                                break;
                            case '408':
                                $jml2 = $this->Mdataslave->count($nmtabel,array('hawb'=>$hawb,'code_tracking'=>'CSG'));
                                if($jml2 == 0){
                                     $kode_track = 'CSG';
                                     $nm_tracking = 'Customs Gate Out Scan';
                                }
                                break;
                            default:
                                $jml3 = $this->Mdataslave->count($nmtabel,array('hawb'=>$hawb,'code_tracking'=>'WRC'));
                                if($jml3 == 0){
                                     $kode_track = 'WRC';
                                     $nm_tracking = 'Clearance Proses';
                                }
                                break;
                        }
                        
        if($kode_track !=''){
             $data_insert = array(
                                  'id_tracking'     => $hawb.'_'.$kode_track,
                                  'code_tracking'   => $kode_track,
                                  'desc_tracking'   => $nm_tracking,
                        		      'wk_tracking'     => $wk,
                                  'remaks'          => '',
                                  'hawb'            => $hawb,
                                  'token'           => $token,
                                  'mawb'            => $mawb,
           		               );
                               
             $insert = $this->Mdatamaster->save($data_insert,'tracking');
        }
  
    }    
    
    function monitor(){
        $hawb = json_decode(file_get_contents(base_url().'json/hawb.json'), true);
        $sts = json_decode(file_get_contents(base_url().'json/sts_update.json'), true);
        
        print_r($sts);
        
        $lenghawb = count($hawb);
        for($i = 0; $i<$lenghawb; $i++){
            echo $i.'. '.$hawb[$i].'</br>';
        }
    }


    function get_response_alltoken(){
     
     ob_start();
            
     $sts = json_decode(file_get_contents(base_url().'json/sts_update.json'), true);
     
     if($sts[0] =='0'){
      $waktu_awal=date('Y-m-d H:i:s');  
      $fsts = fopen('./json/sts_update.json', 'w');
      fwrite($fsts, json_encode(array("1","$waktu_awal")));
      fclose($fsts);  
            
            
            $nm_tabel='shipment';
            $nm_coloum= array('hawb','flight_date','npwp','token');
            $orderby= array('flight_date' => 'asc');
            $where=  array();
            $list = $this->Mdata->get_datadetail($nm_tabel,$nm_coloum,$orderby,$where);
            $jml_tarik = count($list);
            
                $fsss = fopen('./json/jml_tarik.json', 'w');
                fwrite($fsss, json_encode(array($jml_tarik)));
                fclose($fsss);  
                
            $data = array();
            $url = "http://beacukai.go.id/barangkiriman.html";
    		foreach ($list as $rec){          
                  $hawb = $rec->hawb;
                  $hpwp = $rec->npwp;
                  $token = $rec->token;
                  $arrhawb[] = $hawb;
                  $myvars = "txtNpwpPjt=$hpwp&txtNoBarang=$hawb";
                     $ch = curl_init( $url );
                     curl_setopt( $ch, CURLOPT_POST, 1);
                     curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                     curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                     curl_setopt( $ch, CURLOPT_HEADER, 0);
                     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                     $response = curl_exec( $ch );
                
                
                    $l= strlen($response);
                    if($l != 39){
                     $response=explode('<table class="table table-striped table-bordered">',$response);              
                     $response=explode('<tr>',$response[2]);
                     print_r($response);
                     $arrlength = count($response);
                     for($x = 0; $x < $arrlength; $x++){
                            $dat=str_replace( '<br>',"",$response[$x]);
                            $dat=str_replace( '</tr>',"",$dat);
                            $dat=str_replace( '</td>',"",$dat);
                            $dat=str_replace( '</table',"",$dat);
                            $dat=str_replace( '<h3 class="panel-title">TAGIHAN BILLING</h3>',"",$dat);
                            if($dat != ''){
                             $d=explode('<td>',$dat);
                             $WKR=explode(' ',$d[1]);
                             $KET_RES =str_replace( "\n","",$d[3]);
                             	$row = array(
                                'HAWB' => $hawb,
                                'TGL_REKAM' => $WKR[0],
                                'JAM_REKAM' => $WKR[1],
                                'KODE_RESPONSE' =>  $d[2],
                                'KET_RESPONSE' =>  $KET_RES,
                                'TOKEN' =>  $token,
                                );
                                
                    			$data[] = $row; 
                               
                               //===================== insert mysql ===================== 
                                $tgl=$WKR[0];
                                $wk=$WKR[1];
                                $exptgl=explode('-',$tgl);
                                $expwk=explode(':',$wk);
                                $noid=$hawb.'_'.$exptgl[0].$exptgl[1].$exptgl[2].$expwk[0].$expwk[1].$d[2];
                                //echo '</br>'.$noid;
                                $cs =substr($d[2],0,1);
                                //echo ' </br></br>'.$cs.' </br></br>';
                                //echo $noid.'</br>';
                                switch ($cs) {
                                    case 1:
                                        $nmtabel='bc_respone_100';
                                        break;
                                    case 2:
                                        $nmtabel='bc_respone_200';
                                        break;
                                    case 3:
                                        $nmtabel='bc_respone_300';
                                        break;
                                    case 4:
                                        $nmtabel='bc_respone_400';
                                        break;
                                    case 5:
                                        $nmtabel='bc_respone_500';
                                        break;
                                    case 9:
                                        $nmtabel='bc_respone_900';
                                        break;
                                    default:
                                        $nmtabel='bc_respone';
                                        break;
                                }
                                    
                                   $jml = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid));
                                   
                                   //echo '</br>'.$nmtabel.'---'.$noid.'  ---- '.$jml.'</br>';
                            	   if($jml==0){//========= jika data sudah ada 
                                        $data_insert = array(
                                                'id_log'     => $noid,
                                                'NO_BARANG'  => $hawb,
                                                'WK_REKAM'   => $tgl.' '.$wk,
                                				'KD_RESPON'  => $d[2],
                                                'KET_RESPON' => $KET_RES,
                                                'create_at'  => date('Y-m-d H:i:s'),
                                                'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                                                'token'     => $token,
                                			);
                                	    $insert = $this->Mdatamaster->save($data_insert,$nmtabel);
                                        $this->ms_tracing($hawb,$d[2],$tgl.' '.$wk,$token); //==Trigger
                                    }else{
                                        $jml_1 = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid,'WK_BARANGKIRIMAN !='=>'NULL'));
                                        if($jml_1==0){//========== jika WK_BARANGKIRIMAN BELUM DI ISI
                                        $key_='id_log';
                              	        $data_ = array(
                                                    'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                                    			);
                                        //echo $nmtabel.'---'.$noid.'  ---- '.$jml_1.'</br></br>';
                                    	$this->Mdatamaster->update(array($key_ => $noid), $data_,$nmtabel);
                                        }
                                    }
                                
                                    if($d[2]=='408'){
                                      $where = array('hawb'=>$hawb);
                                      $this->Mdata->delete_where($where,'shipment','hawb');    
                                    }
                          //=========================================================                      
                            } 
                        }
                    }else{
                    }
                   $fsts = fopen('./json/hawb.json', 'w');
                   fwrite($fsts, json_encode($arrhawb));
                   fclose($fsts);
            }
       $fsts = fopen('./json/hawb.json', 'w');
       fwrite($fsts, json_encode(array('reload hawb from new')));
       fclose($fsts);
       
       $waktu_awal=date('Y-m-d H:i:s'); 
            
       $fsts = fopen('./json/sts_update.json', 'w');
       fwrite($fsts, json_encode(array("0","$waktu_awal")));
       fclose($fsts);
       
       ob_end_flush();
      }         
    }


   function get_response_alltoken_403(){
     
     ob_start();
            
     $sts = json_decode(file_get_contents(base_url().'json/sts_update.json'), true);
     
     if($sts[0] =='0'){
      $waktu_awal=date('Y-m-d H:i:s');  
      $fsts = fopen('./json/sts_update.json', 'w');
      fwrite($fsts, json_encode(array("1","$waktu_awal")));
      fclose($fsts);  
            
            
            $nm_tabel='shipment';
            $nm_coloum= array('mawb','hawb','flight_date','npwp','token');
            $orderby= array('flight_date' => 'asc');
            $where=  array();
            // tarik ke feeder data shipment
            $list = $this->Mdata->get_datadetail($nm_tabel,$nm_coloum,$orderby,$where);
            $jml_tarik = count($list);
            
                $fsss = fopen('./json/jml_tarik.json', 'w');
                fwrite($fsss, json_encode(array($jml_tarik)));
                fclose($fsss);  
                
            $data = array();
            $url = "http://beacukai.go.id/barangkiriman.html";
        //=== antrian
        foreach ($list as $rec){   
                  $fdate = $rec->flight_date;    
                  $mawb = $rec->mawb;     
                  $hawb = $rec->hawb;
                  $hpwp = $rec->npwp;
                  $token = $rec->token;
                  $arrhawb[] = $hawb;
                  $myvars = "txtNpwpPjt=$hpwp&txtNoBarang=$hawb";
                     $ch = curl_init( $url );
                     curl_setopt( $ch, CURLOPT_POST, 1);
                     curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                     curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                     curl_setopt( $ch, CURLOPT_HEADER, 0);
                     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                     $response = curl_exec( $ch );
                
                
                    $l= strlen($response);
                    if($l != 39){
                     $response=explode('<table class="table table-striped table-bordered">',$response);              
                     $response=explode('<tr>',$response[2]);
                     print_r($response);
                     $arrlength = count($response);
                     //==== baris per response===
                     for($x = 0; $x < $arrlength; $x++){
                            $dat=str_replace( '<br>',"",$response[$x]);
                            $dat=str_replace( '</tr>',"",$dat);
                            $dat=str_replace( '</td>',"",$dat);
                            $dat=str_replace( '</table',"",$dat);
                            $dat=str_replace( '<h3 class="panel-title">TAGIHAN BILLING</h3>',"",$dat);
                            if($dat != ''){
                             $d=explode('<td>',$dat);
                             $WKR=explode(' ',$d[1]);
                             $KET_RES =str_replace( "\n","",$d[3]);
                              $row = array(
                                'HAWB' => $hawb,
                                'TGL_REKAM' => $WKR[0],
                                'JAM_REKAM' => $WKR[1],
                                'KODE_RESPONSE' =>  $d[2],
                                'KET_RESPONSE' =>  $KET_RES,
                                'TOKEN' =>  $token,
                                );
                                
                          $data[] = $row; 
                               
                               //===================== insert mysql ===================== 
                                $tgl=$WKR[0];
                                $wk=$WKR[1];
                                $exptgl=explode('-',$tgl);
                                $expwk=explode(':',$wk);
                                $noid=$hawb.'_'.$exptgl[0].$exptgl[1].$exptgl[2].$expwk[0].$expwk[1].$d[2];
                                //echo '</br>'.$noid;
                                $cs =substr($d[2],0,1);
                                //echo ' </br></br>'.$cs.' </br></br>';
                                //echo $noid.'</br>';
                                switch ($cs) {
                                    case 1:
                                        $nmtabel='bc_respone_100';
                                        break;
                                    case 2:
                                        $nmtabel='bc_respone_200';
                                        break;
                                    case 3:
                                        $nmtabel='bc_respone_300';
                                        break;
                                    case 4:
                                        $nmtabel='bc_respone_400';
                                        break;
                                    case 5:
                                        $nmtabel='bc_respone_500';
                                        break;
                                    case 9:
                                        $nmtabel='bc_respone_900';
                                        break;
                                    default:
                                        $nmtabel='bc_respone';
                                        break;
                                }
                                    
                                 $jml = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid));
                               

                                   //echo '</br>'.$nmtabel.'---'.$noid.'  ---- '.$jml.'</br>';
                                 if($jml==0){//========= jika data sudah ada 
                                        $data_insert = array(
                                                'id_log'     => $noid,
                                                'NO_BARANG'  => $hawb,
                                                'WK_REKAM'   => $tgl.' '.$wk,
                                                'KD_RESPON'  => $d[2],
                                                'KET_RESPON' => $KET_RES,
                                                'create_at'  => date('Y-m-d H:i:s'),
                                                'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                                                'token'     => $token,
                                      );
                                      $insert = $this->Mdatamaster->save($data_insert,$nmtabel);
                                        $this->ms_tracing($hawb,$d[2],$tgl.' '.$wk,$token); //==Trigger
                                    }else{

                                      $query_a="select count(NO_BARANG) as jml from $nmtabel where WK_BARANGKIRIMAN is null and id_log like '$noid'";
                                      $q_a=$this->db_salave->query($query_a);
                                      $rec_a=$q_a->row();
                                      $jml_1=$rec_a->jml;

                                      //  $jml_1 = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid,'WK_BARANGKIRIMAN !='=>'NULL'));
                                      
                                        if($jml_1==0){//========== jika WK_BARANGKIRIMAN BELUM DI ISI
                                        $key_='id_log';
                                        $data_ = array(
                                                    'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                                          );
                                        //echo $nmtabel.'---'.$noid.'  ---- '.$jml_1.'</br></br>';
                                      $this->Mdatamaster->update(array($key_ => $noid), $data_,$nmtabel);
                                        }
                                    }

                                    if($d[2]=='408'){

                                      $where = array('hawb'=>$hawb);
                                      $this->Mdata->delete_where($where,'shipment','hawb');

                                      $where = array('hawb'=>$hawb);
                                      $this->Mdata_408->delete_where($where,'shipment','hawb');

                                    }

                                    if($d[2]=='403'){
                                      $jml_408 = $this->Mdataslave->count('bc_respone_400',array('NO_BARANG'=>$hawb,'KD_RESPON'=>'408'));
                                     if($jml_408==0){
                                      $where = array('hawb'=>$hawb);
                                      $this->Mdata->delete_where($where,'shipment','hawb'); 

                                      $nmtabel_ship='shipment';  
                                      $data_insert_ship = array(
                                                'mawb'        => $mawb,
                                                'hawb'        => $hawb,
                                                'flight_date' => $fdate,
                                                'npwp'        => $hpwp,
                                                'token'       => $token,
                                                'fleg_active' => '1',
                                      );

                                      $where = array('hawb'=>$hawb);
                                      $this->Mdata_408->save($data_insert_ship,$nmtabel_ship);  
                                    } 
                                  }
                          //=========================================================                 
                            }
                        }
                    }else{

                    }
                   $fsts = fopen('./json/hawb.json', 'w');
                   fwrite($fsts, json_encode($arrhawb));
                   fclose($fsts);
            }
       $fsts = fopen('./json/hawb.json', 'w');
       fwrite($fsts, json_encode(array('reload hawb from new')));
       fclose($fsts);
       
       $waktu_awal=date('Y-m-d H:i:s'); 
            
       $fsts = fopen('./json/sts_update.json', 'w');
       fwrite($fsts, json_encode(array("0","$waktu_awal")));
       fclose($fsts);
       
       ob_end_flush();
      }         
    }


    function get_response_408(){
     
     ob_start();
            
     $sts = json_decode(file_get_contents(base_url().'json/sts_update.json'), true);
     
     if($sts[0] =='0'){
      $waktu_awal=date('Y-m-d H:i:s');  
      $fsts = fopen('./json/sts_update.json', 'w');
      fwrite($fsts, json_encode(array("1","$waktu_awal")));
      fclose($fsts);  
             
            $nm_tabel='shipment';
            $nm_coloum= array('mawb','hawb','flight_date','npwp','token');
            $orderby= array('flight_date' => 'asc');
            $where=  array();
            $list = $this->Mdata->get_datadetail($nm_tabel,$nm_coloum,$orderby,$where);
            $jml_tarik = count($list);
            
                $fsss = fopen('./json/jml_tarik.json', 'w');
                fwrite($fsss, json_encode(array($jml_tarik)));
                fclose($fsss);  
                
            $data = array();
            $url = "http://beacukai.go.id/barangkiriman.html";
        foreach ($list as $rec){         
                  $hawb = $rec->hawb;
                  $hpwp = $rec->npwp;
                  $token = $rec->token;
                  $arrhawb[] = $hawb;
                  $myvars = "txtNpwpPjt=$hpwp&txtNoBarang=$hawb";
                     $ch = curl_init( $url );
                     curl_setopt( $ch, CURLOPT_POST, 1);
                     curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                     curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                     curl_setopt( $ch, CURLOPT_HEADER, 0);
                     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                     $response = curl_exec( $ch );
                
                
                    $l= strlen($response);
                    if($l != 39){
                     $response=explode('<table class="table table-striped table-bordered">',$response);              
                     $response=explode('<tr>',$response[2]);
                     print_r($response);
                     $arrlength = count($response);
                     for($x = 0; $x < $arrlength; $x++){
                            $dat=str_replace( '<br>',"",$response[$x]);
                            $dat=str_replace( '</tr>',"",$dat);
                            $dat=str_replace( '</td>',"",$dat);
                            $dat=str_replace( '</table',"",$dat);
                            $dat=str_replace( '<h3 class="panel-title">TAGIHAN BILLING</h3>',"",$dat);
                            if($dat != ''){
                             $d=explode('<td>',$dat);
                             $WKR=explode(' ',$d[1]);
                             $KET_RES =str_replace( "\n","",$d[3]);
                              $row = array(
                                'HAWB' => $hawb,
                                'TGL_REKAM' => $WKR[0],
                                'JAM_REKAM' => $WKR[1],
                                'KODE_RESPONSE' =>  $d[2],
                                'KET_RESPONSE' =>  $KET_RES,
                                'TOKEN' =>  $token,
                                );
                                
                          $data[] = $row; 
                            if($d[2]=='408'){
                               //===================== insert mysql ===================== 
                                $tgl=$WKR[0];
                                $wk=$WKR[1];
                                $exptgl=explode('-',$tgl);
                                $expwk=explode(':',$wk);
                                $noid=$hawb.'_'.$exptgl[0].$exptgl[1].$exptgl[2].$expwk[0].$expwk[1].$d[2];
                                //echo '</br>'.$noid;
                                $cs =substr($d[2],0,1);
                                //echo ' </br></br>'.$cs.' </br></br>';
                                //echo $noid.'</br>';
                                switch ($cs) {
                                    case 1:
                                        $nmtabel='bc_respone_100';
                                        break;
                                    case 2:
                                        $nmtabel='bc_respone_200';
                                        break;
                                    case 3:
                                        $nmtabel='bc_respone_300';
                                        break;
                                    case 4:
                                        $nmtabel='bc_respone_400';
                                        break;
                                    case 5:
                                        $nmtabel='bc_respone_500';
                                        break;
                                    case 9:
                                        $nmtabel='bc_respone_900';
                                        break;
                                    default:
                                        $nmtabel='bc_respone';
                                        break;
                                }
                                    
                                   $jml = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid));
                                   
                                   //echo '</br>'.$nmtabel.'---'.$noid.'  ---- '.$jml.'</br>';
                                  if($jml==0){//========= jika data sudah ada 
                                        $data_insert = array(
                                                'id_log'     => $noid,
                                                'NO_BARANG'  => $hawb,
                                                'WK_REKAM'   => $tgl.' '.$wk,
                                        'KD_RESPON'  => $d[2],
                                                'KET_RESPON' => $KET_RES,
                                                'create_at'  => date('Y-m-d H:i:s'),
                                                'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                                                'token'     => $token,
                                      );
                                      $insert = $this->Mdatamaster->save($data_insert,$nmtabel);
                                        $this->ms_tracing($hawb,$d[2],$tgl.' '.$wk,$token); //==Trigger
                                  }else{
                                        $jml_1 = $this->Mdataslave->count($nmtabel,array('id_log'=>$noid,'WK_BARANGKIRIMAN !='=>'NULL'));
                                        if($jml_1==0){//========== jika WK_BARANGKIRIMAN BELUM DI ISI
                                        $key_='id_log';
                                        $data_ = array(
                                                    'WK_BARANGKIRIMAN' => date('Y-m-d H:i:s'),
                                          );
                                        //echo $nmtabel.'---'.$noid.'  ---- '.$jml_1.'</br></br>';
                                      $this->Mdatamaster->update(array($key_ => $noid), $data_,$nmtabel);
                                        }
                                  }
                                
                                  if($d[2]=='408'){
                                      $where = array('hawb'=>$hawb);
                                      $this->Mdata->delete_where($where,'shipment','hawb');    
                                  }
                          //=========================================================                  
                            }
                            }
                        }
                    }else{

                    }
                   $fsts = fopen('./json/hawb.json', 'w');
                   fwrite($fsts, json_encode($arrhawb));
                   fclose($fsts);
            }
       $fsts = fopen('./json/hawb.json', 'w');
       fwrite($fsts, json_encode(array('reload hawb from new')));
       fclose($fsts);
       
       $waktu_awal=date('Y-m-d H:i:s'); 
            
       $fsts = fopen('./json/sts_update.json', 'w');
       fwrite($fsts, json_encode(array("0","$waktu_awal")));
       fclose($fsts);
       
       ob_end_flush();
      }         
    }

    function lihat_123(){
            $url = "http://beacukai.go.id/barangkiriman.html";
            $myvars = "txtNpwpPjt=739785582031000&txtNoBarang=ID1900027706";
                     $ch = curl_init( $url );
                     curl_setopt( $ch, CURLOPT_POST, 1);
                     curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                     curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                     curl_setopt( $ch, CURLOPT_HEADER, 0);
                     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                     $response = curl_exec( $ch );
                
                
                    $l= strlen($response);
                    if($l != 39){
                     $response=explode('<table class="table table-striped table-bordered">',$response);              
                     $response=explode('<tr>',$response[2]);
                     rsort($response);
                     //print_r($response);
                     $no=0;
                     $arrlength = count($response);
                     for($x = 0; $x < $arrlength; $x++){
                            $dat=str_replace( '<br>',"",$response[$x]);
                            $dat=str_replace( '</tr>',"",$dat);
                            $dat=str_replace( '</td>',"",$dat);
                            $dat=str_replace( '</table',"",$dat);
                            $dat=str_replace( '<h3 class="panel-title">TAGIHAN BILLING</h3>',"",$dat);
                            if($dat != ''){
                              $no++;
                                $d=explode('<td>',$dat);
                                $WKR=explode(' ',$d[1]);
                                $KET_RES =str_replace( "\n","",$d[3]);
                                echo $no.'. '.$d[2]."</br>";
                            
                            }
                      }
                      $jml_408 = $this->Mdataslave->count('bc_respone_400',array('NO_BARANG'=>'ID1900027706','KD_RESPON'=>'408'));
                      echo 'jumlah '.$jml;
                    }
    }   



  function get_response_alltoken_403_query(){
     
     ob_start();
            
     $sts = json_decode(file_get_contents(base_url().'json/sts_update.json'), true);
     
     if($sts[0] =='0'){
      $waktu_awal=date('Y-m-d H:i:s');  
      $fsts = fopen('./json/sts_update.json', 'w');
      fwrite($fsts, json_encode(array("1","$waktu_awal")));
      fclose($fsts);  
            
            
            $nm_tabel='shipment';
            $nm_coloum= array('mawb','hawb','flight_date','npwp','token');
            $orderby= array('flight_date' => 'asc');
            $where=  array();
            // tarik ke feeder data shipment
            $list = $this->Mdata->get_datadetail($nm_tabel,$nm_coloum,$orderby,$where);
            $jml_tarik = count($list);
            
                $fsss = fopen('./json/jml_tarik.json', 'w');
                fwrite($fsss, json_encode(array($jml_tarik)));
                fclose($fsss);  
                
            $data = array();
            $url = "http://beacukai.go.id/barangkiriman.html";
        //=== antrian
        foreach ($list as $rec){   
                  $fdate = $rec->flight_date;    
                  $mawb = $rec->mawb;     
                  $hawb = $rec->hawb;
                  $hpwp = $rec->npwp;
                  $token = $rec->token;
                  $arrhawb[] = $hawb;
                  $myvars = "txtNpwpPjt=$hpwp&txtNoBarang=$hawb";
                     $ch = curl_init( $url );
                     curl_setopt( $ch, CURLOPT_POST, 1);
                     curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                     curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                     curl_setopt( $ch, CURLOPT_HEADER, 0);
                     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                     $response = curl_exec( $ch );
                
                
                    $l= strlen($response);
                    if($l != 39){
                     $response=explode('<table class="table table-striped table-bordered">',$response);              
                     $response=explode('<tr>',$response[2]);
                     print_r($response);
                     $arrlength = count($response);
                     //==== baris per response===
                     for($x = 0; $x < $arrlength; $x++){
                            $dat=str_replace( '<br>',"",$response[$x]);
                            $dat=str_replace( '</tr>',"",$dat);
                            $dat=str_replace( '</td>',"",$dat);
                            $dat=str_replace( '</table',"",$dat);
                            $dat=str_replace( '<h3 class="panel-title">TAGIHAN BILLING</h3>',"",$dat);
                            if($dat != ''){
                             $d=explode('<td>',$dat);
                             $WKR=explode(' ',$d[1]);
                             $KET_RES =str_replace( "\n","",$d[3]);
                              $row = array(
                                'HAWB' => $hawb,
                                'TGL_REKAM' => $WKR[0],
                                'JAM_REKAM' => $WKR[1],
                                'KODE_RESPONSE' =>  $d[2],
                                'KET_RESPONSE' =>  $KET_RES,
                                'TOKEN' =>  $token,
                                );
                                
                          $data[] = $row; 
                               
                               //===================== insert mysql ===================== 
                                $tgl=$WKR[0];
                                $wk=$WKR[1];
                                $exptgl=explode('-',$tgl);
                                $expwk=explode(':',$wk);
                                $noid=$hawb.'_'.$exptgl[0].$exptgl[1].$exptgl[2].$expwk[0].$expwk[1].$d[2];
                                //echo '</br>'.$noid;
                                $cs =substr($d[2],0,1);
                                //echo ' </br></br>'.$cs.' </br></br>';
                                //echo $noid.'</br>';
                                switch ($cs) {
                                    case 1:
                                        $nmtabel='bc_respone_100';
                                        break;
                                    case 2:
                                        $nmtabel='bc_respone_200';
                                        break;
                                    case 3:
                                        $nmtabel='bc_respone_300';
                                        break;
                                    case 4:
                                        $nmtabel='bc_respone_400';
                                        break;
                                    case 5:
                                        $nmtabel='bc_respone_500';
                                        break;
                                    case 9:
                                        $nmtabel='bc_respone_900';
                                        break;
                                    default:
                                        $nmtabel='bc_respone';
                                        break;
                                }
                                //==== CEK DATA DI DBRESPONE                                       
                                $query="select count(NO_BARANG) as jml from $nmtabel where id_log like '$noid'";
                                $q=$this->db_salave->query($query);
                                $rec=$q->row();
                                $jml=$rec->jml;

                                if($jml==0){//========= jika data tidak ada 

                                $wkrekam = $tgl.' '.$wk;
                                $kdrespon = $d[2];
                                $createat = date('Y-m-d H:i:s');
                                $wkbrng = date('Y-m-d H:i:s');

                                //========= INSERT DBRESPONSE
                                $this->db_master->query("
                                INSERT INTO $nmtabel (id_log, NO_BARANG, WK_REKAM, KD_RESPON, create_at,WK_BARANGKIRIMAN,token,mawb)
                                VALUES ('$noid', '$hawb', '$wkrekam', '$kdrespon','$createat','$wkbrng,$token','$mawb')");

                                        $this->ms_tracing($hawb,$d[2],$tgl.' '.$wk,$token,$mawb); //==Trigger
                                    }else{

                                      $query_a="select count(NO_BARANG) as jml from $nmtabel where WK_BARANGKIRIMAN is not null and id_log like '$noid'";
                                      $q_a=$this->db_salave->query($query_a);
                                      $rec_a=$q_a->row();
                                      $jml_1=$rec_a->jml;
                                      
                                        if($jml_1==0){//========== jika WK_BARANGKIRIMAN BELUM DI ISI
                                       
                                        $this->db_master->query("UPDATE $nmtabel set WK_BARANGKIRIMAN =now() WHERE id_log like '$noid'");

                                        }
                                    }

                                    if($d[2]=='408'){
                                      $this->db_master->query("DELETE FROM shipment WHERE hawb='$hawb'");

                                      $this->db_408->query("DELETE FROM shipment WHERE hawb='$hawb'");
                                    }

                                    if($d[2]=='403'){

                                    $query_B="select count(NO_BARANG) as jml from bc_respone_400 where NO_BARANG LIKE $hawb AND KD_RESPON = '408'";
                                    $q_B=$this->db_salave->query($query_B);
                                    $rec_B=$q_B->row();
                                    $jml_408=$rec_B->jml;

                                    if($jml_408==0){

                                    $this->db_408->query("
                                    INSERT INTO shipment 
                                    (mawb, hawb, flight_date, npwp, token,fleg_active)
                                    VALUES 
                                    ('$mawb', '$hawb', '$fdate', '$hpwp','$token','1')
                                    ");

                                    }
                                  }
                          //=========================================================                 
                            }
                        }
                    }else{

                    }
                   $fsts = fopen('./json/hawb.json', 'w');
                   fwrite($fsts, json_encode($arrhawb));
                   fclose($fsts);
            }
       $fsts = fopen('./json/hawb.json', 'w');
       fwrite($fsts, json_encode(array('reload hawb from new')));
       fclose($fsts);
       
       $waktu_awal=date('Y-m-d H:i:s'); 
            
       $fsts = fopen('./json/sts_update.json', 'w');
       fwrite($fsts, json_encode(array("0","$waktu_awal")));
       fclose($fsts);
       
       ob_end_flush();
      }         
    }

}





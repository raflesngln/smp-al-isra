<?php
class Cmonitor extends CI_Controller{
    function __construct(){
        parent::__construct();
        ini_set('max_execution_time', -1);
        ini_set('memory_limit', -1);
        date_default_timezone_set('Asia/Jakarta');
    }
    
   function index(){
        $data=array(
        		  'title'=>'Monitoring Fedder',
        		  'content'=>'progress_feeder/monitor',
		  );
        $this->load->view('cek_decoder/Home',$data);
    }
    
   function duration($mywk){
            $date_start = new DateTime($mywk);
            $end_date   = new DateTime();
            
            $interval = $date_start->diff($end_date);
            
            $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
            $dirasi =  $interval->format('%a days %h hours %i minutes %s seconds');
            return $dirasi;
   } 
    
   function feeder_1(){
        $hawb = json_decode(file_get_contents('http://116.206.197.163/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.197.163/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.197.163/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";

    }
    
    function feeder_2(){
        $hawb = json_decode(file_get_contents('http://116.206.196.206/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.206/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.206/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
    function feeder_3(){
        $hawb = json_decode(file_get_contents('http://116.206.196.73/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.73/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.73/gtln_response/json/jml_tarik.json'), true);
      //  print_r($jml);
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
    function feeder_4(){
        $hawb = json_decode(file_get_contents('http://116.206.196.98/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.98/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.98/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
    function tes(){
        $sts = json_decode(file_get_contents('http://116.206.196.62/gtln_response/json/sts_update.json'), true);
        
        echo $sts[1];
    }
    
    function feeder_5(){
        $hawb = json_decode(file_get_contents('http://116.206.196.62/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.62/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.62/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
   function feeder_6(){
        $hawb = json_decode(file_get_contents('http://116.206.196.245/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.245/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.245/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
       function feeder_7(){
        $hawb = json_decode(file_get_contents('http://116.206.196.98/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.98/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.98/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
     function feeder_8(){
        $hawb = json_decode(file_get_contents('http://116.206.196.99/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.99/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.99/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
      function feeder_9(){
        $hawb = json_decode(file_get_contents('http://116.206.196.229/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.229/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.229/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }
    
    function feeder_10(){
        $hawb = json_decode(file_get_contents('http://116.206.196.13/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.196.13/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.196.13/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }

    function feeder_11(){
        $hawb = json_decode(file_get_contents('http://116.206.197.205/gtln_response/json/hawb.json'), true);
        $sts = json_decode(file_get_contents('http://116.206.197.205/gtln_response/json/sts_update.json'), true);
        $jml = json_decode(file_get_contents('http://116.206.197.205/gtln_response/json/jml_tarik.json'), true);
        
        $jml = $jml[0];
        $mysts = $sts[0];
        $totjml = count($hawb);
        $per = ($totjml != 0) ? ($totjml / $jml) * 100 : 0;
        if($per==0){
           $persen1='0';
        }else{
           $persen1 = number_format($per, "2", ".", ",");
        }
        
        if($mysts=='1'){
           $status="<span class='uk-badge uk-badge-primary'>Active</span>"; 
        }else{
           $status="<span class='uk-badge uk-badge-danger'>Reload Hawb</span>"; 
        }
        
        $durasi = $this->duration($sts[1]);
        
        echo "<div class='uk-width-medium-1-1'>
                   <ul class='md-list'>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Status Feeder</span>
                                 <span class='md-list-heading uk-text-large uk-text-left' >$status</span>
                            </div>
                       </li> 
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Jumlah Antrian Hawb</span>
                                 <span class='md-list-heading uk-text-large' >$jml</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Durasi</span>
                                 <span class='md-list-heading uk-text-large' >$durasi</span>
                            </div>
                       </li>
                       <li>
                            <div class='md-list-content'>
                                 <span class='uk-text-small uk-text-muted uk-display-block'>Proses = <b>$persen1% , total Hawb Proses = $totjml</b></span>
                                 <div class='uk-progress uk-progress-striped uk-active uk-progress-small'>
                                      <div class='uk-progress-bar' style='width: $per%;'></div>
                                 </div>
                            </div>
                       </li>                                     
                   </ul>
             </div>";
    }

}


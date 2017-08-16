<div class="row">
                <div class="col-md-12">

                    <div class="border-bottom-tab">

                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-1" role="tab" class="waves-effect waves-dark" data-toggle="tab"><i class="fa fa-user"></i> My Profile</a></li>
                        
                        <li role="presentation"><a href="#tab-2" role="tab" class="waves-effect waves-dark" data-toggle="tab"><i class="fa fa-file"></i> Pendaftaran</a></li>
                        
                       
                      </ul>

                      <!-- Tab panes -->
    <div class="panel-body">
     <div class="tab-content">
     
      <div role="tabpanel" class="tab-pane fade in active" id="tab-1">
       <?php echo $this->load->view('calon/form_pendaftaran');?>
	  </div>
                          
         <div role="tabpanel" class="tab-pane fade" id="tab-2">
           <?php echo $this->load->view('calon/form_pendaftaran');?>          </div>
                          
                          
                        </div>
                      </div>

                    </div><!-- /.border-bottom-tab -->

                </div><!-- /.col-md-12 -->
              </div>
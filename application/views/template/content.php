 <div class="container">
                <div class="row">
                  

                    <div class="col-md-3">
                      <div class="tt-sidebar-wrapper" role="complementary">
                          <div class="widget widget_search">
                            <form role="search" class="search-form" method="post" action="<?php echo base_url()?>Home/pencarian" >
                              <input type="text" class="form-control" value="" name="txtcari" id="txtcari" placeholder="Pencarian">
                              <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                          </div><!-- /.widget_search -->


                          <!-- /.widget_tt_popular_post -->
                          <?php echo $this->load->view('template/sidebar');?>
                          <!-- /.widget_tt_twitter -->


                         
        
                      </div><!-- /.tt-sidebar-wrapper -->
                    </div><!-- /.col-md-4 -->
                  
                    <div class="col-md-9">
                   <?php echo $this->load->view($content);?>
                    </div>
                    <!-- /.col-md-8 -->

                  </div><!-- /.row -->
                  
                  </div>
          
 
<div class="container">
<div class="col-md-3">&nbsp;</div>
<div class="col-md-6">

<h3 align="center" style="margin-top:55px">Buku Tamu</h3>
                <div id="client-testimonial" class="carousel slide carousel-testimonial text-center gray-bg" data-ride="carousel">

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                
          <?php
		  foreach($buku_tamu as $row){
		  ?>      
                    <div class="item">
                      <div class="avatar">
                          <img src="<?php echo base_url();?>assets/images/guru.png" alt="Customer Thumb" height="50" width="50">
                      </div>
                      <div class="content">
                          <p><?php echo substr($row->isi_buku_tamu,0,200) ;?></p>

                          <div class="testimonial-meta brand-color">
                             <?php echo $row->nm_pengirim ;?>
                              <span><?php echo $row->tgl_kirim ;?></span> 
                          </div>
                      </div>
                    </div>
              <?php } ?>      
                    
                    <div class="item active">
                      <div class="avatar">
                          <img src="<?php echo base_url();?>assets/images/guru.png" alt="Customer Thumb" height="50" width="50">
                      </div>
                      <div class="content">
                          <p><?php echo isset($row->isi_buku_tamu)?$row->isi_buku_tamu:'' ;?></p>

                          <div class="testimonial-meta brand-color">
                              <?php echo isset($row->nm_pengirim)?$row->nm_pengirim:'' ;?>,
                            <span><?php echo isset($row->tgl_kirim)?$row->tgl_kirim:'' ;?></span>
                          </div>
                      </div>
                    </div>

                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#client-testimonial" role="button" data-slide="prev">
                    <span class="material-icons" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#client-testimonial" role="button" data-slide="next">
                    <span class="material-icons" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              </div>
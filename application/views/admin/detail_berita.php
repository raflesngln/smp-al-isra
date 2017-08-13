<div id="page_content_inner">
 <?php 
	foreach($detail as $row){
	?>
        <div class="uk-grid blog_article" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-card">
                    <div class="md-card-content large-padding">
                    <p><a href="<?php echo base_url();?>Admin/list_berita">Back To Article</a></p>
                      <div class="uk-article">
                            <h1 class="uk-article-title"><?=$row->judul_berita;?></h1>
                            <p class="uk-article-meta">
                        Written  on <?php echo date('D,d M Y',strtotime($row->tgl_berita));?></p>
                            <hr class="uk-article-divider">
                            <p>
                        <figure class="uk-thumbnail uk-thumbnail-large thumbnail_left">
                                    <img src="<?php echo base_url();?>assets/images/news/<?=$row->gambar;?>" alt="">
                                    <figcaption class="uk-thumbnail-caption"><?=$row->tgl_berita;?></figcaption>
                        </figure>
                      <?=$row->isi_berita;?></div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <?php } ?>

    </div>
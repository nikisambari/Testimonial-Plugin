

<?php
        global $wpdb;
        $table = $wpdb->prefix . 'testimonial';
        $selected_color = get_option('testimonial_color', 'default'); 
        $selected_bg = get_option('testimonial_bg_color', 'default'); 
      

        $display_profile = get_option('display_profile', '1');  
        $display_username = get_option('display_username', '1');   
        $display_designation = get_option('display_designation', '1');   
        $display_social_media= get_option('display_social_media','1');
        $display_facebook_link = get_option('display_facebook_link','1'); 
        $display_linkedin_link = get_option('display_linkedin_link','1');
        $display_instagram_link = get_option('display_instagram_link','1');    
        $display_rating = get_option('display_rating','1');    
        $testimonial_count = get_option('testimonial_count','5');
       
        $query= "SELECT * FROM $table ORDER BY ID DESC LIMIT $testimonial_count";
        $testimonials = $wpdb->get_results($query);



?>


<div class="gallery3-outerdiv">
 <div class="gallery3-innerdiv">
      <!-- div1 -->
      <?php 
      $i=0;
      if (!empty($testimonials)) {
        foreach($testimonials as $testimonial) {
            $i++;
            ?>
       
        <div class="gallery-3-testimonial-<?php echo $i; ?> testimonial-eachdiv-3">
                    <div class="gallery-3-userdetails" style="background: <?php echo ($selected_bg === 'default') ? '#3498db' : $selected_bg; ?>">
                          <?php if($display_profile==='1'){ ?>
                                <div class="gallery-3-imgbox">
                                    <img src="<?php echo esc_url($testimonial->profile_photo);?>" alt="">
                                </div> 
                          <?php } ?>
                          <?php if ($display_username === '1') { ?> 
                                <div  class="gallery-3-detbox">
                                    <p style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>" class="name"><?php echo "".esc_html($testimonial->username);?></p>
                                    <?php if ($display_designation === '1') {?>
                                        <p style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>" class="designation"><?php echo "".esc_html($testimonial->designation);?></p>
                                    <?php } ?>

                                    <?php
                           
                           if ($display_social_media === '1') {
                             ?>  
                           <div class="gallery-3-social-media-handles">
                             <?php 
                             if($display_facebook_link==='1'){
                             if($testimonial->facebook_link!=""){
                               ?>
                                 <a style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>;"  class="fgl" target="_blank"  href="<?php echo esc_url($testimonial->facebook_link);?>"><i class="fab fa-facebook" id="fb" aria-hidden="true"></i></a>
                             <?php } }
                               if($display_linkedin_link==='1'){
                               if($testimonial->linkedin_link!="") { ?>
                                   <a  style=" color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>;" class="fgl" target="_blank"  href="<?php echo esc_url($testimonial->linkedin_link);?>"><i class="fab fa-linkedin" id="linkedin" aria-hidden="true"></i></a>
                             <?php } }
                             if($display_instagram_link==='1'){
                             if($testimonial->instagram_link!="") { ?>
                                   <a  style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>;" class="fgl" target="_blank"  href="<?php echo esc_url($testimonial->instagram_link);?>"><i  class="fab fa-instagram" id="instagram" aria-hidden="true"></i></a>
                             <?php }  }?>
                          </div>
 
                        <?php } ?>
                    </div>
                   <?php } ?>
                          
                        </div>
                        <div  class="gallery-3-review">
                        <p style="color: <?php echo ($selected_bg === 'default') ? '#3498db' : $selected_bg; ?>">“ <?php echo "".esc_html($testimonial->review);?>”</p>
                        <?php if($testimonial->rating !=0 && $display_rating==='1'){ ?>
                            <div class="star-rating" style="color: <?php echo ($selected_bg === 'default') ? '#3498db' : $selected_bg; ?>">
                        <?php 
                        for ($r = 1; $r <= 5; $r++) {
                          if ($r <= $testimonial->rating) {
                             
                              echo '<i class="fas fa-star"></i>';
                          } elseif ($r - 0.5 <= $testimonial->rating) {
                             
                              echo '<i class="fas fa-star-half-alt"></i>';
                          } else {
                            
                              echo '<i class="far fa-star"></i>';
                          }
                        }  
                       ?>
                      </div> 
                      <?php } ?>
                      </div>
                      
                      
                        <div class="gallery-3-quote"><h1 style="color: <?php echo ($selected_bg === 'default') ? '#3498db' : $selected_bg; ?>">“</h1></div>





               
                </div>

      <?php         
        }
    }  ?>


    </div>
   
  </div>

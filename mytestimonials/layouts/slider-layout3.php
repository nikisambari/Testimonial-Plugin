
<section class="view-testimonials">
<div class="slider-3-testimonial-page mySwiper">
    <div class="swiper-wrapper">
        <?php
        global $wpdb;
        $table = $wpdb->prefix . 'testimonial';
        $selected_color = get_option('testimonial_color', 'default'); 
        $selected_bg = get_option('testimonial_bg_color', 'default'); 
        $selected_perview = get_option('testimonial_perview', '3'); 
      

        $display_profile = get_option('display_profile', '1');  
        $display_username = get_option('display_username', '1');   
        $display_designation = get_option('display_designation', '1');   
        $display_social_media= get_option('display_social_media','1');
        $display_facebook_link = get_option('display_facebook_link','1'); 
        $display_linkedin_link = get_option('display_linkedin_link','1');
        $display_instagram_link = get_option('display_instagram_link','1');    
        $display_rating = get_option('display_rating','1');    
       
        $testimonials = $wpdb->get_results("SELECT * FROM $table");

        if (!empty($testimonials)) {
            foreach($testimonials as $testimonial) {
                ?>
              <div class="swiper-slide">
              <div class="testimonial-slider-3" style="background: linear-gradient(0deg, rgba(200, 200, 200, 0.46) 0%, rgba(200, 200, 200, 0.46) 100%), <?php echo ($selected_bg === 'default') ? '#F1F1F7' : $selected_bg?>;">
                        <div class="ribbon-1" style="background:<?php echo ($selected_bg === 'default') ? '#F1F1F7' : $selected_bg?>"><div class="rib-content"><h1 style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>">“</h1></div></div>
                        <div class="slider3-user-box">
                            <?php if($display_profile==='1'){ ?> 
                                <div class="slider3-profile-box">
                                     <img src="<?php echo esc_url($testimonial->profile_photo);?>" style="border:3px solid <?php echo ($selected_color === 'default') ? '#F1F1F7' : $selected_color; ?>" alt="ProfilePhoto">
                                </div>
                            <?php } ?>
                            <div class="slider3-user-details"> 
                            <?php if ($display_username === '1') { ?> 
                                <p class="name" style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>"><?php echo "".esc_html($testimonial->username);?></p> 

                                <?php if ($display_designation === '1') {?> 
                                <p style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>" class="designation"><?php echo "".esc_html($testimonial->designation);?></p>  
                                <?php } } ?>  
                                <?php
                                
                                if ($display_social_media === '1') {
                                    ?>  
                                <div class="slider-3-social-media-handles">
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
                        </div>

                      
                            <div class="slider3-review">
                               <div class="review-content">
                                    <p style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>">"<?php echo " ".esc_html($testimonial->review)." ";?>"</p> 
                                    <?php if($testimonial->rating !=0 && $display_rating==='1'){ ?>
                            <div class="star-rating" style="color: <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>">
                        <?php 
                        for ($i = 1; $i <= 5; $i++) {
                          if ($i <= $testimonial->rating) {
                          
                              echo '<i class="fas fa-star"></i>';
                          } elseif ($i - 0.5 <= $testimonial->rating) {
                             
                              echo '<i class="fas fa-star-half-alt"></i>';
                          } else {
                           
                              echo '<i class="far fa-star"></i>';
                          }
                        }  
                       ?>
                      </div> 
                      <?php } ?>
                               </div>
                            </div>
                       
                        
                    </div>
               </div>
              <?php
            }
        }
        ?>
        
    </div>
  
    <div id="nav-btn" class="swiper-button-next nav-btn"></div>
    <div id="nav-btn" class="swiper-button-prev nav-btn"></div>
    <div class="swiper-pagination"></div>
    
    
</div>

</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<?php include('slider-script.php'); ?>
<style>
    .ribbon-1:before {
  
    border-bottom: 6px solid <?php echo ($selected_bg === 'default') ? '#F1F1F7' : $selected_bg?>;
    border-right: 6px solid transparent;
 
  }
  .ribbon-1:after {
    border-left: 30px solid <?php echo ($selected_bg === 'default') ? '#F1F1F7' : $selected_bg?>;
    border-right: 30px solid <?php echo ($selected_bg === 'default') ? '#F1F1F7' : $selected_bg?>;
  }
  </style>
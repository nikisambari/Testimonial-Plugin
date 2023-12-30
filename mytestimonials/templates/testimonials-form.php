<?php 
 $display_profile = get_option('display_profile', '1');  
 $display_designation = get_option('display_designation', '1');   
 $display_social_media= get_option('display_social_media','1');
 $display_facebook_link = get_option('display_facebook_link','1'); 
 $display_linkedin_link = get_option('display_linkedin_link','1');
 $display_instagram_link = get_option('display_instagram_link','1');    
 $display_rating = get_option('display_rating','1');    

if(isset($_POST['submit_testimonial'])){

    global $wpdb; 
    $table = $wpdb->prefix.'testimonial';
    $photo_url = '';
    $facebook_link='';
    $instagram_link='';
    $linkedin_link='';
    $designation='';
    $rating='';
    $username =  sanitize_text_field($_POST['username']);
    if($display_designation ==='1') $designation =  sanitize_textarea_field($_POST['designation']);
    $review =  sanitize_textarea_field($_POST['review']);
    if($display_facebook_link ==='1') $facebook_link =   sanitize_textarea_field($_POST['facebook_link']);
    
    if($display_linkedin_link ==='1')  $linkedin_link =   sanitize_textarea_field($_POST['linkedin_link']);
  
    if($display_instagram_link ==='1') $instagram_link =  sanitize_textarea_field($_POST['instagram_link']);
    if($display_rating ==='1') $rating = sanitize_text_field($_POST['rating']);
   
    if($display_profile==='1'){
           

            if (isset($_FILES['user_img']) && $_FILES['user_img']['error'] === 0) {
                $file_tmp = $_FILES['user_img']['tmp_name'];

            
                $file_name = $_FILES['user_img']['name'];

            
                $upload_dir = wp_upload_dir();
                $file_path = $upload_dir['path'] . '/' . wp_unique_filename($upload_dir['path'], $file_name);

                if (move_uploaded_file($file_tmp, $file_path)) {
                    $photo_url = $upload_dir['url'] . '/' . basename($file_path);
                  

                } else {
                
                    echo 'Error in File Upload.';
                }
            }
         
    }
  
    $data= array(
        'username' => $username,
        'designation'=>$designation,
        'review'=>$review,
        'profile_photo' => $photo_url,
        'facebook_link' => $facebook_link,
        'linkedin_link' => $linkedin_link,
        'instagram_link'=> $instagram_link,
        'rating'=> $rating,
    
    );
    
    $wpdb->insert($table, $data);
    if ($wpdb->last_error) {
        echo '<script>alert("Unable to Add Testimonial' . $wpdb->last_error.'");</script>';
    } else {
        echo '<script>alert("Feedback Submitted");</script>';
    }
}

$selected_color = get_option('testimonial_color', 'default'); // Get the selected color
$selected_bg = get_option('testimonial_bg_color', 'default'); // Get the selected color



?>
<div class="main-div">
<div class="review-form">
<form action="<?php get_the_permalink(); ?>" id="testimonial-form" method="post" enctype="multipart/form-data">
  <?php if($display_profile==='1'){ ?>  
    <div class="textbox-upload">
    <label class="upload"  style="background: <?php echo ($selected_bg === 'default') ? '#F1F1F7' : $selected_bg; ?>; color : <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>" for="user_img">Upload Your Photo</label>
    <input type="file"  name="user_img" id="user_img"><br>
    </div> 
  <?php } ?>
    <div class="textbox">
        <input type="text" placeholder="Name" name="username">
    </div>
    <?php if($display_designation==='1'){ ?>  
    <div class="textbox">
        <input type="text" placeholder="Designation" name="designation">
    </div>
    <?php } ?>
    <div class="textbox">
         <textarea name="review" placeholder="Write your Thoughts" rows="4" required></textarea>
    </div>
    <?php if($display_facebook_link==='1'){ ?> 
    <div class="textbox">
        <input type="text" placeholder="Facebook Link" name="facebook_link">
    </div>
    <?php }
    if($display_linkedin_link==='1'){ ?>
    <div class="textbox">
        <input type="text" placeholder="Linkedin Link" name="linkedin_link">
    </div>
    <?php }
    if($display_instagram_link==='1'){ ?>
 
    <div class="textbox">
        <input type="text" placeholder="Instagram Link" name="instagram_link">
    </div>
    <?php } ?>
    <?php   if($display_rating ==='1'){  ?>
    <!-- Rating -->
    <div class="rating">
        <p>Rate Us</p>
        <span class="rating_stars rating_0">
            <span class='s' data-low='0.5' data-high='1'><i class="fa fa-star-o"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star"></i></span>
            <span class='s' data-low='1.5' data-high='2'><i class="fa fa-star-o"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star"></i></span>
            <span class='s' data-low='2.5' data-high='3'><i class="fa fa-star-o"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star"></i></span>
            <span class='s' data-low='3.5' data-high='4'><i class="fa fa-star-o"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star"></i></span>
            <span class='s' data-low='4.5' data-high='5'><i class="fa fa-star-o"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star"></i></span>
                                    
            <span class='r r0_5' data-rating='1' data-value='0.5'></span>
            <span class='r r1' data-rating='1' data-value='1'></span>
            <span class='r r1_5' data-rating='15' data-value='1.5'></span>
            <span class='r r2' data-rating='2' data-value='2'></span>
            <span class='r r2_5' data-rating='25' data-value='2.5'></span>
            <span class='r r3' data-rating='3' data-value='3'></span>
            <span class='r r3_5' data-rating='35' data-value='3.5'></span>
            <span class='r r4' data-rating='4' data-value='4'></span>
            <span class='r r4_5' data-rating='45' data-value='4.5'></span>
            <span class='r r5' data-rating='5' data-value='5'></span>
        </span>
    </div>
 
    <input type="hidden" name="rating" id="rating_val" value="0" />


    <?php }?>


    <input class="s-button" type="submit" name="submit_testimonial" value="Submit"    style="background: <?php echo ($selected_bg === 'default') ? '#F1F1F7' : $selected_bg; ?>; color : <?php echo ($selected_color === 'default') ? '#3498db' : $selected_color; ?>">
</form>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</div>
</div>
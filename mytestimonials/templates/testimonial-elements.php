<div class="add-testimonial-elements">
    <h2>Testimonial Element Settings</h2>
    
    <?php 
       
    $display_profile = get_option('display_profile', '1');  
    $display_username = get_option('display_username', '1');  
    $display_designation = get_option('display_designation', '1');   
    $display_social_media= get_option('display_social_media','1');
    $display_facebook_link = get_option('display_facebook_link','1'); 
    $display_linkedin_link = get_option('display_linkedin_link','1');
    $display_instagram_link = get_option('display_instagram_link','1');
    $display_rating = get_option('display_rating','1');
 

    ?>

    <form method="post">
        <input type="hidden" name="form_identifier" value="testimonial-elements">
        <?php settings_fields('testimonial-element-settings-group'); ?>
        <?php do_settings_sections('testimonial-element-settings-group'); ?>
        <table class="form-table">
        <tr valign="top">
                <th scope="row">Show Profile</th>
                <td>
                    <label class="toggle-switch">
                        <input type="checkbox" name="display_profile" id="toggleProfile" <?php checked(get_option('display_profile', '1'), '1'); ?>>
                        <span class="slider"></span>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Show username</th>
                <td>
                    <label class="toggle-switch">
                        <input type="checkbox" name="display_username" id="toggleUsername" <?php checked(get_option('display_username', '1'), '1'); ?>>
                        <span class="slider"></span>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Show Designation</th>
                <td>
                    <label class="toggle-switch">
                        <input type="checkbox" name="display_designation" id="toggleDesignation" <?php checked(get_option('display_designation', '1'), '1'); ?>>
                        <span class="slider"></span>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Show Ratings</th>
                <td>
                    <label class="toggle-switch">
                        <input type="checkbox" name="display_rating" id="toggleRating" <?php checked(get_option('display_rating', '1'), '1'); ?>>
                        <span class="slider"></span>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Show Social Media Links</th>
                <td>
                    <label class="toggle-switch">
                        <input type="checkbox" name="display_social_media" id="toggleSocial" <?php checked(get_option('display_social_media', '1'), '1'); ?>>
                        <span class="slider"></span>
                    </label>
                    <table id="social-links-table-inner" class="social-links-table-inner">
                    <tr>
                        <th>Show Facebook</th>
                        <td>
                            <label class="toggle-switch">
                                <input type="checkbox" name="display_facebook_link" id="toggleFacebook" <?php checked(get_option('display_facebook_link', '1'), '1'); ?>>
                                <span class="slider"></span>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th>Show Linkedin</th>
                        <td>
                            <label class="toggle-switch">
                                <input type="checkbox" name="display_linkedin_link" id="toggleLinkedin" <?php checked(get_option('display_linkedin_link', '1'), '1'); ?>>
                                <span class="slider"></span>
                            </label>
                        </td>
                    </tr>
                
                    <tr>
                        <th>Show Instagram</th>
                        <td>
                            <label class="toggle-switch">
                                <input type="checkbox" name="display_instagram_link" id="toggleInstagram" <?php checked(get_option('display_instagram_link', '1'), '1'); ?>>
                                <span class="slider"></span>
                            </label>
                        </td>
                    </tr>
                
                    </table>
                  
                    
                </td>
            </tr>
        </table>
             
        <?php submit_button('Save Changes', 'primary', 'save_elements_button'); ?>
    </form>
</div>

<script>
     var innerTable = document.getElementById('social-links-table-inner');
           document.addEventListener('DOMContentLoaded', function() {
        function toggleInnerTableVisibility() {
            var isChecked = document.getElementById('toggleSocial').checked; // Check the toggle state
            var linkedinToggle = document.getElementById('toggleLinkedin').checked;
            var instagramToggle = document.getElementById('toggleInstagram').checked;
            var facebookToggle = document.getElementById('toggleFacebook').checked;
          

            if (isChecked) {
                innerTable.style.display = 'block'; 
            } else {
                innerTable.style.display = 'none'; 
              }
        }

        toggleInnerTableVisibility();

        document.getElementById('toggleSocial').addEventListener('change', function() {
            toggleInnerTableVisibility(); 
        });




        function updateSocialMediaToggle() {
            var linkedinToggle = document.getElementById('toggleLinkedin').checked;
            var instagramToggle = document.getElementById('toggleInstagram').checked;
            var facebookToggle = document.getElementById('toggleFacebook').checked;
            var socialMediaToggle = document.getElementById('toggleSocial');
          
            if (!linkedinToggle && !instagramToggle && !facebookToggle) {
                  socialMediaToggle.checked = false;
                innerTable.style.display = 'none'; 
                

            }
            if (socialMediaToggle.checked){
                if(linkedinToggle || instagramToggle || facebookToggle) {
                 socialMediaToggle.checked = true;
                

            }
        }
         
        }

      
        updateSocialMediaToggle();

         document.getElementById('toggleLinkedin').addEventListener('change', function() {
            updateSocialMediaToggle();
        });

        document.getElementById('toggleInstagram').addEventListener('change', function() {
            updateSocialMediaToggle();
        });

        document.getElementById('toggleFacebook').addEventListener('change', function() {
            updateSocialMediaToggle();
        });
    
    });
</script>

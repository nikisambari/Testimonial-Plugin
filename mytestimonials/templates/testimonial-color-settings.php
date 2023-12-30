<div class="add-testimonial-color">
        <h2>Testimonial Color Settings</h2>
             <form method="post">
             <input type="hidden" name="form_identifier" value="testimonial-color-settings">
   
            <?php settings_fields('testimonial-color-settings-group'); ?>
            <?php do_settings_sections('testimonial-color-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Select Text Color</th>
                    <td>
                        <input type="text" name="testimonial_color" class="testimonial-color" value="<?php echo esc_attr(get_option('testimonial_color', '#3498db')); ?>" />
                        <div id="color-picker-container"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Select Background Color</th>
                    <td>
                        <input type="text" name="testimonial_bg_color" class="testimonial-bg-color" value="<?php echo esc_attr(get_option('testimonial_bg_color', '#F1F1F7')); ?>" />
                        <div id="color-picker-container-bg-color"></div>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Changes', 'primary', 'save_color_button'); ?>
            
        </form>
        </div>
       
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
    <script>
        jQuery(document).ready(function($) {
          
            $('.testimonial-color').spectrum({
               
                showInput: true,
                showInitial: true,
                preferredFormat: "rgba", 
                showAlpha: true, 
      
                change: function(color) {
                    $('#color-picker-container').css('background-color', color.toHexString());
                }
            });

            
            $('.testimonial-bg-color').spectrum({
                
                showInput: true,
                showInitial: true,
                preferredFormat: "rgba", 
                showAlpha: true, 
      
               
                change: function(color) {
                    $('#color-picker-container-bg-color').css('background-color', color.toHexString());
                }
            });
        });
    </script>
    
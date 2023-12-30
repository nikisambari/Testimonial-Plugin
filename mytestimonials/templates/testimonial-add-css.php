<div class="add-custom-css">
        <h2>Additional CSS</h2>
<form method="post">
        <input type="hidden" name="form_identifier" value="testimonial-add-css">
        <?php settings_fields('testimonial-add-css-group'); ?>
        <?php do_settings_sections('testimonial-add-css-group'); ?>
        <div class="add-css-textbox">
         <textarea style="width: 100%;height:169px;" name="testimonial_add_css" placeholder="Write Custom CSS" rows="4" cols="40"><?php echo esc_textarea(get_option('testimonial_add_css', '')); ?></textarea>
        </div>
       
       
       <div class="testimonial-add-css-buttons" style="padding-top:20px;">
               <button type="submit" name="save_css_button" class="button button-primary">Add</button>
               <button type="submit" name="undo_css_button" class="button button-primary">Undo</button>
               <button type="submit" name="reset_css_button" style="background:#d11a2a;border:none;outline:none" class="button button-primary">Reset</button>

        </div>
    </form>
</div>
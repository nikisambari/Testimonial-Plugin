<div class="add-testimonial-style">
<h2>Testimonial Layout Settings</h2>
        <?php
        $selected_layout = get_option('testimonial_layout', 'slider'); 
        $selected_perview = get_option('testimonial_perview', '3');
    
    
        $testimonial_autoplay = get_option('testimonial_autoplay', '1');  
        $testimonial_navigation = get_option('testimonial_navigation', '1');  
    
        $testimonial_coverflow = get_option('testimonial_coverflow', '1');  
        $testimonial_count  = get_option('testimonial_count', '5');
        //$testimonial_view_more = get_option('testimonial_view_more', '1');  

        ?>
        <form method="post">
        <input type="hidden" name="form_identifier" value="testimonial-style">  
        <?php settings_fields('testimonial-layout-settings-group'); ?>
            <?php do_settings_sections('testimonial-layout-settings-group'); ?>
           <table class="form-table">
                <tr valign="top">
                    <th scope="row">Select Testimonial Layout:</th>
                    <td>
                        <select id="testimonial_layout" name="testimonial_layout">
                            <option data-img="layout1.png" value="slider" <?php selected($selected_layout, 'slider'); ?>>Slider Layout 1</option>
                            <option data-img="layout2.png" value="sliderlayout2" <?php selected($selected_layout, 'sliderlayout2'); ?>>Slider Layout 2</option>
                            <option data-img="layout1.png"  value="gallery" <?php selected($selected_layout, 'gallery'); ?>>Gallery Layout 1</option>
                            <option data-img="layout1.png" value="gallerylayout2" <?php selected($selected_layout, 'gallerylayout2'); ?>>Gallery Layout 2</option>
                            <option data-img="layout1.png" value="sliderlayout3" <?php selected($selected_layout, 'sliderlayout3'); ?>>Slider Layout 3</option>
                            <option data-img="layout1.png" value="sliderlayout4" <?php selected($selected_layout, 'sliderlayout4'); ?>>Slider Layout 4</option>
                            <option data-img="layout1.png" value="gallerylayout3" <?php selected($selected_layout, 'gallerylayout3'); ?>>Gallery Layout 3</option>
                         
                        </select>
                        <table id="preview-table" class="preview-table">
                             <tr>
                                <td>
                                    <div class="preview" >
                                        <p>Preview</p>
                                        <img id="layout-preview" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" src="" alt="PreviewLayout">
                                    </div>
                                </td>
                           </tr>
                        </table>

                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Number of Testimonials</th>
                    <td>
                        <input type="text" name="testimonial_count" value="<?php echo esc_textarea(get_option('testimonial_count', '5')); ?>">
                    </td>
                </tr>
                <tr id="slider-settings-1" valign="top">
                    <th scope="row" style="width:100%">Slides Per View:</th>
                    <td>
                        <select name="testimonial_perview">
                            <option value="1" <?php selected($selected_perview, '1'); ?>>1</option>
                            <option value="2" <?php selected($selected_perview, '2'); ?>>2</option>
                            <option value="3" <?php selected($selected_perview, '3'); ?>>3</option>
                        </select>
                    </td>
                </tr>
                <tr id="slider-settings-2" valign="top">
                    <th scope="row">Slides Autoplay</th>
                    <td>
                        <label class="toggle-switch">
                                <input type="checkbox" name="testimonial_autoplay" id="toggleAutoplay" <?php checked(get_option('testimonial_autoplay', '1'), '1'); ?>>
                                <span class="slider"></span>
                        </label>
                    </td>
                </tr>
                <tr id="slider-settings-3" valign="top">
                    <th scope="row">Show Navigation</th>
                    <td>
                        <label class="toggle-switch">
                                <input type="checkbox" name="testimonial_navigation" id="toggleNavigation" <?php checked(get_option('testimonial_navigation', '1'), '1'); ?>>
                                <span class="slider"></span>
                        </label>
                    </td>
                </tr>
                <tr id="slider-settings-4" valign="top">
                    <th scope="row">Show Coverflow</th>
                    <td>
                        <label class="toggle-switch">
                                <input type="checkbox" name="testimonial_coverflow" id="toggleCoverflow" <?php checked(get_option('testimonial_coverflow', '1'), '1'); ?>>
                                <span class="slider"></span>
                        </label>
                    </td>
                </tr>
                <!-- <tr id="view-more-setting" valign="top">
                    <th scope="row">Show View More</th>
                    <td>
                        <label class="toggle-switch">
                                <input type="checkbox" name="testimonial_view_more" id="toggleViewMore" <?php checked(get_option('testimonial_view_more', '1'), '1'); ?>>
                                <span class="slider"></span>
                        </label>
                    </td>
                </tr> -->
            </table>
            <?php submit_button('Save Changes', 'primary', 'save_style_button');

             ?>
            
        </form>
       
    </div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const selectElement = document.getElementById("testimonial_layout");
    const hideSliderSettings1 = document.getElementById("slider-settings-1");
    const hideSliderSettings2 = document.getElementById("slider-settings-2");
    const hideSliderSettings3 = document.getElementById("slider-settings-3");
    const hideSliderSettings4 = document.getElementById("slider-settings-4");
    const layoutPreview = document.getElementById("layout-preview");

   
    function hideDiv() {
        hideSliderSettings1.style.display = "none";
        hideSliderSettings2.style.display = "none";
        hideSliderSettings3.style.display = "none";
        hideSliderSettings4.style.display = "none";
    }

   
    function showDiv() {
        hideSliderSettings1.style.display = "block";
        hideSliderSettings2.style.display = "block";
        hideSliderSettings3.style.display = "block";    
        hideSliderSettings4.style.display = "block"; 

    }
    const imageArray = {
            slider: "layout1.png",
            sliderlayout2: "layout2.png",
            gallery: "gallery1.png",
            gallerylayout2:"gallery2.png",
            sliderlayout3:"layout3.png",
            sliderlayout4:"layout4.png",
            gallerylayout3:"gallery3.png"
        };
        function updateImage() {
            const selectedValue = selectElement.value;
            const imgFilename = imageArray[selectedValue];
            const imgSrc = "<?php echo plugins_url('assets/"+ imgFilename +"', dirname(__FILE__)); ?>";
            console.log(imgSrc)
            layoutPreview.src = imgSrc;
        }


    if (selectElement.value === "gallery" || selectElement.value === "gallerylayout2" || selectElement.value === "gallerylayout3") {
        hideDiv();
    } else {
        showDiv();

    }

   
    selectElement.addEventListener("change", function () {
            updateImage();
      if (selectElement.value === "gallery" || selectElement.value === "gallerylayout2" || selectElement.value === "gallerylayout3" ) {
            hideDiv();
        } else {
            showDiv();
          
        }
    });
    selectElement.dispatchEvent(new Event("change"));
});


</script>

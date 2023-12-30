<?php 
  $testimonial_navigation = get_option('testimonial_navigation','1');    
  $testimonial_coverflow = get_option('testimonial_coverflow','1');    
  $testimonial_autoplay = get_option('testimonial_autoplay','1');
  $testimonial_count = get_option('testimonial_count','5');

  if($testimonial_count<=3){
    $centerSlide='centeredSlides:false,';
  }
  else $centerSlide= 'centeredSlides:true,';
  if ($testimonial_navigation === '1') {
      $swiperNavigation = '
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      ';
  } else {
      $swiperNavigation = ''; 
      echo '<style> .testimonial-page  .nav-btn {
                       display: none;
                    }
                    .slider-3-testimonial-page  .nav-btn {
                      display: none;
                   }
                   .slider-4-testimonial-page  .nav-btn {
                    display: none;
                 }
            
             
            </style>';
  }

 
  
if ($testimonial_coverflow === '1') {
  $coverflow = '
  effect: "coverflow",
  coverflowEffect: {
      rotate: 20,
      stretch: 0,
      depth: 250,
      modifier: 1,
      slideShadows: false,
  },
  ';
  echo '<style> .swiper-slide {
    transition: opacity 0.5s ease-in-out; 
     }

  .swiper-slide:not(.swiper-slide-active) {
    opacity: 0.4; 
  } 
  .slider-4-testimonial-page .swiper-slide-active{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
} </style>';
}
else $coverflow='';



  ?>

  
<script>
  document.addEventListener("DOMContentLoaded", function () {   
  const swiper = new Swiper(".mySwiper", {
    slideActiveClass:	'swiper-slide-active',
    loopFillGroupWithBlank: true,
    <?php 
      echo $centerSlide;
    ?>
     grabCursor: true,
     freeMode: true,
    loop:true,
    keyboard: {
      enabled: true
    },
    
    slidesPerView: 3, // Adjust this value based on your design
    spaceBetween: 20, // Adjust the spacing between slides
    centeredSlidesOffset: 0,
 
  
   <?php if($testimonial_autoplay==='1'){ ?>
    autoplay: {

      delay:3000,
      disableOnInteraction: true
    },
 <?php } ?>
   <?php echo $swiperNavigation; ?>
   <?php echo $coverflow; ?>
    
    breakpoints: {
        0:{
          slidesPerView: 1,
          spaceBetween: 60
        },
      800: {
         slidesPerView: 1,
         spaceBetween: 50
      },
     1200: {
        slidesPerView:<?php  echo ($selected_perview === '3') ? '3' : $selected_perview; ?>,
        spaceBetween: 50
     }
    
      // 1400: {
      //   slidesPerView: 4,
      //   spaceBetween: 30
      // }
    }
  });
});
console.log("Slide Width:", document.querySelector(".swiper-slide").offsetWidth);
console.log("Container Width:", document.querySelector(".mySwiper").offsetWidth);

</script>


// const swiper = new Swiper(".mySwiper", {
//     // Optional parameters
//     centeredSlides: true,
//     slidesPerView: 1,
//     grabCursor: true,
//     freeMode: false,
//     loop: true,
//     mousewheel: false,
//     keyboard: {
//       enabled: true
//     },
  
//     // Enabled autoplay mode
//     autoplay: {

//       delay:3000,
//       disableOnInteraction: false
//     },
  
//     // If we need pagination
//     pagination: {
//       el: ".swiper-pagination",
//       dynamicBullets: false,
//       clickable: true
//     },
  
    
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev"
//     },
  
    
//     breakpoints: {
//         0:{

//             slidesPerView: 1,
//             spaceBetween: 60
//         },
//       640: {
//         slidesPerView: 1,
//         spaceBetween: 50
//       },
//      1200: {
//         slidesPerView: 3,
//         spaceBetween: 30
//       },
//       // 1400: {
//       //   slidesPerView: 4,
//       //   spaceBetween: 30
//       // }
//     }
//   });
  


jQuery(document).ready(function($) {
    $('.rating_stars span.r').hover(function() {
                // get hovered value
                var rating = $(this).data('rating');
                var value = $(this).data('value');
                $(this).parent().attr('class', '').addClass('rating_stars').addClass('rating_'+rating);
                highlight_star(value);
            }, function() {
                // get hidden field value
                var rating = $("#rating").val();
                var value = $("#rating_val").val();
                $(this).parent().attr('class', '').addClass('rating_stars').addClass('rating_'+rating);
                highlight_star(value);
            }).click(function() {
                // Set hidden field value
                var value = $(this).data('value');
                $("#rating_val").val(value);
    
                var rating = $(this).data('rating');
                $("#rating").val(rating);
                
                highlight_star(value);
            });
            
            var highlight_star = function(rating) {
                $('.rating_stars span.s').each(function() {
                    var low = $(this).data('low');
                    var high = $(this).data('high');
                    $(this).removeClass('active-high').removeClass('active-low');
                    if (rating >= high) $(this).addClass('active-high');
                    else if (rating == low) $(this).addClass('active-low');
                });
            }
    });
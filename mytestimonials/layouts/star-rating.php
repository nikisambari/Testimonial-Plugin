<div class="star-rating">
    <div class="stars">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $testimonial->rating) {
                echo '<i class="fas fa-star"></i>';
            } elseif ($i - 0.5 <= $testimonial->rating) {
                echo '<i class="fas fa-star-half-alt half"></i>'; // Apply 'half' class for half-filled stars
            } else {
                echo '<i class="far fa-star"></i>';
            }
        }
        ?>
    </div>
</div>
<!doctype html>
    
<div class="radio">
Online Canlı Radyo Türkiye'de yayın yapan radyoları bir arada toplamıştır. Sade ve kullanışlı tasarımıyla herkesin rahatça radyo dinleyebilmesi için oluşturulmuş radyo dinleme sistemidir. Mobil Radyo Dinleme imkanıda sağlamaktadır.
</div>
</div>

<div id="main">
<div class="banner">

<!-- reklam alanı-->

</div>

<div class="radyolar">
<ul>
<?php if (have_posts()) : ?> 
<?php $usluer = new WP_Query("cat=1&showposts=50"); while($usluer->have_posts()) : $usluer->the_post();?>   
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>   
<?php endwhile; ?> 
<?php endif; ?>
</ul>
</div>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>
<div class="radio">
Online Canlı Radyo Türkiye'de yayın yapan radyoları bir arada toplamıştır. Sade ve kullanışlı tasarımıyla herkesin rahatça radyo dinleyebilmesi için oluşturulmuş radyo dinleme sistemidir. Mobil Radyo Dinleme imkanıda sağlamaktadır.
</div>
</div>

<div id="main">
<div class="banner">
<?php echo stripslashes(get_option('alt-reklam')); ?>
</div>

<div class="radyolar">
<ul>
<?php  while ( have_posts() ) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="listeleme-baslik" ><?php the_title(); ?></a></li>
<?php endwhile; ?>

</ul>
</div>
</div>
<?php get_footer(); ?>


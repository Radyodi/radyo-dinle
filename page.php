<?php get_header(); ?>

<div class="radio">

<h1><?php the_title(); ?></h1>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile;?> 

<?php endif;?> 

</div>

</div>



<div id="main">

<div class="banner">



<!-- reklam alanı -->



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


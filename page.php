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
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- radyo300 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-1985739583040662"
     data-ad-slot="6615780721"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><iframe src="http://www.onlinecanliradyo.gen.tr/social.html" scrolling="no" frameborder="0" align="center" height = "200" width = "300" name="test" border="0">
</iframe>
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

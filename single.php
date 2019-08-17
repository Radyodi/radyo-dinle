<!doctype html><html><head><meta charset="utf-8"><title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title><link href="/wp-content/themes/radyodi/style/style.css" type="text/css" rel="stylesheet"><link href="/wp-content/themes/radyodi/style/bootstrap.css" type="text/css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name = "viewport" content = "initial-scale = 1, user-scalable = no"><link rel="shortcut icon" href="/favicon.ico" /></head><body><div id="container"><div id="header"><a href="" title="radyodi.com"><img src="/wp-content/themes/radyodi/images/logo.png" alt="#" width="322" height="97" class="logo"></a><div class="right"><!-- reklam alanı--></div><div class="menu"><ul><li><a href="/">ANASAYFA</a></li><li class="page_item page-item-484"><a href="/hakkimizda">Hakkımızda</a></li><li class="page_item page-item-254"><a href="/iletisim">İletişim</a></li><li class="page_item page-item-259"><a href="/radyo-ekle">Radyo Ekle</a></li><li class="page_item page-item-329"><a href="/yardim">Yardım</a></li></ul><form action="http://www.google.com.tr" id="cse-search-box"><input type="hidden" name="cx" value="partner-pub-1985739583040662:5864422329" /><input type="hidden" name="ie" value="UTF-8" /><input type="text" name="q" class="text" size="15" placeholder="Google Özel Arama"  style="padding:0px 5px;"/><input type="submit" name="sa" value="ARA" style="float:left; margin:-35px 30px 0px -30px; float:right;" /></form></div><div class="reklam"><div class="reklam-ic"><!-- reklam alanı --></div></div><div class="kategoriler"><ul><li class="cat-item cat-item-1"><a href="/radyolar/online-canli-radyo" >Online Canlı Radyo</a></li>	<li class="cat-item cat-item-2"><a href="/radyolar/pop-radyolar" >Pop</a></li>	<li class="cat-item cat-item-3"><a href="/radyolar/arabesk-radyolar" >Arabesk</a></li>	<li class="cat-item cat-item-4"><a href="/radyolar/karisik-radyolar" >Karışık</a></li>	<li class="cat-item cat-item-5"><a href="/radyolar/spor-radyolari" >Spor</a></li>	<li class="cat-item cat-item-6"><a href="/radyolar/yabanci-radyolar" >Yabancı</a></li>	<li class="cat-item cat-item-7"><a href="/radyolar/turku-tsm" >Türkü TSM</a></li>	<li class="cat-item cat-item-8"><a href="/radyolar/dini-radyolar" >Dini</a></li>	<li class="cat-item cat-item-11"><a href="/radyolar/yerel" >Yerel</a></li>	<li class="cat-item cat-item-12"><a href="/radyolar/rock" >Rock</a></li>	<li class="cat-item cat-item-14"><a href="/radyolar/haber" >Haber</a></li>	<li class="cat-item cat-item-16"><a href="/radyolar/rap" >Rap</a></li>	<li class="cat-item cat-item-17"><a href="/radyolar/slow" >Slow</a></li></ul></div><div class="klavye"><img src="/images/favorilere.png" alt="#" width="340" height="74" class="Banner"></a></div>
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

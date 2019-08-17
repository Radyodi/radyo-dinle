<?php
add_theme_support('post-thumbnails');
?>
<?php function register_my_menus() {

  register_nav_menus(

    array(

      'header' => __( 'header' ),
      'footer-menu1' => __( 'footer Menu 1' ),
      'footer-menu2' => __( 'footer Menu 2' )
    )

  );

}

add_action( 'init', 'register_my_menus' );



function arphabet_widgets_init() {



	register_sidebar( array(

		'name' => 'sidebar',

		'id' => 'sidebar',

		'before_widget' => '',

		'after_widget' => '',

		'before_title' => '<h2>',

		'after_title' => '</h2>',

	) );

}

add_action( 'widgets_init', 'arphabet_widgets_init' );

//Karakter Sınırlama//

	function karakter($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '')

{

	$content = get_the_content($more_link_text, $stripteaser, $more_file);

	$content = apply_filters('the_content', $content);

	$content = str_replace(']]>', ']]>', $content);

	$content = strip_tags($content);

	$content = mb_substr( $content, 0, $max_char , 'UTF-8' );

	echo $content;

	}



function ozmovie_part( $args = "" )

{

    $defaults = array( 

	"before" => "".__( "".$bilgi."" ), 

	"after" => "", 

	"link_before" => "<span>", 

	"link_after" => "</span>", 

	"echo" => 1 );

	

    $r = wp_parse_args( $args, $defaults );

    extract( $r, EXTR_SKIP );

    global $page;

    global $numpages;

    global $multipage;

    global $more;

    global $pagenow;

    global $pages;

    $part_bir = get_option( "ozmovie_ilk" );

    $output = "";

    if ( $multipage )

    {

        $output .= $before;

        $i = 1;

        while ( $i < $numpages + 1 )

        {

            $part_content = $pages[$i - 1];

            $has_part_title = strpos( $part_content, "<!--baslik:" );

            if ( 0 === $has_part_title )

            {

                $end = strpos( $part_content, "-->" );

                $title = trim( str_replace( "<!--baslik:", "", substr( $part_content, 0, $end ) ) );

            }

            $output .= " ";

            if ( $i != $page || !$more && $page == 1 )

            {

                $output .= _wp_link_page( $i );

            }



            $output .= $link_before.$title.$link_after;

            if ( $i != $page || !$more && $page == 1 )

            {

                $output .= "</a>";

            }

            $i = $i + 1;

        }

        $output .= $after;

    }

    if ( $echo )

    {

        echo $output;

    }

    return $output;

}




//Admin Panel//



$temaadi = "Tema Ayarları";

$kisa = "nt";






$op_categories_obj = get_categories('hide_empty=1');

$op_categories = array();

foreach ($op_categories_obj as $op_cat) {

$op_categories[$op_cat->cat_ID] = $op_cat->category_nicename;

}

$categories_tmp = array_unshift($op_categories, "Kategori Seçiniz");







$options = array (

 


	

	

	

	










array( "name" => "ANASAYFA RADYO ALANI",

	"type" => "section"),

	

array( "type" => "open"),



array( "name" => "ANASAYFA RADYO ALANI",

	"desc" => "",

	"id" => "anasayfa-radyo-alani",

	"type" => "textarea", 

	"std" => ""),	


	

array( "type" => "close"),		









array( "name" => "REKLAM ALANLARI",

	"type" => "section"),

	

array( "type" => "open"),

array( "name" => "EN ÜST REKLAM ALANI",

	"desc" => "",

	"id" => "en-ust-reklam",

	"type" => "textarea", 

	"std" => ""),	

array( "name" => "ÜST REKLAM ALANI",

	"desc" => "",

	"id" => "ust-reklam",

	"type" => "textarea", 

	"std" => ""),	
	
array( "name" => "ALT REKLAM ALANI",

	"desc" => "",

	"id" => "alt-reklam",

	"type" => "textarea", 

	"std" => ""),	
	

	

array( "type" => "close"),	






	

		





	

array( "name" => "Sosyal Ağlar",

	"type" => "section"),

array( "type" => "open"),

 

	

array( "name" => "Facebook Linkiniz",

	"desc" => "Footer'daki Facebook ikon linki.",

	"id" => "facebook",

	"type" => "text",

	"std" => ""),

array( "name" => "Twitter Linkiniz",

	"desc" => "Footer'daki Twitter ikon linki.",

	"id" => "twitter",

	"type" => "text",

	"std" => ""),	

	

	

array( "type" => "close"),









	













);





function mytheme_add_admin() {

 

global $temaadi, $kisa, $options;

 

if ( $_GET['page'] == basename(__FILE__) ) {

 

	if ( 'save' == $_REQUEST['action'] ) {

 

		foreach ($options as $value) {

		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

 

foreach ($options as $value) {

	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

 

	header("Location: admin.php?page=functions.php&saved=true");

die;

 

} 

else if( 'reset' == $_REQUEST['action'] ) {

 

	foreach ($options as $value) {

		delete_option( $value['id'] ); }

 

	header("Location: admin.php?page=functions.php&reset=true");

die;

 

}

}

 

add_menu_page($temaadi, $temaadi, 'administrator', basename(__FILE__), 'mytheme_admin');

}



function mytheme_add_init() {



$file_dir=get_bloginfo('template_directory');

wp_enqueue_style("functions", $file_dir."/yonetim/functions.css", false, "1.0", "all");

wp_enqueue_script("rm_script", $file_dir."/yonetim/rm_script.js", false, "1.0");



}

function mytheme_admin() {

 

global $temaadi, $kisa, $options;

$i=0;

 

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Değişiklikler kaydedildi!</strong></p></div>';

if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Ayarlar sıfırlandı!</strong></p></div>';

 

?>

<div class="wrap rm_wrap">

<h2><?php echo $temaadi; ?> Yönetim Paneli</h2>

 

<div class="rm_opts">

<form method="post">

<?php foreach ($options as $value) {

switch ( $value['type'] ) {

 

case "open":

?>

 

<?php break;

 

case "close":

?>

 

</div>

</div>

<br />



 

<?php break;

 

case "title":

?>

<p>Aşağıdaki alanlardan ayarlarınızı yapabilirsiniz.</p>



 

<?php break;

 

case 'text':

?>



<div class="rm_input rm_text">

	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />

 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 

 </div>

<?php

break;

 

case 'textarea':

?>



<div class="rm_input rm_textarea">

	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>

 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 

 </div>

  

<?php

break;

 

case 'select':

?>



<div class="rm_input rm_select">

	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	

<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">

<?php foreach ($value['options'] as $option) { ?>

		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>

</select>



	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

</div>

<?php

break;

 

case "checkbox":

?>



<div class="rm_input rm_checkbox">

	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	

<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>

<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />





	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>

<?php break; 

case "section":



$i++;



?>



<div class="rm_section">

<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Değişiklikleri Kaydet" />

</span><div class="clearfix"></div></div>

<div class="rm_options">



 

<?php break;

 

}

}

?>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Sıfırla" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div> 
<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
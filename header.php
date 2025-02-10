<!doctype html>
<html lang="de">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>
		<?php 
		$title = (is_front_page())? bloginfo( 'name' ) : wp_title(' - ', true, 'right'); 
		echo $title; 
		?>
	</title>
	<?php get_template_parts( '/template-parts/header/head/'); ?>
	<?php 
	$GLOBALS['mb_posttype'] = get_post_type();
	$mb_bootstrap = (get_option("mb_libraries_bootstrap") == 'on')?"mb-bootstrap":"";
	$mb_subpage	  = (!is_front_page() && !is_single() && !is_archive())?"mb-subpage":"";
	$mb_slug	  = (!is_front_page() && !is_archive())?get_post_field( 'post_name', get_post() ):"";
	wp_head(); 
	?>
</head>

<body <?php body_class(array("typ-".$GLOBALS['mb_posttype'], $mb_bootstrap, $mb_subpage, $mb_slug)); ?>>
	
	<?php wp_body_open(); ?>

	<div id="mb-container">

		<header>
			<div class="satzspiegel">
				<?php 
				$hamburgerOn        = (get_option('mb_hamburger_an') != 'on')? "hamburger-off":"hamburger-on";
				$header_ausrichtung = get_option('mb_theme_layout_header_anordnung');
				?>
				
				<div class="header-container alignfull">
				    <div class="header-wrap">
				        <?php include 'template/header-social-media.php'; ?>
				    </div>
				</div>
				<div class="header-sidebar-wrap <?php echo $hamburgerOn . " " . $header_ausrichtung ?>">
				    <div id="header-logo">
				        <?php 
				        if ( !empty( get_option( 'mb_theme_ci_mainLogo' ) ) ) {
				            echo '<a href="'.get_site_url().'"><img src="'. get_option("mb_theme_ci_mainLogo") .'" alt="'.get_bloginfo().'" />';
				            if ( !empty( get_option('mb_theme_layout_header_title') ) ) {
				                echo '<span>'.get_bloginfo().'</span>';
				            }    
				            echo '</a>';
				        }
				        
				        ?>
				    </div>
				    <div class="widget_nav_menu mb-header-menu-wrap">
				        <?php
				        wp_nav_menu( array(
				            'theme_location' => 'primary',
				            'items_wrap'     => '<nav arial-label="Menü" class="%1$s-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
				        ) );
				        ?>
				    </div>
				    <div class="hamburger-menu"><span class="hamburger-icon"></span></div>
				</div>
			</div>
        </header>

        <main>
	        <div class="satzspiegel">
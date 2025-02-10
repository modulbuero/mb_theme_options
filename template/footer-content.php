<?php 
$hasMultiMenus = ( has_nav_menu('footer-3') || has_nav_menu('footer-2') || has_nav_menu('footer-4'))?"multimenu":"singlemenu"; 

if(is_active_sidebar('mb-footer-sidebar')):?>
	<div class="footer-sidebar-backend">
		<?php dynamic_sidebar( 'mb-footer-sidebar' ); ?>
	</div>
<?php endif; ?>

<div class="footer-sidebar-wrap">
    <div class="widget_nav_menu <?php echo $hasMultiMenus ?>">
        <?php
        if ( has_nav_menu( 'footer' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'items_wrap'     => '<nav arial-label="Menü" class="%1$s-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
        ) );
        }

        if ( has_nav_menu( 'footer-2' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'footer-2',
            'items_wrap'     => '<nav arial-label="Menü" class="%1$s-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
        ) );
        }


        if ( has_nav_menu( 'footer-3' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'footer-3',
            'items_wrap'     => '<nav arial-label="Menü" class="%1$s-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
        ) );
        }
    
        if ( has_nav_menu( 'footer-4' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'footer-4',
            'items_wrap'     => '<nav arial-label="Menü" class="%1$s-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
        ) );
        }
        ?>
    </div>
</div>

<div id="corporate-copyright">
    &copy; <?php echo $date = date('Y'); ?> <?php echo get_bloginfo( 'name' ); ?>
</div>
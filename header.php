<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	
	<!-- Necessary Scripts -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.custom.min.js"></script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Starting Pushy Menu -->
	    <?php
                class OC_Menu_Accordion_Walker extends Walker_Nav_Menu {
                     
                     function start_el( &$output, $item, $depth=0, $args=array() ) {
                        
                        global $wp_query;
                        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
                         
                        // depth dependent classes
                        $depth_classes = array(
                                'menu-item-depth-' . $depth
                        );
                        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
                        
                        // passed classes
                        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                        
                        
                        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
                        
                        // build html
                        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
                        
                        // link attributes
                        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
                        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' )  . '"';
                        
                      
                        if ($depth > 0) {
			    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			    );
			} else {
			    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', strtoupper($item->title), $item->ID ),
				$args->link_after,
				$args->after
			    );
			}
			
                        // build html
                        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
                        }
                    
                    function start_lvl( &$output, $depth ) {
                        // depth dependent classes
                        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
                        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
                        $classes = array(
                                'menu-depth-' . $display_depth,
				'sub-menu'
                        );
                            
                        $class_names = implode( ' ', $classes );
                                
                        // build html
                        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
                        }
                }
                
                wp_nav_menu( array('menu' => 'Main Menu', 'container' => 'nav', 'container_class' => 'pushy pushy-left', 'items_wrap' => '%3$s', 'walker' => new OC_Menu_Accordion_Walker ));
                ?>
<!-- End Pushy Menu -->

<!-- Start Pushy Site Overlay -->
<div class="site-overlay"></div>
<!-- End Pushy Site Overlay -->

<div id="container">
<div class="contain-to-grid">
	<!-- Starting the Top-Bar -->
	<div class="header-bar row">
		<div class="menu-btn small-3 columns">&#9776; Menu</div>
		<div class="header-logo large-3 large-centered small-3 small-centered columns">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="http://localhost/m3studios/wp-content/uploads/2013/11/m3s-logo-white.png" /></a>
		</div>
		
		<div class="header-text large-8  large-centered columns hide-for-small">
			<p>my name is maia m. mcguinness.</p>
		<?php
		if (is_page( "Welcome") ) {
			echo "<p>i'm a web developer currently residing in florida.</p>";
		}
		?>
		</div>
	</div>
	<!-- End of Top-Bar -->
</div>

<div class="desktop-nav row">
<?php
wp_nav_menu( array(
                    'theme_location'    => 'primary',
                    'container'         => 'nav',
                    'container_class'   => 'non-mobile-nav',
                    'items_wrap'        => '%3$s'
                ) );
?>
</div>

<!-- Start the main container -->
<section class="container" role="document">
	<div class="row">
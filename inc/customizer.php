<?php
/**
 * verticalmenu Customizer functionality
 *
 * @package verticalmenu
 * 
 * @since verticalmenu 1.0
 */
/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since verticalmenu 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function verticalmenu_customize_register( $wp_customize ) {
$wp_customize->add_panel( 'general', array(
	//	'title' => 'Customize',
		'title' => 'Theme Options',
    'description' => 'General Settings Panel',
    'priority' => 10,
) ); 
$wp_customize->add_panel( 'settings', array(
    'title' => 'Settings',
    'description' => 'Settings Panel',
    'priority' => 20,
) );
$wp_customize->get_section('header_image')->panel = 'general';
$wp_customize->get_section('background_image')->panel = 'general';
$wp_customize->get_section('background_image')->panel = 'general';
  		$wp_customize->add_setting( 'vertical_logo_margin_top', array(
         'sanitize_callback' =>'vertical_sanitize_text',
         'default' => '00'
		) );
		$wp_customize->add_control( 'vertical_logo_margin_top', array(
			'label'      => __( 'Logo Margin From Top','verticalmenu' ),
			'section'    => 'title_tagline',
            'type' => 'range',
            'description' => __( 'Choose from -20px to 100px', 'verticalmenu' ),
         	'priority' => 9,
            'input_attrs' => array(
            'min' => -20,
            'max' => 100,
            'step' => 10
          ),
		) );  
     $wp_customize->add_setting('vertical_logo_height', array(
     'sanitize_callback' =>'vertical_sanitize_text',
     'default' => '200'
     ));
     $wp_customize->add_control( 'vertical_logo_height', array(
      'type' => 'range',
      'section' => 'title_tagline',
      'priority' => 9,
      'label' => __( 'Logo Height', 'verticalmenu' ),
      'description' => __( 'Choose from 20 to 350 Pixels.', 'verticalmenu' ),
      'sanitize_callback' => 'vertical_sanitize_number', 
      'input_attrs' => array(
        'min' => 20,
        'max' => 350,
        'step' => 5,
      ),
    ) );    
    // Lay Out
    $wp_customize->add_section( 
    	'general_settings_section', 
    	array(
    		'title'       => __( 'Layout Options', 'verticalmenu' ),
    		'priority'    => 1,
    		'capability'  => 'edit_theme_options',
    		'description' => __('Change General options here.', 'verticalmenu'), 
            'panel'       => 'general',    	) 
    );
    $wp_customize->add_setting( 'verticalmenu_menus_enabled', array(
      'default' =>'1' ,
      'sanitize_callback' =>'vertical_sanitize_text',
    ));
	$wp_customize->add_control(
		'verticalmenu_menus_enabled',
		array(
			'settings'		=> 'verticalmenu_menus_enabled',
			'section'		=> 'general_settings_section',
			'type'			=> 'radio',
			'label'			=> __( 'Menu enabled', 'verticalmenu' ),
			'description'	=> '',
			'choices'		=> array(
				'1' => __( 'Vertical Left Menu', 'verticalmenu' ),
				'2' => __( 'Horizontal Top Menu', 'verticalmenu' )
			//	'3' => __( 'Both', 'verticalmenu' )
			)
		)
	); 
     $wp_customize->add_setting('verticalmenu_layout_type', array(
     'sanitize_callback' =>'vertical_sanitize_text',
     'default' => '2'
     ));
 	$wp_customize->add_control(
		'verticalmenu_layout_type',
		array(
			'settings'		=> 'verticalmenu_layout_type',
			'section'		=> 'general_settings_section',
			'type'			=> 'radio',
			'label'			=> __( 'Website Layout', 'verticalmenu' ) ,
			'description'	=> '',
			'choices'		=> array(
				'1' => 'Boxed Width 1000px',
				'2' => 'Boxed Width 1200px',
				'3' => 'Wide'
			)
		)
	);   
     $wp_customize->add_setting('verticalmenu_opacity', array(
     'sanitize_callback' =>'vertical_sanitize_text',
     'default' => '10'
     ));
     $wp_customize->add_control( 'verticalmenu_opacity', array(
      'type' => 'range',
      'section' => 'general_settings_section',
      'label' => __( 'Background transparency (opacity)', 'verticalmenu' ),
      'description' => __( 'Choose from .6 to 1', 'verticalmenu' ),
      'input_attrs' => array(
        'min' => 6,
        'max' => 10,
        'step' => 1,
      ),
    ) );
    $wp_customize->add_setting('verticalmenu_entry_title', array(
     'sanitize_callback' =>'vertical_sanitize_text', 
     'default' => '1',
     ));
	$wp_customize->add_control(
		'verticalmenu_entry_title',
		array(
			'settings'		=> 'verticalmenu_entry_title',
			'section'		=> 'general_settings_section',
			'type'			=> 'radio',
			'label'			=> __( 'Show entry-title', 'verticalmenu' ),
			'description'	=> '',
			'choices'		=> array(
				'1' => 'Yes',
				'2' => 'No'
			)
		)
	);
    
    
     $wp_customize->add_setting('verticalmenu_loading', array(
     'sanitize_callback' =>'vertical_sanitize_text', 
     'default' => '1',
     ));
	$wp_customize->add_control(
		'verticalmenu_loading',
		array(
			'settings'		=> 'verticalmenu_loading',
			'section'		=> 'general_settings_section',
			'type'			=> 'radio',
			'label'			=> __( 'Show small orange loading image at top-right corner. ', 'verticalmenu' ),
			'description'	=> '',
			'choices'		=> array(
				'1' => 'Yes',
				'2' => 'No'
			)
		)
	);
    
    
     $wp_customize->add_setting('verticalmenu_position', array(
     'sanitize_callback' =>'vertical_sanitize_text', 
     'default' => '1',
     ));
     
 	$wp_customize->add_control(
		'verticalmenu_position',
		array(
			'settings'		=> 'verticalmenu_position',
			'section'		=> 'general_settings_section',
			'type'			=> 'radio',
			'label'			=> __( 'Vertical menu and sidebar position.', 'verticalmenu' ),
			'description'	=> '',
			'choices'		=> array(
				'1' => 'Left',
				'2' => 'Right'
			)
		)
	);    

    $wp_customize->add_setting('verticalmenu_show_sidebar', array(
     'sanitize_callback' =>'vertical_sanitize_text',
          'default' => '1',
     ));
	$wp_customize->add_control(
		'verticalmenu_show_sidebar',
		array(
			'settings'		=> 'verticalmenu_show_sidebar',
			'section'		=> 'general_settings_section',
			'type'			=> 'radio',
			'label'			=> __( 'Show Widgets Sidebar in Small Devices? ', 'verticalmenu' ),
			'description'	=> '',
			'choices'		=> array(
				'1' => 'Yes',
				'0' => 'No'
			)
		)
	);
      
    // End General
// Footer
      $wp_customize->add_section( 
    	'footer_settings_section', 
    	array(
    		'title'       => __( 'Footer Copyright', 'verticalmenu' ),
    		'priority'    => 100,
    		'capability'  => 'edit_theme_options',
    		'description' => '',
            'panel'       => 'general', 
    	) 
    );
    $wp_customize->add_setting('verticalmenu_footer_copyright', array(
      'sanitize_callback' =>'vertical_sanitize_html', 
      'default'        => '',
     ));
    $wp_customize->add_control('verticalmenu_footer_copyright', array(
     'label'   => __( 'Copyright Footer Text Here', 'verticalmenu' ),
      'section' => 'footer_settings_section',
     'type'    => 'textarea',
    )); 
    $wp_customize->add_setting( 'verticalmenu_copyright_background',
    	array(
    		'default' => '#f1f1f1',
	    	'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_copyright_background', array(
    			'label'    => __( 'Copyright Background Color', 'verticalmenu' ),
                'section' => 'footer_settings_section', 
    	        'settings' => 'verticalmenu_copyright_background',
           		'priority' => 20,
    		)
    	)
    );
        $wp_customize->add_setting( 'verticalmenu_copyright_color',
    	array(
    		'default' => '#333333',
	    	'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_copyright_color', array(
    			'label'    => __( 'Copyright Text Color', 'verticalmenu' ),
                'section' => 'footer_settings_section', 
    	        'settings' => 'verticalmenu_copyright_color',
           		'priority' => 30,
    		)
    	)
    );
    /* End Footer  */
	$color_scheme = verticalmenu_get_color_scheme();
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	// Add color scheme setting and control.
	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'default',
		'sanitize_callback' => 'verticalmenu_sanitize_color_scheme',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'color_scheme', array(
		'label'    => __( 'Base Color Scheme', 'verticalmenu' ),
		'section'  => 'colors',
		'type'     => 'select',
		'choices'  => verticalmenu_get_color_scheme_choices(),
		'priority' => 1,
	) );
	// Add custom header and sidebar text color setting and control.
	$wp_customize->add_setting( 'sidebar_textcolor', array(
		'default'           => $color_scheme[4],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_textcolor', array(
		'label'       => __( 'Header and Sidebar Text Color', 'verticalmenu' ),
		'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'verticalmenu' ),
		'section'     => 'colors',
	) ) );
	// Add custom menu text color.
	$wp_customize->add_setting( 'menu_textcolor', array(
		'default'           => $color_scheme[6],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_textcolor', array(
		'label'       => __( 'Menu Text Color', 'verticalmenu' ),
		'section'     => 'colors',
	) ) );
	// Remove the core header textcolor control, as it shares the sidebar text color.
	$wp_customize->remove_control( 'header_textcolor' );
	// Add custom header and sidebar background color setting and control.
	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => $color_scheme[1],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'       => __( 'Header and Sidebar Background Color', 'verticalmenu' ),
		'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'verticalmenu' ),
		'section'     => 'colors',
	) ) );
	// Add an additional description to the header image section.
  	$wp_customize->get_section( 'header_image' )->description = __( 'Applied to the header on small screens and the sidebar on wide screens.', 'verticalmenu' );
// Top Page Settings
      $wp_customize->add_section( 
    	'top_header_settings_section', 
    	array(
    		'title'       => __( 'Top Page Settings', 'verticalmenu' ),
    		'priority'    => 81,
    		'capability'  => 'edit_theme_options',
    		'description' => '',
            'panel'       => 'general',    	 
    	) 
    );
    $wp_customize->add_setting('verticalmenu_topinfo_phone', array(
      'sanitize_callback' =>'vertical_sanitize_text', 
      'default'        => '',
     ));
    $wp_customize->add_control('verticalmenu_topinfo_phone', array(
     'label'   => __( 'Top Info Phone', 'verticalmenu' ),
      'section' => 'top_header_settings_section',
     'type'    => 'text',
    )); 
    $wp_customize->add_setting('verticalmenu_topinfo_email', array(
      'sanitize_callback' =>'vertical_sanitize_text', 
      'default'        => '',
     ));
    $wp_customize->add_control('verticalmenu_topinfo_email', array(
     'label'   => __( 'Top Info eMail or text', 'verticalmenu' ),
      'section' => 'top_header_settings_section',
     'type'    => 'text',
    )); 
    $wp_customize->add_setting('verticalmenu_topinfo_email_link', array(
      'sanitize_callback' =>'vertical_sanitize_html', 
      'default'        => '',
     ));
    $wp_customize->add_control('verticalmenu_topinfo_email_link', array(
     'label'   => __( 'Link for previous field or Left blank for default email link.', 'verticalmenu' ),
      'section' => 'top_header_settings_section',
     'type'    => 'textarea',
    )); 
       $wp_customize->add_setting('verticalmenu_topinfo_hours', array(
      'sanitize_callback' =>'vertical_sanitize_text', 
      'default'        => '',
     ));
    $wp_customize->add_control('verticalmenu_topinfo_hours', array(
     'label'   => __( 'Top Info Hours', 'verticalmenu' ),
      'section' => 'top_header_settings_section',
     'type'    => 'text',
    )); 
    $wp_customize->add_setting( 'verticalmenu_topinfo_color', array(
      'default' =>'gray' ,
      'sanitize_callback' =>'vertical_sanitize_text',
    ));
	$wp_customize->add_control(
		'verticalmenu_topinfo_color',
		array(
			'settings'		=> 'verticalmenu_topinfo_color',
			'section'		=> 'top_header_settings_section',
			'type'			=> 'radio',
			'label'			=> __( 'Top Page Info Color', 'verticalmenu' ),
			'description'	=> '',
			'choices'		=> array(
				'white' => __( 'White', 'verticalmenu' ),
				'gray' => __( 'Gray', 'verticalmenu' ),
				'black' => __( 'Black', 'verticalmenu' )
			)
		)
	);  
// End Top Page Settings

// Blog Settings
      $wp_customize->add_section( 
    	'blog_settings_section', 
    	array(
    		'title'       => __( 'Blog Settings', 'verticalmenu' ),
    		'priority'    => 100,
    		'capability'  => 'edit_theme_options',
    		'description' => 'Configure Blog style.',
            'panel'       => 'general', 
    	) 
    );
    $wp_customize->add_setting( 'verticalmenu_blog_style', array(
      'default' =>'3' ,
      'sanitize_callback' =>'vertical_sanitize_text',
    ));
	$wp_customize->add_control(
		'verticalmenu_blog_style',
		array(
			'settings'		=> 'verticalmenu_blog_style',
			'section'		=> 'blog_settings_section',
			'type'			=> 'select',
			'label'			=> __( 'Choose Blog Page Style', 'verticalmenu' ),
			'description'	=> 'Look the right panel (and go to blog page) to see the preview...',
			'choices'		=> array(
				'1' => 'Blog Standard',
				'2' => 'Blog List View',
                '3' => 'Blog Masonry', 
			)
		)
	);
$wp_customize->add_setting('verticalmenu_blog_post_meta', array(
     'sanitize_callback' =>'vertical_sanitize_checkbox', 
     'default' => '1',
     ));
$wp_customize->add_control( 'verticalmenu_blog_post_meta', array(
				'label'    => __( 'Turn on to display post meta on blog single posts page','verticalmenu' ),
				'section'  => 'blog_settings_section',
				'settings' => 'verticalmenu_blog_post_meta',
				'type'     => 'checkbox',
			) );
$wp_customize->add_setting('verticalmenu_blog_post_author', array(
     'sanitize_callback' =>'vertical_sanitize_checkbox', 
     'default' => '1',
     ));
$wp_customize->add_control( 'verticalmenu_blog_post_author', array(
				'label'    => __( 'Turn on to display post author on blog single posts page','verticalmenu' ),
				'section'  => 'blog_settings_section',
				'settings' => 'verticalmenu_blog_post_author',
				'type'     => 'checkbox',
			) );
$wp_customize->add_setting('verticalmenu_blog_post_categories', array(
     'sanitize_callback' =>'vertical_sanitize_checkbox', 
     'default' => '1',
     ));
$wp_customize->add_control( 'verticalmenu_blog_post_categories', array(
				'label'    => __( 'Turn on to display categories on blog posts','verticalmenu' ),
				'section'  => 'blog_settings_section',
				'settings' => 'verticalmenu_blog_post_categories',
				'type'     => 'checkbox',
			) );
$wp_customize->add_setting('verticalmenu_blog_post_date', array(
     'sanitize_callback' =>'vertical_sanitize_checkbox', 
     'default' => '1',
     ));
$wp_customize->add_control( 'verticalmenu_blog_post_date', array(
				'label'    => __( 'Turn on to display date on blog posts','verticalmenu' ),
				'section'  => 'blog_settings_section',
				'settings' => 'verticalmenu_blog_post_date',
				'type'     => 'checkbox',
			) );

/*    
// Post meta
// Turn on to display post meta on blog posts
Display Author
Display author on blog posts
Display Categories
Display categories on blog posts
*/
// End Blog


//////// Mobile Menu //////////
      $wp_customize->add_section( 
    	'mobile_navigation_section', 
    	array(
    		'title'       => __( 'Mobile Navigation Design', 'verticalmenu' ),
    		'priority'    => 103,
    		'capability'  => 'edit_theme_options',
    		'description' => '',
            'panel'       => 'general', 
    	) 
    );
     $wp_customize->add_setting( 'verticalmenu_mobile_navigation_show', array(
      'default' =>'yes' ,
      'sanitize_callback' =>'vertical_sanitize_text',
    ));
  	$wp_customize->add_control(
		'verticalmenu_mobile_navigation_show',
		array(
			'settings'		=> 'verticalmenu_mobile_navigation_show',
			'section'		=> 'mobile_navigation_section',
			'type'			=> 'radio',
			'label'			=> __( 'Show Theme Mobile Menu?', 'verticalmenu' ),
			'description'	=> '',
			'choices'		=> array(
				'yes' => __( 'Yes', 'verticalmenu' ),
				'no' => __( 'No', 'verticalmenu' )
			)
		)
	);  
    $wp_customize->add_setting( 'verticalmenu_mobile_background',
    	array(
    		'default' => '#555555',
	    	'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_mobile_background', array(
    			'label'    => __( 'Mobile Background Color', 'verticalmenu' ),
                'section' => 'mobile_navigation_section', 
    	        'settings' => 'verticalmenu_mobile_background',
           		'priority' => 20,
    		)
    	)
    );
        $wp_customize->add_setting( 'verticalmenu_mobile_color',
    	array(
    		'default' => '#ffffff',
	    	'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_mobile_color', array(
    			'label'    => __( 'Mobile Text Color', 'verticalmenu' ),
                'section' => 'mobile_navigation_section', 
    	        'settings' => 'verticalmenu_mobile_color',
           		'priority' => 30,
    		)
    	)
    );
    $wp_customize->add_setting( 'verticalmenu_mobile_separator',
    	array(
    		'default' => '#333333',
	    	'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_mobile_separator', array(
    			'label'    => __( 'Mobile Separator Color', 'verticalmenu' ),
                'section' => 'mobile_navigation_section', 
    	        'settings' => 'verticalmenu_mobile_separator',
           		'priority' => 40,
    		)
    	)
    );
    $wp_customize->add_setting( 'verticalmenu_mobile_icon',
    	array(
    		'default' => '#ffffff',
	    	'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_mobile_icon', array(
    			'label'    => __( 'Mobile Bar Icon Color', 'verticalmenu' ),
                'section' => 'mobile_navigation_section', 
    	        'settings' => 'verticalmenu_mobile_icon',
           		'priority' => 50,
    		)
    	)
    );
    $wp_customize->add_setting( 'verticalmenu_mobile_name_color',
    	array(
    		'default' => '#ffffff',
	    	'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_mobile_name_color', array(
    			'label'    => __( 'Mobile Menu Name Color', 'verticalmenu' ),
                'section' => 'mobile_navigation_section', 
    	        'settings' => 'verticalmenu_mobile_name_color',
           		'priority' => 50,
    		)
    	)
    );
/////////// end Mobile Menu /////////////
/////////// Top Navigation Details
    $wp_customize->add_section( 
    	'navigation_colors_section', 
    	array(
    		'title'       => __( 'Top Navigation Design', 'verticalmenu' ),
    		'priority'    => 101,
    		'capability'  => 'edit_theme_options',
    		'description' => __('Change Top Navigation detais here. <br />If you install WooCommerce, maybe you will need set this Top Margin around 50 pixels to left space for their menu.', 'verticalmenu'), 
            'panel'       => 'general', 
    	) 
    );
     $wp_customize->add_setting( 'verticalmenu_menu_margin_top',
        	array(
        		'default' => '10',
                'sanitize_callback' =>'vertical_sanitize_text',
        	)
        );
     $wp_customize->add_control( 'verticalmenu_menu_margin_top', array(
      'type' => 'range',
      'section' => 'navigation_colors_section',
      'label' => __( 'Menu Margin Top', 'verticalmenu' ),
      'description' => __( 'Choose from 0 to 50 Pixels.', 'verticalmenu' ),
      'input_attrs' => array(
        'min' => 0,
        'max' => 50,
        'step' => 1,
      ),
    ) );
    $wp_customize->add_setting( 'menu_font_size',
        	array(
        		'default' => '14',
                'sanitize_callback' =>'vertical_sanitize_text',
        	)
        );
     $wp_customize->add_control( 'menu_font_size', array(
      'type' => 'range',
      'section' => 'navigation_colors_section',
      'label' => __( 'Menu Font Size', 'verticalmenu' ),
      'description' => __( 'Choose from 12 to 18 Pixels.', 'verticalmenu' ),
      'input_attrs' => array(
        'min' => 12,
        'max' => 18,
        'step' => 1,
      ),
    ) );
    $wp_customize->add_setting( 'verticalmenu_navigation_background',
    	array(
    		'default' => '#e65e23',
            'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_navigation_background', array(
    			'label'    => __( 'Background Navigation Color', 'verticalmenu' ),
                'section' => 'navigation_colors_section', 
    	        'settings' => 'verticalmenu_navigation_background',
           		'priority' => 10,
    		)
    	)
    );
     $wp_customize->add_setting( 'verticalmenu_menu_color',
    	array(
    		'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_menu_color', array(
    			'label'    => __( 'Menu Text Color', 'verticalmenu' ),
                'section' => 'navigation_colors_section', 
    	        'settings' => 'verticalmenu_menu_color',
           		'priority' => 10,
    		)
    	)
    ); 
   $wp_customize->add_setting( 'verticalmenu_menu_hover_color',
    	array(
    		'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_menu_hover_color', array(
    			'label'    => __( 'Menu Text Hover Color', 'verticalmenu' ),
                'section' => 'navigation_colors_section', 
    	        'settings' => 'verticalmenu_menu_hover_color',
           		'priority' => 10,
    		)
    	)
    );   
      $wp_customize->add_setting( 'verticalmenu_sub_menu_text_color',
    	array(
    		'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_sub_menu_text_color', array(
    			'label'    => __( 'Sub Menu Text Color', 'verticalmenu' ),
                'section' => 'navigation_colors_section', 
    	        'settings' => 'verticalmenu_sub_menu_text_color',
           		'priority' => 10,
    		)
    	)
    ); 
     $wp_customize->add_setting( 'verticalmenu_menu_background',
    	array(
    		'default' => '#e65e23',
            'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_menu_background', array(
    			'label'    => __( 'Sub Menu Background', 'verticalmenu' ),
                'section' => 'navigation_colors_section', 
    	        'settings' => 'verticalmenu_menu_background',
           		'priority' => 10,
    		)
    	)
    );     
    $wp_customize->add_setting( 'verticalmenu_submenu_hover_color',
    	array(
    		'default' => '#e65e23',
            'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_submenu_hover_color', array(
    			'label'    => __( 'Sub Menu Hover color', 'verticalmenu' ),
                'section' => 'navigation_colors_section', 
    	        'settings' => 'verticalmenu_submenu_hover_color',
           		'priority' => 10,
    		)
    	)
    );     
     $wp_customize->add_setting( 'verticalmenu_submenu_hover_background',
    	array(
    		'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
    	)
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'verticalmenu_submenu_hover_background', array(
    			'label'    => __( 'Sub Menu Hover Background', 'verticalmenu' ),
                'section' => 'navigation_colors_section', 
    	        'settings' => 'verticalmenu_submenu_hover_background',
           		'priority' => 10,
    		)
    	)
    );
/* end top navigation details */    
    /* Sanitize */
function vertical_sanitize_html( $str ) {
    $allowed_html = array(
		'a' => array(
			'href' => true,
			'title' => true,
		),
		'abbr' => array(
			'title' => true,
		),
		'acronym' => array(
			'title' => true,
		),
		'b' => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite' => array(),
		'code' => array(),
		'del' => array(
			'datetime' => true,
		),
		'em' => array(),
		'i' => array(),
		'q' => array(
			'cite' => true,
		),
		'strike' => array(),
		'strong' => array(),
	);
        wp_kses($str, $allowed_html); 
        return trim($str) ;
    } 
    function vertical_sanitize_url( $str ) {
        return esc_url( $str );
    } 
    function vertical_sanitize_text( $str ) {
        return sanitize_text_field( $str );
    } 
    function vertical_sanitize_textarea( $text ) {
        return esc_textarea( $text );
    } 
    function vertical_sanitize_email( $text ) {
        return sanitize_email( $text );
    } 
    function vertical_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
       } else {
        return '';
       }
    }
}
add_action( 'customize_register', 'verticalmenu_customize_register', 11 );
/**
 * Register color schemes for verticalmenu.
 *
 * Can be filtered with {@see 'verticalmenu_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Sidebar Background Color.
 * 3. Box Background Color.
 * 4. Main Text and Link Color.
 * 5. Sidebar Text and Link Color.
 * 6. Meta Box Background Color.
 * 7. Menu_textcolor
 *
 * @since verticalmenu 1.0
 *
 * @return array An associative array of color scheme options.
 */
function verticalmenu_get_color_schemes() {
	return apply_filters( 'verticalmenu_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'verticalmenu' ),
			'colors' => array(
				'#f1f1f1',
				'#ffffff',
				'#ffffff',
				'#333333',
				'#333333',
				'#f7f7f7',
				'#000000',
			),
		),
		'dark'    => array(
			'label'  => __( 'Dark', 'verticalmenu' ),
			'colors' => array(
				'#111111',
				'#000000',
				'#202020',
				'#bebebe',
				'#bebebe',
				'#1b1b1b',
				'#ffffff',
			),
		),
		'Green'  => array(
			'label'  => __( 'Green', 'verticalmenu' ),
			'colors' => array(
				'#CED7CE',
				'#067F44',
				'#ffffff',
				'#111111',
				'#ffffff',
				'#f1f1f1',
				'#ffffff',
			),
		),
		'red'    => array(
			'label'  => __( 'Red', 'verticalmenu' ),
			'colors' => array(
				'#ffe5d1',
				'#e53b51',
				'#ffffff',
				'#352712',
				'#ffffff',
				'#f1f1f1',
				'#ffffff',
			),
		),
		'orange'  => array(
			'label'  => __( 'Orange', 'verticalmenu' ),
			'colors' => array(
				'#ffe5d1', 
				'#FF6726',
				'#ffffff',
				'#FF6726',
				'#ffffff',
				'#f1f1f1',
				'#ffffff',
			),
		),
		'blue'   => array(
			'label'  => __( 'Blue', 'verticalmenu' ),
			'colors' => array(
				'#e9f2f9',
				'#00608E',
				'#ffffff',
				'#22313f',
				'#ffffff',
				'#f1f1f1',
				'#ffffff',
			),
		),
  		'brown'   => array(
			'label'  => __( 'Brown', 'verticalmenu' ),
			'colors' => array(
				'#D6CEBB',
				'#A27500',
				'#ffffff',
				'#22313f',
				'#ffffff',
				'#f1f1f1',
				'#ffffff',
			),
		),      
	) );
}
if ( ! function_exists( 'verticalmenu_get_color_scheme' ) ) :
/**
 * Get the current verticalmenu color scheme.
 *
 * @since verticalmenu 1.0
 *
 * @return array An associative array of either the current or default color scheme hex values.
 */
function verticalmenu_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'blue' );
	$color_schemes       = verticalmenu_get_color_schemes();
	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}
	return $color_schemes['default']['colors'];
}
endif; // verticalmenu_get_color_scheme
if ( ! function_exists( 'verticalmenu_get_color_scheme_choices' ) ) :
/**
 * Returns an array of color scheme choices registered for verticalmenu.
 *
 * @since verticalmenu 1.0
 *
 * @return array Array of color schemes.
 */
function verticalmenu_get_color_scheme_choices() {
	$color_schemes                = verticalmenu_get_color_schemes();
	$color_scheme_control_options = array();
	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}
	return $color_scheme_control_options;
}
endif; // verticalmenu_get_color_scheme_choices
if ( ! function_exists( 'verticalmenu_sanitize_color_scheme' ) ) :
/**
 * Sanitization callback for color schemes.
 *
 * @since verticalmenu 1.0
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function verticalmenu_sanitize_color_scheme( $value ) {
	$color_schemes = verticalmenu_get_color_scheme_choices();
	if ( ! array_key_exists( $value, $color_schemes ) ) {
		$value = 'default';
	}
	return $value;
}
endif; // verticalmenu_sanitize_color_scheme
/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since verticalmenu 1.0
 *
 * @see wp_add_inline_style()
 */
function verticalmenu_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}
	$color_scheme = verticalmenu_get_color_scheme();
	// Convert main and sidebar text hex color to rgba.
	$color_textcolor_rgb         = verticalmenu_hex2rgb( $color_scheme[3] );
	$color_sidebar_textcolor_rgb = verticalmenu_hex2rgb( $color_scheme[4] );
	$colors = array(
		'background_color'            => $color_scheme[0],
		'header_background_color'     => $color_scheme[1], 
		'box_background_color'        => $color_scheme[2],
		'textcolor'                   => $color_scheme[3],
		'secondary_textcolor'         => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_textcolor_rgb ),
		'border_color'                => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_textcolor_rgb ),
		'border_focus_color'          => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_textcolor_rgb ),
		'sidebar_textcolor'           => $color_scheme[4],
		'sidebar_border_color'        => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_sidebar_textcolor_rgb ),
		'sidebar_border_focus_color'  => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_sidebar_textcolor_rgb ),
		'secondary_sidebar_textcolor' => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_sidebar_textcolor_rgb ),
		'meta_box_background_color'   => $color_scheme[5],
        'menu_textcolor'   => $color_scheme[6], 
	);
      $header_background_color = get_theme_mod('header_background_color', $color_scheme[1] ); 
      if(!empty($header_background_color))
         $colors['header_background_color'] = $header_background_color;
      $menu_textcolor = get_theme_mod('menu_textcolor','#ffffff');
      if(!empty($menu_textcolor))
         $colors['menu_textcolor'] = $menu_textcolor;
	$color_scheme_css = verticalmenu_get_color_scheme_css( $colors );
	wp_add_inline_style( 'verticalmenu-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'verticalmenu_color_scheme_css' );
/**
 * Binds JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since verticalmenu 1.0
 */
function verticalmenu_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20141216', true );
	wp_localize_script( 'color-scheme-control', 'colorScheme', verticalmenu_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'verticalmenu_customize_control_js' );
/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since verticalmenu 1.0
 */
function verticalmenu_customize_preview_js() {
	wp_enqueue_script( 'verticalmenu-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'verticalmenu_customize_preview_js' );
/**
 * Returns CSS for the color schemes.
 *
 * @since verticalmenu 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function verticalmenu_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'background_color'            => '',
		'header_background_color'     => '',
		'box_background_color'        => '',
		'textcolor'                   => '',
		'secondary_textcolor'         => '',
		'border_color'                => '',
		'border_focus_color'          => '',
		'sidebar_textcolor'           => '',
		'sidebar_border_color'        => '',
		'sidebar_border_focus_color'  => '',
		'secondary_sidebar_textcolor' => '',
		'meta_box_background_color'   => '',
        'menu_textcolor' => '',
	) );
	$css = <<<CSS
	/* Color Scheme */
    #wrapper,
    .sidebar,
    #sidebar
    {
      background-color: {$colors['header_background_color']} !important;  
    }
    #wrapper
    {
      background:  {$colors['background_color']} !important; 
	}
	/* Box Background Color */
	.post-navigation,
	.pagination,
	.secondary,
	.site-footer,
    .footer-container,
    #colophon,
	.hentry,
	.page-header,
	.page-content,
	.comments-area,
	.widecolumn {
		background-color: {$colors['box_background_color']};
	}
	/* Box Background Color */
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	input[type="file"],
	.pagination .prev,
	.pagination .next,
	.widget_calendar tbody a,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	.page-links a,
	.page-links a:hover,
	.page-links a:focus,
	.sticky-post {
		color: {$colors['box_background_color']};
	}
	/* Main Text Color */
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	input[type="file"],
	.pagination .prev,
	.pagination .next,
	.widget_calendar tbody a,
	.page-links a,
	.sticky-post {
		color:  {$colors['textcolor']}; 
	}
	/* Main Text Color */
    .footer-container,
	body,
	blockquote cite,
	blockquote small,
	a,
	.dropdown-toggle:after,
	.image-navigation a:hover,
	.image-navigation a:focus,
	.comment-navigation a:hover,
	.comment-navigation a:focus,
	.widget-title,
	.entry-footer a:hover,
	.entry-footer a:focus,
	.comment-metadata a:hover,
	.comment-metadata a:focus,
	.pingback .edit-link a:hover,
	.pingback .edit-link a:focus,
	.comment-list .reply a:hover,
	.comment-list .reply a:focus,
	.site-info a:hover,
	.site-info a:focus {
	  	color: {$colors['textcolor']}; 
	}
	/* Main Text Color */
	.entry-content a,
	.entry-summary a,
	.page-content a,
	.comment-content a,
	.pingback .comment-body > a,
	.author-description a,
	.taxonomy-description a,
	.textwidget a,
	.entry-footer a:hover,
	.comment-metadata a:hover,
	.pingback .edit-link a:hover,
	.comment-list .reply a:hover,
	.site-info a:hover {
	   	border-color: {$colors['textcolor']}; 
	}
	/* Secondary Text Color */
	button:hover,
	button:focus,
	input[type="button"]:hover,
	input[type="button"]:focus,
	input[type="reset"]:hover,
	input[type="reset"]:focus,
	input[type="submit"]:hover,
	input[type="submit"]:focus,
	.pagination .prev:hover,
	.pagination .prev:focus,
	.pagination .next:hover,
	.pagination .next:focus,
	.widget_calendar tbody a:hover,
	.widget_calendar tbody a:focus,
	.page-links a:hover,
	.page-links a:focus {
		background-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		background-color: {$colors['secondary_textcolor']};
	}
	/* Secondary Text Color */
	blockquote,
	a:hover,
	a:focus,
	.main-navigation .menu-item-description,
	.post-navigation .meta-nav,
	.post-navigation a:hover .post-title,
	.post-navigation a:focus .post-title,
	.image-navigation,
	.image-navigation a,
	.comment-navigation,
	.comment-navigation a,
	.widget,
	.author-heading,
	.entry-footer,
	.entry-footer a,
	.taxonomy-description,
	.page-links > .page-links-title,
	.entry-caption,
	.comment-author,
	.comment-metadata,
	.comment-metadata a,
	.pingback .edit-link,
	.pingback .edit-link a,
	.post-password-form label,
	.comment-form label,
	.comment-notes,
	.comment-awaiting-moderation,
	.logged-in-as,
	.form-allowed-tags,
	.no-comments,
	.site-info,
	.site-info a,
	.wp-caption-text,
	.gallery-caption,
	.comment-list .reply a,
	.widecolumn label,
	.widecolumn .mu_register label {
		color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		color: {$colors['secondary_textcolor']};
	}
	/* Secondary Text Color */
	blockquote,
	.logged-in-as a:hover,
	.comment-author a:hover {
		border-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['secondary_textcolor']};
	}
	/* Border Color */
	hr,
	.dropdown-toggle:hover,
	.dropdown-toggle:focus {
		background-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		background-color: {$colors['border_color']};
	}
	/* Border Color */
	pre,
	abbr[title],
	table,
	th,
	td,
	input,
	textarea,
	.main-navigation ul,
	.main-navigation li,
	.post-navigation,
	.post-navigation div + div,
	.pagination,
	.comment-navigation,
	.widget li,
	.widget_categories .children,
	.widget_nav_menu .sub-menu,
	.widget_pages .children,
	.site-header,
	.site-footer,
	.hentry + .hentry,
	.author-info,
	.entry-content .page-links a,
	.page-links > span,
	.page-header,
	.comments-area,
	.comment-list + .comment-respond,
	.comment-list article,
	.comment-list .pingback,
	.comment-list .trackback,
	.comment-list .reply a,
	.no-comments {
		border-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['border_color']};
	}
	/* Border Focus Color */
	a:focus,
	button:focus,
	input:focus {
		outline-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		outline-color: {$colors['border_focus_color']};
	}
	input:focus,
	textarea:focus {
		border-color: {$colors['textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['border_focus_color']};
	}
	/* Sidebar Link Color */
	.secondary-toggle:before {
		color: {$colors['sidebar_textcolor']};
	}
	.site-title a,
	.site-description {
		color: {$colors['sidebar_textcolor']};
	}
	/* Sidebar Text Color */
	.site-title a:hover,
	.site-title a:focus {
		color: {$colors['secondary_sidebar_textcolor']};
	}
	/* Sidebar Border Color */
	.secondary-toggle {
		border-color: {$colors['sidebar_textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['sidebar_border_color']};
	}
	/* Sidebar Border Focus Color */
	.secondary-toggle:hover,
	.secondary-toggle:focus {
		border-color: {$colors['sidebar_textcolor']}; /* Fallback for IE7 and IE8 */
		border-color: {$colors['sidebar_border_focus_color']};
	}
	.site-title a {
		outline-color: {$colors['sidebar_textcolor']}; /* Fallback for IE7 and IE8 */
	}
	/* Meta Background Color */
	.entry-footer {
		background-color: {$colors['meta_box_background_color']};
	}
	@media screen and (min-width: 38.75em) {
		/* Main Text Color */
		.page-header {
			border-color: {$colors['textcolor']};
		}
	}
	@media screen and (min-width: 15em) {
		/* Make sure its transparent on desktop */
          	button,
        	input[type="button"],
        	input[type="reset"],
        	input[type="submit"],
        	input[type="file"],    
        	.pagination .prev,
        	.pagination .next,
        	.widget_calendar tbody a,
        	.page-links a,
        	.sticky-post {
        		background-color:  {$colors['header_background_color']} ;
                color: {$colors['sidebar_textcolor']};
                border: solid 0px #DAD9D9 !important; /* {$colors['sidebar_textcolor']}  */
        	}        
	        .site-header,
		    .secondary {
			background-color: transparent;
		}
		/* Sidebar Background Color */
		.widget button,
		.widget input[type="button"],
		.widget input[type="reset"],
		.widget input[type="submit"],
		.widget_calendar tbody a,
		.widget_calendar tbody a:hover,
		.widget_calendar tbody a:focus {
			color:  {$colors['header_background_color']};
		}
		/* Sidebar Link Color */
		.secondary a,
		.dropdown-toggle:after,
		.widget-title,
		.widget blockquote cite,
		.widget blockquote small {
			color: {$colors['sidebar_textcolor']};
		}
		.widget button,
		.widget input[type="button"],
		.widget input[type="reset"],
		.widget input[type="submit"],
		.widget_calendar tbody a {
			background-color: {$colors['sidebar_textcolor']};
		}
		.textwidget a {
			border-color:  {$colors['sidebar_textcolor']};
		}
		/* Sidebar Text Color */
		.secondary a:hover,
		.secondary a:focus,
		.main-navigation .menu-item-description,
		.widget,
		.widget blockquote,
		.widget .wp-caption-text,
		.widget .gallery-caption {
			color: {$colors['secondary_sidebar_textcolor']};
		}
		.widget button:hover,
		.widget button:focus,
		.widget input[type="button"]:hover,
		.widget input[type="button"]:focus,
		.widget input[type="reset"]:hover,
		.widget input[type="reset"]:focus,
		.widget input[type="submit"]:hover,
		.widget input[type="submit"]:focus,
		.widget_calendar tbody a:hover,
		.widget_calendar tbody a:focus {
			background-color: {$colors['secondary_sidebar_textcolor']};
		}
		.widget blockquote {
			border-color: {$colors['secondary_sidebar_textcolor']};
		}
		/* Sidebar Border Color */
		.main-navigation ul,
		.main-navigation li,
		.widget input,
		.widget textarea,
		.widget table,
		.widget th,
		.widget td,
		.widget pre,
		.widget li,
		.widget_categories .children,
		.widget_nav_menu .sub-menu,
		.widget_pages .children,
		.widget abbr[title] {
			border-color: {$colors['sidebar_border_color']};
		}
		.dropdown-toggle:hover,
		.dropdown-toggle:focus,
		.widget hr {
			background-color: {$colors['sidebar_border_color']};
		}
		.widget input:focus,
		.widget textarea:focus {
			border-color: {$colors['sidebar_border_focus_color']};
		}
		.sidebar a:focus,
		.dropdown-toggle:focus {
			outline-color: {$colors['sidebar_border_focus_color']};
		}
 }
         .menu-main-menu-container a
        {
        	color: {$colors['menu_textcolor']};
           /*   color: {$colors['background_color']}; */
        }
        .menu-item a
        {
        	color: {$colors['menu_textcolor']};
          /*   color: {$colors['background_color']};  */
        }
CSS;
	return $css;
}
add_action( 'wp_head' , 'verticalmenu_dynamic_css' );
function verticalmenu_dynamic_css() {
       global $mystickyheight;
	?>
	<style type='text/css'>
     .entry-title
     { 
     <?php
     $verticalmenu_entry_title = get_theme_mod('verticalmenu_entry_title',1); 
     if($verticalmenu_entry_title == 1)
      {
        echo 'display:block;';
      } 
      else
      {
        echo 'visibility: hidden;';
        echo 'max-height: 1px !important;';      
      }
      ?>    
     }
    <?php 
    $verticalmenu_layout_type = get_theme_mod('verticalmenu_layout_type',2); 
    $verticalmenu_position = get_theme_mod('verticalmenu_position',1); 
    if($verticalmenu_layout_type == 1) { ?>
        #wrapper
        	{ 
            	 max-width:1000px !important;
             }  
        .sidebar{
                max-width: 240px !important;
            }
        .site-content {
    		display: block;
    		/* Bill float: left; */
    	/* 	margin-left: 25.4118%; */
    		width: 73.5882%; /* 74 */
    	}
    <?php } 
    elseif ($verticalmenu_layout_type == 2) { ?>
        #wrapper
        	{ 
            	 max-width:1200px !important;
             }  
        .sidebar{
                max-width: 240px !important;
            }
        .site-content {
    		display: block;
    		/* Bill float: left; */
    	/* 	margin-left: 25.4118%; */
    		width: 73.5882%; /* 74 */
    	}
    <?php }
    else { ?>
         #wrapper
        	{ 
            	 max-width:100% !important;
             }  
         .sidebar{
                max-width: 400px !important
            }
         .site-content {
    		display: block;
    		/* Bill float: left; */
    		/* margin-left: 25.4118%; */ 
    		width: 73.5882%; /* 74*/
             padding-right: 15px; 
    	}        
    <?php } 
if($verticalmenu_position == 1)
{ ?>
 .site-content {
    float: right;
    }   
    .sidebar {
    float: left;
    z-index: 1;
    }  
<?php }   
else
{ ?>
   .site-content {
      float: left;
      margin-left: 1em !important;  
      margin-right: 25.4118%;
      margin-left: auto;   
    }   
    .sidebar {
      float: right;
      margin-right:  0px;
      margin-left: -100%;
      right: 0px;
      z-index: 1;
    } 
<?php } ?>
    @media screen and (max-width: 65em) {    
                  .sidebar{
                     max-width: 100% !important;
            }
          .entry-content
             {
                  <?php   if($verticalmenu_entry_title != 1)
                  {
                    /* echo 'margin-top: 300px;'; */
                  } ?>   
             }
            .site-content {
              margin-left: 0em !important;  
            }     
         } 
    <?php  
    $mycopyrightbackground = get_theme_mod('verticalmenu_copyright_background','#ffffff');
    $mycopyrightcolor = get_theme_mod('verticalmenu_copyright_color','#7a7a7a');
    ?>
    .site-info,
    .site-info a {
        color: <?php echo esc_attr($mycopyrightcolor);?> !important;
        background: <?php echo esc_attr($mycopyrightbackground);?> !important;
    }
     #verticalmenu_navbar {
           <?php 
              $mymenubackground = get_theme_mod('verticalmenu_navigation_background', '#e65e23'); 
	           if(! empty ($mymenubackground))
       	         echo 'background:'. ($mymenubackground).'!important;';
            ?> 
     }
    <?php $mymenucolor = get_theme_mod('verticalmenu_menu_color','#ffffff');?> 
	.primary-navigation a {
    <?php
           if(! empty ($mymenucolor))
           {
       	       echo 'color:'. esc_attr($mymenucolor).'!important;';
               echo 'border-bottom-color:'.esc_attr($mymenucolor).'!important;';
           }
    ?>
   } 
    <?php $mymenuhovercolor = get_theme_mod('verticalmenu_menu_hover_color','yellow');?> 
	.primary-navigation a:hover {
    <?php
           if(! empty ($mymenucolor))
           {
       	       echo 'color:'. esc_attr($mymenuhovercolor).'!important;';
           }
    ?>
   }  
    <?php 
    $mysubmenubackground = get_theme_mod('verticalmenu_menu_background', '#e65e23');
    $verticalmenu_sub_menu_text_color = get_theme_mod('verticalmenu_sub_menu_text_color', 'white');
    ?> 
	.primary-navigation ul ul,
	.primary-navigation li li {
          <?php
	           if(! empty ($mysubmenubackground))
       	         echo 'background:'. esc_attr($mysubmenubackground).'!important;';
            ?> 
}
     <?php
      ?> 
	       .primary-navigation ul ul a {
           <?php 
                 if(! empty ($verticalmenu_sub_menu_text_color))
               {
           	       echo 'color:'. esc_attr($verticalmenu_sub_menu_text_color).'!important;';
                   echo 'border-bottom-color:'.esc_attr($verticalmenu_sub_menu_text_color).'!important;';
               }
             ?>     
          /*  color: red !important; */
      }
      <?php
     $mysubmenuhoverbackground = get_theme_mod('verticalmenu_submenu_hover_background', '#ffffff');
     $mysubmenuhovercolor = get_theme_mod('verticalmenu_submenu_hover_color', '#e65e23');     
     ?> 
	.primary-navigation ul ul a:hover,
	.primary-navigation ul ul li.focus > a {
          <?php
	           if(! empty ($mysubmenuhoverbackground))
       	         echo 'background:'. esc_attr($mysubmenuhoverbackground).'!important;';
          	   if(! empty ($mysubmenuhovercolor))
       	         echo 'color:'. esc_attr($mysubmenuhovercolor).'!important;';       
            ?> 
} 
	.primary-navigation {
           <?php $mymenufontsize = get_theme_mod('menu_font_size',14); ?> 
		    font-size: <?php echo esc_attr($mymenufontsize); ?>px !important;
        <?php $verticalmenu_menu_margin_top = esc_attr(get_theme_mod('verticalmenu_menu_margin_top',0)); ?> 
        margin-top: <?php echo esc_attr($verticalmenu_menu_margin_top);?>px !important;
	}
    .sticky {
        <?php
         if($verticalmenu_layout_type == 1)
           {
              echo 'max-width:1000px !important;';
           }
         ?>
        }
 #verticalmenu_navbar {
  width: 100%;
  max-width: 100% !important; 
}
.search-submit 
   {
       margin-top: 10px; 
   }  
 <?php 
	$color_scheme = verticalmenu_get_color_scheme();
    $header_background_color = get_theme_mod('header_background_color', '#00608E');
    if(empty($header_background_color))
      $header_background_color = '#00608E';
    $background_color = trim(get_theme_mod('background_color','#00608e'));
    $verticalmenu_opacity = get_theme_mod('verticalmenu_opacity',10)/10;
    if($verticalmenu_opacity < 0.6 or $verticalmenu_opacity > 1)
      $verticalmenu_opacity = 1;
    $vertical_logo_height = get_theme_mod('vertical_logo_height',200); 
    $verticalmenu_logo_margin_top = get_theme_mod('vertical_logo_margin_top',0); 
    $verticalmenu_total = $vertical_logo_height + $verticalmenu_logo_margin_top; 
    $menu_textcolor = get_theme_mod('menu_textcolor','#ffffff'); 
 ?>           
    #wrapper
      {
          background: #<?php echo $background_color; ?> !important; 
          opacity: <?php echo esc_attr($verticalmenu_opacity);?> !important; 
	  }
    .sidebar,
    #sidebar{
        background: <?php echo $header_background_color; ?> !important; 
    }
      	 @media screen and (max-width: 65em) {
                     .main-navigation
                  .sidebar{
                      max-width: 100% !important
                   }
        } 
    <?php 
     $verticalmenu_menus_enabled = get_theme_mod('verticalmenu_menus_enabled','1');
    /* 
    '1' => 'Only vertical Left Menu',
	'2' => 'Only Horizontal Top Menu',
    */
     if($verticalmenu_menus_enabled == '1'  ){
       ?>
        #verticalmenu_navbar{
          display: none !important;
        }  
       .main-navigation{
        display: block !important;
        }
      <?php 
     }
        elseif($verticalmenu_menus_enabled == '2' ) {
     ?>
        #verticalmenu_navbar{
          display: block !important;
        } 
        .main-navigation {
          display: none !important;
        }
       	 @media screen and (max-width: 65em) {
              #verticalmenu_navbar{
                      display: hidden !important;
                      } 
     <?php  } ?>
            .slicknav_btn
            .slicknav_menu .slicknav_icon 
            {
                background-color:transparent !important;
                border: 0px !important;
            }
            <?php
            global $woocommerce;
            if( isset($woocommerce))
               { ?>
               @media screen and (max-width: 1000px) {
                    #primary
                    {
                        margin-top: 1em !important;
                    } 
              }
              <?php } ?>
        .custom-logo{
          height: <?php echo $vertical_logo_height;?>px !important;
          min-height: <?php echo $vertical_logo_height;?>px !important;
          margin-top: <?php echo $verticalmenu_logo_margin_top;?>px !important;
        }
<?php 
 $vertical_icon_color = esc_attr(get_theme_mod('verticalmenu_topinfo_color','gray'));
 $vertical_topinfo_color = esc_attr($vertical_icon_color);
 $vertical_topinfo_email = esc_html(get_theme_mod('verticalmenu_topinfo_email',''));
 $vertical_topinfo_phone = esc_html(get_theme_mod('verticalmenu_topinfo_phone',''));
 $vertical_topinfo_hours = esc_html(get_theme_mod('verticalmenu_topinfo_hours',''));
if( empty($vertical_topinfo_email) and empty($vertical_topinfo_phone) and empty($vertical_topinfo_hours))
  { ?>
    #header_top_left 
       {
        display: none;  
       }
   #top_header {
    /*  height: 25px !important; */ 
   }    
  <?php  
  }
  else
  { ?>
        #primary
        {
            margin-top: 40px ;
        }  
  <?php }
  if ( empty($vertical_topinfo_email))
  { ?>
         #verticalmenu_iconemail
         {
           display: none !important; 
         }
  <?php }
  if ( empty($vertical_topinfo_phone))
  { ?>
         #verticalmenu_iconphone
         {
           display: none !important; 
         }
  <?php }
  if ( empty($vertical_topinfo_hours))
  { ?>
         #verticalmenu_iconhours
         {
           display: none !important; 
         }
  <?php }
?>
   #header_top_left, #vertical_topinfo_text 
   {
    color: <?php echo $vertical_topinfo_color; ?> !important;
   }
   <?php
     $verticalmenu_mobile_background = get_theme_mod('verticalmenu_mobile_background','#555555');      
     $verticalmenu_mobile_name_color = get_theme_mod('verticalmenu_mobile_name_color','#ffffff');      
     $verticalmenu_mobile_color = get_theme_mod('verticalmenu_mobile_color','#ffffff');      
     $verticalmenu_mobile_separator = get_theme_mod('verticalmenu_mobile_separator','#333333');      
     $verticalmenu_mobile_icon = get_theme_mod('verticalmenu_mobile_icon','#ffffff'); 
?> 
.menu-main-menu-container a,
.menu-item a
{
	color: <?php  echo $menu_textcolor;?>;
}
 .slicknav_menu
{
	background: <?php echo $verticalmenu_mobile_background;?> !important;
	padding: 0;
}
.slicknav_menu  .slicknav_menutxt {
    color: <?php echo $verticalmenu_mobile_name_color;?>;
    font-weight: bold;
    text-shadow: 0 1px 3px #000; 
    } 
.slicknav_icon-bar
{
	background-color: <?php echo $verticalmenu_mobile_icon;?>;
}                    
.slicknav_nav LI
{
	border-top: 1px solid <?php echo $verticalmenu_mobile_separator;?>;
}
.slicknav_nav A
{
	background: none;
	color: <?php echo $verticalmenu_mobile_color;?>;
}
.slicknav_nav A:hover
{
    opacity: .7; 
}
.slicknav_nav A:hover
{
	background: none;
	color: <?php echo $verticalmenu_mobile_color;?>;
    opacity: .7;
}
<?php
if (! isset($woocommerce)) { ?>
 #header_top_left
{
	width: 100% !important;
}
 #header_top_right
{
	width: 0% !important;
} 
<?php 
}
else
{ ?>
 #header_top_left
{
	width: 70% !important;
}
 #header_top_right
{
	width: 25% !important;
} 
<?php }
$verticalmenu_show_sidebar = get_theme_mod('verticalmenu_show_sidebar','1'); 
if($verticalmenu_show_sidebar == '1')
{
    echo '.secondary {';
    echo 'display: block;';
    echo '}';
}



$verticalmenu_blog_post_meta = trim(get_theme_mod('verticalmenu_blog_post_meta','1'));
$verticalmenu_blog_post_meta = esc_attr($verticalmenu_blog_post_meta);
$verticalmenu_blog_post_categories = trim(get_theme_mod('verticalmenu_blog_post_categories','1'));
$verticalmenu_blog_post_categories = esc_attr($verticalmenu_blog_post_categories);
$verticalmenu_blog_post_date = trim(get_theme_mod('verticalmenu_blog_post_date','1'));
$verticalmenu_blog_post_date = esc_attr($verticalmenu_blog_post_date);
$verticalmenu_blog_post_author = trim(get_theme_mod('verticalmenu_blog_post_author','1'));
$verticalmenu_blog_post_author = esc_attr($verticalmenu_blog_post_author);
if($verticalmenu_blog_post_meta != '1')
{
       echo '.entry-content {
             width: 100% !important;
             }';
       echo '.entry-footer {
             display:none !important;
             }';
}
// author
if($verticalmenu_blog_post_categories != '1')
{
       echo '.cat-links {
             display:none !important;
             }';
}
if($verticalmenu_blog_post_date != '1')
{
       echo '.posted-on {
             display:none !important;
             }';
}
if($verticalmenu_blog_post_author <> '1')
{
        echo '.author, .byline {
             display: none;
             }';   
}
?>
</style>
<?php /* end style */
}
/**
 * Output an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the Customizer
 * preview.
 *
 * @since verticalmenu 1.0
 */
function verticalmenu_color_scheme_css_template() {
	$colors = array(
		'background_color'            => '{{ data.background_color }}',
		'header_background_color'     => '{{ data.header_background_color }}',
		'box_background_color'        => '{{ data.box_background_color }}',
		'textcolor'                   => '{{ data.textcolor }}',
		'secondary_textcolor'         => '{{ data.secondary_textcolor }}',
		'border_color'                => '{{ data.border_color }}',
		'border_focus_color'          => '{{ data.border_focus_color }}',
		'sidebar_textcolor'           => '{{ data.sidebar_textcolor }}',
		'sidebar_border_color'        => '{{ data.sidebar_border_color }}',
		'sidebar_border_focus_color'  => '{{ data.sidebar_border_focus_color }}',
		'secondary_sidebar_textcolor' => '{{ data.secondary_sidebar_textcolor }}',
		'meta_box_background_color'   => '{{ data.meta_box_background_color }}',
		'menu_textcolor'              => '{{ data.menu_textcolor }}',    
	);
	?>
	<script type="text/html" id="tmpl-verticalmenu-color-scheme">
		<?php echo verticalmenu_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'verticalmenu_color_scheme_css_template' );
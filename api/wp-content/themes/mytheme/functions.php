<?php

function create_posttype() {

	register_post_type( 'greeting',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Greetings' ),
				'singular_name' => __( 'Greeting' )
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'greeting'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

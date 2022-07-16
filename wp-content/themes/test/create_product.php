<?php
require_once($_SERVER['DOCUMENT_ROOT']."/wp-load.php");
require_once( ABSPATH . 'wp-admin/includes/file.php' );

//Create a New Post
$new_post = array(
	'post_title' => $_POST['product_title'],
	'post_content' => $_POST['product_content'],
	'post_status' => 'publish',
	'post_date' => date('Y-m-d H:i:s'),
	'post_type' => 'product',
);
$post_id = wp_insert_post($new_post);


//Upload Image to WP

$upload = wp_handle_upload( 
	$_FILES[ 'product_image' ], 
	array( 'test_form' => false ) 
);
$attachment_id = wp_insert_attachment(
	array(
		'guid'           => $upload[ 'url' ],
		'post_mime_type' => $upload[ 'type' ],
		'post_title'     => basename( $upload[ 'file' ] ),
		'post_content'   => '',
		'post_status'    => 'inherit',
	),
	$upload[ 'file' ]
);
require_once( ABSPATH . 'wp-admin/includes/image.php' );

wp_update_attachment_metadata(
	$attachment_id,
	wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
);
set_post_thumbnail( $post_id, $attachment_id );
print_r($_FILES);

//Update Post Custom Fields
update_field( 'product_image', $attachment_id, $post_id );
update_field( 'product_publish_date', $_POST['product_date'], $post_id );
update_field( 'product_type', $_POST['product_rarity'], $post_id );
?>
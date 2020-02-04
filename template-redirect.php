<?php
/* Template Name: Redirect to parent page */
/**
 * The template for redirecting pages to their parents page
 *
 * This template redirects page to it's ID (id=slug) on parent's page.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dreikommaein
 */

//get_header(); ?>

<?php
	global $post;
	$slug=$post->post_name;
	$parents = get_post_ancestors( $post->ID );
    $id = $parents[0];
	$parent = get_post( $id );
	//$parent_slug = $parent->post_name;
	$parenturl=get_permalink($parent);
	if(substr($parenturl, -1) == '/') {
		$newparenturl = substr($parenturl, 0, -1);
	}
	//$newurl=$parent_slug.'#'.$slug;
	//$newurl=get_permalink($parent).'#'.$slug;
	$newurl=$newparenturl.'#'.$slug;
	wp_redirect( $newurl );
	exit;
?>
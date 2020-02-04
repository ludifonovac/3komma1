<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dreikommaein
 */

	global $post;
	$postid=$post->ID;
	$blogpage=get_permalink(get_option('page_for_posts'));
	$newurl=$blogpage.'#post-'.$postid;
	wp_redirect( $newurl );
	exit;
?>
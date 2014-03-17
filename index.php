<?php

require_once "parsedown/Parsedown.php";
$parsedown = new Parsedown();

$dir = dirname(__FILE__);
$postsdir = "$dir/posts";

$posts = scandir( $postsdir );

foreach($posts as $filename) {

	if (is_file($postsdir . '/' . $filename)) {
		$post = file_get_contents( $postsdir . '/' . $filename );
		$post = explode("<<<start>>>",$post);
		//print_r($post);
		$meta = json_decode( trim($post[0]) );
		$content = $parsedown->parse( $post[1] );

		echo $content;
	}
}


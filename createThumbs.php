<?php

$dir = dirname(__FILE__);
$upload_dir = "$dir/upload";
$uploads = scandir( $upload_dir );

foreach($uploads as $upload){
	$filepath = "$upload_dir/$upload";

	if (is_file( $filepath )){
		$thumb_filepath = "$dir/photos/thumb_$upload";
		$small_filepath = "$dir/photos/lores_$upload";
		$new_filepath =   "$dir/photos/$upload"; 

		// run command to move image
		rename( $filepath, $new_filepath );
		
		// run command to create thumbnail from moved image
		shell_exec(
			"convert -auto-orient -quality 88 $new_filepath -resize 300x300 $thumb_filepath");

		shell_exec(
			"convert -auto-orient -quality 88 $new_filepath -resize 1200x1200 $small_filepath");

	}
}

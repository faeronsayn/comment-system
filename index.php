<?php
	include 'header.php';


	$my_comment = Comment::get_comment(1);

	echo $my_comment->content;
	echo $my_comment->user_id;
	echo $my_comment->likes;


	include 'footer.php';
?>
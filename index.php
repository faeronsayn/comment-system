<?php
	include ('header.php');


	$my_comment = new Comment(32, "Yet another comment to test the coolness?", "deleted", 15, time(), true);


	echo $my_comment->content .'<br />';
	echo $my_comment->user_id .'<br />';
	echo $my_comment->likes .'<br />';
	echo $my_comment->date . '<br />';


	include ('footer.php');
?>
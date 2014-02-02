<?php 
include 'as-config.php'; 

class comment {

	public $author_id;
	public $comment_content;
	public $comment_id;

 	
	protected function __constructor($content, $author) {
		$author_id = $author;
		$comment_content = $content;
		$db_con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if (mysqli_connect_error()) {
			    die('Connect Error (' . mysqli_connect_errno() . ') '
			            . mysqli_connect_error());
			}
		
		$db_con->query('INSERT INTO comments (user_id, comment_date, content, comment_state) VALUES (' . $author_id . ', ' . time() . ', "' . $comment_content . '", "visible")');
				
	}

	public function get_comment() {



	}

}
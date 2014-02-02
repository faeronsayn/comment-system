<?php 
include ('/home/maazali/public_html/comment-system/cs-config.php'); 

class Comment {

	public $id;
	public $user_id;
	public $content;
	public $state;
	public $likes;
	public $date;


 	
	public function __construct($user_id, $content, $state, $likes, $date, $insert) {
		$this->user_id = $user_id;
		$this->content = $content;
		$this->state = $state;
		$this->likes = $likes;
		$this->date = $date;


		if ($insert) {

			$this->insert_comment();

		}
				
	}


	private function insert_comment() {

			$db_con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				if (mysqli_connect_error()) {
				    die('Connect Error (' . mysqli_connect_errno() . ') '
				            . mysqli_connect_error());
				}
			
			$db_con->query('INSERT INTO cs_comments (user_id, comment_date, content, comment_state, likes) VALUES (' . $this->user_id . ', ' . $this->date . ', "' . $this->content . '", "' . $this->state . '", '. $this->likes . ')');

	}



	public static function get_comment( $comment_id ) {

		$db_con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if (mysqli_connect_error()) {
			    die('Connect Error (' . mysqli_connect_errno() . ') '
			            . mysqli_connect_error());
			}
		

		$query = 'SELECT * FROM cs_comments WHERE comment_id = ' . $comment_id;
		$result = $db_con->query($query);
		$comment_info = $result->fetch_assoc();

		if ($comment_info) {
			
			$id = $comment_id;
			$user_id = $comment_info['user_id'];
			$content = $comment_info['content'];
			$date = $comment_info['comment_date'];
			$state = $comment_info['comment_state'];
			$likes = $comment_info['likes'];

			$comment = new Comment($user_id, $content, $state, $likes, $date, false);

			// Initialize the ID of the comment as well
			$comment->id = $id;

			return $comment;

		} else {

		}

	}

}

?>
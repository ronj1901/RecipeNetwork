
<?php 

	class User {
		private $user;
		private $con;


		public function __construct($con, $user)
		{
			$this->con = $con;
			$user_details_query =  mysqli_query($con, "SELECT * FROM users WHERE userName='$user'");

			$this->user = mysqli_fetch_array($user_details_query);

		}


		public function getUsername()
		{
			return $this->user['userName'];

		}

		public function  getNumPosts()
		{
			$username =$this->user['userName'];
			$query =  mysqli_query($this->con, "SELECT num_posts FROM users WHERE userName='$username'");
			$row = mysqli_fetch_array($query);
			return $row['num_posts'];

		}

		public function getFirstAndLastName()
		{
			$username =$this->user['userName'];
			$query =  mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE userName='$username'" );
			$row = mysqli_fetch_array($query);
			return $row['first_name']. " " . $row['last_name'];
		}

		public function isClosed()
		{
			$username =$this->user['userName'];
			$query = mysqli_query($this->con, "SELECT user_closed FROM users WHERE userName='$username'");
			$row = mysqli_fetch_array($query);
			if($row['user_closed'] == 'yes')
				return true;
			return false;
		}
	}
 ?>
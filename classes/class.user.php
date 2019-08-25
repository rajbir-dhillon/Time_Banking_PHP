<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php

include "db_config.php";


/**

* 

*/

	class User
	{

		//object variables
		public $pdo;
		public $user_data;
		

		public function __construct()
		{
			$this->pdo = new PDO(
			    "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, //DSN
			    DB_USERNAME, //Username
			    DB_PASSWORD //Password
			);


			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			//add pdo error check


			//check to see if the session exists 
			// if (isset($_SESSION['uid'])) {
			// 	$this->user_data = array('uid' => $_SESSION['uid'], 
			//   							 'email' => $_SESSION['email'],
			//   							 'uName' => $_SESSION['uName'],
			//   							 'balance' => $_SESSION['balance'],
			//   							 'logged_in' => $_SESSION['logged_in']);
			// }
			
	  
		}


		/**  
		*  Register Function 
		*/

		public function user_register($uName, $email, $password, $cpassword, $skill, &$regErr)
		{
			$checkuName = $this->check_uName($uName);
			if ($checkuName) {
				//username is already registered
				$regErr = "Username already exists"; 
				return false;

			} else {//if email doesnt exist
				
				$checkEmail = $this->check_email($email);
				if ($checkEmail) {
					//email exists
					$regErr = "Email address is already registered"; 
					return false;

				} else {
					//hash the password
					if ($password != $cpassword) {
						$regErr = "Passwords do not match"; 
						return false;

					} else {
						$hashPassword = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12 ));
						//prepare insert statement
						$code = $this->generate_code();
						$_SESSION['code'] = $code;
						$sql3 = "INSERT INTO user_login (uName, uPass, uEmail, code , balance, ver) VALUES (:username, :password, :email, :code, '100', '0')";
						$stmt3 = $this->pdo->prepare($sql3);
						//bind varaiables
						$stmt3->bindValue(':username', $uName);
						$stmt3->bindValue(':password', $hashPassword);
						$stmt3->bindValue(':email', $email);
						$stmt3->bindValue(':code', $code);
						//execute instert statment
						$result3 = $stmt3->execute();

						if ($result3) {
							$id = $this->pdo->lastInsertId();
							
							$sql4 = "INSERT INTO user_skillgroup (u_ID, skill) VALUES (:u_id, :skill)";
							$stmt4 = $this->pdo->prepare($sql4);

							$stmt4->bindValue(':u_id', $id);
							$stmt4->bindValue(':skill', $skill);

							$result4 = $stmt4->execute();

							if ($result4) {
								$login = $this->user_login($uName, $password, $regErr);
								return true;
							}
						}
					}
				}
			}

		}// /.user_register()

		public function check_uName($uName)
		{ 
			$sql = "SELECT uName FROM user_login WHERE uName = :username";
			$stmt = $this->pdo->prepare($sql);
		
			$stmt->bindValue(':username', $uName);
		
			$stmt->execute();
		
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$rowCount = $stmt->rowCount();
		
			if ($rowCount > 0) {
				return true;
			} else {
				return false;
			}
		}// /.check_uName

		public function check_email($email)
		{
			$sql = "SELECT uEmail FROM user_login WHERE uEmail = :email";
			$stmt = $this->pdo->prepare($sql); 
			 
			$stmt->bindValue(':email', $email);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$rowCount = $stmt->rowCount();

			if ($rowCount > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function update_verify($value)
		{
			if ($value == $_SESSION['code']) {
				$sql = "UPDATE user_login SET ver = '1' WHERE uid = :UID";
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':UID', $_SESSION['uid']);
				$result = $stmt->execute();

				if ($result) {
					$sql1 = "SELECT * FROM user_login WHERE uid = :uid";

					$stmt1 = $this->pdo->prepare($sql1);
					$stmt1->bindValue(':uid', $_SESSION['uid']);
					$result1 = $stmt1->execute();

					$row = $stmt1->fetch(PDO::FETCH_ASSOC);
					if ($result1) {
						$_SESSION['uid'] = $row['uid'];
						$_SESSION['email'] = $row['uEmail'];
						$_SESSION['uName'] = $row['uName'];
						$_SESSION['balance'] = $row['balance'];
						$_SESSION['logged_in'] = true;
						header('Location:posts.php');
					}
					
					return true;
				}
			} else {
				return false;
			}
		}
		public function email_verify($uName)
		{
			$sql = "SELECT * FROM user_login WHERE uName = :uName";
		
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':uName', $uName);
			$result = $stmt->execute();
		
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$rowCount = $stmt->rowCount();

			if ($result) {

				$to      = $row['uEmail'];
				$subject = 'the subject';
				$message = $row['code'];
				$headers = 'From: webmaster@example.com' . "\r\n" .
	    					'Reply-To: webmaster@example.com' . "\r\n" .
	    					'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);
				$_SESSION['uid'] = $row['uid'];
				return true;
			}
			//send email code
		}

		public function generate_code(){
			$digits = 5;
			$code = rand(pow(10, $digits-1), pow(10, $digits)-1);
			return $code;
		}

		
		/*
		 *
		 *	Login function
		 *
		 *	@param    String $uName,	The username entered by the user.
		 *			  String $password,	The password entered by the user.
		 *			  String $regErr, string to be uppdated with error message
		 *
		 *	@return   Bool 
		*/
		public function user_login($uName, $password, &$regErr)
		{

			$sql = "SELECT * FROM user_login WHERE uName = :uName";
		
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':uName', $uName);
		
			$stmt->execute();
		
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$rowCount = $stmt->rowCount();

			if ($rowCount > 0) {
				if ($row['ver'] != 0) {
					$test = password_verify($password, $row['uPass']);
					if ($test) {

						$_SESSION['uid'] = $row['uid'];
						$_SESSION['email'] = $row['uEmail'];
						$_SESSION['uName'] = $row['uName'];
						$_SESSION['balance'] = $row['balance'];
						$_SESSION['logged_in'] = true;

						header("Location: posts.php");
						return true;	
					}
				} else{
					$verify = $this->email_verify($uName);
					header("Location: verification.php");
					return false;
				}
			} else {
				return false;
			}
		}
 

		public function check_login()
		{
			if (isset($_SESSION['logged_in'])) {
				return true;
			} else {
				return false;
			}
		}

		public function get_id()
		{
			return $_SESSION['uid'];
		}

		public function get_allPosts()
		{
			$sql = "SELECT * FROM user_post WHERE open = 1";
			$posts = array();

			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
		
			
			$rowCount = $stmt->rowCount();


			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
				$sql1 = "SELECT * FROM user_login WHERE uid = :uid";
				$stmt1 = $this->pdo->prepare($sql1);
				$stmt1->bindValue(':uid', $row['post_user']);
				$stmt1->execute();
				$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

				$posts[] = array('id' => $row['post_id'], 
								 'title' => $row['post_title'],
								 'content' => $row['post_content'],
								 'user' => $row1['uName'],
								 'cat' => $row['post_cat'],
								 'skill' => $row['post_skill'],
								 'location' => $row['location'],
								 'credit' => $row['credit'],
								 'date' => $row['post_date']);
			}
			return $posts;
		}

		public function get_userPosts()
		{
			$sql = "SELECT * FROM user_post WHERE post_user = :user AND complete = '0'";
			$posts = array();

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":user", $_SESSION['uid']);
			$stmt->execute();
		
			
			$rowCount = $stmt->rowCount();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$posts[] = array('id' => $row['post_id'], 
								 'title' => $row['post_title'],
								 'content' => $row['post_content'],
								 'user' => $row['post_user'],
								 'cat' => $row['post_cat'],
								 'date' => $row['post_date']);
			}

			return $posts;
		}

		public function new_post($title, $content, $user, $cat, $skill, $location, $credit, $post_date)
		{
			$sql = "INSERT INTO user_post (post_title, post_content, post_user, post_cat, post_skill, location, credit, post_date, open, complete) VALUES (:title, :content, :user, :cat, :skill, :location, :credit, :post_date, '1', '0')";

			$stmt = $this->pdo->prepare($sql);
			
			//bind varaiables
			$stmt->bindValue(':title', $title);
			$stmt->bindValue(':content', $content);
			$stmt->bindValue(':user', $user);
			$stmt->bindValue(':cat', $cat);
			$stmt->bindValue(':skill', $skill);
			$stmt->bindValue(':location', $location);
			$stmt->bindValue(':credit', $credit);
			$stmt->bindValue(':post_date', $post_date);
			
			//execute instert statment
			$result = $stmt->execute();
			header("Location:posts.php");
		}

		public function acceptJob($aid)
		{
			$sql = "UPDATE user_post SET hired = :uid, open = '0' WHERE post_id = :aid";

			$stmt = $this->pdo->prepare($sql);

			$stmt->bindValue(':uid', $_SESSION['uid']);
			$stmt->bindValue(':aid', $aid);
		}
		public function complete_job($cid)
		{
			$sql = "UPDATE user_post SET complete = '1', open = '0' WHERE post_id = :cid";
			$posts = array();

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":cid", $cid);
			$stmt->execute();
		
			
			$rowCount = $stmt->rowCount();

			
			return true;
		}

		public function get_completedJob()
		{
			$sql = "SELECT * FROM user_post WHERE post_user = :user AND complete = '1'";
			$posts = array();

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":user", $_SESSION['uid']);
			$stmt->execute();
		
			
			$rowCount = $stmt->rowCount();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$posts[] = array('id' => $row['post_id'], 
								 'title' => $row['post_title'],
								 'content' => $row['post_content'],
								 'user' => $row['post_user'],
								 'cat' => $row['post_cat'],
								 'date' => $row['post_date']);
			}

			return $posts;
		}

		public function delete_post($post_id)
		{
			$sql = "DELETE FROM user_post WHERE post_id = :id";

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':id', $post_id);
			
			$result = $stmt->execute();
		}

		//logout function to destroy session
		public function user_logout()
		{
			$_SESSION['uid'] = FALSE;
			$_SESSION['email'] = FALSE;
			$_SESSION['logged_in'] = FALSE;
			$_SESSION['uName'] = FALSE;
			$_SESSION['balance'] = FALSE;

			session_unset();
			session_destroy();

			header("Location: index.php");
		}
	}
?> 
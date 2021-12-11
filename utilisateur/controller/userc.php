<?PHP
include 'configg.php';
class userC 

{
	public function inscription($product,$con)
	{       
		 $sql = "INSERT INTO users (user_name,user_email,password) values (:user_name, :user_email, :password)";
        try {
            $req = $con->prepare($sql);
            $req->bindValue(':user_name', $product->getuser_name());
            $req->bindValue(':user_email', $product->getuser_email());
			$req->bindValue(':password', $product->getpassword());
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}


	public function modifier_user_data($user_id,$user_name,$user_email,$password,$con)
{

	$sql="UPDATE users set user_name= '$user_name',user_email= '$user_email', password='$password' where user_id='$user_id'";
	try
	{
		$con->query($sql);
	}
	catch (Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}

	function supprimer_cmpt($user_id,$con)
	{
		try {
            $query=$con->prepare("DELETE FROM users WHERE user_id=:user_id");
            $query->execute(['user_id'=>$user_id]);
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
	}
	
	
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}{

function adduser ()
{
	$con=config::getConnexion();
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['uname'];
    	$email = $_POST['email'];
		$password = $_POST['password'];
		if(!empty($user_name) && !empty($password) && !empty($email) && !is_numeric($user_name))
		{
			//save to database
			$user_id = random_num(20);
			$sql = "insert into users (user_id,user_name,password,user_email) values ('$user_id','$user_name','$password','$email')";
			$sql2 = "insert into uinfo (user_id) values ('$user_id')";
			try{  
				$query=$con->prepare($sql);
				$query->execute();
				$query2=$con->prepare($sql2);
				$query2->execute();
				header("Location:sign-in.php");
			}catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
}

function login()
{
	$con=config::getConnexion();
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_email = $_POST['user_email'];
		$password = $_POST['password'];
		if(!empty($user_email) && !empty($password) && !is_numeric($user_email))
		{

			//read from database
			$sql = "select * from users where user_email = '$user_email' limit 1";
			try{  
				$query=$con->prepare($sql);
				$query->execute();
			}catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
			if($query)
			{
					$user_data =  $query->fetch();
					if($user_data['password'] === $password)
					{             
						$_SESSION['user_id'] = $user_data['user_id'];  
                		header("Location: index.php");
						die;	
					}
			}
			
			echo "wrong useremail or password!";
		}else
		{
			echo "wrong useremail or password!";
		}
	}
}

function check_login()
{
	$con=config::getConnexion();
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $sql = "select * from users where user_id = '$id' limit 1";
		try{  
			$query=$con->prepare($sql);
			$query->execute();
		}catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
        if($query)
        {
            $user_data = $query->fetch();
            return $user_data;
        }
    }
    //redirect to login
    header("Location:sign-in.php");
    die;

}

function getuinfo ($id)
{
	$con=config::getConnexion();
	$sql="select * from uinfo where user_id = '$id' limit 1";
	try{  
		$query=$con->prepare($sql);
		$query->execute();
	}catch (Exception $e){
		die('Erreur: '.$e->getMessage());
	}
	$user_data = $query->fetch();
    return $user_data;
}

function logout()
{
	if(isset($_GET['logout'])){
	if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
}
header("Location: sign-in.php");
die;
}
}

function update()
{
	$con=config::getConnexion();
	if(isset($_GET['update'])){
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//users
        $user_id=$_POST['user_id'];
		$user_name=$_POST['user_name'];
        $user_email=$_POST['email'];
        //uinfo
        $description=$_POST['description'];
		$full_name=$_POST['full_name'];
        $mobile=$_POST['mobile'];
        $location=$_POST['location'];
		if(!empty($user_id) && !empty($user_name) && !empty($user_email))
		{
			//save to database
            $sql= "UPDATE `users` SET `user_name`='$user_name',`user_email`='$user_email' WHERE user_id='$user_id'";
            $sql2= "UPDATE `uinfo` SET `description`='$description',`full_name`='$full_name',`mobile`='$mobile',`location`='$location' WHERE user_id='$user_id'";
			try{  
				$query=$con->prepare($sql);
				$query->execute();
				$query2=$con->prepare($sql2);
				$query2->execute();
				header("Location:sign-in.php");
			}catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
			header("Location:profile.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
}
}

function delete ()
{
	$con=config::getConnexion();
	if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql ="DELETE FROM `users` WHERE `user_id` = '$id' ";
        $sql2 ="DELETE FROM `uinfo` WHERE `user_id` = '$id' ";
        try{  
			$query=$con->prepare($sql2);
			$query->execute();
			$query2=$con->prepare($sql);
			$query2->execute();
			logout();
			header("Location:sign-in.php");
		}catch (Exception $e){
		die('Erreur: '.$e->getMessage());
		}
    }
}

}
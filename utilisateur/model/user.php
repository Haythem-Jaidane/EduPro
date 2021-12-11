<?PHP
class user
{   private $user_id;
    private $user_name;
    private $user_email;
    private $password;

    function __construct($user_name,$user_email,$password)
    {   $this->user_name = $user_name; 
        $this->user_email = $user_email;
		$this->password = $password;
    }
    // getter 
    function getuser_name()
    {
        return $this->user_name;
    }
    function getuser_email()
    {
        return $this->user_email;
    }
    function getpassword()
    {
        return $this->password;
    }
    // setter 
     function setuser_name($user_name)
    {
        return $this->user_name= $user_name;
    }
    function setuser_email($user_email)
    {
        return $this->user_email= $user_email;
    }
    function setpassword($password)
    {
        return $this->password= $password;
    }
}
  ?>

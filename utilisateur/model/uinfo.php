<?PHP
class uinfo
{   private $id;
    private $user_id;
    private $description;
    private $location;
    private $mobile;
    private $role;
    private $full_name;
    
    function __construct($description,$location,$mobile,$role,$full_name)
    {   $this->description = $description; 
        $this->location = $location;
		$this->mobile = $mobile;
        $this->role = $role;
		$this->full_name = $full_name;
    }
    // getter 
    function getdescription()
    {
        return $this->description;
    }
    function getlocation()
    {
        return $this->location;
    }
    function getmobile()
    {
        return $this->mobile;
    }
    function getrole()
    {
        return $this->role;
    }
    function getfull_name()
    {
        return $this->full_name;
    }
    // setter 
     function setdescription($description)
    {
        return $this->description= $description;
    }
    function setlocation($location)
    {
        return $this->location= $location;
    }
    function setmobile($mobile)
    {
        return $this->mobile= $mobile;
    }
    function setrole($role)
    {
        return $this->role= $role;
    }
    function setfull_name($full_name)
    {
        return $this->full_name= $full_name;
    }
  
}
 
  ?>

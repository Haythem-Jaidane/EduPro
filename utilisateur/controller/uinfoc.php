<?PHP
class uinfoc
{
 function getuserinfo ($con,$user_id)
{
    $query2="select * from uinfo where user_id = '$user_id' limit 1";
    $result2= mysqli_query($con, $query2);
    $info= mysqli_fetch_assoc($result2);
    return $info;
}
}
<?php
//  include the connection
include_once '../commons/dbconnection.php';
$dbconnection= new dbConnection();

class Login
{
    public function checkUserExistence($username,$password)
    {
        $conn= $GLOBALS["conn"];
        $password= sha1($password); //  hasing the password
        $sql="SELECT u.user_id FROM user u, login l "
                . "WHERE u.user_id=l.user_id AND "
                . "l.login_username='$username' AND "
                . "l.login_password='$password' AND "
                . "u.user_status='1'";
            $result =$conn->query($sql) or die($conn->error);
            $row= $result->fetch_assoc(); // converted to associative
            return $row["user_id"];
    }
}


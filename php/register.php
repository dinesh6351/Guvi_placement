<?php

// mangodb
// $con2 =new MongoDB\Driver\Manager("mongodb://localhost:27017");
// echo "Connection Sucessfully!!!!";
require 'C:\xampp\htdocs\guvi_inten\assets\mongo\vendor\autoload.php';
use MongoDB\Driver\ServerApi;

$con =mysqli_connect('localhost','root','','guvi_database');

if(!$con){
    // echo "Connection Successful!!";
   
    die(mysqli_error($con));
}

if(isset($_POST['user_registers'])){

    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_birthday=$_POST['user_birthday'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    // $user_ip=getIPAddress();


    $select_query="select * from `user_id` where user_name='$user_email'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
    echo "<script>alert('UserName and Email Already exits')</script>";
}else if($user_password!=$conf_user_password){
    echo "<script>alert('Password does not matches')</script>";
    
}else{

    // insert query
 $stmt = $con->prepare("insert into `user_id` (user_name, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user_email, $hash_password);
    echo "<script>alert('insert the values')</script>";
    // $insert_query="insert into `user_id`(user_name,password) values ('$user_email','$hash_password')";
    // $sql_execute=mysqli_query($con,$insert_query);
        if($stmt->execute()){
            echo "<script>alert('Data insert Successfully')</script>";
        }
        try {
            $serverApi = new ServerApi(ServerApi::V1);
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->admin;
$coll = $db->Guvi;
$coll->insertOne([
                'user_name' => $user_username,
                'user_email'=>$user_email,
                'user_dateofbirth'=>$user_birthday,
                'user_contact'=>$user_contact,
                'user_address'=>$user_address
            ]);
            // $result->getInsertedId();
            
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            echo $e;
        }
        echo "<script>window.open('login.html','_self')</script>";
}

}
?>
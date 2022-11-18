<?php
// require 'C:\xampp\htdocs\guvi_inten\assets\mongo\vendor\autoload.php';
// try {
//     // $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
//     // $command = new MongoDB\Driver\Command(["listCollections" => 1]);
//    // Using MongoDBDriverManager
//    $client = new MongoDB\Client("mongodb://localhost:27017");
// $db = $client->admin;
// $coll = $db->Guvi;
// // $document =$coll->findOne(['user_email'=>'jio@gmail.com']);
// $documentlist =$coll->find(['user_email'=>'jio@gmail.com']
// );
// foreach($documentlist as $item){
//     // var_dump($item);
//     echo "<script>alert('$item->user_name')</script>";
// }
// // var_dump($document);

// } catch (\MongoDB\Driver\Exception\Exception $e) {
// }

$con =mysqli_connect('localhost','root','','guvi_database');
if(!$con){
    // echo "Connection Successful!!";
   
    die(mysqli_error($con));
}else{
        echo "Connection Successful!!";

}

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="select * from `user_id` where user_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

if($rows_count>0){
    echo "<script>alert('Login Sucessfully')</script>";
   
    if(password_verify($user_password,$row_data['password'])){
        
        if($rows_count==1){
echo "<script>window.open('./profile.html?name=$user_username','_self')</script>";


        }else{
        echo "<script>alert('Login Sucessfully')</script>";
        echo "<script>window.open('index.html?name=$user_username','_self')</script>";
        }
}else{
    echo "<script>alert('Invalid Credentials g')</script>";
    }
}else{
    echo "<script>alert('Invalid Credentials')</script>";
}

}
?>
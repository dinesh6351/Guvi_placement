<?php

global  $user_name;
global $usermail;
global $list_of_languages;

if(isset($_POST['user_login'])){
    $usermail=$_POST['user_username'];
    echo "<script>alert('$usermail')</script>";
}else{
    
}
// $usermail=$_POST['user_username'];
require 'C:\xampp\htdocs\guvi_inten\assets\mongo\vendor\autoload.php';


   $client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->admin;
$coll = $db->Guvi;
// $document =$coll->findOne(['user_email'=>$usermail]);
$documentlist =$coll->find(['user_email'=>$usermail]);
foreach($documentlist as $doc){
    // var_dump($doc);
      
       $user_name=$doc->user_name;
       $user_emails=$doc->user_email;
       $user_birth=$doc->user_dateofbirth;
       $user_contact=$doc->user_contact;
       $user_address =$doc->user_address;
    

}
       
function user_function(){
   $name=$_GET["name"];
   $client = new MongoDB\Client("mongodb://localhost:27017");
   $db = $client->admin;
   $coll = $db->Guvi;
   $documentlist =$coll->find(['user_email'=>$name]);
foreach($documentlist as $doc){
    // var_dump($doc);
      
       $user_name=$doc->user_name;
       $user_emails=$doc->user_email;
       $user_birth=$doc->user_dateofbirth;
       $user_contact=$doc->user_contact;
       $user_address =$doc->user_address;
    

}
    echo "$user_name";

}
function user_email_function(){
    $name=$_GET["name"];
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->admin;
    $coll = $db->Guvi;
    $documentlist =$coll->find(['user_email'=>$name]);
 foreach($documentlist as $doc){
     // var_dump($doc);
       
        $user_name=$doc->user_name;
        $user_emails=$doc->user_email;
        $user_birth=$doc->user_dateofbirth;
        $user_contact=$doc->user_contact;
        $user_address =$doc->user_address;
     
 
 }
     echo "$user_emails";
}
function user_date_function(){
    $name=$_GET["name"];
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->admin;
    $coll = $db->Guvi;
    $documentlist =$coll->find(['user_email'=>$name]);
 foreach($documentlist as $doc){
     // var_dump($doc);
       
        $user_name=$doc->user_name;
        $user_emails=$doc->user_email;
        $user_birth=$doc->user_dateofbirth;
        $user_contact=$doc->user_contact;
        $user_address =$doc->user_address;
     
 
 }
     echo "$user_birth";
}
function user_adress_function(){
    $name=$_GET["name"];
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->admin;
    $coll = $db->Guvi;
    $documentlist =$coll->find(['user_email'=>$name]);
 foreach($documentlist as $doc){
     // var_dump($doc);
       
        $user_name=$doc->user_name;
        $user_emails=$doc->user_email;
        $user_birth=$doc->user_dateofbirth;
        $user_contact=$doc->user_contact;
        $user_address =$doc->user_address;
     
 
 }
     echo "$user_address";
}
function user_phone_function(){
    $name=$_GET["name"];
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->admin;
    $coll = $db->Guvi;
    $documentlist =$coll->find(['user_email'=>$name]);
 foreach($documentlist as $doc){
     // var_dump($doc);
       
        $user_name=$doc->user_name;
        $user_emails=$doc->user_email;
        $user_birth=$doc->user_dateofbirth;
        $user_contact=$doc->user_contact;
        $user_address =$doc->user_address;
     
 
 }
     echo "$user_contact";
}
?>
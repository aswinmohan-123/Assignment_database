<?php
function adding($first_name,$last_name,$phone,$email,$date){
    $status="good";
    $conn=new mysqli("localhost","aswinmohan","qburst","contact");
    $query1="insert into data (first_name,last_name,email,phone,status,created_date) values('$first_name','$last_name','$email','$phone','$status','$date')";
    $conn->query($query1);
    echo "successfully added";
}
function checking($first_name, $last_name, $phone, $email, $date){
    list($user, $domain) = explode('@', $email);
    if($first_name==""){
        echo "Please enter name";
    } elseif ($last_name==""){
        echo "Please enter last name";
    } elseif ($phone==""){
        echo "Please enter phone";
    } elseif ($email==""){
        echo "Please enter email";
    } elseif (((int)$phone)==0){
        echo "Please enter a valid phone number";        
    } elseif ($domain=="" or $user==""){
        echo "Please enter a valid email";
    } else {
        adding($first_name, $last_name, $phone, $email, $date);
    }
}
if(!empty($_POST)){
    $first_name=$_POST["first_name"];
    $last_name=$_POST["last_name"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $date=date("M d, Y");
    checking($first_name, $last_name, $phone, $email, $date);
}
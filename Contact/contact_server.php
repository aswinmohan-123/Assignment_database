<?php
function sending($query){
    $conn= new mysqli("localhost","aswinmohan","qburst","contact");
    $result=$conn->query($query);
    if($result==""){
        die("no data");
    } else {
        while($row=$result->fetch_assoc()){
            echo json_encode($row)."/";
        }
}
}
function page($query){
    $conn= new mysqli("localhost","aswinmohan","qburst","contact");
    $result=$conn->query($query);
    echo mysqli_num_rows($result)."/";
}
$page=0;
$offset=4;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$search=$_POST["search"];
$query = "select first_name,last_name,email,phone,status,created_date from data";
if($search=="paged"){
    $page_num=$_POST["page"];
    $search_key=$_POST["data"];
    $page=($page_num-1)*4;
}
if ($search=="searching") {
    $search_key=$_POST["value"];
}
if ($search_key!=""){
    $query.=" where first_name='$search_key' or last_name='$search_key' or email='$search_key' or phone='$search_key'";
}
}
page($query);
$query.=" limit $page,$offset";
sending($query);



/*



$page = (if page in url) ? (ge tthat value from url) ? 1;
$noOfRecords = 5;

$query .= "LIMIT ";

*/
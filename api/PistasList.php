<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Credentials: true');  
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");




//Define your host here.
$HostName = "163.10.35.34";
 
//Define your database name here.
$DatabaseName = "cose_pistas";
 
//Define your database username here.
$HostUser = "root";
 
//Define your database password here.
$HostPass = "secyt";
 
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 

//$search = $_GET['search'];


// Getting page from URL.
$page = $_GET['page'];

// Show data from first row means 0 row.
$start = 0;

// Setting up data items limit, means it will only show only 10 items once.
$stop = 10; 


$sql = "SELECT pistas_pista.oid, pistas_pista.nombre, pistas_pista.mp3, pistas_artista.nombre AS artista, pistas_artista.imagen
FROM pistas_pista 
LEFT JOIN pistas_artista ON pistas_pista.artista_oid = pistas_artista.oid"; 

 
// counting all the items present inside table.
$all_rows = mysqli_num_rows(mysqli_query($conn, $sql));

$page_limit = $all_rows/$stop; 

if($page<=$page_limit){
 
    $start = ($page - 1) * $stop; 

    $sql .= " limit $start, $stop";
}

$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>
<?php
header('Content-Type: application/json');
include 'conn.php';
if(isset($_GET['q'])){
  $query = $_GET['q'];
  $sql = mysqli_query($con, "SELECT nm,stn,jml from barang where kd LIKE '".$query."'");
  $row = mysqli_fetch_array($sql,MYSQLI_NUM);
  mysqli_close($con);
  if($row){
    echo json_encode($row);
  }else{
    echo "FALSE";
  }
}
?>

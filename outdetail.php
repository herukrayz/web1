<?php

$id = $_GET['id'];
include 'conn.php';
$query1 = mysqli_query($con, "SELECT * FROM keluar where no='".$id."'");
$row1 = mysqli_fetch_array($query1, MYSQLI_NUM);
$query2 = mysqli_query($con, "SELECT keluar_detail.kd, barang.nm, keluar_detail.jml, barang.stn from keluar_detail inner join barang on keluar_detail.kd=barang.kd WHERE keluar_detail.no='".$id."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet">
  <script>(function(){"use strict";var c=[],f={},a,e,d,b;if(!window.jQuery){a=function(g){c.push(g)};f.ready=function(g){a(g)};e=window.jQuery=window.$=function(g){if(typeof g=="function"){a(g)}return f};window.checkJQ=function(){if(!d()){b=setTimeout(checkJQ,100)}};b=setTimeout(checkJQ,100);d=function(){if(window.jQuery!==e){clearTimeout(b);var g=c.shift();while(g){jQuery(g);g=c.shift()}b=f=a=e=d=window.checkJQ=null;return true}return false}}})();</script>
</head>
<body>
  <div class="container-fluid">
    <div class="form-group row">
      <label class="col-form-label col-sm-2">No Transaksi</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" disabled value="<?php echo $row1[0];?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-sm-2">Tanggal Transaksi</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" disabled value="<?php echo $row1[1];?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-sm-2">Penginput</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" disabled value="<?php echo $row1[2];?>">
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <th>Kode Barang</th>
        <th>Na Barang</th>
        <th>Jumlah</th>
      </thead>
      <tbody id="tbrg"><?php while($row2 = mysqli_fetch_array($query2,MYSQLI_NUM)){ ?>
        <tr>
          <td><input type="text" class="form-control" disabled value="<?php echo $row2[0];?>"></td>
          <td><input type="text" class="form-control" disabled value="<?php echo $row2[1];?>"></td>
          <td><div class="input-group"><input type="text" class="form-control" required aria-describedby="basic-addon2" disabled value="<?php echo $row2[2];?>"><div class="input-group-append"><span class="input-group-text"><?php echo $row2[3];?></span></div></div></td>
        </tr><?php } mysqli_close($con);?>
      </tbody>
    </table>
  </div>
</body>
</html>

<?php

include 'conn.php';
if(isset($_POST['simpan'])){
  mysqli_query($con,"UPDATE barang SET kd='".$_POST['kd']."', nm='".$_POST['nm']."', jml='".$_POST['jml']."', stn='".$_POST['stn']."' WHERE kd='".$_GET['id']."'");
  if($error = mysqli_error($con)){
    $gagal = 1;
  }else{
    $sukses = 1;
  }
}
$query = mysqli_query($con,"SELECT * FROM barang WHERE kd='".$_GET['id']."'");
$row = mysqli_fetch_array($query, MYSQLI_NUM);
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Tambah inventory</li>
      </ol>
      <div class="row">
        <div class="container-fluid"><?php if(isset($gagal)){ ?>
					<div class="alert alert-danger" role="alert"><?php echo $error; ?> </div> <?php } else if(isset($sukses)){ ?>
					<div class="alert alert-success" role="alert">Data Berhasil Tersimpan</div><?php } ?>
					<form method="post" id="tambahan">
          	<div class="form-group row">
							<label for="kd" class="col-form-label col-sm-2">Kode Barang</label>
							<div class="col-sm-10">
								<input name="kd" id="kd" type="text" class="form-control" value="<?php echo $row[0];?>">
							</div>
		  			</div>
            <div class="form-group row">
							<label for="nm" class="col-form-label col-sm-2">Na Barang</label>
							<div class="col-sm-10">
								<input name="nm" id="nm" type="text" class="form-control" value="<?php echo $row[1];?>">
							</div>
		  			</div>
            <div class="form-group row">
							<label for="jml" class="col-form-label col-sm-2">Jumlah</label>
							<div class="col-sm-10">
								<input name="jml" id="jml" type="text" class="form-control" value="<?php echo $row[2];?>">
							</div>
		  			</div>
            <div class="form-group row">
							<label for="stn" class="col-form-label col-sm-2">Satuan</label>
							<div class="col-sm-10">
								<input name="stn" id="stn" type="text" class="form-control" value="<?php echo $row[3];?>">
							</div>
		  			</div>
						<input class="form-control" type="submit" value="Simpan" name="simpan">
					</form>
        </div>
      </div>
    </div>

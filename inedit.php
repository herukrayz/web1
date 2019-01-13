<?php

include 'conn.php';
$no = $_GET['no'];
if(isset($_POST['simpan'])){
	$admin = "Administrator";
	$id = $_POST['id'];
	$jml = $_POST['jml'];
	mysqli_query($con,"UPDATE masuk SET tgl='".$_POST['tgl']."' WHERE no='".$no."'");
	foreach($id as $index => $value){
    mysqli_query($con,"UPDATE barang as b INNER JOIN masuk_detail AS m ON b.kd = m.kd SET b.jml = b.jml + (".$jml[$index]." - m.jml), m.jml='".$jml[$index]."' WHERE m.id='".$value."'");
	}
	if($error = mysqli_error($con)){
		$gagal = 1;
	}else{
		$sukses = 1;
	}
}
$query1 = mysqli_query($con, "SELECT * FROM masuk where no='".$no."'");
$row1 = mysqli_fetch_array($query1, MYSQLI_NUM);
$query2 = mysqli_query($con, "SELECT masuk_detail.kd, barang.nm, masuk_detail.jml, barang.stn, masuk_detail.id from masuk_detail inner join barang on masuk_detail.kd=barang.kd WHERE masuk_detail.no='".$no."'");
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Edit Transaksi Masuk</li>
      </ol>
      <div class="row">
        <div class="container-fluid"><?php if(isset($gagal)){ ?>
					<div class="alert alert-danger" role="alert"><?php echo $error; ?> </div> <?php } else if(isset($sukses)){ ?>
					<div class="alert alert-success" role="alert">Data Berhasil Tersimpan</div><?php } ?>
					<form method="post" id="tambahan">
          	<div class="form-group row">
							<label for="ntrans" class="col-form-label col-sm-2">No Transaksi</label>
							<div class="col-sm-10">
								<input name="no" id="ntrans" type="text" class="form-control" disabled value="<?php echo $row1[0];?>">
							</div>
		  			</div>
				  	<div class="form-group row">
							<label for="tgl" class="col-form-label col-sm-2">Tanggal</label>
							<div class="col-sm-10">
								<input name="tgl" id="tgl" type="date" class="form-control" value="<?php echo $row1[1]; ?>">
							</div>
				  	</div>
				  	<table class="table table-striped">
							<thead>
								<th>Kode Barang</th>
								<th>Na Barang</th>
								<th>Jumlah</th>
							</thead>
							<tbody id="tbrg"><?php $counter = 0; while($row2 = mysqli_fetch_array($query2, MYSQLI_NUM)){ ?>
								<tr>
									<td><input type="hidden" name="id[<?php echo $counter; ?>]" value="<?php echo $row2[4];?>"><input name="kd[<?php echo $counter; ?>]" type="text" class="form-control" value="<?php echo $row2[0];?>" disabled></td>
									<td><input type="text" class="form-control" disabled value="<?php echo $row2[1];?>"></td>
									<td><div class="input-group"><input name="jml[<?php echo $counter; ?>]" type="text" class="form-control" required aria-describedby="basic-addon2" value="<?php echo $row2[2];?>"><div class="input-group-append"><span class="input-group-text"><?php echo $row2[3];?></span></div></div></td>
								</tr><?php $counter++;} mysqli_close($con);?>
							</tbody>
						</table>
						<input class="form-control" type="submit" value="Simpan" name="simpan">
					</form>
        </div>
      </div>
    </div>

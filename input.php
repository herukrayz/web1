<?php

if(isset($_POST['simpan'])){
	$admin = "Administrator";
	$kd = $_POST['kd'];
	$jml = $_POST['jml'];
	include 'conn.php';
	mysqli_query($con,"INSERT INTO masuk VALUES (NULL, '".$_POST['tgl']."', '".$admin."')");
	$id = mysqli_insert_id($con);
	foreach($kd as $index => $value){
		mysqli_query($con,"INSERT INTO masuk_detail VALUES (NULL, '".$id."', '".$value."', '".$jml[$index]."')");
		mysqli_query($con,"UPDATE barang SET jml = jml + ".$jml[$index]." WHERE kd='".$value."'");
	}
	if($error = mysqli_error($con)){
		$gagal = 1;
	}else{
		$sukses = 1;
	}
	mysqli_close($con);
}
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Input Barang</li>
      </ol>
      <div class="row">
        <div class="container-fluid"><?php if(isset($gagal)){ ?>
					<div class="alert alert-danger" role="alert"><?php echo $error; ?> </div> <?php } else if(isset($sukses)){ ?>
					<div class="alert alert-success" role="alert">Data Berhasil Tersimpan</div><?php } ?>
					<form method="post" id="tambahan">
          	<div class="form-group row">
							<label for="ntrans" class="col-form-label col-sm-2">No Transaksi</label>
							<div class="col-sm-10">
								<input name="no" id="ntrans" type="text" class="form-control" disabled>
							</div>
		  			</div>
				  	<div class="form-group row">
							<label for="tgl" class="col-form-label col-sm-2">Tanggal</label>
							<div class="col-sm-10">
								<input name="tgl" id="tgl" type="date" class="form-control" required>
							</div>
				  	</div>
				  	<table class="table table-striped">
							<thead>
								<th>Kode Barang</th>
								<th>Na Barang</th>
								<th>Jumlah</th>
								<th>Aksi</th>
							</thead>
							<tbody id="tbrg">
								<tr>
									<td><input id="kd0" name="kd[0]" type="text" class="form-control"></td>
									<td><input id="nm0" type="text" class="form-control" disabled></td>
									<td><div class="input-group"><input id="jml0" name="jml[0]" type="number" class="form-control" required aria-describedby="basic-addon2" disabled min="1"><div class="input-group-append"><span class="input-group-text" id="stn0">@</span></div></div></td>
									<td><button class="btn btn-danger" id="hapus" disabled>Hapus</button></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td><input type="text" disabled class="form-control"></td>
									<td><input type="text" disabled class="form-control"></td>
									<td><div class="input-group"><input type="number" disabled class="form-control"><div class="input-group-append"><span class="input-group-text">@</span></div></div></td>
									<td><button type="button" class="btn btn-priry" id="tambah">Tambah</button></td>
								</tr>
							</tfoot>
						</table>
						<input class="form-control" type="submit" value="Simpan" name="simpan">
					</form>
        </div>
      </div>
    </div>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var counter = 1;
				var to;
				$(document).on('change keyup paste','[id^=kd]', function() {
					var i=this.id.split('kd')[1];
					clearTimeout(to);
					to = setTimeout(function(){
						$.ajax({
							url: "/kd.php?q=" + $('#kd'+i).val(),
							success: function(data){
								$('#nm'+i).val(data[0]);
								$('#stn'+i).html(data[1]);
								$('#jml'+i).prop("disabled", false);
							},
							error: function(){
								$('#stn'+i).html('@');
								$('#nm'+i).val('');
								$('#jml'+i).prop("disabled", true);
							}
						});
					},500);
				});
				$('#tambah').click(function(){
					var tmpl ='<tr>';
					tmpl +='	<td><input id="kd'+counter+'" name="kd['+counter+']" type="text" class="form-control" required></td>';
					tmpl +='	<td><input id="nm'+counter+'" type="text" class="form-control" disabled></td>';
					tmpl +='	<td><div class="input-group"><input id="jml'+counter+'" name="jml['+counter+']" type="number" class="form-control" required aria-describedby="basic-addon2" disabled required min="1"><div class="input-group-append"><span class="input-group-text" id="stn'+counter+'">@</span></div></div></td>';
					tmpl +='	<td><button class="btn btn-danger" id="hapus">Hapus</button></td>';
					tmpl +='</tr>';
					$('#tbrg').append(tmpl);
					counter++;
				});
				$('.table').on("click", "#hapus", function(event){
					$(this).closest('tr').remove();
					counter -= 1;
				});
			});
		</script>

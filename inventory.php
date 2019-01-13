<?php

include 'conn.php';
if(isset($_GET['hapus']) && isset($_GET['id'])){
  mysqli_query($con, "DELETE FROM barang where kd='".$_GET['id']."'");
  if($error = mysqli_error($con)){
    $gagal = 1;
  }else{
    $sukses = 1;
  }
}
$query = mysqli_query($con, "SELECT * FROM barang");
?>
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <label>Konfirsi</label>
              </div>
              <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus data?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-danger btn-ok">Hapus</a>
              </div>
          </div>
      </div>
  </div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Inventory</li>
      </ol>
      <div class="row">
        <div class="container-fluid"><?php if(isset($gagal)){ ?>
					<div class="alert alert-danger" role="alert"><?php echo $error; ?> </div> <?php } else if(isset($sukses)){ ?>
					<div class="alert alert-success" role="alert">Data Berhasil Terhapus</div><?php } ?>
          <table class="table table-striped">
            <thead>
              <th>Kode Barang</th>
              <th>Na Barang</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </thead>
            <tbody><?php  while($row = mysqli_fetch_array($query, MYSQLI_NUM)){ ?>
              <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2].' '.$row[3]; ?></td>
                <td><a class="btn btn-success btn-sm" id="edit" href="/?p=edit&id=<?php echo $row[0];?>">Edit</a> <button class="btn btn-danger btn-sm" data-href="/?p=inventory&id=<?php echo $row[0];?>&hapus=1" data-toggle="modal" data-target="#confirm-delete">Hapus</button></td>
              </tr><?php }  mysqli_close($con);?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function(){
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    });
    </script>

<?php

include 'conn.php';
$query = mysqli_query($con, "SELECT * FROM keluar");
if(isset($_GET['hapus']) && isset($_GET['id'])){
  $query1 = "DELETE FROM keluar where no='".$_GET['id']."';";
  $query1 .= "DELETE FROM keluar_detail WHERE no='".$_GET['id']."';";
  mysqli_multi_query($con,$query1);
  if($error = mysqli_error($con)){
    $gagal = 1;
  }else{
    $sukses = 1;
  }
}
?>
  <div class="modal fade" id="transdetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <label>Detail Transaksi suk</label>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
          </div>
      </div>
  </div>
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
    <div class="container-fluid"><?php if(isset($gagal)){ ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?> </div> <?php } else if(isset($sukses)){ ?>
      <div class="alert alert-success" role="alert">Data Berhasil Terhapus</div><?php } ?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">List Transaksi Keluar</li>
      </ol>
      <div class="row">
        <div class="container-fluid">
          <table class="table table-striped">
            <thead>
              <th>No Trasaksi</th>
              <th>Tanggal</th>
              <th>Penginput</th>
              <th>Status</th>
              <th>Aksi</th>
              <th></th>
            </thead>
            <tbody><?php  while($row = mysqli_fetch_array($query, MYSQLI_NUM)){ ?>
              <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo date("d-m-Y",strtotime($row[1])); ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php $setuju = array('Belum Disetujui', 'Disetujui', 'Ditolak'); echo $setuju[$row[3]]; ?>
                <td><button data-href="/outdetail.php?id=<?php echo $row[0]; ?>" class="btn btn-warning btn-sm" id="detail" data-toggle="modal" data-target="#transdetail">Detail</button> <a class="btn btn-success btn-sm" id="edit" href="/?p=outedit&no=<?php echo $row[0]; ?>">Edit</a> <button class="btn btn-danger btn-sm" data-href="/?p=inlist&id=<?php echo $row[0];?>&hapus=1" data-toggle="modal" data-target="#confirm-delete">Hapus</button></td>
              </tr><?php }  mysqli_close($con);?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function(){
      $('#transdetail').on('show.bs.modal', function(e) {
        $(this).find('.modal-body').load($(e.relatedTarget).data('href'));
      });
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    });
    </script>

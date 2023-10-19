<?php
if(isset($_GET['pesan'])){
  if($_GET['pesan']=='file-not-support'){
    echo "<script>window.alert('File Upload Tidak Support');</script>";
  }
  else{}
}
else{}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Dosen</h3>
              </div>              
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button> 
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead class='bg-blue'>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>PDD</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_dsn");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $mhs['nidn'];?></td>
                    <td><?php echo ucfirst(strtolower($mhs['nama']));?></td>
                    <td><?php echo $mhs['gen'];?></td>
                    <td><?php echo $mhs['pdd'];?></td>
                    <td><?php echo $mhs['jabatan'];?></td>
                    <td><?php echo $mhs['status_akt'];?></td>
                    <td>
                      <a onclick="hapus_data(<?php echo $mhs['id'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <a href="?page=edit-Mhs&&id=<?php echo $mhs['id'];?>" class="btn btn-sm btn-success">Edit</a>
                      <!-- <a href="index.php?page=scan-suratKeluar&&id=<?php echo $mhs['id'];?>" class="btn btn-sm btn-warning">Scan</a>
                      <?php if($mhs['document']>0){?>
                      <a data-id="<?php echo $mhs['document'];?>" class="btn btn-sm btn-primary doc" data-toggle="modal" data-target=".bd-example-modal-sm">view</a>
                      <?php } else{} ?> -->
                    </td>
                  </tr>
                  <?php }?>                 
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="get" action="add/tambah_suratKeluar.php">
                <div class="form-group">
                  <label for="formGroupExampleInput">NPM</label>
                  <input type="text" class="form-control" placeholder="NPM" name="npm" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Nama</label>
                  <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">L/P</label>
                  <input type="text" class="form-control" placeholder="Nama Lengkap" name="L/P" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Kelas</label>
                  <input type="text" class="form-control" placeholder="Kelas" name="kelas" required>
                </div>
                <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
              </form>
            </div>
                
              
            </div>
            
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Modal View Data -->
      <div class="modal fade" id="modal-view">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">View Data </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="get" action="add/tambah_suratMasuk.php">
                <div class="form-group">
                  <label for="formGroupExampleInput">No Agenda</label>
                  <input type="text" class="form-control" placeholder="No Agenda" name="no_agenda" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Pengirim</label>
                  <input type="text" class="form-control" placeholder="Pengirim" name="pengirim" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Tgl Surat</label>
                  <input type="date" class="form-control" placeholder="Tgl Surat" name="tgl_surat" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Perihal</label>
                  <input type="text" class="form-control" placeholder="Perihal" name="perihal" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Tindak Lanjut</label>
                  <input type="text" class="form-control" placeholder="Tindak Lanjut" name="tindak_lanjut" required>
                </div>
                <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
              </form>
            </div>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Modal View Document -->                   
      <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content view-doc">
            ...
          </div>
        </div>
      </div>
<script>
    $(document).ready(function(){
    $(".doc").click(function(){
       id = $(this).attr('data-id');
      //id = 100;
      //alert(id);
      $.ajax({
            url: "doc-surat-keluar/view.php",
            method: "POST",
            data: {id:id},
            dataType: "html",
            success: function(data){
              $('.view-doc').html(data);
            }
          });
    });
  });

  function hapus_data(data_id){
    //alert('ok');
    //window.location=("delete/hapus_data.php?id="+data_id);
    Swal.fire({
      title: 'Apakah Datanya akan Dihapus?',
      //showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      confirmButtonColor: '#CD5C5C',
      //denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         window.location=("delete/hapus_Mhs.php?id="+data_id)
      } 
    }) 
  }
</script>
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
                <h3 class="card-title text-bold text-green">Semester I</h3>
              </div>              
              <!-- /.card-header -->
              <div class="card-body">
              
                <table id="example1" class="table table-bordered table-striped">
                <thead class='bg-yellow'>
                  <tr>
                    <th>No</th>
                    <th>Nama MK</th>
                    <th>Kode MK</th>
                    <th>SKS</th>
                    <th>Dosen</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Tahun</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_mk where semester =1 and kelas='A'");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $mhs['nama_mk'];?></td>
                    <td><?php echo $mhs['kode_mk'];?></td>
                    <td><?php echo $mhs['sks'].' SKS';?></td>
                    <td><?php echo $mhs['dosen'];?></td>
                    <td><?php echo $mhs['hari'];?></td>
                    <td><?php echo $mhs['jam'];?></td>
                    <td><?php echo $mhs['tahun_ajaran'];?></td>
                    
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
              <div class="view-data"></div>
              <div class="view-data2"></div>
              <div class="view-data3"></div>
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
      
<script>
    $(document).ready(function(){
   // $(".dataPemb").click(function(){
       //npm = $(this).attr('data-npm');
       //mhs = $(this).attr('data-mhs');
      //alert(100);
      $.ajax({
            url: "pages/jurnal_mk3.php",
            method: "POST",
           // data: {npm:npm,mhs:mhs},
            dataType: "html",
            success: function(data){
              $('.view-data').html(data);
            }
          });
    });
    $.ajax({
            url: "pages/jurnal_mk5.php",
            method: "POST",
           // data: {npm:npm,mhs:mhs},
            dataType: "html",
            success: function(data){
              $('.view-data2').html(data);
            }
          });
    $.ajax({
      url: "pages/jurnal_mk7.php",
      method: "POST",
      // data: {npm:npm,mhs:mhs},
      dataType: "html",
      success: function(data){
        $('.view-data3').html(data);
      }
    });      
 // });

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
         window.location=("delete/hapus_suratKeluar.php?id="+data_id)
      } 
    }) 
  }
</script>
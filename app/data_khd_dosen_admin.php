<?php
if(isset($_GET['pesan'])){
  if($_GET['pesan']=='file-not-support'){
    echo "<script>window.alert('File Upload Tidak Support');</script>";
  }
  else{}
}
else{}
?>
<script src="../app/plugins/jquery/jquery.min.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kehadiran Dosen Perkuliahan All</h3>
              </div>              
              <!-- /.card-header -->
              <div class="card-body">
              
                <table id="example1" class="table table-bordered table-striped">
                <thead class='bg-blue'>
                  <tr>
                    <th>No</th>
                    <th>Nama MK</th>
                    <th>Kode MK</th>
                    <th>SKS</th>
                    <th>Dosen</th>
                    <th>Semester</th>
                    <th>Tahun</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    $id_dosen = $_SESSION['noId'];
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_mk WHERE tahun_ajaran = '2023/2024'");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $mhs['nama_mk'];?></td>
                    <td><?php echo $mhs['kode_mk'];?></td>
                    <td><?php echo $mhs['sks'].' SKS';?></td>
                    <td><?php echo $mhs['dosen'];?></td> 
                    <td><?php echo $mhs['semester'];?></td>
                    <td><?php echo $mhs['tahun_ajaran'];?></td>
                    
                    
                    <td>
                      <a 
                      data-dsn ="<?php echo $mhs['dosen'];?>"
                      data-kode="<?php echo $mhs['kode_mk'];?>" 
                      data-mk="<?php echo $mhs['nama_mk'];?>"
                      data-kls="<?php echo $mhs['kelas'];?>"
                      class="dataMhs btn btn-sm btn-info">View</a>
                      
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
              <div class="view-data">
            
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
          
<script>
    $(document).ready(function(){
    $(".dataMhs").click(function(){
       dosen = $(this).attr('data-dsn');
       kode = $(this).attr('data-kode');
       mk   = $(this).attr('data-mk');
       kls  = $(this).attr('data-kls');
       thn  = '2023/2024';
      //alert(100);
      $.ajax({
            url: "pages/view-dataKhdDsn-admin.php",
            method: "POST",
            data: {dosen:dosen,kode:kode,mk:mk,kls:kls,thn:thn},
            dataType: "html",
            success: function(data){
              $('.view-data').html(data);
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
         window.location=("delete/hapus_suratKeluar.php?id="+data_id)
      } 
    }) 
  }
</script>
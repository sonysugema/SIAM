<?php include('../../conf/config.php');?>
<style>
  input[type='checkbox']{width:50px;}
</style>
<div class="row">
  <div class="col-12"> 
    <div class="card-header">
      <h3 class="card-title text-bold text-green">Semester I</h3>
    </div>
    <div class="card-body">
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Pembayaran 
                </button> 
                <br></br> -->
    <table id="view-b1" class="table table-bordered table-striped ">
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
                    //$npm = $_POST['npm'];
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_mk where semester =1 and kelas='B'");
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
              <div class="view-b1"></div>
              <div class="view-b2"></div>
              <div class="view-b3"></div>
    </div>
</div>

       
<script>
$(document).ready(function(){
  $.ajax({
            url: "pages/jurnal_b2.php",
            method: "POST",
           // data: {npm:npm,mhs:mhs},
            dataType: "html",
            success: function(data){
              $('.view-b1').html(data);
            }
          });
});

  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#view-b1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ]
    });
  });
  </script>
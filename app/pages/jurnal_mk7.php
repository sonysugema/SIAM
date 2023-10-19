<?php include('../../conf/config.php');?>
<style>
  input[type='checkbox']{width:50px;}
</style>
<div class="row">
  <div class="col-12"> 
    <div class="card-header">
      <h3 class="card-title text-bold text-green">Semester VII</h3>
    </div>
    <div class="card-body">
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Pembayaran 
                </button> 
                <br></br> -->
    <table id="view-mk7" class="table table-bordered table-striped ">
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
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_mk where semester =7 and kelas='A'");
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
    </div>
</div>
<!-- MOdal Proses Pembayaran -->
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pembayaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="add/tambah_pembayaran.php">
                <div class="form-group">
                  <label for="formGroupExampleInput">NPM</label>
                  <input type="text" class="form-control"  name="npm" value="<?php echo $_POST['npm'];?>" readonly>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Nama Mahasiswa</label>
                  <input type="text" class="form-control"  value="<?php echo $_POST['mhs'];?>" name="nama" readonly>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Jenis Pembayaran</label>
                  <select name="jenis" onchange='jenisP()' class="form-control"  id='jenis'>
                    <option > </option>
                    <?php 
                      $query = mysqli_query($koneksi,"SELECT * FROM tb_jenispembayaran");
                      while($view = mysqli_fetch_array($query)){
                        ?>
                        <option><?php echo $view['jenis'];?></option>
                    <?php                          
                      }
                    ?>
                    
                  </select>
                </div>
                <div class="form-group" id='list-smt' style='display:none;'>
                  <!-- <label for="formGroupExampleInput2">Nilai</label> -->
                  <table width='100%'>
                    <tr>
                      <td><input type="checkbox"  name="detail[]" value='1'>Semester 1</td>
                      <td><input type="checkbox"  name="detail[]" value='3'>Semester 3</td>
                      <td><input type="checkbox"  name="detail[]" value='5'>Semester 5</td>
                      <td><input type="checkbox"  name="detail[]" value='7'>Semester 7</td>                      
                    </tr>
                    <tr>
                      <td><input type="checkbox"  name="detail[]" value='2'>Semester 2</td>
                      <td><input type="checkbox"  name="detail[]" value='4'>Semester 4</td>
                      <td><input type="checkbox"  name="detail[]" value='6'>Semester 6</td>
                      <td><input type="checkbox"  name="detail[]" value='8'>Semester 8</td>                      
                    </tr>
                  </table>
                  
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Nilai</label>
                  <input type="text" class="form-control"  name="nilai" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Keterangan</label>
                  <input type="text" class="form-control" placeholder="Keterangan" name="ket" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Upload Bukti</label>
                  <input type="file" name='doc' id='input' required>
                  <img src="img/No_image.png" id='img' height='100px'>
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
<!-- End Modal Proses Pembayaran -->
       <!-- Modal View Document -->                   
       <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content view-doc">
            ...
          </div>
        </div>
       
<script>
function jenisP(){
  x = document.getElementById('jenis').value;
  y = document.getElementById('list-smt');
  //alert(x);
  if(x=='Her-Registrasi per semester (1-8)'){
    //alert(x);
    y.style.display = '';
  }
  else{
    y.style.display = "none";
  }
} 

img   = document.getElementById('img'); input = document.getElementById('input');
                input.onchange = (e) => {
                  if (input.files[0])
                    img.src = URL.createObjectURL(input.files[0]);
                }

$(document).ready(function(){
  $(".viewDoc").click(function(){
     id = $(this).attr('data-id');
    //id = 100;
    //alert(id);
    $.ajax({
          url: "views/view-doc.php",
          method: "POST",
          data: {id:id},
          dataType: "html",
          success: function(data){
            $('.view-doc').html(data);
          }
        });
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
    $('#view-mk7').DataTable({
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
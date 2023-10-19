<script src="../app/plugins/jquery/jquery.min.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- /.card -->
          </div>
          <!-- /.col tambahan -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#kelasA" data-toggle="tab">Kelas A</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kelasB" data-toggle="tab">Kelas B</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kelasC" data-toggle="tab">Kelas C</a></li>
                </ul>
              </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="kelasA">
                    <!-- Post -->
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
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="kelasB">
                    <!-- The timeline -->
                    <div class="jurnal-B1"></div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="kelasC">
                    <div class="jurnal-C1"></div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  
    <!-- /.content -->
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
    $.ajax({
      url: "pages/jurnal_b1.php",
      method: "POST",
      // data: {npm:npm,mhs:mhs},
      dataType: "html",
      success: function(data){
        $('.jurnal-B1').html(data);
      }
    });
    $.ajax({
      url: "pages/jurnal_c1.php",
      method: "POST",
      // data: {npm:npm,mhs:mhs},
      dataType: "html",
      success: function(data){
        $('.jurnal-C1').html(data);
      }
    });      
 // });
 </script>
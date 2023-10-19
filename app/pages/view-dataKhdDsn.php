<style>
    .modal-dialog {
      display: flex;
      align-items: center;
      justify-content: center;
      height:90vh;
    }
    .modal-content {
      text-align: center;
    }
  </style>



					<!-- Modal Camera -->					
					<div id="modalBukaKamera" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close btn btn-sm" data-dismiss="modal">&times;</button>
							  <!-- <h4 class="modal-title">Ambil Foto dari Camera</h4> -->
							</div>
							<div class="modal-body">
							  <p class="infocamera">Pastikan Browser Anda Mendukung Camera</p>
							  <div id="kameraku"></div>
								<canvas class="canvasTag" style="display: none;" width="640" height="480"></canvas>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-sm btn-success absensekarang"><i class="fa fa-check-circle"></i> Lakukan Absensi Sekarang</button>
							</div>
                <input id="Latitude" class='latitude_new' hidden>
                <input id="Longitude" class='longitude_new' hidden>
                <script>
                var x = document.getElementById("Latitude");
                var y = document.getElementById("Longitude");
                navigator.geolocation.getCurrentPosition(showPosition);


                function showPosition(position) {
                  x.value = position.coords.latitude; 
                  y.value = position.coords.longitude;
                }
                </script>
						  </div>                
					</div>
             
      <!-- <div class="control-sidebar-bg"></div> -->
    </div>
 
    <!-- Modal Materi -->
<div class="modal fade" id="materiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Materi Pertemuan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Tugas -->
        
        <input id="viewidMateri" name="doc" hidden>
        <label for="up-img1">
                      <input id='up-img1' type="file" name="materi[]"  class="imageButton1" hidden>
                        <img  src="img/upload.png" style="width:40px; cursor:pointer;">
        </label><br>
      <label class="result-materi">upload dokumen dalam format PDF</label>
        <!-- end Tugas -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- End Modal Tugas -->
<!-- Modal Tugas -->
<div class="modal fade" id="tugasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Tugas Pertemuan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Tugas -->
        
        <input id="viewidtask" name="task" hidden>
        <label for="up-img2">
                      <input id='up-img2' type="file" name="tugas[]"   class="imageButton2" hidden>
                        <img  src="img/upload.png" style="width:40px; cursor:pointer;">
        </label><br>
        <label class="result-task">upload dokumen dalam format PDF</label>
        <!-- end Tugas -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- End Modal Tugas -->
   
 <?php include('../../conf/config.php');?>
<style>
  input[type='checkbox']{width:50px;}
</style>
<div class="row">
  <div class="col-12"> 
    <div class="card-header">
      <h3 class="card-title text-bold text-green">Kehadiran MK : <?php echo $_POST['mk'].' '.$_POST['thn'];?></h3>
    </div>       
     
    <div class="card-body">
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Pembayaran 
                </button> 
                <br></br> -->               
                <!-- <a style='float:right' data-kode='<?php //echo $_POST['kode'];?>' class='SimpanNilai btn btn-xl btn-success'>Simpan</a></br></br> -->              
                <?php
                $kode_mk      = $_POST['kode'];
                $kls          = $_POST['kls'];
                $tahun_ajaran = '2023/2024';
                $qcek         = mysqli_query($koneksi, "SELECT *,count(id)cek FROM tb_khd_dsn WHERE kode_mk = '$kode_mk' AND tahun_ajaran='$tahun_ajaran'");
                $rcek         = mysqli_fetch_array($qcek);
                if($rcek['cek']<=0){
                ?>
                  <a  style='float:right' data-id='0' data-kode='<?php echo $_POST['kode'];?>' data-dsn="<?php echo $_POST['dosen'];?>" class='CreateNilai btn btn-xl btn-warning'>Create</a></br></br>
                <?php }
                else{echo "<a style='float:right' data-id='1' data-kode='$_POST[kode]' class='SimpanNilai btn btn-xl btn-success'>Simpan</a></br></br>";}
                ?>
               
                <table id="dataMhs" class="table table-bordered table-striped">
                  <thead class='bg-blue'>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>                    
                    <th>Kode MK</th>
                    <th>Pertemuan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Presensi</th>
                    <th>Materi</th> 
                    <th>Tugas</th>
                    <th>Thn Ajaran</th>      
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_khd_dsn WHERE kode_mk = '$kode_mk' AND tahun_ajaran = '2023/2024'");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?><input name='nip[]' size='3' value='<?php echo $mhs['nip'];?>' hidden></td>
                    <td><input name='nama[]' size='3' value='<?php echo $mhs['nama'];?>' hidden><?php echo ucwords(strtolower($mhs['nama']));?></td>
                    <td><input name='kode[]' size='3' value='<?php echo $mhs['kode_mk'];?>' hidden><?php echo $mhs['kode_mk'];?></td>
                    <td><input name='id_meet[]' size='3' value='<?php echo $mhs['id'];?>' hidden><?php echo $mhs['meet'];?></td>
                    <td><input name='jamMulai[]' size='3' value='<?php echo $mhs['jam_mulai'];?>' type='time'></td>
                    <td><input name='jamSelesai[]' size='3' value='<?php echo $mhs['jam_selesai'];?>' type='time'></td>
                    <!-- Untuk Presensi Webcam dengan Longitude & Latitude -->
                    <td class='text-center'>
                        <?php
                        if($mhs['latitude']!=''){?>
                          <label  class="bukakamera" data-toggle="modal" data-target="#bukaLokasi" data-idcam='<?php echo $mhs['id'];?>'>
                            <img data-icon='<?php echo $mhs['id'];?>' src="img/checklist.png" style="width:30px; cursor:pointer;">
                          </label>
                        <?php }
                        else{?>
                          <label  class="bukakamera" data-toggle="modal" data-target="#modalBukaKamera" data-idcam='<?php echo $mhs['id'];?>'>
                            <img data-icon='<?php echo $mhs['id'];?>' src="img/cam.png" style="width:30px; cursor:pointer;">
                          </label>
                        <?php }
                        ?>
                    </td>
                    <!-- Untuk Upload Dokumen & Tugas Perkuliahan -->
                    <!-- <form method="post"  enctype="multipart/form-data" id="imageForm"> -->
                    <td class='text-center'>
                    <?php      
                    $id = $mhs['id'];
                  if(file_exists("./../upload/materi/$id.pdf")){?>
                    <img src="img/materi.png" style="width:30px; cursor:pointer;">
                  <?php } else{?>
                    <button type="button" data-materi="<?php echo $mhs['id'];?>" class="btn btn-success materi" data-toggle="modal" data-target="#materiModal" value="<?php echo $mhs['id'];?>">
                      Meet : <?php echo $mhs['id'];?>
                      </button>
                    </td>
                  <?php }?>
                   

                    <td class='text-center'>
                    <button type="button" data-task="<?php echo $mhs['id'];?>"   class="btn btn-primary task"   data-toggle="modal" data-target="#tugasModal" value="<?php echo $mhs['id'];?>">
                      Meet : <?php echo $mhs['id'];?>
                      </button>
                    </td>
                    <!-- </form> -->
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
   <!--  Untuk Web CAM-->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>   
<script src="dist/js/webcam.min.js"></script>  
    <!-- End-->
  <script>
  $(document).ready(function(){
  $(".materi").click(function(){
    $('.result-materi').html('upload dokumen dalam format PDF');  
    materi   = $(this).attr('data-materi');
    $("#viewidMateri").val(materi);
   console.log(materi);
  });

  $(".task").click(function(){
    $('.result-task').html('upload dokumen dalam format PDF');  
    tugas   = $(this).attr('data-task');
    $("#viewidtask").val(tugas);
   console.log(tugas);
  });
});
  
  $('.bukakamera').on('click', function(){
    idcam   = $(this).attr('data-idcam');
    console.log(idcam);
		$('.infocamera').css({'display':'block'});
		Webcam.set({
			width: '100%',
			height: '100%',
			image_format: 'jpeg',
			jpeg_quality: 100
		});
		Webcam.attach('#kameraku');
		setTimeout(function(){
			$('.infocamera').css({'display':'none'});
		},1000);
		if("geolocation" in navigator && "getUserMedia" in navigator.mediaDevices) {
		  navigator.geolocation.getCurrentPosition(function(position) {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			$('.latitude_absen').val(latitude);
			$('.longitude_absen').val(longitude);
			navigator.mediaDevices.getUserMedia({ video: true })
			.then(function(stream) {
				$('.videocamera').get(0).srcObject = stream;
			})
			.catch(function(error) {
				alert('Ada kesalahan saat akses kamera! Pastikan anda sudah memberi izin untuk akses camera');
				console.error('Error accessing camera: ', error);
			});
		  }, function(error) {
			console.error("Error getting location: ", error.message);
		  });
		}else{
			alert('Ada kesalahan saat akses Lokasi! Pastikan anda sudah memberi Izin untuk mengaktifkan Lokasi Anda dan Mengaktifkan GPS Anda!');
		}
	});
	$('.absensekarang').on('click', function() {
		var video = $('.videocamera').get(0);
		var canvas = $('.canvasTag').get(0);
		var context = canvas.getContext('2d');
		
		canvas.width = video.videoWidth;
		canvas.height = video.videoHeight;

		context.drawImage(video, 0, 0, canvas.width, canvas.height);

		var dataGambarCamera = canvas.toDataURL('image/jpeg');
		var img = new Image();
		img.src = dataGambarCamera;
		img.classList.add('fotoAbsen');
		$('.foto_absen').val(dataGambarCamera);
		
		var latitude = $('.latitude_new').val();
		var longitude = $('.longitude_new').val();
    // 
    //$('img[data-icon="30"]').attr('src', 'https://i.ibb.co/7g40NsC/go.png');
    $('img[data-icon='+idcam+']').attr('src', 'img/loading.gif');
		console.log(idcam);
		$.ajax({
		  type: 'POST',
		  url: 'simpanAbsensi.php',
		  data: {longitude:longitude,latitude:latitude,foto:dataGambarCamera,idcam:idcam},
		  success: function(response) {
			$('.capturedImage').empty().append(img);
			$('.close').click();
			setTimeout(function(){
				//window.location.href='./?page=khd-dosen';
			},500);
		  },
		  error: function(error) {
			console.error('Error saving image: ', error);
		  }
		});
	});
	
//  Untuk Menyimpan Data Nilai Mahasiswa //

$(document).ready(function(){
  $(".SimpanNilai").click(function(){
    //  mk = $(this).attr('data-mk');
    id   = $(this).attr('data-id');
    kode = $(this).attr('data-kode');
      var nip = [];
      $('input[name="nip[]"]').each(function() {
        nip.push(this.value);
      });
      var id_meet = [];
      $('input[name="id_meet[]"]').each(function() {
        id_meet.push(this.value);
      });
      var nama = [];
      $('input[name="nama[]"]').each(function() {
        nama.push(this.value);
      });
      var kode = [];
      $('input[name="kode[]"]').each(function() {
        kode.push(this.value);
      });
      var jamMulai = [];
      $('input[name="jamMulai[]"]').each(function() {
        jamMulai.push(this.value);
      });
      var jamSelesai = [];
      $('input[name="jamSelesai[]"]').each(function() {
        jamSelesai.push(this.value);
      });
      var materi = [];
      $('input[name="materi[]"]').each(function() {
        materi.push(this.value);
      });
      var tugas = [];
      $('input[name="tugas[]"]').each(function() {
        tugas.push(this.value);
      });  
   
    //id = 100;
    // alert(100);
    console.log(materi);
    console.log(tugas);
    //console.log(jamSelesai);
    $.ajax({
          url: "views/update-KhdDsn.php",
          method: "POST",
          data: {id:id,nip:nip,nama:nama,id_meet:id_meet,kode:kode,jamMulai:jamMulai,jamSelesai:jamSelesai,materi:materi,tugas:tugas,kode:kode},
          dataType: "html",
          success: function(data){
            $('.view-result').html(data);
            // alert('OK');
            Swal.fire(
                'Data Berhasil Disimpan',
                '',
                'success'
              )
          }
        });
  });
  $(".CreateNilai").click(function(){
    //  mk = $(this).attr('data-mk');
    id     = $(this).attr('data-id');
    nama   = $(this).attr('data-dsn');
    kode   = $(this).attr('data-kode');
    // dosen = 'Heri';
    console.log(id);
    console.log(kode);
    $.ajax({
          url: "views/update-KhdDsn.php",
          method: "POST",
          data: {id:id,nama:nama,kls:kls,kode:kode},
          dataType: "html",
          success: function(data){
            //$('.view-result').html(data);
            alert('Data Nilai Berhasil DiBuat');
            // Swal.fire(
            //     'Data Kehadiran Dosen Berhasil Dibuat',
            //     '',
            //     'success'
            //   )
            window.location.reload()
            //window.location.href=('create/insert-nilaiMhs.php?kode_mk='+kode_mk);
          }
        });
  });

});
// Untuk Upload Dokumen //
$('.imageButton1').each(function(){ 
  $('.imageButton1').change(function(){         
    x = $('input[name="doc"]').val();       
    var file = $('.imageButton1').prop("files")[0];
    // Making the form object
    var form = new FormData();
    // Adding the image to the form
    form.append("materi", file);   
    // The AJAX call
    console.log(x); 
        $.ajax({
            url: "add/upload.php?x="+x,
            type: "POST",
            data:  form,
            contentType: false,
            processData:false,
            success: function(result){
                //document.write(result);
                $('.result-materi').html('Upload Berhasil');
            }
        });
    });
  });
$('.imageButton2').each(function(){ 
  $('.imageButton2').change(function(){
    // Ambil id
    // x = $(this).attr('id-task');
    x = $('input[name="task"]').val();
    //tugas = 999; 
    // x =  $('input[name="task"]').val();        
    // Making the image file object
    var file = $('.imageButton2').prop("files")[0];
    // Making the form object
    var form = new FormData();
    // Adding the image to the form
    form.append("tugas", file);   
    // The AJAX call
    console.log(x); 
    $.ajax({
        url: "add/upload.php?x="+x,
        type: "POST",
        data:  form,
        contentType: false,
        processData:false,
        success: function(result){
            //document.write(result);
            $('.result-task').html('Upload Berhasil');
        }
    });
  });
});
// Data Table //

  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#dataMhs').DataTable({
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
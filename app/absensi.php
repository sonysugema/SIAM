
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
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Absensi
            <small>Human Resource Management System</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Absensi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Lakukan Absensi Karyawan</h3>
                </div>
                <div class="box-body">
                  <div class="form-panel text-center">
					<div class="capturedImage">
						<img src="./gambar_admin/avatar.png" class="img-circle avatarabsen" style="width:250px;height:250px;" /><br /><br /><br />
					</div>
					<input type="hidden" name="latitude" class="latitude_absen" />
					<input type="hidden" name="longitude" class="longitude_absen" />
					<input type="hidden" name="foto" class="foto_absen" />
					<button type="button" class="btn btn-primary bukakamera" data-toggle="modal" data-target="#modalBukaKamera">
						<i class="fa fa-camera"></i> &nbsp; Absen Disini Sekarang
					</button><br /><br />
					<div id="modalBukaKamera" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Ambil Foto dari Camera</h4>
							</div>
							<div class="modal-body">
							  <p class="infocamera">Pastikan Browser Anda Mendukung Camera</p>
							  <div id="kameraku"></div>
								<canvas class="canvasTag" style="display: none;" width="640" height="480"></canvas>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-sm btn-success absensekarang"><i class="fa fa-check-circle"></i> Lakukan Absensi Sekarang</button>
							</div>
						  </div>

						</div>
					</div>
				  </div>
                </div>
              </div><!-- /.box -->

            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

     

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    
    <!-- AdminLTE App -->
    <script src="dist/js/webcam.min.js"></script>
  
    <!-- AdminLTE for demo purposes -->
    <script>
       
  $('.lihatlokasi').on('click', function(){
	var latitude = $(this).attr('latitude');
	var longitude = $(this).attr('longitude');
	var nik = $(this).attr('nik');
	var nama = $(this).attr('nama');
	var foto = $(this).attr('foto');
	var waktu = $(this).attr('waktu');
	
    var iframe = $('<iframe>', {
        src: './map.php?latitude='+latitude+'&longitude='+longitude+'&nama='+nama+'&foto='+foto+'&waktu='+waktu+'&nik='+nik,
        width: '100%',
        height: '100%',
        frameborder: 0,
        style: 'border:0;width:90vw;height:75vh;',
        allowfullscreen: true,
        'aria-hidden': false,
        tabindex: 0
    });

    $('#bukaLokasi .modal-body').empty().html(iframe);
	  
	$('#bukaLokasi').modal();
	$('#bukaLokasi').modal({ keyboard: false });
	$('#bukaLokasi').modal('show');
	return false;
  });
  $('.bukakamera').on('click', function(){
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
		
		var latitude = $('.latitude_absen').val();
		var longitude = $('.longitude_absen').val();
		
		$.ajax({
		  type: 'POST',
		  url: 'simpanAbsensi.php',
		  data: {longitude:longitude,latitude:latitude,foto:dataGambarCamera},
		  success: function(response) {
			$('.capturedImage').empty().append(img);
			$('.close').click();
			setTimeout(function(){
				window.location.href='./absensi.php';
			},500);
		  },
		  error: function(error) {
			console.error('Error saving image: ', error);
		  }
		});
	});
	
    </script>
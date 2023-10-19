<?php include('../../conf/config.php');?>
<div class="row">
  <div class="col-12"> 
    <div class="card-header">
      <h3 class="card-title text-bold text-green">Kehadiran MK : <?php echo $_POST['mk'].' '.$_POST['thn'];?></h3>
    </div>       
     
    <div class="card-body">
                <table id="dataKhd" class="table table-hover table-bordered">
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
                  $kode_mk      = $_POST['kode'];
                $kls          = $_POST['kls'];
                $tahun_ajaran = '2023/2024';
                $query = mysqli_query($koneksi,"SELECT * FROM tb_khd_dsn WHERE kode_mk = '$kode_mk' AND tahun_ajaran = '2023/2024'");
                  while ($data = mysqli_fetch_array($query)) {
                    $no++; ?>
                    
                  <tr>
                    <td width='5%'><?php echo $no;?><input name='nip[]' size='3' value='<?php echo $data['nip'];?>' hidden></td>
                    <td><?php echo ucwords(strtolower($data['nama']));?></td>
                    <td><?php echo $data['kode_mk'];?></td>
                    <td><?php echo $data['meet'];?></td>
                    <td><?php echo $data['jam_mulai'];?></td>
                    <td><?php echo $data['jam_selesai'];?></td>
                    <td class='text-center'>
                    <?php
                        if($data['latitude']!=''){?>
                          <label  class="tooltips lihatlokasi" data-placement="bottom" data-toggle="tooltip" nama="<?php echo ucwords($data['nama']); ?>" waktu="<?php echo $data['waktu_absen']; ?>" foto="<?php echo $data['foto']; ?>" latitude="<?php echo $data['latitude']; ?>" longitude="<?php echo $data['longitude']; ?>" nik="<?php echo $data['nik_karyawan']; ?>">
                            <img src="img/lokasi.png" style="width:30px; cursor:pointer;">
                          </label>
                        <?php }
                        else{?>
                          
                          <label>
                            <img src="img/cross.png" style="width:30px; cursor:pointer;">
                          </label>
                        <?php }
                        ?>
                    
                    <!-- <a href="javascript:void(0);" nama="<?php echo ucwords($data['nama']); ?>" waktu="<?php echo $data['waktu_absen']; ?>" foto="<?php echo $data['foto']; ?>" latitude="<?php echo $data['latitude']; ?>" longitude="<?php echo $data['longitude']; ?>" nik="<?php echo $data['nik_karyawan']; ?>" class="btn btn-sm btn-success tooltips lihatlokasi" data-placement="bottom" data-toggle="tooltip" title="Lihat Lokasi Absensi dari : <?php echo $data['nama_karyawan']; ?>"><span class="fa fa-map-pin"></a>&nbsp; &nbsp; -->
                    </td>
                    <td><?php echo $data['materi'];?></td>
                    <td><?php echo $data['tugas'];?></td>
                    <td><?php echo $data['tahun_ajaran'];?></td>
                  </tr>
                    <?php
                  }
                    ?>
                    </tbody>
                </table>
                </div>
    </div>
</div>
        <div id="bukaLokasi" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lokasi Absensi Karyawan</h4>
              </div>
              <div class="maps">
                <div class="" style="width:90%;height:75vh;"></div>
              </div>
            </div>


  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="../app/dist/map/leaflet.js"></script>
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
        // width: '100%',
        // height: '100%',
        frameborder: 0,
        style: 'border:0;width:70vw;height:75vh;',
        allowfullscreen: true,
        'aria-hidden': false,
        tabindex: 0
    });

    $('#bukaLokasi .maps').empty().html(iframe);
	  
	$('#bukaLokasi').modal();
	$('#bukaLokasi').modal({ keyboard: false });
	$('#bukaLokasi').modal('show');
	return false;
  });

  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#dataKhd').DataTable({
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
<?php include('../../conf/config.php');?>
<style>
  input[type='checkbox']{width:50px;}
</style>
<div class="row">
  <div class="col-12"> 
    <div class="card-header">
      <h3 class="card-title text-bold text-green">Penilaian MK : <?php echo $_POST['mk'].' - Semester : '.$_POST['smt'];?></h3>
    </div>        
    <div class="card-body">
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Pembayaran 
                </button> 
                <br></br> -->
               
                <!-- <a style='float:right' data-kode='<?php echo $_POST['kode'];?>' class='SimpanNilai btn btn-xl btn-success'>Simpan</a></br></br> -->
                
                <?php
                $kode_mk      = $_POST['kode'];
                $kls          = $_POST['kls'];
                $tahun_ajaran = '2023/2024';
                $qcek         = mysqli_query($koneksi, "SELECT *,count(id)cek FROM tb_nilai WHERE kode_mk = '$kode_mk' AND tahun_ajaran='$tahun_ajaran'");
                $rcek         = mysqli_fetch_array($qcek);
                if($rcek['cek']<=0){
                ?>
                  <a  style='float:right' data-id='0' data-kode='$_POST[kode]' data-smt="<?php echo $_POST['smt'];?>" class='CreateNilai btn btn-xl btn-warning'>Create</a></br></br>
                <?php }
                else{echo "<a style='float:right' data-id='1' data-kode='$_POST[kode]' class='SimpanNilai btn btn-xl btn-success'>Simpan</a></br></br>";}
                ?>
               
                <table id="dataMhs" class="table table-bordered table-striped">
                  <thead class='bg-green'>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>                    
                    <th>Kode MK</th>
                    <th>Kehadiran</th>
                    <th>Tugas</th>
                    <th>UTS</th> 
                    <th>UAS</th>
                    <th>Nilai</th>                   
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_nilai WHERE kode_mk = '$kode_mk' AND tahun_ajaran = '2023/2024'");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><input name='nim[]' size='3' value='<?php echo $mhs['nim'];?>' hidden><?php echo $mhs['nim'];?></td>
                    <td><input name='nama[]' size='3' value='<?php echo $mhs['nama'];?>' hidden><?php echo ucwords(strtolower($mhs['nama']));?></td>
                    <td><input name='kls[]' size='3' value='<?php echo $mhs['kode_mk'];?>' hidden><?php echo $mhs['kode_mk'];?></td>
                    <td><input name='khd[]' class='satu<?php echo $no;?>' onkeyup='hitung<?php echo $no;?>()' size='3' value='<?php echo $mhs['kehadiran'];?>'></td>
                    <td><input name='tgs[]' class='dua<?php echo $no;?>' onkeyup='hitung<?php echo $no;?>()' size='3' value='<?php echo $mhs['tugas'];?>'></td>
                    <td><input name='uts[]' class='tiga<?php echo $no;?>' onkeyup='hitung<?php echo $no;?>()' size='3' value='<?php echo $mhs['uts'];?>'></td>
                    <td><input name='uas[]' class='empat<?php echo $no;?>' onkeyup='hitung<?php echo $no;?>()' size='3' value='<?php echo $mhs['uas'];?>'></td>
                    <td><input name='nilai[]' size='3' class='hasil<?php echo $no;?>' value='<?php echo $mhs['nilai'];?>' readonly></td>
                    <script>
                      function hitung<?php echo $no;?>(){
                          satu = document.querySelector(".satu<?php echo $no;?>").value;
                          dua  = document.querySelector(".dua<?php echo $no;?>").value;
                          tiga = document.querySelector(".tiga<?php echo $no;?>").value;
                          empat = document.querySelector(".empat<?php echo $no;?>").value;
                          hasil = document.querySelector(".hasil<?php echo $no;?>");
                          hasil.value = (parseInt(satu)/10)+((parseInt(dua)*2)/10)+((parseInt(tiga)*3)/10)+((parseInt(empat)*4)/10);
                      }
                    </script>
                   
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
      
<script>
$(document).ready(function(){
  $(".SimpanNilai").click(function(){
    //  mk = $(this).attr('data-mk');
    id   = $(this).attr('data-id');
    kode = $(this).attr('data-kode');
   // smt  = $(this).attr('data-smt');
    var nim = [];
      $('input[name="nim[]"]').each(function() {
        nim.push(this.value);
      });
      var nama = [];
      $('input[name="nama[]"]').each(function() {
        nama.push(this.value);
      });
      var kls = [];
      $('input[name="kls[]"]').each(function() {
        kls.push(this.value);
      });
      var khd = [];
      $('input[name="khd[]"]').each(function() {
        khd.push(this.value);
      });
      var tgs = [];
      $('input[name="tgs[]"]').each(function() {
        tgs.push(this.value);
      });
    var uts = [];
      $('input[name="uts[]"]').each(function() {
        uts.push(this.value);
      });
      var uas = [];
      $('input[name="uas[]"]').each(function() {
        uas.push(this.value);
      });
      var nilai = [];  
      $('input[name="nilai[]"]').each(function() {
        nilai.push(this.value);
      });
    // $('input[name="uts[]"]').each(function() {
    //   name.push(this.value);
    // });
    //id = 100;
    // alert(100);
    //console.log(uts);
    //console.log(smt);
    $.ajax({
          url: "views/update-nilaiMK.php",
          method: "POST",
          data: {id:id,nim:nim,nama:nama,kls:kls,khd:khd,tgs:tgs,uts:uts,uas:uas,kode:kode,nilai:nilai},
          dataType: "html",
          success: function(data){
            $('.view-result').html(data);
            Swal.fire(
              'Data Berhasil Disimpan',
              '',
              'success'
            )
          }
        });
  });
  $(".CreateNilai").click(function(){
    mk   = $(this).attr('data-mk');
    id   = $(this).attr('data-id');
    smt  = $(this).attr('data-smt');
    console.log(smt);
    // console.log(kode);
    // console.log(kls);
    //console.log(mk);
    $.ajax({
          url: "views/update-nilaiMK.php",
          method: "POST",
          data: {id:id,kls:kls,kode:kode,mk:mk,smt:smt},
          dataType: "html",
          success: function(data){
            //$('.view-result').html(data);
            // Swal.fire(
            //     'Data Nilai Berhasil Dibuat',
            //     '',
            //     'success'
            //   )
            alert('Data Nilai Berhasil Dibuat')
            window.location.reload()
            //window.location.href=('create/insert-nilaiMhs.php?kode_mk='+kode_mk);
          }
        });
  });

});

// function hapus_data(data_id){
//       Swal.fire(
//       'Data Berhasil Disimpan',
//       '',
//       'success'
//     )
//   }

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
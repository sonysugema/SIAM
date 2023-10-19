<style>
  input[type='checkbox']{width:50px;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="row">
  <div class="col-12"> 
    <div class="card-body">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Pembayaran 
    </button> 
    <br></br>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tagihan</h3>
    </div>
    <table id="view-pemb" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Detail</th> 
                    <th>Nilai</th>   
                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    $jml = 0;
                    $npm = $_SESSION['noId'];
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_tagihan WHERE npm='$npm'");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><input type="checkbox" onclick="UpdateCost(this);" value="<?php echo $mhs['nilai'];?>"></td>
                    <td><?php echo $mhs['npm'];?></td>
                    <td><?php echo $mhs['nama'];?></td>
                    <td><?php echo $mhs['jenis'];?></td>
                    <td><?php echo $mhs['detail'];?></td>
                    <td align='right'><?php echo $mhs['nilai'];?></td>
                    
                  </tr>
                  <?php
                   
                $jml += $mhs['nilai'];}?>                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class='text-right'><?php echo $jml++;?></th>
                  </tr>
                  </tfoot>
                </table>
                
  </div>
  <div class="card">            
    <div class="card-header">
      <h3 class="card-title">History Pembayaran</h3>
    </div>
                <table id="view-pemb" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Detail</th> 
                    <th>Nilai</th>   
                    <th>Bukti</th>   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    $npm = $_SESSION['noId'];
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_pembayaran WHERE npm='$npm'");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $mhs['npm'];?></td>
                    <td><?php echo $mhs['nama'];?></td>
                    <td><?php echo $mhs['jenis'];?></td>
                    <td><?php echo $mhs['detail'];?></td>
                    <td><?php echo $mhs['nilai'];?></td>
                    <td><img style='cursor:pointer;' class='viewDoc' data-id='<?php echo $mhs['img'];?>' 
                    width='40px' src="documents/<?php echo $mhs['img'];?>"
                    data-toggle="modal" data-target=".bd-example-modal-sm"></td>
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
            <form method="post" enctype="multipart/form-data" action="add/tambah_pembayaranMhs.php">
                <div class="form-group">
                  <label for="formGroupExampleInput">NPM</label>
                  <input type="text" class="form-control"  name="npm" value="<?php echo $_SESSION['noId'];?>" readonly>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Nama Mahasiswa</label>
                  <input type="text" class="form-control"  value="<?php echo $_SESSION['nama'];?>" name="nama" readonly>
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
                  <label for="formGroupExampleInput2">Tagihan</label>
                  <input type="text" class="form-control"  name="tagihan" id='tagihan' value='0' readonly>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Jumlah</label>
                  <input type="text" class="form-control"  name="jumlah" id='jumlah' value='0' oninput="calculate()" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Total</label>
                  <input type="text" class="form-control"  name="total" id='result' value='0' readonly>
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
// Fungsi Untuk Menghitung Total Tagihan //
var total=0;
function UpdateCost(elem) {
  
    if (elem.checked == true) { 
		total += Number(elem.value); 
	}else{
		total -=Number(elem.value);
	}
  
	document.getElementById('tagihan').value = total.toFixed(0);
  document.getElementById('result').value = total.toFixed(0);
}
// Fungsi Untuk Mengitung Total Pembayaran //
function calculate() {
		 myBox1 = document.getElementById('tagihan').value;
     myBox2 = document.getElementById('jumlah').value;
		 result = document.getElementById('result');	
		 result.value = parseInt(myBox1) + parseInt(myBox2);
		 
	}

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
    console.log(id);
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
</script>
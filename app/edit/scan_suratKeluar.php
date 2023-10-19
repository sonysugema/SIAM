<?php
$id     = $_GET['id'];
$query  = mysqli_query($koneksi,"SELECT * FROM tb_surat_keluar WHERE NoSurat='$id'");
$view   = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Scan Data Surat Keluar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">               
                  <div class="row">                    
                  <form method='post' action='update/upload_surat_keluar.php' enctype="multipart/form-data">
                  
                    <input type="text" class="form-control"  name='id' value="<?php echo $view['NoSurat'];?>" hidden>
                      
                    <div class="col-sm-6">
                      <label class="form-label" for="customFile">Upload Dokumen</label>
                      <input type="file" name='foto' class="form-control" id="customFile" />
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-sm-12">
                      <img src="foto/<?php echo $view['foto'];?>" width="200px" class="rounded float-right">
                    </div>
                  </div> -->
                  <div class="row">
                    <button type="submit"class="btn btn-sm btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</section>
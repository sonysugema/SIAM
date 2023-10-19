<?php
$id     = $_GET['id'];
$query  = mysqli_query($koneksi,"SELECT * FROM tb_surat_masuk WHERE NoAgenda='$id'");
$view   = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Surat Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action='update/update_data.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>No Agenda</label>
                        <input type="text" class="form-control" placeholder="No.Agenda" name='nim' value="<?php echo $view['NoAgenda'];?>" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Pengirim</label>
                        <input type="text" class="form-control" placeholder="Nama" name='Pengirim' value="<?php echo $view['Pengirim'];?>">
                        <input type="text" class="form-control"  name='id' value="<?php echo $view['NoAgenda'];?>" hidden>
                      </div>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tgl Jurnal</label>
                        <input type="date" class="form-control" name='Tanggal_Jurnal' value="<?php echo $view['Tanggal_Jurnal'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Perihal</label>
                        <input type="text" class="form-control" placeholder="Perihal" name='Perihal' value="<?php echo $view['Perihal'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tidak Lanjut</label>
                        <input type="text" class="form-control" placeholder="Tindak Lanjut" name='Tindak_Lanjut' value="<?php echo $view['Tindak_Lanjut'];?>">
                      </div>
                    </div>
                    <!-- <div class="col-sm-6">
                      <label class="form-label" for="customFile">Upload Dokumen</label>
                      <input type="file" name='foto' class="form-control" id="customFile" />
                    </div> -->
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
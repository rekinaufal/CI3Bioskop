<table border="1px">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Harga Film</h3>
                <!-- <div class="box-tools">
                 <form action="<?php echo site_url('Welcome/SearchHargaFilm')?>" method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                       <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">
                          <div class="input-group-btn">
                             <button type="submit" value="Cari" class="btn btn-default"><i class="fa fa-search"></i></button>
                            <a class="btn btn-default" href="<?php echo site_url('Welcome/DataHargaFilm')?>"><i class="fa fa-refresh"></i></a>
                           </div> 
                    </div>
                  </form>
                </div> -->
            </div>
            <!-- /.box-header -->
              <table class="table table-hover" id="myTable">
                <thead>
                  <a class="btn btn-default" style="width: 50px;" href="<?php echo site_url('Welcome/VFormAddHargaFilm'); ?>">+</a>
                  <br></br> 
                  <tr>
                      <th>Kode Harga</th>
                      <th>Judul Film</th>
                      <th>Harga</th>
                      <th>Hari</th>
                      <th>Keterangan</th>
                      <th class="text-center" width="15%">Tools</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($listData as $ReadDS) : ?>
                    <tr>
                    		<td><?php echo $ReadDS->kd_harga; ?></td>
                    		<td><?php echo $ReadDS->judul_film; ?></td>
                        <td>Rp <?php echo number_format($ReadDS->harga, 0, ',','.'); ?></td>
                        <td><?php echo $ReadDS->hari; ?></td>
                        <td>
                          <?php 
                            $ket = $ReadDS->keterangan; 
                            if ($ket == 1) {
                              echo "Weekday";
                            }else{
                              echo "Weekend";
                            }
                            ?>
                        </td>
                    		<td>
                            <a class="btn btn-primary" href="<?php echo site_url('Welcome/DataHargaFilm/'.$ReadDS->kd_harga.'/view') ?>">Update</a>
                            <a class="btn btn-primary" href="<?php echo site_url('Welcome/DeleteDataHargaFilm/'.$ReadDS->kd_harga) ?>" onClick="return confirm('Apakah Anda ingin menghapus data ini ?')">Delete</a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
<table border="1px">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Film</h3>
                <!-- <div class="box-tools">
                 <form action="<?php echo site_url('Welcome/SearchFilm')?>" method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                       <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">
                          <div class="input-group-btn">
                             <button type="submit" value="Cari" class="btn btn-default"><i class="fa fa-search"></i></button>
                            <a class="btn btn-default" href="<?php echo site_url('Welcome/DataFilm')?>"><i class="fa fa-refresh"></i></a>
                           </div> 
                    </div>
                  </form>
                </div> -->
            </div>
            <!-- /.box-header -->
              <table class="table table-hover" id="myTable">
                <thead>
                  <a class="btn btn-default" style="width: 50px;" href="<?php echo site_url('Welcome/VFormAddFilm'); ?>">+</a>
                  <br></br>
                  <tr>
                    <th width="5%">Kode Film</th>
                    <th>Judul Film</th>
                    <th>Jenis Film</th>
                    <th>Sutradara</th>
                    <th>Gambar</th>
                    <th>Status Film</th>
                    <th class="text-center" width="15%">Tools</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($DataFilm as $ReadDS): ?>
                        <tr>
                        		<td><?php echo $ReadDS->kd_film; ?></td>
                        		<td><?php echo $ReadDS->judul_film; ?></td>
                        		<td><?php echo $ReadDS->jenis_film; ?></td>
                            <td><?php echo $ReadDS->sutradara; ?></td>
                            <td><img src="<?php echo base_url('uploads/'). $ReadDS->gambar; ?>" width="100px" height="100px" style="border-radius: 50%; width: 100px; height: 100px;">
                            </td>
                            <td>
                              <?php 
                                $status = $ReadDS->status_film; 
                                if ($status == 1) {
                                    echo "Aktif";
                                    }else{
                                      echo "Tidak Aktif";
                                    } 
                              ?>

                            </td>
                        		<td>
                              <a class="btn btn-primary" href="<?php echo site_url('Welcome/DataFilm/'.$ReadDS->kd_film.'/view') ?>">Update</a>
                              <a class="btn btn-primary" href="<?php echo site_url('Welcome/DeleteDataFilm/'.$ReadDS->kd_film) ?>" onClick="return confirm('Apakah Anda ingin menghapus data ini ?')">Delete</a>
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
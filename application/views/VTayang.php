<table border="1px">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tayang</h3>
                <!-- <div class="box-tools">
                 <form action="<?php echo site_url('Welcome/SearchTayang')?>" method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                       <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">
                          <div class="input-group-btn">
                             <button type="submit" value="Cari" class="btn btn-default"><i class="fa fa-search"></i></button>
                            <a class="btn btn-default" href="<?php echo site_url('Welcome/DataTayang')?>"><i class="fa fa-refresh"></i></a>
                           </div> 
                    </div>
                  </form>
                </div> -->
            </div>
            <!-- /.box-header -->
              <table class="table table-hover" id="myTable">
                <thead>
                  <a class="btn btn-default" style="width: 50px;" href="<?php echo site_url('Welcome/VFormAddTayang'); ?>">+</a>
                    <br></br>
                    <tr>
                      <th>Kode Tayang</th>
                      <th>Judul Film</th>
                      <th>Nama Studio</th>
                      <th>Tanggal Tayang</th>
                      <th>Jam Tayang</th>
                      <th>Status Tayang</th>
                      <th class="text-center" width="15%">Tools</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($listData as $ReadDS) :?>
                    <tr>
                    		<td><?php echo $ReadDS->kd_tayang; ?></td>
                    		<td><?php echo $ReadDS->judul_film; ?></td>
                        <td><?php echo $ReadDS->nama_studio; ?></td>
                        <td><?php echo $ReadDS->tanggal_tayang; ?></td>
                        <td><?php echo $ReadDS->jam_tayang; ?></td>
                        <td>
                          <?php 
                            $status = $ReadDS->status_tayang; 
                            if ($status == 1) {
                              echo "Aktif";
                            }else{
                              echo "Tidak Aktif";
                            }
                            ?>
                        </td>
                    		<td>
                          <a class="btn btn-primary" href="<?php echo site_url('Welcome/DataTayang/'.$ReadDS->kd_tayang.'/view') ?>">Update</a>
                          <a class="btn btn-primary" href="<?php echo site_url('Welcome/DeleteDataTayang/'.$ReadDS->kd_tayang) ?>" onClick="return confirm('Apakah Anda ingin menghapus data ini ?')">Delete</a>
                        </td>
                    </tr>
                 <?php endforeach; ?>
                </tbody>
              </table>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
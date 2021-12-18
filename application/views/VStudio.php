<table border="1px">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Studio</h3>
                <!-- <div class="box-tools">
                 <form action="<?php echo site_url('Welcome/SearchStudio')?>" method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                       <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">
                          <div class="input-group-btn">
                             <button type="submit" value="Cari" class="btn btn-default"><i class="fa fa-search"></i></button>
                            <a class="btn btn-default" href="<?php echo site_url('Welcome/DataStudio')?>"><i class="fa fa-refresh"></i></a>
                           </div> 
                    </div> -->
                  </form>
                </div>
            </div>
            <!-- /.box-header -->
              <table class="table table-hover" id="myTable">
                <thead>
                   <a class="btn btn-default" style="width: 50px;" href="<?php echo site_url('Welcome/VFormAddStudio'); ?>">+</a>
                   <br></br>
                  <tr>
                    <th>Kode Studio</th>
                    <th>Nama Studio</th>
                    <th class="text-center" width="15%">Tools</th>
                  </tr>
                </thead>
                <tbody>
                	<?php foreach($DataStudio as $ReadDS) : ?>
                    <tr>
                    		<td><?php echo $ReadDS->kd_studio; ?></td>
                    		<td><?php echo $ReadDS->nama_studio; ?></td>
                    		<td>
                          <a class="btn btn-primary" href="<?php echo site_url('Welcome/DataStudio/'.$ReadDS->kd_studio.'/view') ?>">Update</a>
                          <a class="btn btn-primary" href="<?php echo site_url('Welcome/DeleteDataStudio/'.$ReadDS->kd_studio) ?>" onClick="return confirm('Apakah Anda ingin menghapus data ini ?')">Delete</a>
                        </td>
                    </tr>
                  <?php endforeach ;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
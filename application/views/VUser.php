<table border="1px">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
              <table class="table table-hover" id="myTable">
                <thead>
                  <a class="btn btn-default" style="width: 50px;" href="<?php echo site_url('Welcome/VFormAddUser'); ?>">+</a>
                  <br></br>
                  <tr>
                    <th width="5%">Kode User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Hak Akses</th>
                    <th class="text-center" width="15%">Tools</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($DataUser as $ReadDS): ?>
                        <tr>
                        		<td><?php echo $ReadDS->kd_user; ?></td>
                        		<td><?php echo $ReadDS->username; ?></td>
                        		<td><?php echo $ReadDS->password; ?></td>
                            <td><?php echo $ReadDS->hak_akses; ?></td>
                        		<td>
                              <a class="btn btn-primary" href="<?php echo site_url('Welcome/DataUser/'.$ReadDS->kd_user.'/view') ?>">Update</a>
                              <a class="btn btn-primary" href="<?php echo site_url('Welcome/DeleteDataUser/'.$ReadDS->kd_user) ?>" onClick="return confirm('Apakah Anda ingin menghapus data ini ?')">Delete</a>
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
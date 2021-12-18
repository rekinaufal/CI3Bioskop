<form action="<?php echo site_url('Welcome/UpdateDataUser'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
            <div class="form-group">
                  <input type="hidden" name="txt_kd_user" readonly value="<?php echo $detail['kd_user'];?>" class="form-control" >
            </div>
			<div class="form-group">
                <label>Username</label>
                  <input type="text" name="txt_username" value="<?php echo $detail['username'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Password</label>
                	<input type="text" name="txt_password" value="<?php echo $detail['password'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                    <select name="txt_hak_akses" class="form-control">
                        <option value="" disabled>-- Silahkan Pilih --</option>
                        <?php
                            if(!empty($DataUser))
                            {
                              foreach ($DataUser as $list) {
                        ?>
                            <option <?= $detail['hak_akses'] == $list->hak_akses ? 'selected' : ''?> value="<?php echo $list->hak_akses;?>"><?php echo $list->hak_akses;?></option>
                        <?php
                              }
                            }
                        ?>
                </select>
            </div>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataUser');?>">Kembali</a>
        </form>
</form>        
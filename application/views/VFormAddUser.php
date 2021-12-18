<form action="<?php echo site_url('Welcome/AddDataUser'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
			<div class="form-group">
                <label>Username</label>
                  <input type="text" name="txt_username" class="form-control" >
            </div>
            <div class="form-group">
                <label>Password</label>
                	<input type="text" name="txt_password" class="form-control" >
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                <select name="txt_hak_akses" class="form-control">
                    <option selected disabled>-- Silahkan Pilih --</option>
                    <option>Admin</option>
                    <option>Kasir</option>
                    <option>Gudang</option>
                </select>
            </div>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataUser');?>">Kembali</a>
        </form>
</form>
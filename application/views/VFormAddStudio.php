<form action="<?php echo site_url('Welcome/AddDataStudio'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
        <div class="form-group">
          <label>Nama Studio</label>
           	<input type="text" name="txt_nama_studio" class="form-control">
        </div>
            <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
            <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataStudio');?>">Kembali</a>
    </form>
  </div>
</form>


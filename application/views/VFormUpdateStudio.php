<form action="<?php echo site_url('Welcome/UpdateDataStudio'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
            <div class="form-group">
                <label>kode Studio</label>
                  <input type="text" name="txt_kd_studio" readonly value="<?php echo $detail['kd_studio'];?>" class="form-control" >
            </div>
			<div class="form-group">
                <label>Nama Studio</label>
                  <input type="text" name="txt_nama_studio" value="<?php echo $detail['nama_studio'];?>" class="form-control" >
            </div>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataStudio');?>">Kembali</a>
        </form>
</form>        
<form action="<?php echo site_url('Welcome/AddDataFilm'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
			<div class="form-group">
                <label>Judul Film</label>
                  <input type="text" name="txt_judul_film" class="form-control" >
            </div>
            <div class="form-group">
                <label>Jenis Film</label>
                	<input type="text" name="txt_jenis_film" class="form-control" >
            </div>
            <div class="form-group">
                <label>Sutradara</label>
                    <input type="text" name="txt_sutradara" class="form-control" >
            </div>
            <div class="form-group">
                <label>Gambar</label>
                    <input type="file" name="txt_gambar" class="">
            </div>
            <div class="form-group">
                <label>Status Film</label>
                <select name="txt_status_film" class="form-control">
                    <option selected disabled>Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataFilm');?>">Kembali</a>
        </form>
</form>
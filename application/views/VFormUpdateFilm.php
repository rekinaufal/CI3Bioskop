<form action="<?php echo site_url('Welcome/UpdateDataFilm'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
            <div class="form-group">
                <label>kode Film</label>
                  <input type="text" name="txt_kd_film" readonly value="<?php echo $detail['kd_film'];?>" class="form-control" >
            </div>
			<div class="form-group">
                <label>Judul Film</label>
                  <input type="text" name="txt_judul_film" value="<?php echo $detail['judul_film'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Jenis Film</label>
                	<input type="text" name="txt_jenis_film" value="<?php echo $detail['jenis_film'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Sutradara</label>
                    <input type="text" name="txt_sutradara" value="<?php echo $detail['sutradara'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Foto Sebelumnya</label>
                <br>
                    <img src="<?php echo base_url('uploads/'). $detail['gambar']; ?>" width="100px" height="100px">
            </div>
            <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="txt_gambar">
            </div>
            <div class="form-group">
                <label>Status Film</label>
                <select name="txt_status_film" class="form-control">
                    <option selected disabled>
                        <?php 
                            $status = $detail['status_film'];
                            if ($status == 1) {
                                echo "Aktif";
                            }else{
                                echo "Tidak Aktif";
                            }
                        ?>  
                    </option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataFilm');?>">Kembali</a>
        </form>
</form>        
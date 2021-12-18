<form action="<?php echo site_url('Welcome/AddDataHargaFilm'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
			      <div class="form-group">
              <label>Kode Film</label>
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Pilih Film</button>
                <input type="text" name="txt_kd_film" class="form-control" readonly value="<?php echo $this->input->get('kd_film')?>">
            </div>
             <?php if(!empty($this->input->get('judul_film'))){ ?>
            <div class="form-group">
                <label>Judul Film</label>
                	<input type="text" name="txt_judul_film" class="form-control" readonly value="<?php echo $this->input->get('judul_film')?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                    <input type="text" name="txt_harga" class="form-control number" >
            </div>
            <div class="form-group">
                <label>Hari</label>
                <select name="txt_hari" class="form-control">
                    <option selected disabled>Pilih Hari</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jum'at</option>
                    <option>Sabtu</option>
                </select>
             </div>   
             <div class="form-group">
                <label>Keterangan</label>
                <select name="txt_keterangan" class="form-control">
                    <option selected disabled>Pilih Keterangan</option>
                    <option value="1">Weekday</option>
                    <option value="0">Weekend</option>
                </select>
            </div>
            <?php } ?>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataHargaFilm');?>">Kembali</a>
        </form>
</form>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Data Film</h4>
        </div>
        <div class="modal-body">
          <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Kode Film</th>
                  <th>Judul Film</th>
                  <th>Jenis Film</th>
                  <th>Sutradara</th>
                  <th>Gambar</th>
                  <th colspan="2" class="text-center">Tools</th>
                </tr>
                <?php
                    if(!empty($StatusFilm))
                    {
                      foreach($StatusFilm as $ReadDS)
                      {
                ?>
                  <tr>
                      <td><?php echo $ReadDS->kd_film; ?></td>
                      <td><?php echo $ReadDS->judul_film; ?></td>
                      <td><?php echo $ReadDS->jenis_film; ?></td>
                      <td><?php echo $ReadDS->sutradara; ?></td>
                      <td><img src="<?php echo base_url('uploads/'). $ReadDS->gambar; ?>" width="50px" height="50px" style="border-radius: 50%; width: 100px; height: 100px;">
                      </td>
                      <td>
                          <a class="btn btn-block btn-primary btn-xs" href="<?php echo site_url('/Welcome/VFormAddHargaFilm') ?>?kd_film=<?php echo $ReadDS->kd_film; ?>&judul_film=<?php echo $ReadDS->judul_film; ?>">Pilih</a>
                      </td>
                  </tr>
                <?php        
                    }
                       }
                ?>
                  <tr>
                      <td><b>Total Data : <?php echo $TotalData; ?></b></td>
                  </tr>
                </table>
              </div>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </div>      
  </div>
</div>
<form action="<?php echo site_url('Welcome/UpdateDataTayang'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
            <div class="form-group">
                <label>kode Tayang</label>
                  <input type="text" name="txt_kd_tayang" readonly value="<?php echo $kd_harga = $detail['kd_tayang'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Kode Film</label>
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Pilih Film</button>
                  <input type="text" name="txt_kd_film" readonly value="<?= !empty($this->input->get('kd_film')) ? $this->input->get('kd_film') : $detail['kd_film'] ?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Judul Film</label>
                    <input type="text" name="txt_judul_film" readonly value="<?= !empty($this->input->get('judul_film')) ? $this->input->get('judul_film') : $detail['judul_film'] ?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Nama Studio</label>
                    <select name="txt_kd_studio" class="form-control">
                        <option value="" disabled>-- Silahkan Pilih --</option>
                        <?php
                            if(!empty($DataStudio))
                            {
                              foreach ($DataStudio as $list) {
                        ?>
                            <option <?= $detail['kd_studio'] == $list->kd_studio ? 'selected' : ''?> value="<?php echo $list->kd_studio;?>"><?php echo $list->nama_studio;?></option>
                        <?php
                              }
                            }
                        ?>
                    </select>
            </div>
            <div class="form-group">
                <label>Tanggal Tayang</label>
                  <input type="date" name="txt_tanggal_tayang" value="<?php echo $detail['tanggal_tayang'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Jam Tayang</label>
                  <input type="time" name="txt_jam_tayang" value="<?php echo $detail['jam_tayang'];?>" class="form-control" >
            </div>
            <div class="form-group">
              <?php
                $status_t = [
                  1 => "Aktif",
                  0 => "Tidak Aktif"
                ];
              ?>
                <label>Status Tayang</label>
                <select name="txt_status_tayang" class="form-control" required>
                    <option value="">---</option>
                    <?php foreach ($status_t as $key => $value): ?>
                      <?php if ($key == $detail['status_tayang']): ?>
                        <option value="<?= $key ?>" selected><?= $value ?></option>
                      <?php else: ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataTayang');?>">Kembali</a>
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
                      <a class="btn btn-block btn-primary btn-xs" href="<?php echo site_url('/Welcome/DataTayang/'.$kd_harga.'/view') ?>?kd_film=<?php echo $ReadDS->kd_film; ?>&judul_film=<?php echo $ReadDS->judul_film; ?>">Pilih</a>
                      </td>
                  </tr>
                <?php        
                    }
                       }
                ?>
                  <tr>
                      <td><b>Total Data : <?php echo $TotalDataStatus; ?></b></td>
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
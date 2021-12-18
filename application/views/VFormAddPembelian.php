<form action="<?php echo site_url('Welcome/AddDataPembelian'); ?>" method="post" enctype="multipart/form-data">
	<div class="box-body">
		<form role="form">
			      <div class="form-group">
                <label>Judul Film</label>
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Pilih Film</button>
                  <input type="text" name="txt_judul_film" class="form-control" readonly value="<?php echo $this->input->get('judul_film')?>">
            </div>
            <?php if(!empty($this->input->get('judul_film'))){ ?>
              <div class="form-group">
                  <input type="hidden" name="txt_kd_tayang" class="form-control" readonly 
                  value="<?php echo $kd_tayang =  $this->input->get('kd_tayang')?>">
            </div>
             <div class="form-group">
                <label>Tanggal Tayang</label>
                  <input type="text" name="txt_tanggal_tayang" class="form-control" readonly value="<?php echo $this->input->get('tanggal_tayang')?>">
            </div>
            <div class="form-group">
                <label>Jam Tayang</label>
                	<input type="text" name="txt_jam_tayang" class="form-control" readonly value="<?php echo $this->input->get('jam_tayang')?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                  <input type="text" name="txt_harga" id="harga" onkeyup="kursi();" class="form-control" readonly value="<?= number_format($this->input->get('harga'), 0, ',', '.')?>">
                  <?php echo hari() ?>
                  <!-- <?php 
                      $hari = date ("D");
                      $haritayang = $this->input->get('hari');

                      if ($hari == "Mon") {
                         $senin = "Senin";
                         if ($haritayan == $senin) {
                           echo "<font color='green'>Senin</font>";
                         }
                       } 
                      if ($hari == "Tue") {
                         $selasa = "Selasa"; 
                         if ($haritayan == $selasa) {
                           echo "<font color='green'>Selasa</font>";
                         }                      
                       }
                      if ($hari == "Wed") {
                         $rabu = "Rabu";
                         if ($haritayang == $rabu) {
                           echo "<font color='green'>Rabu</font>";
                         }
                       }
                      if ($hari == "Thu") {
                         $kamis = "Kamis";
                         if ($haritayang == $kamis) {
                           echo "<font color='green'>Kamis</font>";
                         }
                       }
                      if ($hari == "Fri") {
                         $jumat = "Jum'at";
                         if ($haritayang == $jumat) {
                           echo "<font color='green'>Jum'at</font>";
                         }
                       }
                      if ($hari == "Sat") {
                         $sabtu = "Sabtu";
                         if ($haritayang == $sabtu) {
                           echo "<font color='green'>Sabtu</font>";
                         }
                       }
                      if ($hari == "Sun") {
                         $minggu = "Minggu";
                         if ($haritayang == $minggu) {
                           echo "<font color='green'>Minggu</font>";
                         }
                       } 
                  ?>
                  |
                  <?php 
                      $ket = $this->input->get('keterangan');
                      if ($ket == 1) {
                          echo "<font color='green'>Weekday</font>";
                        }elseif ($ket == 0) {
                          echo "<font color='green'>Weekend</font>";
                        }else{
                          echo "<font color='red'>Data tidak tersedia</font>";
                        }
                  ?> -->
            </div>
            <div class="form-group">
                <label>Studio</label>
                  <input type="text" name="txt_nama_studio" class="form-control" readonly value="<?php echo $this->input->get('nama_studio')?>">
            </div>
            <div class="form-group">
                <label>Pilih Kursi</label>
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal1">Pilih Kursi</button>
                    <input type="text" name="txt_pilih_kursi" readonly id="pilihkursi" onkeyup="kursi();" class="form-control" >            
            </div>
            <div class="form-group">
                <label>Jumlah Kursi</label>
                    <input type="text" name="txt_jumlah_kursi" readonly id="jumlah_kursi" onkeyup="kursi();" class="form-control" >            
            </div>
            <div class="form-group">
                <label>Total</label>
                    <input type="text" readonly name="txt_total" id="total" class="form-control" >
            </div>
            <div class="form-group">
                <label>Bayar</label>
                    <input type="text"  name="txt_bayar" id="bayar" onkeyup="kursi();" class="form-control number" >
            </div>

            <div class="form-group">
                <label>Kembalian</label>
                    <input type="text" readonly name="txt_kembalian" id="kembalian" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Beli</label>
                <?php
                   $tanggal = Date("Y-m-d");
                ?>
                    <input type="date" readonly name="txt_tanggal_beli" value="<?php echo $tanggal ?>" class="form-control" >
            </div>
            <?php } ?>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataTayang');?>">Kembali</a>
        </form>
</form>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Data Film</h4>
        </div>
        <div class="modal-body">
          <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Kode Tayang</th>
                  <th>Judul Film</th>
                  <th>Tanggal Tayang</th>
                  <th>Studio</th>
                  <th>Harga</th>
                  <th>Jam Tayang</th>
                  <th colspan="2" class="text-center">Tools</th>
                </tr>
                <?php
                  if(!empty($TanggalTayang))
                {
                  foreach($TanggalTayang as $ReadDS)
                {
                 ?>
                <tr>
                    <td><?php echo $ReadDS->kd_tayang; ?></td>
                    <td><?php echo $ReadDS->judul_film; ?></td>
                    <td><?php echo $ReadDS->tanggal_tayang; ?></td>
                    <td><?php echo $ReadDS->nama_studio; ?></td>
                    <td>Rp<?php echo number_format($ReadDS->harga,0 ,',', '.'); ?></td>
                    <?php $ReadDS->keterangan; ?>
                    <td><?php echo $ReadDS->jam_tayang; ?></td>
                    <td>
                        <a class="btn btn-block btn-primary btn-xs" href="<?php echo site_url('/Welcome/VFormAddPembelian') ?>?kd_tayang=<?php echo $ReadDS->kd_tayang; ?>&judul_film=<?php echo $ReadDS->judul_film; ?>&tanggal_tayang=<?= $ReadDS->tanggal_tayang;?>&jam_tayang=<?php echo $ReadDS->jam_tayang; ?>&harga=<?php echo $ReadDS->harga; ?>&hari=<?php echo $ReadDS->hari; ?>&keterangan=<?php echo $ReadDS->keterangan; ?>&nama_studio=<?php echo $ReadDS->nama_studio; ?>">Pilih
                        </a>
                    </td>
                </tr>
                <?php        
                }
                }
                 ?>
              <tr>
                  <!-- <td><b>Total Data : <?php echo $TotalDataStatus; ?></b></td> -->
              </tr>
            </table>
        </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
        </div>
    </div>      
  </div>
</div>

<!----------------------------------------------------------------->
<div class="modal fade" id="myModal1" role="dialog">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/filmbeli.css');?>"/>
    <div class="modal-dialog-md">  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pilih Kursi</h4>
        </div>
        <div class="modal-body">
          <div class="box-body table-responsive no-padding">
            <div class="demo">
              <div id="seat-map">
              <div class="front">Pilih Kursi</div>
                <style>
                  .btn span.glyphicon {         
                    opacity: 0;       
                  }
                  .btn.active span.glyphicon {        
                    opacity: 1;       
                  }
                </style>
    <table id="kursi" cellpadding="10" cellspacing="10">
        <?php $no = 1; ?>
        <?php foreach ($DataKursi as $kursi): ?>
          <?php if ($no == 1): ?>
            <tr>
          <?php endif ?>
              <td>
                <label class="btn btn-default">
                  <input type="checkbox" name="seat" value="<?= $kursi->no_kursi ?>" kondisi="mati" <?= $kursi->status_kursi == 1 ? 'checked disabled' : '' ?>>
                  <?= $kursi->no_kursi ?>
                  <span class="glyphicon glyphicon-ok"></span>
                </label>
              </td>
              <?php if ($no == 5): ?>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <?php endif ?>
          <?php if ($no == 10): ?>
            </tr>
          <?php endif ?>  
          <?php if ($no > 10): ?>
            <?php $no = 1; ?>
          <?php endif ?>
          <?php $no++; ?>
        <?php endforeach ?>
    </table>    
        <body>
          <p id="penjumlahan"></p> 
                  <div class="">
                    <p>Movie: <span><?= $this->input->get('judul_film') ?></span></p>
                    <p>Time: <span><?= $this->input->get('jam_tayang') ?></span></p>
                    <p id="seat">Seat :</p>
                    <p>Kursi dipilih : <div id="kursi_dipilih"></div></p>
                    <p>Tickets : <span id="counter">Rp<?= number_format($this->input->get('harga'),0 ,',', '.'); ?></span></p>
                    <p id="total_harga">Total : </p>  
                      <div id="legend"></div>
                  </div>
                      <div style="clear:both"></div>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Selesai</button>
        </div>
    </div>      
  </div>
</div>
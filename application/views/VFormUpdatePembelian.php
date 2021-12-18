<form action="<?php echo site_url('Welcome/UpdateDataPembelian'); ?>" method="post" enctype="multipart/form-data">
  <div class="box-body">
    <form role="form">
            <div class="form-group">
                <label>Judul Film</label>
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Pilih Film
                  </button>
                    <input type="text" name="txt_judul_film" class="form-control" readonly value="<?= !empty($this->input->get('judul_film')) ? $this->input->get('judul_film') : $detail['judul_film'] ?>">
            </div>
            <div class="form-group">
                  <input type="hidden" name="txt_kd_tayang" class="form-control" readonly 
                  value="<?= !empty($this->input->get('kd_tayang')) ? $this->input->get('kd_tayang') : $detail['kd_tayang'] ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Tayang</label>
                  <input type="date" name="txt_tanggal_tayang" class="form-control" readonly value="<?php echo $detail['tanggal_tayang'];?>">
            </div>
            <div class="form-group">
                <label>Studio</label>
                  <input type="text" name="txt_jam_tayang" class="form-control" readonly value="<?php echo $detail['nama_studio'];?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                  <input type="text" name="txt_harga" id="harga" onkeyup="kursi();" class="form-control" readonly value="<?php echo $detail['harga'];?>">
            </div>
            <div class="form-group">
                <label>Pilih Kursi</label>
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal1">Pilih Kursi
                  </button>
                    <input type="text" name="txt_pilih_kursi" readonly id="pilihkursi" value="<?php echo $detail['pilih_kursi'];?>"  class="form-control" >            
            </div>
            <div class="form-group">
                <label>Jumlah Kursi</label>
                    <input type="text" name="txt_jumlah_kursi" readonly id="jumlah_kursi" value="<?php echo $detail['jumlah_kursi'];?>" onkeyup="kursi();" class="form-control" >            
            </div>
            <script>
                function kursi() {
                      var harga = document.getElementById('harga').value;
                      var pilihkursi = seat;
                      var bayar = document.getElementById('bayar').value;   
                      var total = parseInt(harga) * parseInt(pilihkursi);
                      var kembalian = parseInt(bayar) - parseInt(total);
                      if (!isNaN(total)) {
                         document.getElementById('total').value = total;
                      }if (!isNaN(kembalian)){
                        document.getElementById('kembalian').value = kembalian;
                      }   
                }
            </script>
            <div class="form-group">
                <label>Total</label>
                    <input type="text" readonly name="txt_total"  id="total" onkeyup="kursi();" class="form-control" value="<?php echo $detail['total'];?>">
            </div>
            <div class="form-group">
                <label>Bayar</label>
                    <input type="text"  name="txt_bayar" id="bayar" onkeyup="kursi();" class="form-control" value="<?php echo $detail['bayar'];?>">
            </div>
            <div class="form-group">
                <label>Kembalian</label>
                    <input type="text" readonly name="txt_kembalian" id="kembalian" class="form-control" >
            </div>
              <div class="form-group">
                <label>Tanggal Beli</label>
                <?php
                   $tanggal = Date("Y-m-d");
                ?>
                <input type="date" readonly name="txt_tanggal_beli" value="<?php echo $tanggal ?>" class="form-control" >
            </div>
                <input type="submit" class="btn btn-sm btn-default" name="simpan" value="Simpan">
                <a class="btn btn-sm btn-default" href="<?php echo site_url('Welcome/DataPembelian');?>">Kembali</a>
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
                        <a class="btn btn-block btn-primary btn-xs" href="<?php echo site_url('/Welcome/VFormUpdatePembelian') ?>?kd_tayang=<?php echo $ReadDS->kd_tayang; ?>&judul_film=<?php echo $ReadDS->judul_film; ?>&tanggal_tayang=<?= $ReadDS->tanggal_tayang;?>&jam_tayang=<?php echo $ReadDS->jam_tayang; ?>&harga=<?php echo $ReadDS->harga; ?>&hari=<?php echo $ReadDS->hari; ?>&keterangan=<?php echo $ReadDS->keterangan; ?>&nama_studio=<?php echo $ReadDS->nama_studio; ?>">Pilih
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <table id="kursi">
      <tbody>
        <?php foreach ($DataKursi as $kursi): ?>
          <tr>
            <td>
              <label class="btn btn-default">
                <input type="checkbox" name="seat" value="<?= $kursi->no_kursi ?>" kondisi="mati" <?= $kursi->status_kursi == 1 ? 'checked disabled' : '' ?>>
                <?= $kursi->no_kursi ?>
                <span class="glyphicon glyphicon-ok"></span>
              </label>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>    
        <body>
          <p id="penjumlahan"></p> 
              <div class="">
                <p>Movie: <span><?= $this->input->get('judul_film') ?></span></p>
                <p>Time: <span><?= $this->input->get('jam_tayang') ?></span></p>
                <p id="seat">Seat :</p>
                <p>Kursi dipilih : <div id="kursi_dipilih"></div></p>
                <p>Tickets : <span id="counter"><?= $this->input->get('harga') ?></span></p>
                <p id="total_harga">Total : </p>  
                  <div id="legend"></div>
              </div>
                  <div style="clear:both"></div>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>      
  </div>
</div>
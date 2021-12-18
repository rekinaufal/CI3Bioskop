<table border="1px">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pembelian</h3>
                <!-- <div class="box-tools">
                 <form action="<?php echo site_url('Welcome/SearchPembelian')?>" method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                       <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">
                          <div class="input-group-btn">
                             <button type="submit" value="Cari" class="btn btn-default"><i class="fa fa-search"></i></button>
                            <a class="btn btn-default" href="<?php echo site_url('Welcome/DataPembelian')?>"><i class="fa fa-refresh"></i></a>
                           </div> 
                    </div>
                  </form>
                </div> -->
            </div>
            <!-- /.box-header -->
              <table class="table table-hover" id="myTable">
                <thead>
                  <a class="btn btn-default" style="width: 50px;" href="<?php echo site_url('Welcome/VFormAddPembelian'); ?>">+</a>
                  <br></br>
                    <tr>
                      <th>Kode Pembelian</th>
                      <th>Judul Film</th>
                      <th>Tanggal Tayang</th>
                      <th>Studio</th>
                      <th>Harga</th>
                      <th>Pilih Kursi</th>
                      <th>Jumlah Kursi</th>
                      <th>Tanggal Beli</th>
                      <th>Total</th>
                      <th>Bayar</th>
                      <th class="text-center" width="10%">Tools</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($listData as $ReadDS) : ?>
                    <tr>
                    		<td><?php echo $ReadDS->kd_pembelian; ?></td>
                    		<td><?php echo $ReadDS->judul_film; ?></td>
                        <td><?php echo $ReadDS->tanggal_tayang; ?></td>
                        <td><?php echo $ReadDS->nama_studio; ?></td>
                        <td>Rp <?php echo number_format($ReadDS->harga, 0, ',', '.'); ?></td>
                        <td><?php echo $ReadDS->pilih_kursi; ?></td>
                        <td class="text-center"><?php echo $ReadDS->jumlah_kursi; ?></td>
                        <td><?php echo $ReadDS->tanggal_beli; ?></td>
                        <td>Rp <?php echo number_format($ReadDS->total, 0 , ',','.'); ?></td>
                        <td>Rp <?php echo number_format($ReadDS->bayar, 0 , ',','.'); ?></td>
                    		<td>
                            <!-- <a class="btn btn-primary" href="<?php echo site_url('Welcome/DataPembelian/'.$ReadDS->kd_pembelian.'/view') ?>">Update</a> -->
                            <a class="btn btn-primary" target="blank" href="<?php echo site_url('Welcome/Struk/'.$ReadDS->kd_pembelian.'/view?pdf') ?>">Cetak Struk</a>
                        </td>
                    		<!-- <td><a href="<?php echo site_url('Welcome/DeleteDataPembelian/'.$ReadDS->kd_pembelian) ?>"><button type="button" class="btn btn-block btn-primary btn-xs" onClick="return confirm('Apakah Anda ingin menghapus data ini ?')">Delete</button></a></td> -->
                    </tr>
                  <?php	endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="table table-hover">
              <b></b>
            </div>            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
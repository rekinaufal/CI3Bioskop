<form action="<?php echo site_url('Welcome/Pendapatan'); ?>" method="post" enctype="multipart/form-data">
<!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Pendapatan</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('css/pendapatandanlayar.min.css');?>">
    </head>
<body>
<div class="container">
  <div class="jumbotron">
    <h2>Bioskop Sekai</h2>
    <p>Data Pendapatan biokop</p>
    <p id="total"></p> 
  </div>
</div>              
  <!-- <table id="table" class="table table-hover table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Pembelian</th>
        <th>Judul Film</th>
        <th>Jam Tayang</th>
        <th>Harga</th>
        <th>Studio</th>
        <th>Pilih Kursi</th>
      </tr>
    </thead>
    <tbody>
      
      
    </tbody>
  </table> -->
</form>
<script src="<?php echo base_url('temp/bower_components/jquery/dist/jquery.min.js');?>"></script>
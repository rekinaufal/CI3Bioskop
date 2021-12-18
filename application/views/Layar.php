<style>
    button{
    background-color: #3c8dbc;
    border-radius: 5px;
    border: gray 1px solid;
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }
</style>
<form action="<?php echo site_url('Welcome/Layar'); ?>" method="post" enctype="multipart/form-data">
<!DOCTYPE html>
  <html>
    <head>
      <title>Layar</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="<?php echo base_url('css/pendapatandanlayar.min.css');?>">
       <script src="<?php echo base_url('js/jquery-1.10.2.js');?>"></script>  
    </head>
    <body>
      <div class="container">
        <div class="jumbotron">
          <p id="judul_film"></p>
          <p id="waktu"></p>
          <p id="kursi_layar"></p>
        <div style="clear:both"></div>
      </div>
    </div>
    </body>
  </html>
</form>
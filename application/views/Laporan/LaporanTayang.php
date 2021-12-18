<style>
    .row{
       margin-top:40px;
       padding: 0 10px;
    }
    .clickable{
      cursor: pointer;   
    }

    .panel-heading div {
      margin-top: -18px;
      font-size: 15px;
    }
    .panel-heading div span{
      margin-left:5px;
    }
    .panel-body{
      display: none;
    }
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
  @media print{
    button{
      display: none;
    }
  }
</style>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Data Tayang</title>
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Docs-icon.png');?>"/>
    <link rel="stylesheet" href="<?php echo base_url('temp/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
</head>
<body>
  <div class="container">
    <!-- <h1>Click the filter icon <small>(<i class="glyphicon glyphicon-filter"></i>)</small></h1> -->
      <div class="row">
       <!-- <div class="col-md-6"> untuk memperbesar / memperkecil ukuran-->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="box-title">Laporan Data Tayang</h3>
            <br>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9">
                  <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter" />
                </div>
                <div class="col-md-3">
                  <input type="date" name="status" id="status" class="form-control" data-action="filter" data-filters="#dev-table">
                  </select>
                </div>
              </div>
            </div>
    <button onclick="Print()">Print</button>
      <table class="table table-hover" id="dev-table">
        <thead>
          <tr>
            <th width="5%">Kode Tayang</th>
            <th>Judul Film</th>
            <th>Nama Studio</th>
            <th>Tanggal Tayang</th>
            <th>Jam Tayang</th>
            <th>Status Tayang</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php foreach($listData as $ReadDS) :?>
            <tr>
              <td><?= $ReadDS->kd_tayang; ?></td>
              <td><?= $ReadDS->judul_film; ?></td>
              <td><?= $ReadDS->nama_studio; ?></td>
              <td class="status"><?= $ReadDS->tanggal_tayang; ?></td>
              <td><?= $ReadDS->jam_tayang; ?></td>
              <td><?= $ReadDS->status_tayang == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
            </tr>
          <?php endforeach; ?>
       </tbody>
    </table>
  </div>
</body>
</html>
<script>
  (function(){
    'use strict';
  var $ = jQuery;
  $.fn.extend({
    filterTable: function(){
      return this.each(function(){
        ///// filter biasa
        $(this).on('keyup', function(e){
          $('.filterTable_no_results').remove();
          var $this = $(this), 
              search = $this.val().toLowerCase(), 
              target = $this.attr('data-filters'), 
              $target = $(target), 
              $rows = $target.find('tbody tr');
                        
          if(search == '') {
            $rows.show(); 
          } else {
            $rows.each(function(){
              var $this = $(this);
              $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
            })
            if($target.find('tbody tr:visible').size() === 0) {
              var col_count = $target.find('tr').first().find('td').size();
              var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
              $target.find('tbody').append(no_results);
            }
          }
        });
        ///// filter biasa
        ///// filter status
        $('#status').on('change', function(e){
          $('.filterTable_no_results').remove();
          var $this = $(this), 
              search = $this.val(),
              target = $this.attr('data-filters'), 
              $target = $(target), 
              $rows = $target.find('tbody tr');
                        
          if(search == '') {
            $rows.show(); 
          } else {
            $rows.each(function(){
              var $this = $(this);
              $this.find(".status").text() == search ? $this.show() : $this.hide();
            })
            if($target.find('tbody tr:visible').size() === 0) {
              var col_count = $target.find('tr').first().find('td').size();
              var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
              $target.find('tbody').append(no_results);
            }
          }
        });
        ///// filter status
      });
    }
  });
  $('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
  // $('[data-action="filter"]').filterTable();
  
  $('.container').on('click', '.panel-heading span.filter', function(e){
    var $this = $(this), 
      $panel = $this.parents('.panel');
    
    $panel.find('.panel-body').slideToggle();
    if($this.css('display') != 'none') {
      $panel.find('.panel-body input').focus();
    }
  });
  $('[data-toggle="tooltip"]').tooltip();
})
// ------------------------------------------------------------------------------
  function Print(){
    window.print();
  }
</script>
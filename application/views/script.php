<script>
  // kembalian--------------------------------------------------------------------------------
  function kursi() 
  {
    var harga = document.getElementById('harga').value;
    var bayar = document.getElementById('bayar').value.replace('.', '');
    var kembalian = parseInt(bayar) - parseInt(total);
    if (!isNaN(kembalian))
    {
      document.getElementById('kembalian').value = kembalian;
    }   
  }
// modal pilih kursi--------------------------------------------------------------------------------
  var seat = 0;
  var harga = <?= empty(@$this->input->get('harga')) ? 0 : $this->input->get('harga') ?>;
  var total = 0;
  var kursi_dipilih = "";
  var array = [];
  var nor = 0;

  $('#kursi').on('click', 'input', function(){
  	if ($(this).attr('kondisi') == "mati") {
  		seat = seat + 1;
  		total = harga * seat;
      kursi_dipilih = "";
      array[nor] = $(this).val();
      nor++;
      array.forEach(function(e,i){
          kursi_dipilih = kursi_dipilih + e + ',';
      });
      console.log(array);
  		$(this).attr('kondisi', 'aktif');
  	}else if($(this).attr('kondisi')  == "aktif"){
  		seat = seat - 1;
  		total = harga * seat;
      var ee = $(this).val();
      kursi_dipilih = "";
      array.forEach(function(e,i){
        if (e == ee) {
          array.splice(i, 1);
        }
      });
      array.forEach(function(e,i){
          kursi_dipilih = kursi_dipilih + e + ',';
      });
      console.log(array);
  		$(this).attr('kondisi', 'mati');
  	}
    kursi_dipilih = kursi_dipilih.replace(/,\s*$/, "");
  	$('#seat').empty();
  	$('#total_harga').empty();
    $('#kursi_dipilih').empty();
  	$('#seat').append("Seat : " + seat);
    $('#jumlah_kursi').val(seat);
  	$('#total_harga').append("Total : Rp " + total);
    $('#kursi_dipilih').append(kursi_dipilih);
  	$('#total').val(total);
  	$('#pilihkursi').val(kursi_dipilih);
  });
// autoload tampilan struk--------------------------------------------------------------------------------
function tampil() {
    $.ajax({
        url : '<?= site_url('Welcome/getTampilLayar') ?>',
        dataType : 'json',
        type : 'get',
        success : function(response){
          if (response.data != null) {
            var film = "Movie: " + response.data.judul_film;
            var waktu = "Time: " + response.data.jam_tayang;
            var kursi = "";
            $.each(response.DataKursi,function(e,i){
              if (i.status_kursi == 1) {
                var status = "checked";
              }else{
                var status = "";
              }
              if ((e + 1) % 1 == 0) {
                var td1 = "<tr>";
              }else{
                var td1 = "";
              }
              if ((e + 1) % 5 == 0) {
                var tdt = "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
              }else{
                var tdt = "";
              }
              if ((e + 1) % 10 == 0) {
                var td2 = "</tr>";
              }else{
                var td2 = "";
              }
              kursi = td1 + kursi + 
                '<td>' +
                  '<label class="btn btn-default">' +
                    '<input type="checkbox" value="A1" disabled '+status+'>' +
                      i.no_kursi +
                  '</label>' +
                '</td>' +
                tdt +
                td2;
            });
          }else{
            var film = "";
            var waktu = "";
            var kursi = "";
          }
          $('#judul_film').html(film);
          $('#waktu').html(waktu);
          $('#kursi_layar').html(kursi);
        }
    });
}
$('document').ready(function () {
  setInterval(function () {tampil()}, 1000);
});
// -----------------------------------------------------------------------------------------------
var count = 0;
function getData() {
    $.ajax({
        url : '<?= site_url('Welcome/GetDataPendapatan') ?>',
        dataType : 'json',
        type : 'get',
        success : function(response){
            var total = 0;
        		// var tr = "";
        		var no = 0;
        		$.each(response.data,function(e,i){
        			no++;
              total = total + parseInt(i.harga);
        			// tr = tr +
        			// "<tr>"+
        			// 	"<td>"+no+"</td>"+
        			// 	"<td>"+i.kd_pembelian+"</td>"+
        			// 	"<td>"+i.judul_film+"</td>"+
           //      "<td>"+i.jam_tayang+"</td>"+
           //      "<td>"+i.harga+"</td>"+
           //      "<td>"+i.nama_studio+"</td>"+
           //      "<td>"+i.pilih_kursi+"</td>"+
           //      // "<td>"+i.total+"</td>"+
           //      // "<td>"+i.bayar+"</td>"+
           //      // "<td>"+i.tanggal_beli+"</td>"+
        			// "</tr>"
        			// ;
	           })
            $('#total').html("Total Pendapatan = " + "Rp " +total);
	          // $('#table tbody').html(tr);

        }
    });
}
$('document').ready(function () {
	setInterval(function () {getData()}, 1000);
});
// --------------------------------------------------------------------------------
</script>
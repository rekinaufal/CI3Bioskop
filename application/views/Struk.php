<?php
            $pdf = new TCPDF('P',PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetTitle('Laporan Data Barang');
            $pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
            $pdf->SetDefaultMonospacedFont('helvetica');
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);
            $pdf->SetAutoPageBreak(true, 10);
            $pdf->SetFont('helvetica', '', 11);       
            $pdf->AddPage();
            $html = '';
            $html='<table cellspacing="1" cellpadding="2">
	                        <tr>	
	                            <th width="35%" border="1" align="center" colspan="2">Bioskop Sekai</th>
	                        </tr>';
			            $kursi = explode(',', $detail['pilih_kursi']);
						foreach ($kursi as $key => $value)
						{
                 	   $html.='<tr>
		                            <td>
				                            Judul 
				                        <br>
				                            Studio  
				                        <br>
				                            Tanggal 
				                        <br>
				                            Kursi   
			                        </td>
			                        <td>
				                        '.$detail['judul_film'].'
				                        <br>
				                        '.$detail['nama_studio'].'
				                        <br>
				                        '.$detail['tanggal_tayang'].'
				                        <br>
				                        '.$value.'
			                        </td>
		                        </tr>
	                        
            		';
            }

            $html.='</table>';
            $pdf->writeHTML($html);
            $pdf->Output('Struk.pdf', 'I');
?>

<!-- <link href="https://fonts.googleapis.com/css?family=Oxygen|Russo+One&display=swap" rel="stylesheet">
<style>
	html{
		width: 300px;
		font-family: 'Russo One', sans-serif;
	}
	h1,h2,h3,h4,h5,h6{
		font-family: 'Russo One', sans-serif;
	}
	.kotak{
		border: 3px solid black;
	}
	.kotak .kotak-isi{
		margin: 10px;
	}
	button{
		background-color: #3c8dbc;
		border-radius: 5px;
		border: none;
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

<?php
	if (isset($_GET['pdf'])) {
		header("Content-type:application/pdf");
		header("Content-Disposition:attachment;filename=downloaded.pdf");
	}else{
?>	
	<button onclick="Print()">Print</button>
<?php
	}
	$kursi = explode(',', $detail['pilih_kursi']);
	foreach ($kursi as $key => $value){
?>
	<br></br>
	<div class="kotak">
		<div class="kotak-isi">
			<h1>Bioskop Sekai</h1>
			<hr>
			<h2><?= $detail['judul_film']; ?></h2>
			<p>
				Studio : <?= $detail['nama_studio'] ?>
				<br>
				Tanggal : <?= $detail['tanggal_tayang'] ?>
				<br>
				Kursi : <?= $value ?>
			</p>
		</div>
	</div>
	<br>
<?php } ?>
<script>
	function Print(){
		window.print();
	}
</script> -->
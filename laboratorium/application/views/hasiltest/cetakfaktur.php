<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:20.99cm ;
font-size: 12px;
border-collapse:collapse;
}
table.grid th{
	padding:5px;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
border:1px solid #000;
}
table.grid tr td{
	padding:2px;
	border-bottom:0.2mm solid #000;
	border:1px solid #000;
}
h1{
font-size: 18px;
}
h2{
font-size: 14px;
}
h3{
font-size: 12px;
}
p {
font-size: 10px;
}
center {
	padding:8px;
}
.atas{
display: block;
width:20.99cm ;
margin:0px;
padding:0px;
}
.kanan tr td{
	font-size:12px;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:20.99cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:20.99cm ;
font-size:13px;
}
.page {
width:20.99cm ;
font-size:12px;
padding:10px;
}
table.footer{
	width:20.99cm ;
	font-size: 12px;
	border-collapse:collapse;

}
</style>
<script>
	function cetak() {
		window.print();
	}
	function tutup() {
		window.close();
	}
</script>
<script>
	window.onload = function() {
		window.print();
		document.getElementById("tutup").focus();
	};
</script>
<?php

$kop = '<center><h1>'.$instansi.'</h1></center>';
$kop .= '<center><p>'.$alamat_instansi.'</p><center><br/>';
$header = "
			<td width='60%' valign='top'>
				<table class='kanan' width='60%'>
				  <tr>
						<td width='80'>Kode</td>
						<td width='5'>:</td>
						<td><b>$kode_periksa</b></td>
				  </tr>
				  <tr>
						<td>Tgl Periksa</td>
						<td width='5'>:</td>
						<td>$tgl_periksa</td>
				  </tr>
				  <tr>
						<td>Kode Barcode</td>
						<td width='5'>:</td>
						<td>$kode_barcode</td>
				  </tr>
			  </table>
			</td>
			<td width='40%' valign='top'>
				<table class='kanan' width='60%'>
					<tr>
						<td width='80'>Nama</td>
						<td width='5'>:</td>
						<td><b>$nama</b></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td width='5'>:</td>
						<td>$gender</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td width='5'>:</td>
						<td>$alamat</td>
					</tr>
				</table>
			</td>";

function myheader($kop,$header,$judul){
?>
<div class="atas">
	<?php echo $kop;?>
	<hr/>
</div>
<div class="atas">
	<table width="100%">
		<tr>
			<?php echo $header;?>
		</tr>    
	</table>
	<center><h1><?php echo $judul;?></h1></center>
</div>
<table class="grid" width="100%">
	<tr>
    	<th>No</th>
        <th>Jenis Pemeriksaan</th>
		<th>Tarif</th>
	</tr>        
<?php
}
function myfooter(){	
	echo "</table>";
}
	$g_total=0;
	$no=1;
	$page =1;
	foreach($data->result_array() as $r){
	$total = $r['tarif'];
	if(($no%25) == 1){
   	if($no > 1){
        myfooter();
        echo "<div class=\"pagebreak\" align='right'>
		<div class='page' align='center'>Hal - $page</div>
		</div>";
		$page++;
  	}
   	myheader($kop,$header,$judul);
	}
	?>
    <tr>
    	<td align="center"><?php echo $no;?></td>
        <td align="center"><?php echo $r['nama_diagnosa'];?></td>
        <td align="right">Rp&nbsp;<?php echo number_format($r['tarif'],0,',','.');?></td>
	</tr>
    <?php
	$no++;
	$g_total = $g_total+$total;
	}
	echo "<tr>
			<td colspan='2' align='center'>Total</td>
			<td align='right'><b>Rp&nbsp;".number_format($g_total,0,',','.')."</b></td>
		</tr>";
myfooter();	
	echo "</table>";
?>
<div style="padding:10px"></div>
	<table width="100%" class="footer">
		<tr>
			<td width="70%">
			</td>
			<td width="30%" valign="top" align="center">
				Yogyakarta, <?php date_default_timezone_set('Asia/Jakarta');
				echo $this->app_model->tgl_indo(date('Y-m-d'));?>
				<br />
				<b>Kasir,</b>
				<br /><br /><br /><br />
				<b><u><?php echo $this->session->userdata('nama_lengkap');?></u></b>
			</td>
		</tr>
	</table>    
<div class="page" align="center">Hal - <?php echo $page;?></div>
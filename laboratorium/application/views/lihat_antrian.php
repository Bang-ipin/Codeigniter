<script type="text/javascript">
$(function() {
	$("#dataTable.detailantrian tr:even").addClass("stripe1");
	$("#dataTable.detailantrian tr:odd").addClass("stripe2");
	$("#dataTable.detailantrian tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<h3 align="center">BATAS WAKTU HABIS DATA OTOMATIS TERHAPUS</h3>
<table id="dataTable" class="detailantrian" width="100%">
<tr>
	<th>No</th>
    <th>Kode Barcode</th>
    <th>Tanggal Antrian</th>
	<th>Pasien</th>
    <th>Alamat</th>
	<th>Tempat Lahir</th>
	<th>Tgl Lahir</th>
	<th>Gender</th>
    <th>Telp</th>
	<th>Status</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1;
		foreach($data->result_array() as $db){
		if ($db['gender']==1){
			$gender =" <span>Laki-Laki</span>";
		}
		else{
			$gender =" <span>Perempuan</span>";
		}				if ($db['status']==1){
			$keterangan =" <span>Belum Diperiksa</lunas>";
		}
		else if ($db['status']==2){
			$keterangan =" <span>Sudah Diperiksa</span>";
		}else{
			$keterangan =" <span>Cancel</span>";
		}
		$selisih = $this->app_model->Tempo($db['kode_barcode']);
		//$namapasien = $this->app_model->CariPasien($db['kode_barcode']);
		$q = "DELETE FROM antrian WHERE 
			 DATEDIFF(CURDATE(),tempo) > $selisih";
		$this->app_model->manualQuery($q);
		?>    
    	<tr>
			<td align="center" width="20"><?php echo $db['no_antrian']; ?></td>
            <td align="center" width="80" ><?php echo $db['kode_barcode']; ?></td>
            <td align="center" width="100" ><?php echo $this->app_model->tgl_indo($db['tgl_antrian']); ?></td>
			<td align="center" width="80" ><?php echo $db['nama']; ?></td>
			<td align="center" width="80" ><?php echo $db['alamat']; ?></td>
            <td align="center" width="100" ><?php echo $db['tempat_lahir']; ?></td>
            <td align="center" width="50" ><?php echo $this->app_model->tgl_indo($db['tgl_lahir']); ?></td>
            <td align="center" width="100" ><?php echo $gender; ?></td>
            <td align="center" width="80" ><?php echo $db['telp']; ?></td>
			<td align="center" width="80" ><?php echo $keterangan; ?></td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="11" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>
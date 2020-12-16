<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model {
   
	public function __construct() {
		parent::__construct();
			
		}
	public function  totalinvoice() {
    return $this->db->get('invoice')
					->num_rows();
	}
	public function  totalpelanggan() {
    return $this->db->get('pelanggan')
					->num_rows();
	}
	
	function dd_gender(){
	$dd['L']= 'Laki-laki';
	$dd['P']= 'Perempuan';
	return $dd;
	}
	
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_indo($tgl){

			date_default_timezone_set('Asia/Jakarta');

			$jam = substr($tgl,11,10);

			$tgl = substr($tgl,0,10);

			$tanggal = substr($tgl,8,2);

			$bulan = $this->getBulan(substr($tgl,5,2));

			$tahun = substr($tgl,0,4);

			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;		 

	}	
	public function getBulan($bln){

		switch ($bln){

			case 1: 

				return "Januari";

				break;

			case 2:

				return "Februari";

				break;

			case 3:

				return "Maret";

				break;

			case 4:

				return "April";

				break;

			case 5:

				return "Mei";

				break;

			case 6:

				return "Juni";

				break;

			case 7:

				return "Juli";

				break;

			case 8:

				return "Agustus";

				break;

			case 9:

				return "September";

				break;

			case 10:

				return "Oktober";

				break;

			case 11:

				return "November";

				break;

			case 12:

				return "Desember";

				break;

		}

	} 

	function update_password($pass_new){
		$dt['password'] = sha1($pass_new);
		return $this->db->where('id_anggota',$this->session->userdata('id_anggota'))
						->update('anggota',$dt);
	}
	function cek_password($pass){
		return $this->db->select('id_anggota')
						->where('password', sha1($pass))
						->where('id_anggota',$this->session->userdata('id_anggota'))
						->limit(1)
						->get('anggota');
	}
	function cek_password_admin(){
		return $this->db->where('id_admin',$this->session->userdata('id_admin'))
						->get('admin')
						->result();
	}
	
	// function cek_password_admin($pass){
	// 	return $this->db->select('id_admin')
	// 					->where('id_admin',$this->session->userdata('id_admin'))
	// 					->limit(1)
	// 					->get('admin');
	// }
	
	
	public function CariKepalaPerpus($kode){
		$t = "SELECT * FROM admin WHERE id_admin='$kode'";
		$d = $this->db->query($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->nama_pengguna;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	
	public function get_kode_invoice()
    {
        $dateY= date('Y');
        $dateM= date('m');
        $q = $this->db->query("select MAX(RIGHT(kodeinvoice,4)) as kode_max from invoice");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kode_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
		return "INV-HK-".$dateM."-".$dateY."-".$kd;
		
    }
	function dd_paket(){
		$dd['1']= 'Basic';
		$dd['2']= 'Premium';
		$dd['3']= 'Pro';
		$dd['4']= 'Special';
		return $dd;
	}
	function dd_bank(){
		$dd['1']= 'Bank BCA';
		$dd['2']= 'Bank BNI';
		$dd['3']= 'Bank BRI';
		return $dd;
	}
	function dd_status(){
		$dd['0']= 'Pending';
		$dd['1']= 'On Proses';
		$dd['2']= 'Completed';
		return $dd;
	}

	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
    public function lihat_data($id){
		return $this->db->where('id',$id)
					->get('pelanggan')
					->result();
	}
	public function get_post(){

        /* $tempo = array(0 => 'Pilih tahun'); */
		$post = array();
        for ($i = 1 ; $i <=30 ; $i++) { 
            $post[$i] = $i;
        }
        return $post;
	}
	public function savepostingan($id, $data){
		$this->db->where('id', $id);
		$update=$this->db->update('pelanggan',$data);
		return $update;
	}
}		  
 
        
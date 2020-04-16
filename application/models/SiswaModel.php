<!-- ini untuk impoer guru -->

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SiswaModel extends CI_Model {
  public function view(){
    return $this->db->get('nilai_kelas10')->result(); // Tampilkan semua data yang ada di tabel siswa
  }
   public function view2(){
    return $this->db->get('nilai_kelas11')->result(); // Tampilkan semua data yang ada di tabel siswa
  }

  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('nilai_kelas10', $data);
  }
  public function insert_multiple2($data){
    $this->db->insert_batch('nilai_kelas11', $data);
  }

  // ini untuk siswa lihat nilai
  // public function status()
  // {
  
  //   if ($this->db->num_rows('nilai_kelas10') > 0){
  //     $status = "Success to Upload";
    
  //   }else{
  //     $status = "Failed to Upload";
  //   }
  //   return $status;
  // }

}
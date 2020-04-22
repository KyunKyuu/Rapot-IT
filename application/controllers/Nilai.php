<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nilai extends CI_Controller {
  private $filename = "import_data"; // Kita tentukan nama filenya
  
  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('SiswaModel');
  }
  
  public function index(){
    $data['title'] = "Pilihan Input";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('akademik/input_nilai/pilihan_input', $data);
    $this->load->view('templates/footer');
  }
  


  public function form(){
    $data['title'] = "Input Nilai Kelas 10";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('akademik/input_nilai/kelas10', $data);
    $this->load->view('templates/footer');
    
  }
  
  public function tabel10()
  {
    $data = array(); // Buat variabel $data sebagai array
    $data['filename'] = $this->filename;
    $data['title'] = "Tabel Nilai Siswa";
    $data['siswa'] = $this->SiswaModel->view();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->SiswaModel->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('akademik/input_nilai/tabel10', $data);
    $this->load->view('templates/footer');
    
  }

  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    $upload_by = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'name'=>$row['A'], // Insert data nis dari kolom A di excel
          'nis'=>$row['B'], // Insert data nama dari kolom B di excel
          'kelas'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
          'mapel'=>$row['D'], // Insert data alamat dari kolom D di excel
          'upload_by' => $upload_by['name'],
          'nilai'=>$row['E'],
          'date_upload' => time()

        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->SiswaModel->insert_multiple($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Import Success.</div>');

    redirect("nilai/form"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }

  public function form2(){
    $data['title'] = "Input Nilai Kelas 11";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('akademik/input_nilai/kelas11', $data);
    $this->load->view('templates/footer');
    
  }

  public function tabel11()
  {
    $data = array(); // Buat variabel $data sebagai array
    $data['filename'] = $this->filename;
    $data['title'] = "Tabel Nilai Siswa";
    $data['siswa'] = $this->SiswaModel->view2();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->SiswaModel->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('akademik/input_nilai/tabel11', $data);
    $this->load->view('templates/footer');
    
  }

  public function import2(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    $upload_by = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'name'=>$row['A'], // Insert data nis dari kolom A di excel
          'nis'=>$row['B'], // Insert data nama dari kolom B di excel
          'kelas'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
          'mapel'=>$row['D'], // Insert data alamat dari kolom D di excel
          'upload_by' => $upload_by['name'],
          'nilai'=>$row['E'],
          'date_upload' => time()

        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->SiswaModel->insert_multiple2($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Import Success.</div>');
    redirect("nilai/form"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }


}
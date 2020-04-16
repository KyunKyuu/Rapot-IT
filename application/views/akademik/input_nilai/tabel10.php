 <div class="container-fluid">
<?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("nilai/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
   
    ?>
     <div class="card shadow mb-4">
            <div class="card-header py-3">
            
              <div class="btn btn-primary actived">Preview Data Excel</div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Nis</th>
                      <th>Kelas</th>
                      <th>Mapel</th>
                      <th>Upload By</th>
                      <th>Nilai</th>
                     
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Nis</th>
                      <th>Kelas</th>
                      <th>Mapel</th>
                      <th>Upload By</th>
                      <th>Nilai</th>
                     
                    </tr>
                  </tfoot>
                  <tbody>
    <?php
    $numrow = 1;
    $kosong = 0;
    $no = 0;
    $upload_by = $user['name'];
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $name = $row['A']; // Ambil data NIS
      $nis = $row['B']; // Ambil data nama
      $kelas = $row['C']; // Ambil data jenis kelamin
      $mapel = $row['D']; // Ambil data alamat
      $nilai = $row['E'];
      // Cek jika semua data tidak diisi
      if($name == "" && $nis == "" && $kelas == "" && $mapel == "" && $nilai == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $name_td = ( ! empty($name))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $kelas_td = ( ! empty($kelas))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $mapel_td = ( ! empty($mapel))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $nilai_td = ( ! empty($nilai))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        // Jika salah satu data ada yang kosong
        if($name == "" or $nis == "" or $kelas == "" or $mapel == "" or $nilai == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
       
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td".$name_td.">".$name."</td>";
        echo "<td".$nis_td.">".$nis."</td>";
        echo "<td".$kelas_td.">".$kelas."</td>";
        echo "<td".$mapel_td.">".$mapel."</td>";
        echo "<td>".$upload_by."</td>";
        echo "<td".$nilai_td.">".$nilai."</td>";
        echo "</tr>
              
             ";
        
              
       
      }

     $numrow++; // Tambah 1 setiap kali looping
     $no++;

    }
    ?>
  </tbody>
    </table>
     </div>
      </div>
         </div>
   <?php
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo " <a href='".base_url("nilai/form")."' class='btn btn-danger btn-icon-split'>
                    <span class='icon text-white-50'>
                      <i class='fas fa-window-close'></i>
                    </span>
                    <span class='text'><strong>Cancel</strong></span>
                  </a>  &nbsp";
      
      echo "
                  <button type='submit' name='import' class='btn btn-success btn-icon-split'>
                    <span class='icon text-white-50'>
                      <i class='fas fa-download'></i>
                    </span>
                    <span class='text'><strong>Import Excel</strong></span>
                  </button>";
     
    }
    
    echo "</form>";
  }
  ?>
 
</div>
</div>
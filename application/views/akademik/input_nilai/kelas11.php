

  <!-- Load File jquery.min.js yang ada difolder js -->
  <div class="container-fluid">
  <!-- <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script> -->


     
  <div class="my-2"></div>
                  <a href="<?= base_url("excel/format.xlsx"); ?> " class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-download"></i>
                    </span>
                    <span class="text"><strong>Download Format</strong></span>
                  </a>
  <br>
  <br>
  
  <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  <form method="post" action="<?= base_url("nilai/tabel11"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file">
    
    <!--
    -- Buat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->

    <input type="submit" name="preview" value="Preview" class="btn btn-success">
    
  </form>
  <br>
  <div class="col-mt-2"><?= $this->session->flashdata('message'); ?></div>
  
</div>
</div>
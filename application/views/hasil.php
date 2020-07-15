<style>
    .destination {
    }
    hr {
    width:85%;
    }

    td {
      color:#000;
    }

  
</style>
<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url();?>assets/frontend/images/banner4.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                        <div class="fields">
      
                            <div class="row">

                                <div class="col-md-3">
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="destination" style="background-color:#fff;opacity:0.99;margin-top:20%">
                                        <h4 class="mb-5" style="color: #2d3436">Data Transaksi Anda</h4>
                                        <hr style="margin-top:-15%">
                                        <?php
                                            if(count($cari)>0){
                                                 echo form_open_multipart('front/update_bukti');
                                                 foreach ($cari as $data) {
                                                 echo "<table class='table table-bordered'>";
                                                 echo "<tr><td>Kode Transaksi</td><td>$data->kode_transaksi</td></tr>";
                                                 echo "<tr><td>Nama Penyewa</td><td>$data->nama_penyewa</td></tr>";
                                                 echo "<tr><td>No.Villa</td><td>$data->nama_villa</td></tr>";
                                                 echo "<tr><td>Check in</td><td>$data->tgl_start</td></tr>";
                                                 echo "<tr><td>Check out</td><td>$data->tgl_end</td></tr>";
                                                 echo "<tr><td>Total Harga</td><td>Rp.$data->total_harga</td></tr>";
                                             echo "<input type='hidden' name='kode_transaksi' id='kode_transaksi' class='form-control' readonly='true' value='$data->kode_transaksi'>";
                                                 
                                                 echo "</table>";
                                                
                                        
                                            }
                                            }
                                            else{
                                             
                                            echo '<script type="text/javascript">alert("Kode transaksi belum terdaftar");</script>';
                                            echo '<meta http-equiv="refresh" content="1;url=https://nkvillaresto.com/index.php/front/kirim" />';
                                            
                                            }
                                            
                                            
                                            
                                               ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p></p>
                                </div>
                                <div class="col-md-3">
                                    <p></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <div style="margin-top:-5%" class="file-upload">
                                    
                                        <input type="file" name="bukti_pembayaran" class="form-control" required>
                                        <input type="hidden" name="status" value="Belum terverifikasi" class="form-control">
                                     
                                      <?php     echo " <input style='margin-top:2%'' type='submit' value='Upload Bukti' class='btn btn-primary py-2'>";
              echo "<form>"; ?>

                                    </div>

                                    </div>
                                </div>
                               
                               
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
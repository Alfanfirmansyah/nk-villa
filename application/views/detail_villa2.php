

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<div class="hero-wrap" style="background-image: url('<?php echo base_url();?>assets/frontend/images/bg_3.jpg');
							  height:140px">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="hotel.html">Hotel</a></span> <span>Hotel Single</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Detail Villa</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-slider owl-carousel">
					<?php foreach ($gambarvilla as $gambar) { ?>
                    <div class="item">
                        <div class="hotel-img" style="background-image: url('<?php echo base_url('assets/img/type_villa/'.$gambar->gambar);?>"></div>
                    </div>
					<?php } ?>
                </div>
            </div>
            <div class="col-md-7 hotel-single mt-4 mb-5 ftco-animate">
                <span>Our Best Villa &amp; Rooms</span>
                <h2><?php echo $nama_villa?></h2>
						Fasilitas : <br>
						<?php echo $kamar?> <i class="fa fa-bed"></i> Kamar Tidur <br> 
						<?php echo $toilet?> <img style="height:15px"src="<?php echo base_url();?>/assets/img/shower.png"> Toilet dalam<br>
						<?php echo $garasi?> <i class="flaticon-fork"></i>  Sarapan Pagi<br><br>
						<div class="row">
															<div class="col-md-6">
															<h3 style="font-size:19px">Special price weekend </h3>
															<span class="price per-price" style="margin-left:30px; font-size:20px; font-family:segoe ui; color:grey">Rp.<strike><?php echo number_format($harga_frontend_wk,0) ?></strike><small style="margin-right:-5px; font-size:8px">/malam</small> &nbsp <small style="margin-right:-5px; font-size:20px; background-color:red; color:white;">Disc <?php echo $diskon?>%</small></span>
															<br>
															  <span class="loc"><i class="icon-money"></i> Only : <span style="font-weight: bold; font-size:25px;" class="price per-price"><?php echo 'Rp. '.number_format($harga_weekend,0)?><small style="margin-right:-5px; font-size:12px"> /malam</small></span>
				 </span>
				</div>
													
													<div class="col-md-6">	
															<h3 style="font-size:19px">Special price weekday </h3>
															<span class="price per-price" style="margin-left:30px; font-size:20px; font-family:segoe ui; color:grey">Rp.<strike><?php echo number_format($harga_frontend_wd,0) ?></strike><small style="margin-right:-5px; font-size:8px">/malam</small> &nbsp <small style="margin-right:-5px; font-size:20px; background-color:red; color:white;">Disc <?php echo $diskon?>%</small></span>
													
						<br>
				
               
				
				 <span class="loc"><i class="icon-money"></i> Only : <span style="font-weight: bold; font-size:25px;" class="price per-price"><?php echo 'Rp. '.number_format($harga_weekday,0)?><small style="margin-right:-5px; font-size:12px"> /malam</small></span>
				</div>
			</div>
                <hr>
                <h5 style="font-size:15px">Deskripsi : </h5>
                <p><?php echo $deskripsi_detail?></p>
            </div>
            <hr>
            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                <h4 class="mb-5">Check Availability &amp; Booking</h4>
				
		<section class="ftco-section" style="margin-top:-130px">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-md-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">Step 2</a>
		             <a class="nav-link" href="<?php echo site_url();?>/front/detail_villa/<?php echo $id_villa;?>">Kembali ke step sebelumnya</a>

		            
		            </div>
		          </div>
		          <div class="col-md-12">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
		              			
<?php

$weekend =$harga_weekend;
$weekday =$harga_weekday;
$a = $awal;
$b = $akhir;

$begin = new DateTime($a);
$end = new DateTime($b);

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);

$total = 0;
$total2 = 0;
foreach ($period as $dt) {
    
	$dt->format("l-d-m-Y");


    if ($dt->format("l") == 'Friday' or $dt->format("l") == 'Sunday' or $dt->format("l") == 'Saturday') { 
    	
    	 $total+= $weekend;
    }else {
    	
    	$total+= $weekday;
    }

  
}



?>

<form id="boking" method="post" action="<?= site_url('front/transaksi') ?>">

						<div class="fields">
                        <div class="row">
						<div class="col-md-6">
							<h4><i class="fa fa-calendar"></i> Checkin</h4>
                            <div class="form-group">
                                <input name="cek_awal" type='text'class="form-control" value="<?php echo $awal?>" readonly required>
                            </div>
                        </div>
                      <div class="col-md-6">
                      		<h4><i class="fa fa-calendar"></i> Checkout</h4>
                            <div class="form-group">
                                <input name="cek_akhir" type='text'class="form-control" value="<?php echo $akhir?>" readonly required>
                            </div>
                        </div>
                        </div>
					
				
				
                <div class="fields">
                    <div class="row">
                        <div class="col-md-6">
						 
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" min="0" class="form-control" placeholder="No Handphone" name="no_hp" required autocomplete="off">
                            </div>
                        </div>
                 
						 <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat" autocomplete="off">
                            </div>
                        </div>
                  
						
					
                        <div class="col-md-6">
                            <div class="form-group">
                               <h4>Total Pembayaran </h4><input type="text" class="form-control" placeholder="Total Harga" id="total" value="<?php echo $total?>" name="total" readonly required>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $id_villa?>" name="id_villa">
						
						
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" form="boking" onClick="return confirm('Apakah data anda sudah benar dan melanjutkan proses sewa ?')" value="Booking Villa" class="btn btn-primary py-2">
                            </div>
                        </div>
                    </div>
                </div>
				</form>
		              </div>

		        

		         
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
	</div>
	<hr>
            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
                <h4 class="mb-4">Related Villa</h4>
               	<div class="row">
                                        <?php foreach($villa as $r){ ?>
										<div class="col-md-4">
				    				<div class="destination">
				    					<a href="<?php echo site_url('front/detail_villa/'.$r->id_villa); ?>" class="img img-2" style="background-image: url(<?php echo base_url();?>assets/img/type_villa/<?php echo $r->gambar;?>);">
										<div class="icon d-flex justify-content-center align-items-center" style="background-color:red">
											<span class="" style="color:white; font-family:Comic sans ms; text-align:center; font-weight:bold;">Disc <?php echo $r->diskon;?>%</span>
										</div>
										</a>
				    					<div class="text p-3">
				    						<div class="d-flex">
				    							<div class="one">
													<h3 style="font-size:18px"><a href="<?php echo site_url('front/detail_villa/'.$r->id_villa); ?>"><i class="fa fa-home"></i> Villa <?php echo $r->nama_villa;?></a></h3>
						    						
													
						    						<p class="rate">
														<br>
						    							<i class="icon-star"></i>
						    							<i class="icon-star"></i>
						    							<i class="icon-star"></i>
						    							<span> Rating</span>
						    						</p>
					    						</div>
												<div class="two">
													<span class="price per-price" style="margin-left:-100px; font-size:23px; border:2px solid; padding:2px; border-radius:5px">Special Offer</span>
													<span></span>
												</div>			
				    						</div>
				    						<p><i class="fa fa-quote-left"></i> Villa nyaman , harga murah , dan asri</p>
										
												<i class="fa fa-map-marker"></i> : <a href="<?php echo $r->url;?>" target="_blank" style="text_decoration:none; color:grey;"> <?php echo $r->location;?></a>
				    						<hr>
											<p class="bottom-area d-flex">		
											<span><a href="<?php echo site_url('front/detail_villa/'.$r->id_villa); ?>"><button class="btn btn-sm aqua-gradient"><i class="fa fa-search"></i> Lihat Detail</button></a></span> 
											<span class="ml-auto">
													<?php echo $r->kamar?> <i class="fa fa-bed"></i> &nbsp  
													<?php echo $r->toilet?> <img style="height:15px"src="<?php echo base_url();?>/assets/img/shower.png"> &nbsp
													
													<?php echo $r->garasi?> <i class="flaticon-fork"></i> Food</span>
													
											</p>
											
				    						
				    					</div>
				    				</div>
									</div>
									
										
										<?php }?>    
	
											</div>
            </div>
        
			</div>
        <!-- .col-md-8 -->
    </div>
    </div>
</section>
<!-- .section -->


<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="<?php echo base_url();?>assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function(){
    $("#example1").dataTable();
  })
  </script>


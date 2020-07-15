<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url();?>assets/img/bg.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
         
		  <div class="col-md-8 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Villa<br></strong> Nendes Kombet</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1 }" style="font-family:Comic sans ms;"><?php echo $title->title;?></p>
			
            <p class="browse d-md-flex">
            	<span class="d-flex justify-content-md-center align-items-md-center"><a href="javascript:void();"><i class="flaticon-fork"></i>Restaurant</a></span>
            	<span class="d-flex justify-content-md-center align-items-md-center"><a href="javascript:void();"><i class="flaticon-hotel"></i>Guesthouse & Homestay</a></span>          
            </p>
          </div>
		  <div class="col-md-4"><img style="width:80%"src="<?php base_url();?>assets/img/<?php echo $title->img;?>"></div> 
        </div>
      </div>
    </div>

   <!-- section Kategori -->
     <section class="ftco-section ftco-destination">
    	<div class="container">
    	<div class="row justify-content-start">
          <div class="col-md-12 heading-section ftco-animate">
            <h2 class="mb-2"><strong>Kategori</strong> Villa</h2>
          </div>
        </div>
		<div class="col-md-12 ftco-animate p-md-1">
		    	<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-3">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-19 tab" data-toggle="pill" href="#v-pills-19" role="tab" aria-controls="v-pills-19" aria-selected="true"><i class="flaticon-hotel"></i> NK Villa</a>
						<a class="nav-link" id="v-pills-20 tab" data-toggle="pill" href="#v-pills-20" role="tab" aria-controls="v-pills-20" aria-selected="false"><i class="flaticon-hotel"></i> NK Villa OS</a>
						<a class="nav-link" id="v-pills-21 tab" data-toggle="pill" href="#v-pills-21" role="tab" aria-controls="v-pills-21" aria-selected="false"><i class="flaticon-hotel"></i> NK Villa OK</a>
						<a class="nav-link" id="v-pills-22 tab" data-toggle="pill" href="#v-pills-22" role="tab" aria-controls="v-pills-22" aria-selected="false"><i class="flaticon-hotel"></i> NK Villa GPM</a>
					</div>
		           </div>
		           </div>
				  
				   <div class="col-md-12">
		           <div class="tab-content ftco-animate" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-19" role="tabpanel" aria-labelledby="v-pills-19-tab">
							<div class="row">
									<!-- START POS 1 -->
									<?php if($jml1->jumlah > 0){ ?>
									<?php foreach ($pos1 as $r) { ?>
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
													<span class="price per-price" style="margin-left:-100px; font-size:130%; border:2px solid; padding:2px; border-radius:5px">Special Offer</span>
													<span></span>
												</div>			
				    						</div>
				    						<p><i class="fa fa-quote-left"></i> Kolam air panas di rooftop dengan pemandangan sungai, sawah dan gunung</p>
										
												<i class="fa fa-map-marker"></i> : <a href="<?php echo $r->url;?>" target="_blank" style="text_decoration:none; color:grey;"> <?php echo $r->location;?></a>
				    						<hr>
											<p class="bottom-area d-flex">		
											<span><a href="<?php echo site_url('front/detail_villa/'.$r->id_villa); ?>"><button class="btn btn-sm aqua-gradient"><i class="fa fa-search"></i> Lihat Detail</button></a></span> 
											<span class="ml-auto">
													<?php echo $r->kamar?> <i class="fa fa-bed"></i> &nbsp  
													<?php echo $r->toilet?> <img style="height:15px"src="<?php echo base_url();?>/assets/img/shower.png"> &nbsp
													
													<?php echo $r->garasi?> <i class="flaticon-fork"></i> Breakfast</span>
													
											</p>
											
				    						
				    					</div>
				    				</div>
									</div>
									<?php } ?>
								
								<?php } else { ?>
									<div class="col-md-4">
				    				<div class="destination">
				    					<a href="javascript:void(0)" class="img img-2" style="background-image: url(<?php echo base_url();?>assets/img/comingsoon.jpg);">
										</a>
				    				</div>
									</div>		
								
								<?php } ?>
									<!-- END POS 1 -->
								
							
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-20" role="tabpanel" aria-labelledby="v-pills-20-tab">
							<div class="row">
										<!-- START POS 2 -->
									<?php if($jml2->jumlah > 0){ ?>
									<?php foreach ($pos2 as $r) { ?>
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
													<span class="price per-price" style="margin-left:-100px; font-size:130%; border:2px solid; padding:2px; border-radius:5px">Special Offer</span>
													<span></span>
												</div>			
				    						</div>
				    						<p><i class="fa fa-quote-left"></i> Villa nyaman , harga murah , dan asri dengan kolam renang air panas</p>
										
												<i class="fa fa-map-marker"></i> : <a href="<?php echo $r->url;?>" target="_blank" style="text_decoration:none; color:grey;"> <?php echo $r->location;?></a>
				    						<hr>
											<p class="bottom-area d-flex">		
											<span><a href="<?php echo site_url('front/detail_villa/'.$r->id_villa); ?>"><button class="btn btn-sm aqua-gradient"><i class="fa fa-search"></i> Lihat Detail</button></a></span> 
											<span class="ml-auto">
													<?php echo $r->kamar?> <i class="fa fa-bed"></i> &nbsp  
													<?php echo $r->toilet?> <img style="height:15px"src="<?php echo base_url();?>/assets/img/shower.png"> &nbsp
													
													<?php echo $r->garasi?> <i class="flaticon-fork"></i> Breakfast</span>
													
											</p>
											
				    						
				    					</div>
				    				</div>
									</div>
									<?php } ?>
								
								<?php } else { ?>
									<div class="col-md-4">
				    				<div class="destination">
				    					<a href="javascript:void(0)" class="img img-2" style="background-image: url(<?php echo base_url();?>assets/img/comingsoon.jpg);">
										</a>
				    				</div>
									</div>		
								
								<?php } ?>
									<!-- END POS 2 -->
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-21" role="tabpanel" aria-labelledby="v-pills-21-tab">
							<div class="row">
										<!-- START POS 3 -->
									<?php if($jml3->jumlah > 0){ ?>
									<?php foreach ($pos3 as $r) { ?>
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
													<span class="price per-price" style="margin-left:-100px; font-size:130%; border:2px solid; padding:2px; border-radius:5px">Special Offer</span>
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
													
													<?php echo $r->garasi?> <i class="flaticon-fork"></i> Breakfast</span>
													
											</p>
											
				    						
				    					</div>
				    				</div>
									</div>
									<?php } ?>
								
								<?php } else { ?>
									<div class="col-md-4">
				    				<div class="destination">
				    					<a href="javascript:void(0)" class="img img-2" style="background-image: url(<?php echo base_url();?>assets/img/comingsoon.jpg);">
										</a>
				    				</div>
									</div>		
								
								<?php } ?>
									<!-- END POS 3 -->
							</div>
						</div>	
						<div class="tab-pane fade" id="v-pills-22" role="tabpanel" aria-labelledby="v-pills-22-tab">
							<div class="row">
										<!-- START POS 4 -->
									<?php if($jml4->jumlah > 0){ ?>
									<?php foreach ($pos4 as $r) { ?>
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
													<span class="price per-price" style="margin-left:-100px; font-size:130%; border:2px solid; padding:2px; border-radius:5px">Special Offer</span>
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
													
													<?php echo $r->garasi?> <i class="flaticon-fork"></i> Breakfast</span>
													
											</p>
											
				    						
				    					</div>
				    				</div>
									</div>
									<?php } ?>
								
								<?php } else { ?>
									<div class="col-md-4">
				    				<div class="destination">
				    					<a href="javascript:void(0)" class="img img-2" style="background-image: url(<?php echo base_url();?>assets/img/comingsoon.jpg);">
										</a>
				    				</div>
									</div>		
								
								<?php } ?>
									<!-- END POS 4 -->
							</div>
						</div>
					</div>
		         </div>
		  </div>
	      
	</div>
    </section>
   
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(<?php echo base_url();?>assets/frontend/images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
							<h2 class="mb-4 pb-3"><strong>Mengapa</strong> NK Villa ?</h2>
							<span class="subheading">Kami emberikan pilihan bagi yang mencari villa singgah sesuai dengan karakter Malang sebagai kota wisata.
</span>
          </div>
        </div>
  
						<div class="container">
							<div class="row d-flex">
							
								<div class="col-md-3 d-flex align-self-stretch ftco-animate">
									<div class="media block-6 services d-block text-center" style="box-shadow: 0 20px 40px -14px rgba(0,0,0,0.25);">
										<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
										<div class="media-body p-2 mt-2">
											<h3 class="heading mb-3">Best Price Guarantee</h3>
											<p>NK Vila merupakan penyewaan villa dengan harga murah dan berkualitas.</p>
										</div>
									</div>      
								</div>
								<div class="col-md-3 d-flex align-self-stretch ftco-animate">
									<div class="media block-6 services d-block text-center" style="box-shadow: 0 20px 40px -14px rgba(0,0,0,0.25);">
										<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
										<div class="media-body p-2 mt-2">
											<h3 class="heading mb-3">New Concept Living</h3>
											<p>Hunian dengan konsep baru yang memberikan kenyamanan..</p>
										</div>
									</div>    
								</div>
								<div class="col-md-3 d-flex align-self-stretch ftco-animate">
									<div class="media block-6 services d-block text-center" style="box-shadow: 0 20px 40px -14px rgba(0,0,0,0.25);">
										<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
										<div class="media-body p-2 mt-2">
											<h3 class="heading mb-3">Easy To Find</h3>
											<p>NK Villa berada pada tempat yang mudah dijangkau yaitu di tengah kota malang.</p>
										</div>
									</div>      
								</div>
								<div class="col-md-3 d-flex align-self-stretch ftco-animate">
									<div class="media block-6 services d-block text-center" style="box-shadow: 0 20px 40px -14px rgba(0,0,0,0.25);">
										<div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
										<div class="media-body p-2 mt-2" >
											<h3 class="heading mb-3">Our Dedicated Support</h3>
											<p>Kami memberikan pelayanan informasi yang baik dan cepat.</p>
										</div>
									</div>      
								</div>
							</div>
						</div>
					
    	</div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-5 heading-section ftco-animate">
          	<span class="subheading">Sekilas tentang villa</span>
            <h2 class="mb-4 pb-3"><strong>Tentang</strong> Villa</h2>
        	<p>PT. Garda Bhakti Karya adalah salah satu pengembang perumahan di Indonesia dengan proyek pengembangan perumahan di Malang Raya.Perusahaan PT. Garda Bhakti Karya dibangun dengan tujuan dari yang sangat mulia untuk dapat menjadi wahana saling tolong menolong. Garda diartikan kelompok yang cinta akan kemajuan dan kebersamaan, bhakti diartikan kegiatan untuk mengabdikan diri sedangkan karya sendiri diartikan suatu proses membangun.</p>
            <p><a href="<?php echo site_url('front/tentang')?>" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
          </div>
					<div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4 pb-3"><strong>Testimoni</strong> Penyewa Villa</h2>
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel">
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url('<?php echo base_url();?>assets/frontend/images/default-avatar.png')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Tempatnya strategis mudah dijangkau, fasilitas baik.</p>
		                    <p class="name">Beny Ramadika</p>
		                    <span class="position">Guest from Sidoarjo</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url('<?php echo base_url();?>assets/frontend/images/default-avatar.png')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Pelayanan cepat dan harganya sewa cukup murah.</p>
		                    <p class="name">Dennis Green</p>
		                    <span class="position">Guest from Surabaya</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url('<?php echo base_url();?>assets/frontend/images/default-avatar.png')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Huniannya nyaman dan fasilitas baik.</p>
		                    <p class="name">Alfan Firmansyah</p>
		                    <span class="position">Guest from Malang</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section> 
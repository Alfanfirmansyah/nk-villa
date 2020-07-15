<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url();?>assets/frontend/images/banner.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url('front/')?>">Home</a></span> <span>villa</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Available villa</h1>
          </div>
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
				    						<p><i class="fa fa-quote-left"></i> Villa nyaman , harga murah , dan asri</p>
										
												<i class="fa fa-map-marker"></i> : <a href="<?php echo $r->url;?>" target="_blank" style="text_decoration:none; color:grey;"> <?php echo $r->location;?></a>
				    						<hr>
											<p class="bottom-area d-flex">		
											<span><a href="<?php echo site_url('front/detail_villa/'.$r->id_villa); ?>"><button class="btn btn-sm aqua-gradient"><i class="fa fa-search"></i> Lihat Detail</button></a></span> 
											<span class="ml-auto">
													<?php echo $r->kamar?> <i class="fa fa-bed"></i> &nbsp  
													<?php echo $r->toilet?> <img style="height:15px"src="<?php echo base_url();?>/assets/img/shower.png"> &nbsp
													
													<	<?php echo $r->garasi?> <i class="flaticon-fork"></i> Breakfast</span>
													
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
   
    
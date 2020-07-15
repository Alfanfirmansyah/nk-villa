
	 <section class="content">
		<div class="row">
		<a href="<?php echo site_url().'/manage_villa'; ?>" class="btn default btn-xs blue"><button type="submit" class="btn btn-info">Kembali ke manage villa</button></a>
    
         <div class="col-md-12">
		<div class="box-body table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
				  <th> Nama Villa</td>
                  <th> Type Villa</td>
				  <th> Deskripsi</td>
				  <th> Diskon</td>
				 <th>Harga Sewa Weekend</td>
				  <th>Harga Diskon Sewa Weekend</td>
           <th>Harga Sewa Weekday</td>
          <th>Harga Diskon Sewa Weekday</td>
			
		
                </tr>
                </thead>
                <tbody>
					<tr>
						<td><?php echo $list->nama_villa;?></td>
						<td><?php echo $list->nama_type;?></td>				
						<td><?php echo $list->deskripsi_detail;?></td>
						<td><?php echo $list->diskon;?> %</td>
						   <td>Rp. <?php echo number_format($list->harga_frontend_wk,0);?></td>
						<td>Rp. <?php echo number_format($list->harga_weekend,0);?></td>
            <td>Rp. <?php echo number_format($list->harga_frontend_wd,0);?></td>
            <td>Rp. <?php echo number_format($list->harga_weekday,0);?></td>
						
						
					</tr>

               
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
			
			
			 <div class="col-md-6">
					<h4><i class="fa fa-image"></i> Gallery</h4>
					
				<div class="box box-solid">
            <!-- /.box-header -->
			  <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
				 <?php $no = 0; ?>
				 <?php foreach($list_gambar as $row) { ?>
					  <li data-target="#carousel-example-generic" data-slide-to="$no++" class=""></li>
				 <?php }?>
                </ol>
                <div class="carousel-inner">
				  <?php foreach($list_gambar as $row) { ?>
				  <?php if ($no++ == 0 ) { ?>
					<div class="item active">
					<img style="height:300px; width:100%"  src="<?php echo base_url('assets/img/type_villa/'.$row->gambar);?>">
                    <div class="carousel-caption">
                      lorem ipsum <br>
                    </div>
						
                  </div>
				  <?php } else { ?> 
					<div class="item">
                    <img style="height:300px; width:100%" src="<?php echo base_url('assets/img/type_villa/'.$row->gambar);?>">
                    <div class="carousel-caption">
						lorem ipsum<br>
                    </div>
					
					</div>
				  <?php }?>
				  <?php } ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
			  	<div style="text-align:right;">
					<br>
					 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
						<i class="fa fa-upload"></i> &nbsp Upload Image
					</button>
					<div class="btn-group">
						  <button type="button" disabled class="btn btn-primary btn-flat"><i class="fa fa-cogs"></i> Action</button>
						  <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
							<?php $angka=1 ?>
						  <?php foreach($list_gambar as $row) { ?>
							<li><a href="<?php echo site_url('manage_villa/delete_gambar/'.$row->id_img); ?>
								"onClick="return confirm('Apakah anda ingin menghapus item ini ?')"><i class="fa fa-image"></i> Hapus gambar ke - <?php echo $angka++?></a></li>
						  <?php } ?>
						  </ul>
					</div>
				</div>


            </div>
            <!-- /.box-body -->
          </div>

		  
		  
			  </div>
			   <div class="col-md-6">
					<h4><i class="fa fa-gear"></i> Setting</h4>
					
				<div class="box box-solid">
            <!-- /.box-header -->
			  <div class="box-body">
             
			  			  <div class="col-md-6">
            <form action="<?php echo site_url();?>/manage_villa/open" method="post">
            	<input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
              <input type="hidden" name="status" value="open">
         <button type="submit" onClick="return confirm('Apakah ingin membuka villa')"  class="btn btn-block btn-info ">Buka Villa</button>
         </form>
       </div>
           <div class="col-md-6">
          <form action="<?php echo site_url();?>/manage_villa/closevilla" method="post">
          	<input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
              <input type="hidden" name="status" value="close">
         <button type="submit" onClick="return confirm('Apakah ingin menutup villa (dipakai owner)')"  class="btn btn-block btn-info ">Tutup Villa</button>
         </form>
       </div>

            </div>
            <!-- /.box-body -->
          </div>

		  
		  
			  </div>
			

			  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-upload"></i> Form Upload Image Villa  <?php echo $list->nama_villa; ?> </h4>
              </div>
			  <div class="modal-body">
			  <form action="<?php echo site_url().'/manage_villa/upload_gambar'?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			  <div class="box-body">
			   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                <input type="text" class="form-control" name="nama_wisata" placeholder="Nama Villa" required readonly autocomplete="off" value="<?php echo $list->nama_villa;?>">
              </div><br>
		
                <input type="hidden" class="form-control" name="id_villa" placeholder="Id_villa" required readonly autocomplete="off" value="<?php echo $list->id_villa;?>">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                <input type="file" class="form-control" name="gambar" required autocomplete="off">
              </div>
              <!-- /input-group -->
			  </div>
            <!-- /.box-body -->
				
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Upload</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        </div>
			  
			  
			  
			</section>
			
            
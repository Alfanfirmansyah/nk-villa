 <section class="content-header">
      <h1>
       <i class="fa fa-cogs"></i> Data Transaksi <?php echo $list->nama_penyewa; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="<?php echo site_url().'/manage_transaksi'?>">Transaksi</a></li>
     
      </ol>
    </section>
	 <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Transaksi</h3>
			  
		
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
			<?php echo form_open('manage_transaksi/verifikasi/'.$list->kode_transaksi,array('class'=>'form-horizontal')); ?>		<br>
			<div class="box-body">
			  <div class="col-md-6">

			  	<table>
			  		<tr>
			  			<td align="right">
			  			&nbsp&nbsp&nbsp&nbsp&nbsp	Kode Transaksi : &nbsp&nbsp&nbsp
			  			</td>
			  			<td >
			  				<?php echo $list->kode_transaksi;?>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td align="right">
			  				Nama Penyewa : &nbsp&nbsp&nbsp
			  			</td>
			  			<td>
			  				<?php echo $list->nama_penyewa;?>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td align="right">
			  				No Telp : &nbsp&nbsp&nbsp
			  			</td>
			  			<td>
			  				<?php echo $list->no_telp;?>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td align="right">
			  				email : &nbsp&nbsp&nbsp
			  			</td>
			  			<td>
			  				<?php echo $list->email;?>
			  			</td>
			  		</tr>
			  		<tr>
			  			<td align="right">
			  				Bukti Pembayaran : &nbsp&nbsp&nbsp
			  			</td>
			  			<td>
			  				<a href="<?php echo base_url();?>assets/frontend/bukti/<?php echo $list->bukti_pembayaran;?>"><?php echo $list->bukti_pembayaran;?>
			  			</td>
			  		</tr>
					<tr>
			  			<td align="right">
			  				Pembayaran : &nbsp&nbsp&nbsp
			  			</td>
			  			<td>
							 <input type="number" name="pembayaran" placeholder="Rp."  class="form-control">
			  			</td>
			  		</tr>
			  	</table>
			<br>
			<br>
			  
			  	<table class="table table-hover table-responsive table-striped table-bordered">
			  		
			  		<thead>
			  			<tr>
			  				<td>Nama Villa</td>
			  				<td>Check In Villa</td>
			  				<td>Check Out Villa</td>
			  				<td>Total Harga</td>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<tr>
			  				<td><?php echo $list->nama_villa;?></td>
			  					<td><?php echo $list->tgl_start;?></td>
			  						<td><?php echo $list->tgl_end;?></td>
			  								<td><?php echo 'Rp. '.number_format($list->total_harga,0);?></td>
			  			</tr>
			  		</tbody>
			  	</table>
			  

				<input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
				<input type="hidden" name="jumlah_kamar" value="<?php echo $list->jumlah_kamar;?>">
				<input type="hidden" name="status" value="Booking">
				<input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
			
			  </div>
				<div class="form-actions fluid">
							<div class=" col-md-9">
								<br>
								<?php echo form_submit('submit', 'Verifikasi', " class = ' btn btn-success'"); ?> &nbsp &nbsp  &nbsp
								<a href="javascript:window.history.go(-1);" class="btn btn-default ">Kembali</a>
							
							</div>
				</div> 
			
			 
              <!-- /input-group -->
			  </div><?php echo form_close(); ?>
        <!-- /.box-body -->
        <div class="box-footer">
			
        </div>
      </div>
    </section>
          
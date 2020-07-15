<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
			<form id="boking" method="post" action="<?php echo site_url();?>/manage_transaksi/tambahsewa2/<?php echo $list->kode_transaksi;?>">
					<br>
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
			  				Tambah Check-out villa : &nbsp&nbsp&nbsp
			  			</td>
			  			<td>
							 <input type="date" id="tambah" min="<?php echo $list->tgl_end;?>" name="tambah" class="form-control">
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
							<td>Harga Tambah Sewa</td>
							<td>Total Pembayaran</td>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<tr>
			  				<td><?php echo $list->nama_villa;?></td>
			  					<td><?php echo $list->tgl_start;?></td>
			  						<td><input id="end" readonly style="border:none" value="<?php echo $list->tgl_end;?>"></td>
			  								<td><?php echo 'Rp. '.number_format($list->total_harga,0);?></td>
											<td align="center"><input id="tambahsewa" name="tambahsewa" readonly style="border:none" type="text"></td>
											<td align="center"><input id="total" name="total" readonly style="border:none" type="text"></td>
			  			</tr>
			  		</tbody>
			  	</table>
			  
				
				<input type="hidden" id="sewa" value="<?php echo $list->total_harga;?>">
				<input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
				<input type="hidden" name="status" value="Booking">
				<input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
			
			  </div>
				<div class="form-actions fluid">
							<div class=" col-md-9">
								<br>
								<input type="submit" form="boking" onClick="return confirm('Apakah data anda sudah benar dan melanjutkan proses tambah sewa ?')" value="Cek Harga Tambah Sewa" class="btn btn-primary py-2">
								<a href="javascript:window.history.go(-1);" class="btn btn-default ">Kembali</a>
							
							</div>
				</div> 
              <!-- /input-group -->
			  </div></form>
        <!-- /.box-body -->
        <div class="box-footer">
			
        </div>
      </div>
    </section>
	 <script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("tambah").value);
                var pickdt = new Date(document.getElementById("end").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

    
        function cal(){
        if(document.getElementById("tambah")){
				document.getElementById("tambahsewa").value=GetDays()*<?php echo $list->harga_semua?>;
				var x = parseInt(document.getElementById("tambahsewa").value);
				var y = parseInt(document.getElementById("sewa").value);
				var total = x+y;
				document.getElementById("total").value = total;
          
            
        }
    }

    </script> 
          
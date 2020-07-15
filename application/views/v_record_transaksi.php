 <style>
 td {
	border-bottom: 1px solid #2d3436;
 }
 </style>
 
 <section class="content-header">
      <h1>
       <i class="fa fa-inbox"></i> Data Transaksi Selesai
       
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
          <h3 class="box-title">Data Transaksi</h3>
	
			   
		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-tasks"></i> Form Add Data Villa</h4>
              </div>
			  
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        
         <div class="box-body table-responsive">
               <table id="example1" class="table table-hover table-striped" >
                <thead>
                <tr>
                  <th></i> No</td>
                  <th></i> Kode Transaksi</td>
                  <th></i> Nama</td>
				  <th></i> Villa</td>
                  <th></i> Type Villa</td>
                  <th></i> Tanggal Start</td>
                  <th></i> Tanggal End</td>  
                  <th></i> Total Harga</td>
                  <th></i> Status</td>
                  <th></i> Bukti Pembayaran</td>
                  <th></i> Pembayaran</td>
                  <th></i> Aksi</td>
                </tr>
                </thead>
                <tbody>
					<?php $no = 1;?>
					<?php foreach($data_transaksi as $list){?>
					<tr>
						<td><?php echo $no++;?></td>
            <td><?php echo $list->kode_transaksi;?></td>
            <td><?php echo $list->nama_penyewa;?></td>
            <td><?php echo $list->nama_villa;?></td>
            <td><?php echo $list->nama_type;?></td>
            <td><?php echo $list->tgl_start;?></td>
            <td><?php echo $list->tgl_end;?></td>
            <td><?php echo 'Rp.'.number_format($list->total_harga,0);?></td>
            <td><?php echo $list->status;?></td>
			 
            <td><a href="<?php echo base_url();?>assets/frontend/bukti/<?php echo $list->bukti_pembayaran;?>"><?php echo $list->bukti_pembayaran;?></td>
			<td><?php echo 'Rp.'.number_format($list->pembayaran,0);?>  <br>
				
			</td>
			
			<td>
	
              <?php if($list->status == 'Selesai') {?>

              <a href="<?php echo site_url("manage_transaksi/verifikasi/".$list->kode_transaksi); ?>"
            class="btn btn-success btn-xs disabled">Verifikasi</a>
            <br>
    <br>            
<form method="post" action="<?= site_url('Manage_transaksi/selesai') ?>" class="form-horizontal">
      <input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
         <input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
         <input type="hidden" name="status" value="Selesai">




      <button type="button" class="btn btn-warning btn-xs disabled">Selesai</button>
  </form>
            <?php  } else if ($list->status == 'Belum terverifikasi') { ?> 
              
				<?php if($list->total_harga == $list->pembayaran){ ?> 
							<span class="label label-success">Lunas</span><?php  } else { ?> 
							
			<form method="post" action="<?= site_url('manage_transaksi/pelunasan') ?>" class="form-horizontal">
					<input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
					<input type="hidden" name="pembayaran" value="<?php echo $list->total_harga;?>"">
						<button type="button" class="btn btn-danger btn-xs disabled">Belum lunas</button>
			</form>
					<?php } ?> 
					<br>
					
              

         
                <a href="<?php echo site_url("manage_transaksi/verifikasi/".$list->kode_transaksi); ?>"
            class="btn btn-success btn-xs">Verifikasi</a>
                       <br>
    <br>            
<form method="post" action="<?= site_url('manage_transaksi/selesai') ?>" class="form-horizontal">
      <input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
         <input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
         <input type="hidden" name="status" value="Selesai">




      <button type="button" class="btn btn-warning btn-xs disabled">Selesai</button>
  </form>

  <?php  } else if ($list->status == 'Booking') { ?> 
	
		 <?php if ($list->total_harga == $list->pembayaran) { ?>
		 <span class="label label-success">Lunas</span>
		 <br>
		 <br>
		  <a href="<?php echo site_url("manage_transaksi/verifikasi/".$list->kode_transaksi); ?>"
            class="btn btn-success btn-xs disabled">Verifikasi</a>
			<br>
			<br>
			<form method="post" action="<?= site_url('manage_transaksi/selesai') ?>" class="form-horizontal">
      <input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
         <input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
         <input type="hidden" name="status" value="Selesai">




      <button type="submit" class="btn btn-warning btn-xs">Selesai</button>
  </form>
			
		 
		 
		 <?php } else { ?>
		 
		<form method="post" action="<?= site_url('manage_transaksi/pelunasan') ?>" class="form-horizontal">
					<input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
					<input type="hidden" name="pembayaran" value="<?php echo $list->total_harga;?>"">
						<button type="submit" class="btn btn-danger btn-xs">Belum lunas</button>
			</form>
	
		 <br>
		 
		  <a href="<?php echo site_url("manage_transaksi/verifikasi/".$list->kode_transaksi); ?>"
            class="btn btn-success btn-xs disabled">Verifikasi</a>
			
			<br>
			<br>
			<form method="post" action="<?= site_url('manage_transaksi/selesai') ?>" class="form-horizontal">
      <input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
         <input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
         <input type="hidden" name="status" value="Selesai">




      <button type="button" class="btn btn-warning btn-xs disabled">Selesai</button>
  </form>
		 
		 <?php } ?>
  

  <?php }else { ?> 

            <a href="<?php echo site_url("manage_transaksi/verifikasi/".$list->kode_transaksi); ?>"
            class="btn btn-success btn-xs disabled">Verifikasi</a>
                       <br>
    <br>            
<form method="post" action="<?= site_url('manage_transaksi/selesai') ?>" class="form-horizontal">
      <input type="hidden" name="kode_transaksi" value="<?php echo $list->kode_transaksi;?>">
         <input type="hidden" name="id_villa" value="<?php echo $list->id_villa;?>">
         <input type="hidden" name="status" value="Selesai">




      <button type="button" class="btn btn-warning btn-xs disabled">Selesai</button>
  </form>

            <?php } ?> 

            


            




                </td>
						
					</tr>
					<?php } ?>
                </tbody>
               
              </table>
			  
          
            <!-- /.box-body -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
			
        </div>
      </div>
    </section>


          
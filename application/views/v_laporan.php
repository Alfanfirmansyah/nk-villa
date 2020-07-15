 <section class="content-header">
      <h1>
       <i class="fa fa-table"></i> Laporan
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active"></li>
      </ol>
    </section>
	 <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rekapitulasi Laporan</h3> 
			  
			    <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-trash"></i> Clear Data
              </button>
			   
			   
		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-tasks"></i> Data Clear</h4>
              </div>
			  <div class="modal-body">
			  <form action="laporan/cleardata" class="form-horizontal" method="post" enctype="multipart/form-data">
			  <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required autocomplete="off">
              </div>
             
              <!-- /input-group -->
			  </div>
            <!-- /.box-body -->
				
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
			   
			  
			   
        <div class="box-tools pull-right">
            
          </div>
        </div>
        
		<div class="box-body table-responsive">
		<form target="__blank" action="<?php echo site_url();?>/laporan/cetak" class="form-horizontal" method="post">		
			  <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                 <select class="form-control" required name="tgl">
                    <option value="">- Select Tanggal - </option>
					<?php foreach($data_transaksi as $list) { ?>
						<option value="<?php echo $list->tanggal;?>">
					<?php	
							$tglc = substr($list->tanggal,5,2);
							if ($tglc == '01') {
								 $tglc = ' JANUARI';
							 } else if ($tglc == '02') {
								 $tglc = ' FEBRUARI';
							 } else if ($tglc == '03'){
								 $tglc = ' MARET';
							 } else if ($tglc == '04'){
								 $tglc = ' APRIL';
							 } else if ($tglc == '05'){
								 $tglc = ' MEI';
							 } else if ($tglc == '06'){
								 $tglc = ' JUNI';
							 } else if ($tglc == '07'){
								 $tglc = ' JULI';
							 } else if ($tglc == '08'){
								 $tglc = ' AGUSTUS';
							 } else if ($tglc == '09'){
								 $tglc = ' SEPTEMBER';
							 } else if ($tglc == '10'){
								 $tglc = ' OKTOBER';
							 } else if ($tglc == '11'){
								 $tglc = ' NOVEMBER';
							 } else {
								 $tglc = ' DESEMBER';
							 } ?>
						<?php echo $tglc;?> 
							<?php echo substr($list->tanggal,0,4);?>
						</option>
					<?php }?>
                  </select>
              </div><br>
			   
              <!-- /input-group -->
			  </div>
            <!-- /.box-body -->
				
             
              <div class="modal-footer">

                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
              </div>
			  </form>
			  
			
       </div>
            
        <!-- /.box-body -->
        <div class="box-footer">
			
        </div>
      </div>
    </section>
        
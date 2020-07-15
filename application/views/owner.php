<section class="content-header">
      <h1>
       <i class="fa fa-dashboard"></i> Dashboard
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"> Record Villa</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
         <div class="row"> 
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-home"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Villa</span>
              <span class="info-box-number"><?php echo $jml_villa;?><small> villa</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		<div class="col-md-9 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-calendar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Tanggal Sekarang</span>
			  <span class="info-box-number"><?php echo $tgl_sekarang;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		
        </div>
		<hr>
		 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-home"></i> Daftar Penyewaan Villa</a></li>
			  <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-money"></i> Laporan Transaksi Keuangan</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
		<div class="box-body table-responsive">
		
			  <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                 <select name="villa" id="villa" class="form-control" required name="tgl">
                    <option value="">- Select Villa - </option>
					<?php foreach($villa as $row) { ?>
						<option value='<?php echo $row->id_villa;?>' /><?php echo $row->nama_villa;?>
					<?php } ?>
                  </select>
              </div><br>
			  
			  <div id="data_villa">
			
			  
			  </div>
			  
			  </div>
		
        </div>
					
              </div>
              <!-- /.tab-pane -->
			
              <div class="tab-pane" id="tab_2">
					<div class="box-body table-responsive">
				
		<form target="__blank" action="<?php echo site_url();?>/dashboard/cetak/<?php echo $user->id_user; ?>" class="form-horizontal" method="post">		
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
              </div>
			
              <!-- /.tab-pane -->
			  
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        
		
		
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script type="text/javascript">
        $("#villa").change(function(){
                var villa = {villa:$("#villa").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('dashboard/show_data_villa')?>",
                        data: villa,
                        success: function(msg){
                            $('#data_villa').html(msg);
                        }
                    });
        });
</script>
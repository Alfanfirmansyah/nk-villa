
 <section class="content-header">
      <h1>
       <i class="fa fa-cogs"></i> Update Data Villa <?php echo $list->nama_type; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/Dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="#">Manage Villa</a></li>
        <li class="active">Edit Villa</li>
      </ol>
    </section>
	 <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
			  
		
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
			<?php echo form_open_multipart('manage_villa/update_villa/'.$list->id_villa,array('class'=>'form-horizontal')); ?>		
			<div class="box-body">
			  <div class="col-md-6">
				<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i> Nama Villa</span>
                <input type="text" value="<?php echo $list->nama_villa;?>" class="form-control" name="nama_villa" placeholder="Nama Villa" required autocomplete="off" value="<?php echo $list->nama_type;?>">
				</div><br>
				<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"> Diskon %</i></span>
                <input type="number" id="diskon" onchange="cal()" value="<?php echo $list->diskon;?>" class="form-control" name="diskon" required>
				</div><br>
				<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"> Harga Weekday</i></span>
                <input type="number" id="harga_weekday" onchange="cal()"value="<?php echo $list->harga_frontend_wd;?>" class="form-control" name="harga_weekday" required>
				<input type="number" id="harga_frontend" readonly value="<?php echo $list->harga_weekday;?>" class="form-control" name="harga_frontend" required>
				</div><br>
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"> Harga Weekend</i></span>
                <input type="number" id="harga_weekend" onchange="cal()"value="<?php echo $list->harga_frontend_wk;?>" class="form-control" name="harga_weekend" required>
        <input type="number" id="harga_frontend2"readonly value="<?php echo $list->harga_weekend;?>" class="form-control" name="harga_frontend2" required>
        </div><br>
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"> Jumlah Kamar Tidur</i></span>
                <input type="number" value="<?php echo $list->kamar;?>" class="form-control" name="kamartidur" required>
               <span class="input-group-addon"><i class="fa fa-home"> Jumlah Kamar Mandi</i></span>
                <input type="number" value="<?php echo $list->toilet;?>" class="form-control" name="kamarmandi" required>
              
        </div><br>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"> Jumlah Sarapan Pagi</i></span>
                <input type="number" value="<?php echo $list->garasi;?>" class="form-control" name="garasi" required>
        </div><br>
				

   
        </div>
			  <div class="col-md-6">
        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"> Deskripsi Detail</i></span>
                <textarea class="textarea" name="deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 180px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $list->deskripsi_detail;?></textarea>				</div><br>

        </div>
        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"> Type villa </i></span>
                 <select class="form-control" required name="type_villa">
                 <option value="">- Select Type villa - </option>
					<?php foreach($data_type as $row) { ?>
						<option value="<?php echo $row->id_type;?>"
						<?php if ($row->id_type == $list->id_type){echo'selected="selected" ';}?>
						><?php echo $row->nama_type;?></option>
					<?php }?>
                  </select>
              </div><br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"> Pemilik villa</i></span>
                 <select class="form-control" required name="owner">
                    <option value="">- Select Pemilik villa - </option>
					<?php foreach($data_user as $row) { ?>
						<option value="<?php echo $row->id_user;?>"
							<?php if ($row->id_user == $list->id_user){echo'selected="selected" ';}?>
						 ><?php echo $row->nama;?></option>
					<?php }?>
                  </select>
              </div><br>
			
	
				<div class="form-actions fluid">
							<div class="col-md-offset-10 col-md-9">
								<br>
									<button type="reset" value="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
								<?php echo form_submit('submit', 'Update', " class = ' btn btn-primary' "); ?>
							</div>
				</div> 
			
			 
              <!-- /input-group -->
			  </div><?php echo form_close(); ?>
        <!-- /.box-body -->
        <div class="box-footer">
			
        </div>
      </div>
    </section>
          
<script type="text/javascript">
     function cal(){
        if(document.getElementById("diskon")){
            document.getElementById("harga_frontend").value= document.getElementById("harga_weekday").value - (document.getElementById("harga_weekday").value * document.getElementById("diskon").value / 100); 

             document.getElementById("harga_frontend2").value= document.getElementById("harga_weekend").value - (document.getElementById("harga_weekend").value * document.getElementById("diskon").value / 100);  
        }
    }
</script>
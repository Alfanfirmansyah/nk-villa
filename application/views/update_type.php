 <section class="content-header">
      <h1>
       <i class="fa fa-cogs"></i> Update Data Type Villa <?php echo $list->nama_type; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="#">Manage Villa</a></li>
        <li class="active">Edit Type</li>
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
			<?php echo form_open_multipart('manage_type/update_type/'.$list->id_type,array('class'=>'form-horizontal')); ?>		
			<div class="box-body">
			  <div class="col-md-6">
				<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <input type="text" class="form-control" name="type" placeholder="Type Villa" required autocomplete="off" value="<?php echo $list->nama_type;?>">
				</div><br>
        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" required autocomplete="off" value="<?php echo $list->location;?>">
        </div><br>
        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                <input type="text" class="form-control" name="link" placeholder="Link URL Lokasi" required autocomplete="off" value="<?php echo $list->url;?>">
        </div><br>
			  </div>
				<div class="form-actions fluid">
							<div class="col-md-offset-10 col-md-9">
								<br>
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
          
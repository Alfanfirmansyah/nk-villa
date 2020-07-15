 <section class="content-header">
      <h1>
       <i class="fa fa-cogs"></i> Update Data Title
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="#">Manage Home</a></li>
        <li class="active">Edit</li>
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
			<?php echo form_open_multipart('manage_frontend/update_title/'.$list->id,array('class'=>'form-horizontal')); ?>		
			<div class="box-body">
			  <div class="col-md-6">
		
				<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-quote-left"></i></span>
						<input type="text" class="form-control" name="title" required autocomplete="off" value="<?php echo $list->title;?>">
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
          
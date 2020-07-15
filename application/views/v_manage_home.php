 <section class="content-header">
      <h1>
       <i class="fa fa-gear"></i> Manage Homepage
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="#">Manage Home</a></li>
        <li class="active"></li>
      </ol>
    </section>
	 <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
			<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-quote-left"></i> Title</a></li>
			  <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-image"></i> Gambar Promo</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
               <table class="table table-hover">
                <thead>
                <tr>
                  <th>#</td>
                  <th><i class="fa fa-tasks"></i> Title</td>
                  <th><i class="fa fa-cogs"></i> Aksi</td>
                </tr>
                </thead>
                <tbody>
					<?php foreach($data_home as $list){?>
					<tr>
						<td></td>
						<td><?php echo $list->title;?></td>
						<td><a href="<?php echo site_url('manage_frontend/update_title/'.$list->id); ?>"class="btn default btn-xs blue"><i class="fa fa-edit"></i> Edit</a> <br><br>
						</td>
						
					</tr>
					<?php } ?>
                </tbody>
               
              </table>
			  
				
              </div>
              <div class="tab-pane" id="tab_2">
					<table class="table table-hover">
                <thead>
                <tr>
                  <th>#</td>
                  <th><i class="fa fa-tasks"></i> Img</td>
                  <th><i class="fa fa-cogs"></i> Aksi</td>
                </tr>
                </thead>
                <tbody>
					<?php foreach($data_home as $list){?>
					<tr>
						<td></td>
						<td><img style="width:30%;"src="<?php echo base_url()?>assets/img/<?php echo $list->img?>"></td>
						<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
						<i class="fa fa-upload"></i> &nbsp Upload Image
						</button>
						</td>
						
					</tr>
					<?php } ?>
                </tbody>
               
              </table>
				  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-upload"></i> Form Upload Image Promo </h4>
              </div>
			  <div class="modal-body">
			  <form action="<?php echo site_url().'/manage_frontend/upload_gambar'?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			  <div class="box-body">
		
		
                <input type="hidden" class="form-control" name="id" required readonly autocomplete="off" value="<?php echo $list->id;?>">
              
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
             </div>
			
              
            </div>
            </div>
     
      </div>
    </section>
          
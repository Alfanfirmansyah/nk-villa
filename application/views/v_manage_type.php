 <section class="content-header">
      <h1>
       <i class="fa fa-tasks"></i> List Data Type Villa
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="#">Manage Villa</a></li>
        <li class="active">Type</li>
      </ol>
    </section>
	 <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
			   
			   <div class="col-md-1">
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-pencil"></i> Add Data
              </button>
			   </div>
			   
		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-tasks"></i> Form Add Data Villa</h4>
              </div>
			  <div class="modal-body">
			  <form action="manage_type/add_data" class="form-horizontal" method="post" enctype="multipart/form-data">
			  <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <input type="text" class="form-control" name="type" placeholder="Type Villa" required autocomplete="off">
              </div>
              <br>
               <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" required autocomplete="off">
              </div>
<br>
               <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                <input type="text" class="form-control" name="link" placeholder="Link URL Lokasi" required autocomplete="off">
              </div>
              <!-- /input-group -->
			  </div>
            <!-- /.box-body -->
				
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
               <table class="table table-hover">
                <thead>
                <tr>
                  <th><i class="fa fa-arrows-v"></i> No</td>
                  <th><i class="fa fa-tasks"></i> Type</td>
                <th><i class="fa fa-tasks"></i> Lokasi</td>
                  <th><i class="fa fa-cogs"></i> Aksi</td>
                </tr>
                </thead>
                <tbody>
					<?php $no = 1;?>
					<?php foreach($data_type as $list){?>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $list->nama_type;?></td>
            <td><?php echo $list->location;?></td>
						<td><a href="<?php echo site_url('manage_type/update_type/'.$list->id_type); ?>"class="btn default btn-xs blue"><i class="fa fa-edit"></i> Edit</a> <br><br>
									<a href="<?php echo site_url('manage_type/delete_type/'.$list->id_type); ?>"
									onClick="return confirm('Are you sure you want to delete?')
									" class="btn default btn-xs blue"><i class="fa fa-trash-o"></i> Hapus</a></td>
						
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
          
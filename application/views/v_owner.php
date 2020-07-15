 <section class="content-header">
      <h1>
       <i class="fa fa-users"></i> List Data User
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/dashboard'?>"><i class="fa fa-dashboard"></i> Dashboards</a></li>
        <li><a href="#">Manage User</a></li>
        <li class="active"><a href="<?php echo site_url().'/manage_user'?>"> User Owner</a></li>
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
                <h4 class="modal-title"><i class="fa fa-pencil"></i> Form Add Data User</h4>
              </div>
			  <div class="modal-body">
			  <form action="manage_user/add_data" class="form-horizontal" method="post" enctype="multipart/form-data">
			  <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required autocomplete="off">
              </div><br>
			  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required autocomplete="off">
              </div><br>
			  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="off">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-google"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required autocomplete="off">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control" name="notelp" placeholder="No telp" required autocomplete="off">
              </div><br>
			  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                <input type="file" class="form-control" name="foto" placeholder="Image" required>
              </div>
			  <br>
			  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required autocomplete="off">
              </div><br>

              <input type="hidden" name="status" value="owner">
			
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><i class="fa fa-arrows-v"></i> No</td>
                  <th><i class="fa fa-user"></i> Username</td>
                  <th><i class="fa fa-user"></i> Nama</td>
				  <th><i class="fa fa-envelope"></i> Email</td>
                  <th><i class="fa fa-phone"></i> No Telp</td>
                  <th><i class="fa fa-image"></i> Foto</td>
                  <th><i class="fa fa-street-view"></i> Alamat</td>
                  <th><i class="fa fa-cogs"></i> Aksi</td>
                </tr>
                </thead>
                <tbody>
					<?php $no = 1;?>
					<?php foreach($data_type as $list){?>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $list->username;?></td>
						<td><?php echo $list->nama;?></td>
						<td><?php echo $list->email;?></td>
            <td><?php echo $list->no_telp;?></td>
						<td><img width="120px" height="70px" src="<?php echo base_url().'assets/img/foto_owner/'.$list->foto;?>"</td>
            <td><?php echo $list->alamat;?></td>
						<td><a href="<?php echo site_url('manage_user/update_user/'.$list->id_user); ?>"class="btn default btn-xs blue"><i class="fa fa-edit"></i> Edit</a> <br><br>
									<a href="<?php echo site_url('manage_user/delete_user/'.$list->id_user); ?>"
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
          
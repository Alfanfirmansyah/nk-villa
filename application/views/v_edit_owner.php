<section class="content-header">
      <h1>
        Manage Data User Owner

      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url().'/Dashboard'?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Manage User</a></li>
        <li class="active"><a href="<?php echo site_url().'/Manage_user'?>"> User Owner</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('manage_user/update_user/'.$list->id_user,array('class'=>'form-horizontal')); ?> 
              <div class="box-body">
                

                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Anda" value="<?php echo $list->nama;?>">
                  </div>
                </div>
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="nama" placeholder="Masukkan Username" value="<?php echo $list->username;?>">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" class="form-control" id="nama" placeholder="Masukkan Password" value="<?php echo $list->password;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email Anda" value="<?php echo $list->email;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="notelp" class="col-sm-2 control-label">No Telp</label>

                  <div class="col-sm-10">
                    <input type="text" name="notelp" class="form-control" id="notelp" placeholder="Masukkan No Telp Anda" value="<?php echo $list->no_telp;?>" >
                  </div>
                </div>

                 <div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat Anda ..."><?php echo $list->alamat;?> </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                   <input type="file" class="form-control" name="foto" placeholder="Image" required>
                  </div>
                </div>
                <input type="hidden" name="status" value="owner">



<div class="form-actions fluid">
              <div class="col-md-offset-2 col-md-9">
                <br>
                <?php echo form_submit('submit', 'Update', " class = ' btn btn-primary' "); ?>
              </div>
        </div> 

               
              </div><?php echo form_close(); ?>
              <!-- /.box-body -->
             
              <!-- /.box-footer -->
            </form>
          </div>
      <!-- /.box -->

    </section>
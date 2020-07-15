 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <section class="content-header">
      <h1>
       <i class="fa fa-home"></i> List Data Villa
       
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
                <h4 class="modal-title"><i class="fa fa-home"></i> Form Add Data Villa</h4>
              </div>
			  <div class="modal-body">
			  <form action="manage_villa/add_data" class="form-horizontal" method="post" enctype="multipart/form-data">
			  <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                 <select class="form-control" required name="type_villa">
                    <option value="">- Select Type villa - </option>
					<?php foreach($data_type as $list) { ?>
						<option value="<?php echo $list->id_type;?>"><?php echo $list->nama_type;?></option>
					<?php }?>
                  </select>
              </div><br>
			   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="text" class="form-control" name="nama_villa" placeholder="No Villa / Nama Villa" required autocomplete="off">
              </div><br>
			   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                 <select class="form-control" required name="owner">
                    <option value="">- Select Pemilik villa - </option>
					<?php foreach($data_user as $list) { ?>
						<option value="<?php echo $list->id_user;?>"><?php echo $list->nama;?></option>
					<?php }?>
                  </select>
              </div><br>
			  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-disc"></i>Diskon %</span>
                <input type="number" min="1" id="diskon" class="form-control" name="diskon" placeholder="Diskon" autocomplete="off" onchange="cal()">
              </div><br>
			  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="number" min="1" id="harga_weekday" onchange="cal()" class="form-control" name="harga_frontend" placeholder="Harga Weekday" required autocomplete="off">
                <input type="number" min="1" id="harga_frontend" class="form-control" name="harga_weekday" placeholder="Harga Sewa Konversi Disc"  readonly required autocomplete="off">
              </div><br>
         <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="number" min="1" id="harga_weekend" onchange="cal()" class="form-control" name="harga_frontend2" placeholder="Harga Weekend" required autocomplete="off">
                <input type="number" min="1" id="harga_frontend2" class="form-control" name="harga_weekend" placeholder="Harga Sewa Konversi Disc"  readonly required autocomplete="off">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="number" class="form-control" name="kamarmandi" placeholder="Fasilitas Kamar Mandi" required autocomplete="off">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="number" class="form-control" name="kamartidur" placeholder="Fasilitas Kamar Tidur" required autocomplete="off">
              </div><br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="number" class="form-control" name="garasi" placeholder="Sarapan Pagi" required autocomplete="off">
              </div><br>
			  <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <div class="box">
				<div class="box-header">
					<h3 class="box-title">Deskripsi villa
               
					</h3>
              <!-- tools box -->
             
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea class="textarea" name="deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
          </div>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><i class="fa fa-tasks"></i> Type</td>
				  <th><i class="fa fa-home"></i>No Villa</td>
				  <th><i class="fa fa-check-circle-o"></i> Status</td>
				  <th><i class="fa fa-user"></i> Pemilik</td>
          <th><i class=""></i> Diskon</td>
				  <th><i class="fa fa-money"></i> Harga Sewa Weekend</td>
				  <th><i class="fa fa-money"></i> Harga Diskon Sewa Weekend</td>
           <th><i class="fa fa-money"></i> Harga Sewa Weekday</td>
          <th><i class="fa fa-money"></i> Harga Diskon Sewa Weekday</td>
                  <th><i class="fa fa-ticket"></i> Detail</td>
                  <th><i class="fa fa-cogs"></i> Aksi</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data_villa as $list){?>
					<tr>
						<td><?php echo $list->nama_type;?></td>
						<td><?php echo $list->nama_villa;?></td>
						<td>status</td>
						<td><?php echo $list->nama;?></td>
            <td><?php echo $list->diskon;?>%</td>
            <td>Rp. <?php echo number_format($list->harga_frontend_wk,0);?></td>
						<td>Rp. <?php echo number_format($list->harga_weekend,0);?></td>
            <td>Rp. <?php echo number_format($list->harga_frontend_wd,0);?></td>
            <td>Rp. <?php echo number_format($list->harga_weekday,0);?></td>
						<td><a href="<?php echo site_url('manage_villa/detail_adminvilla/'.$list->id_villa);?>" class="btn default btn-xs blue"><button type="submit" class="btn btn-info">Detail</button></a>
						</td>
						<td><a href="<?php echo site_url('manage_villa/update_villa/'.$list->id_villa);?>" class="btn default btn-xs blue">
							<i class="fa fa-edit"></i> Edit</a> <br><br>
							<a href="<?php echo site_url('manage_villa/delete_villa/'.$list->id_villa); ?>"
							onClick="return confirm('Are you sure you want to delete?')" 
							class="btn default btn-xs blue"><i class="fa fa-trash-o"></i> Hapus</a></td>
						
					</tr>
					<?php } ?>
               
               
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            
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
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

          
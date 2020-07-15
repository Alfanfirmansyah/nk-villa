<?php if ($sewa->jumlah > 0){?>
		<h4><span style="background-color:#295293;  padding:2px; color:white;"><i class="fa fa-home"></i> Villa 
		<?php if (empty($villa)) { ?>
			 
		<?php } else { ?>
			<?php echo $villa->nama_villa;?>
		<?php } ?>
		Anda Tersewakan pada hari ini
		</span></h4>
<?php } else { ?>
		<h4><span style="background-color:#00a65a; padding:2px; color:white;"><i class="fa fa-home"></i> Villa 
		<?php if (empty($villa)) { ?>
		<?php } else { ?>
			<?php echo $villa->nama_villa;?>
		<?php } ?>
		Anda Tersedia pada hari ini
		</span></h4>
<?php } ?>
<br>
<h4><i class="fa fa-calendar"></i> Jadwal Penyewa Villa 
<?php if (empty($villa)) { ?>
<?php } else { ?>
<?php echo $villa->nama_villa;?> 
<?php } ?>
anda : </h4>
<table id="example1" class="table table-hover">
	<thead>
	<tr>
	<th>#</th>
	<th><i class="fa fa-user"></i> Nama Penyewa</th>
	<th><i class="fa fa-calendar"></i> Check-in</th>
	<th><i class="fa fa-calendar"></i> Check-out</th>
	<th><i class="fa fa-check-circle"></i> Status</th>
	</tr>
	</thead>
	<tbody>
		<?php $no=1?>
		<?php foreach ($data as $t) { ?>
			<tr>
			<td><?php echo $no++?></td>
			<td><?php echo $t->nama_penyewa?></td>
			<td><?php $date = date_create($t->tgl_start);
						echo date_format($date, 'd M Y');
				?></td>
			<td><?php $date = date_create($t->tgl_end);
						echo date_format($date, 'd M Y');
				?></td>
			<td><?php if($t->status == 'Booking'){ ?>
				<span style="background-color:#295293; padding:2px; color:white;">Booked</span></td>
			<?php }else if($t->status == 'Selesai'){ ?>
				<span style="background-color:green; padding:2px; color:white;">Selesai</span></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</tbody>
										  
</table>
<script src="<?php echo base_url();?>assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NKvilla | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

  
 

    

    <!-- Main content -->

	
	<div id="printableArea">
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div style="margin-left:2%;">#INVOICE
          <h2 class="page-header">
            <img style="width:10%; margin-left:2%;" src="<?php echo base_url('assets/logo.png')?>">NK Villa & Resto, Inc.
            <small class="pull-right" style="margin-right:10%"><i class="fa fa-calendar"></i> Date: <?php $tgl = date_create($selesai);
														 echo $tgl1 = date_format($tgl,' l,d m Y');
													?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>NKvilla</strong><br>
            Jl .Raya Ketangi Perum. Omah Klakon A-6 Malang<br>
            Phone: +6281331000094<br>
            Email: nkvillaresto@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $nama_penyewa ?></strong><br>
            <?php echo $alamat ?><br>
            Phone: <?php echo $no_telp ?><br>
            Email: <?php echo $email ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
		<img style="width: 160px;height: 160px" src="<?php echo base_url('assets/qrcode/'.$qrcode)?>"><br>
		<b>Kode Transaksi : </b><input id="myInput" style="border:none;" readonly type="text" value="<?php echo $kode_transaksi ?>"><br>
        <br><br>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No Villa</th>
              <th>Checkin</th>
              <th>Checkout</th>
              <th>Total Pembayaran</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo $nama_villa ?></td>
              <td><?php $tgl = date_create($tgl_start);
                        echo date_format($tgl,'d-m-Y')?></td>
              <td><?php $tgl2 = date_create($tgl_end);
                        echo date_format($tgl2,'d-m-Y')?></td>
              <td>Rp.<?php echo number_format($total_harga,0) ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Status Pembayaran :</p>  <ul> <img style="width:25%;"src="<?php echo base_url();?>assets/img/lunas.png">
		
		    </ul>
        
        </div>
        <!-- /.col -->
       
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
         <button onclick="printDiv('printableArea')" target="_blank"  class="btn btn-primary"><i class="fa fa-print"></i> Print </button>
          <a href="<?php echo site_url()?>/manage_transaksi"><button type="button" onClick="return confirm('Pastikan simpan bukti Anda , sebelum meninggalkan halaman ini')" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Selesai
          </button></a>
        </div>
      </div>	
    </section>
	</div>
    <!-- /.content -->
    <div class="clearfix"></div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/backend/dist/js/demo.js"></script>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $selesai;?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</body>
</html>



<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url();?>/assets/login/css/login.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <br><br>

    <!-- main -->
    <div class="main">
        <div class="main-row">
				            <div class="agileits-top">
              <h3 style="font-family:Trebuchet MS; color:white; text-align:center"><i class="fa fa-sign-in"></i> Sign in</h3>
               <?php echo form_open('login/proses', array('class' => "login-form", 'autocomplete' => 'off','id'=>'login', 'role'=>'form')) ?>
                    <input type="text" class="text" required="required" placeholder="Username " name="userid">
                    <input type="password" class="text" required="required" placeholder="Password" name="password">
                    <input type="submit" value="LOGIN">
                <?php echo form_close(); ?>
            </div>
           
            
        </div>
        <div class="copyright">
            <p> © 2019 CyberTeam GBK . All rights reserved</p>
        </div>
    </div>
    <!-- //main -->
</body>
</html>
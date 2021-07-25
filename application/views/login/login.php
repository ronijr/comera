<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In &middot; Elephant Template &middot; The fastest way to build modern admin site for any platform, browser, or device</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:url" content="http://demo.naksoid.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta property="og:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:image" content="http://demo.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@naksoid">
    <meta name="twitter:creator" content="@naksoid">
    <meta name="twitter:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta name="twitter:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta name="twitter:image" content="http://demo.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#2c3e50">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login-1.min.css">
  </head>
  <body>
    <div class="login">
      <div class="login-body">
        <a class="login-brand" href="index.html">
          <!-- <img class="img-responsive" src="img/logo.svg" alt="Elephant"> -->
        </a>
        <h3 class="login-heading">Log In</h3>
        <div class="login-form">
            <?php
                $attributes = array(
                    
                );
                echo form_open('login', $attributes);
            ?>

            <?php echo validation_errors('<center><span style="color: #d9230f;">', '</span></center>'); ?>

            <?php if ($this->session->flashdata('login_error') == TRUE): ?>
                <center><span style="color: #d9230f;"><?php echo $this->session->flashdata('login_error'); ?></span></center>
            <?php endif; ?>
           
            <div class="form-group">
              <label for="username" class="control-label">User ID</label>
              <input id="username" class="form-control" type="text" name="username" spellcheck="false" autocomplete="off" data-msg-required="Please enter your username." required>
            </div>
            <div class="form-group">
              <label for="password" class="control-label">Password</label>
              <input id="password" class="form-control" type="password" name="password" minlength="5" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Log in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/vendor.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/elephant.min.js"></script>
  </body>
</html>
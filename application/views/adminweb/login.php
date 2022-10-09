
<head>
    <head>
     <?php
     foreach ($seo->result_array() as $value) {
        $tittle = $value['tittle'];
        $keyword = $value['keyword'];
        $description = $value['description'];
    }
    ?>
    <meta charset="utf-8">
    <meta name="keyword" content="<?php echo $keyword;?>">
    <meta name="description" content="<?php echo $description;?>">
    <meta content="" name="author" />
    <title><?php echo $tittle;?></title>
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body class="login" style="background-color: whitesmoke;">



    <div style="height:10%"></div>



    <?php echo form_open('adminweb/login','class="form-vertical"'); ?>
    <div class="logo text-center">
        <?php foreach ($logo->result_array() as $value) {
            $logo = $value['gambar'];
        }

        ?>
        <img src="<?php echo base_url();?>images/logo/<?php echo $logo ;?>" alt="" /> <br><br>
    </div>
    <div class="container" >
        <div id="login-row" class="row justify-content-center align-items-center" >
            <div id="login-column" class="col-md-6" style="background-color: white; border-radius: 3%; padding: 10px ">
                <div id="login-box" class="col-md-12" >
                    <form id="login-form" class="form" action="" method="post">
                        <br><h3 class="text-center text-info">Login</h3><br>
                        <?php if(validation_errors()) { ?>
                            <div class="alert alert-danger" role="alert">
                               <i class="fa fa-exclamation" aria-hidden="true"></i> Username dan password salah!
                           </div>
                       <?php } ?>


                       <?php if($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert">
                           <i class="fa fa-exclamation" aria-hidden="true"></i> Username dan password salah!
                       </div>
                   <?php } ?>
                   <div class="form-group">
                    <label for="username" class="text-info">Username:</label><br>
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="password" class="text-info">Password:</label><br>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary pull-right d-block w-100">
                        Login 
                    </button> <br>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="text-center">© All rights reserved.</div>
<?php echo form_close(); ?>
</div>
</body>


</body>
<!-- END BODY -->
</html>
<?php require_once ('inc/top.php');?>
  <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">

          <?php require_once ('inc/header.php');?>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-plus-square"></i> Add Post</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i> Add User</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="container-fluid body-section">
            <div class="row">
                
            <?php require_once ('inc/sidebar.php');?>

                <div class="col-md-9">
                    <h1><i class="fa fa-tachometer"></i> Dashboard <small>Statistics Overview</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Dashboard</li>
                    </ol>

                    
                </div>
            </div>
        </div>

        <?php require_once ('inc/footer.php');?>
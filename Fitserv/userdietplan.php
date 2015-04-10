<?php
require_once 'core/init.php';

if(!$username = Input::get('user')){
    Redirect::to('index.php');
} else {
    $user = new User($email);
    if(!$user->exists()){
        Redirect::to(404);
    } else {
        $data =  $user->data();
    }
  ?>

    
    


<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Fitserv</title>
            
        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
        <link href="css/calendar.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/icons.css" rel="stylesheet">
        <link href="css/generics.css" rel="stylesheet"> 


    </head>
    <body id="skin-blur-violate">
    

        <header id="header" class="media">
            <a href="" id="menu-toggle"></a> 
            <a class="logo pull-left" href="userprofile.php">FitServ</a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <div class="pull-left tm-icon">
                        <a data-drawer="messages" class="drawer-toggle" href="">
                            <i class="sa-top-message"></i>
                            <i class="n-count animated">5</i>
                            <span>Messages</span>
                        </a>
                    </div>
                    <div class="pull-left tm-icon">
                        <a data-drawer="notifications" class="drawer-toggle" href="">
                            <i class="sa-top-updates"></i>
                            <i class="n-count animated">9</i>
                            <span>Updates</span>
                        </a>
                    </div>

                    

                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                    
                    <div class="media-body">
                        <input type="text" class="main-search">
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="" data-toggle="dropdown">
                            <img class="profile-pic animated" src="img/profile-pic.jpg" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            <li><a href="">My Profile</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Settings</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="logout.php">Log out</a></li>
                        </ul>
                        <h4 class="m-0"><?php echo escape($data->name); ?></h4>
                        @<?php echo escape($data->username); ?>
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           Updates
                        </h2>
                        
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li>
                        <a class="fa fa-user" href="userprofile.php?user=<?php echo escape($user->data()->username); ?>">
                            <span class="menu-item">Profile</span>
                        </a> 
                    </li>
                    <li>
                        <a class="fa fa-search fa-2xr" href="search_trainer.php?user=<?php echo escape($user->data()->username); ?>">
                            <span class="menu-item">Search</span>
                        </a>
                    </li>
                    <li>
                        <a class="fa fa-th-large" href="userworkout.php?user=<?php echo escape($user->data()->username); ?>"> 
                            <span class="menu-item">Workout</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="fa fa-plus-square" href="userdietplan.php?user=<?php echo escape($user->data()->username); ?>">
                            <span class="menu-item">Diet Plan</span>
                        </a>
                    </li>
                    <li>
                        <a class="fa fa-users" href="user_friends.php?user=<?php echo escape($user->data()->username); ?>">
                            <span class="menu-item">Friends</span>
                        </a>
                    </li>
                    <li>
                        <a class="fa fa-cog" href="user_setting.php?user=<?php echo escape($user->data()->username); ?>">
                            <span class="menu-item">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="fa fa-sign-out" href="logout.php">
                            <span class="menu-item">Logout</span>
                        </a>
                    </li>                    
                </ul>

            </aside>
        
            <!-- Content -->
            <section id="content" class="container">
            
               
                
                <!-- Notification Drawer -->
                <div id="notifications" class="tile drawer animated">
                    <div class="listview narrow">
                        <div class="media">
                            <a href="">Notification Settings</a>
                            <span class="drawer-close">&times;</span>
                        </div>
                        <div class="overflow" style="height: 254px">
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Dare Olowoniyi - 2 Hours ago</small><br>
                                    <a class="t-overflow" href="">Mauris consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Sukhrat Vaitov - 5 Hours ago</small><br>
                                    <a class="t-overflow" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Joe Bloggs - On 15/12/2013</small><br>
                                    <a class="t-overflow" href="">Maecenas venenatis enim condimentum ultrices fringilla. Nulla eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar, ornare turpis id</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Marry Bloggs - On 14/12/2013</small><br>
                                    <a class="t-overflow" href="">Phasellus interdum felis enim, eu bibendum ipsum tristique vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Dare Olowoniyi - On 15/12/2013</small><br>
                                    <a class="t-overflow" href="">Ipsum wintoo consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Sukhrat Vaitov - On 16/12/2013</small><br>
                                    <a class="t-overflow" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                        </div>
                        <div class="media text-center whiter l-100">
                            <a href="#"><small>VIEW ALL</small></a>
                        </div>
                    </div>
                </div>
                
                <!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    
                    <li class="active"><?php if($user->hasPermission('trainer')){echo '<p>You are a Personal Trainer!</p>';} else {
                        echo '<p>You are a Standard User!</p>';
                        } ?></li>
                </ol>
                
                <h4 class="page-title"><?php echo escape($data->name);  ?>'s Profile!</h4>
                
                <div class="block-area">
                    <div class="row">                        
                            <!-- Photos -->
                            <div class="tile">
                                <h2 class="tile-title">Manage Workout Plan</h2>
                                                                  
                                <div class="p-5 photos">                                   
                                    
                                    <!-- workout plan navigation-->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar">
                                            <li class="hidden">
                                                <a href="#page-top"></a>
                                            </li>
                                             <li>
                                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal" href="#">Add Diet</a>
                                            </li>
                                            <li>
                                                <a class="page-scroll" href="#">View This Weeks Diets</a>
                                            </li>
                                            <li>
                                                <a class="page-scroll" href="#">View Future Diets</a>
                                            </li>  
                                             <li>
                                                <a class="page-scroll" href="#">View Past Diets</a>
                                            </li>              
                                        </ul>
                                    </div>                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block-area">
                    <div class="row">                        
                            <!-- Photos -->
                            <div class="tile">
                                <h2 class="tile-title">Current workout plans</h2>
                                                                
                                <div class="p-5 photos">                                   
                                   


<body onload="viewdata()">
    <p><br/></p>
    <div class="container">


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Diet Plan</h4>
      </div>
      <div class="modal-body">
        
<form>

  <div class="form-group">
    <label for="fn">Food Name</label>
    <input type="text" class="form-control" id="fn">
  </div>
  <div class="form-group">
    <label for="sz">Size</label>
    <input type="text" class="form-control" id="sz">
  </div>
  <div class="form-group">
    <label for="tc">Total Cal</label>
    <input type="text" class="form-control" id="tc">
  </div>
  <div class="form-group">
    <label for="pn">Protein (g)</label>
    <input type="text" class="form-control" id="pn">
  </div>
  <div class="form-group">
    <label for="cb">Carbs (g)</label>
    <input type="text" class="form-control" id="cb">
  </div>
  <div class="form-group">
    <label for="ft">Fat (g)</label>
    <input type="text" class="form-control" id="ft">
  </div>
  <div class="form-group">
    <label for="mt">Meal Time</label>
    <input type="text" class="form-control" id="mt">
  </div>
  <div class="form-group">
    <label for="dn">Diet Notes</label>
    <input type="text" class="form-control" id="dt">
  </div>
</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel this diet plan</button>
        <button type="button" id="save" class="btn btn-primary">Save this diet plan</button>
      </div>
    </div>
  </div>
</div>    
<div id="info"></div>
      <br/>
      <div id="viewdata"></div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function viewdata(){
       $.ajax({
       type: "GET",
       url: "php/dietgetdata.php"
      }).done(function( data ) {
      $('#viewdata').html(data);
      });
    }
    $('#save').click(function(){

    var fn = $('#dn').val();    
    var sz = $('#sz').val();
    var tc = $('#tc').val();
    var pn = $('#pn').val();
    var cb = $('#cb').val();
    var ft = $('#ft').val();
    var mt = $('#mt').val();
    var dn = $('#dn').val();
    
    var datas="&fn="+fn+"&sz="+sz+"&tc="+tc+"&pn="+pn+"&cb="+cb+"&ft="+ft+"&mt="+mt+"&dn="+dn;
      
    $.ajax({
       type: "POST",
       url: "php/dietnewdata.php",
       data: datas
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    });
    function updatedata(str){
    
    var id = str;
    var fn = $('#fn'+str).val();    
    var sz = $('#sz'+str).val();
    var tc = $('#tc'+str).val();
    var pn = $('#pn'+str).val();
    var cb = $('#cb'+str).val();
    var ft = $('#ft'+str).val();
    var mt = $('#mt'+str).val();
    var dn = $('#dn'+str).val();
    
    var datas="&fn="+fn+"&sz="+sz+"&tc="+tc+"&pn="+pn+"&cb="+cb+"&ft="+ft+"&mt="+mt+"&dn="+dn;

    $.ajax({
       type: "POST",
       url: "php/dietupdatedata.php?id="+id,
       data: datas
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    }
    function deletedata(str){
    
    var id = str;
      
    $.ajax({
       type: "GET",
       url: "php/dietdeletedata.php?id="+id
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    }
    </script>
  </body>

               
                
                
                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <br/><br/><br/>
                </div> 
            </section>
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script> <!-- jQuery Library -->
        
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        
        <!-- UX -->
        <script src="js/scroll.min.js"></script> <!-- Custom Scrollbar -->
        
        <!-- Other -->
        <script src="js/calendar.min.js"></script> <!-- Calendar -->
        <script src="js/weather.min.js"></script> <!-- Weather -->
        <script src="js/feeds.min.js"></script> <!-- News Feeds -->
        
        <!-- All JS functions -->
        <script src="js/functions.js"></script>

        <!--  Form Related -->

        <script src="js/datetimepicker.min.js"></script> <!-- Date & Time Picker -->
    </body>
</html>
    <?php
}


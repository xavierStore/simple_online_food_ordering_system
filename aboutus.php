<?php
include 'includes/connect.php';
$user_id = $_SESSION['user_id'];

$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while($row = mysqli_fetch_array($result)){
$name = $row['name'];	
$address = $row['address'];
$contact = $row['contact'];
$email = $row['email'];
$username = $row['username'];
}
	if($_SESSION['customer_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Edit Details</title>

  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection"> 
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  </style> 
</head>

<body>
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <header id="header" class="page-topbar">
        <div class="navbar-fixed">
            <nav class="amber">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="menu.php" class="brand-logo darken-1"><img src="images/logo.png" alt="logo"></a> <span class="logo-text">Logo</span></h1></li>
                    </ul>				
                </div>
            </nav>
        </div>
  </header>
  <div id="main">
    <div class="wrapper">
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details purple darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
				 <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <li class="bold active"><a href="index.php" class="waves-effect waves-purple"><i class="mdi-maps-local-restaurant"></i> Menu</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-purple"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="orders.php">All Orders</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-purple"><i class="mdi-action-question-answer"></i> Inquiries</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="inquiry.php">All Inquiries</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM inquiry WHERE poster_id = $user_id AND not deleted;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="inquiry.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
                  ?>
                  
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>					
            <li class="bold"><a href="details.php" class="waves-effect waves-purple"><i class="mdi-social-person"></i> Edit Details</a>
            </li>
            <li class="bold"><a href="aboutus.php" class="waves-effect waves-purple"><i class="mdi-communication-live-help"></i> About Us</a>
            </li>				
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <section id="content">
    <div class="container">
    <div class="col s10 offset-s1 m6 l4">
    <div class="card ">
      <div class="card-content">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="mdi-communication-live-help"></i></h2>
          <div class="card-title">
            <h5 class="center">About Us</h5>
          </div>
          <center><img src="images/aboutus.jpg"></img></center><br>
          <p class="light center-align">Muiz Fried Chicken started on February 2019 by Mr Zarif. Our main purpose of having this business is to provide high quality fried chicken to the people of Paarit Raja and Batu Pahat.
            All our fried chicken are prepared on the spot in order to preserve the freshness and deliciousness of our fried chicken.
          </p>
        </div>
        <div class="card-action center-align">
        <a class="btn cyan waves-effect waves-light" href="https://www.facebook.com/pg/Muizhotchickenbatupahat/" type="submit" name="action"><i class="fab fa-facebook"></i> Facebook
        </a>
      </div>  
      </div>
    </div>
  </div>
</div>
</div>

  </div>
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Designed on 2019 <a class="white-text text-lighten-4" href="#" target="_blank">Muiz Fried Chicken Store</a></span>
        </div>
    </div>
  </footer>
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
				maxlength: 10
            },
            name: {
                required: true,
                minlength: 5,
				maxlength: 15
            },
            email: {
				required: true,
				maxlength: 35,
			},
			password: {
				required: true,
				minlength: 5,
				maxlength: 16,
			},
            phone: {
				required: true,
				minlength: 4,
				maxlength: 11
			},
			address: {
				required: true,
				minlength: 10,
				maxlength: 300
			},
        },
        messages: {
            username: {
                required: "Enter username",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 10 characters are required."				
            },
            name: {
                required: "Enter name",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 15 characters are required."
            },
            email: {
				required: "Enter email",
                maxlength: "Maximum 35 characters are required."				
			},
			password: {
				required: "Enter password",
				minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 16 characters are required."				
			},
            phone:{
				required: "Specify contact number.",
				minlength: "Minimum 4 characters are required.",
                maxlength: "Maximum 11 digits are accepted."				
			},	
            address:{
				required: "Specify address",
				minlength: "Minimum 10 characters are required.",
                maxlength: "Maximum 300 characters are accepted."				
			},			
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:login.php");		
		}
		else{

		}
	}
?>
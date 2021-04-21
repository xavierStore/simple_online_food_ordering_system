<?php
include 'includes/connect.php';
include 'includes/wallet.php';

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
  <title>Food Menu</title>

  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min-2.css" type="text/css" rel="stylesheet" media="screen,projection">   
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/custom/card.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
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
                    <ul class="right hide-on-med-and-down">                        
                        <li><a href="#" class="waves-effect waves-block waves-light"><i class="mdi-action-account-balance-wallet"><?php echo "RM"; echo $balance;?></i></a>
                        </li>
                    </ul>						
                </div>
            </nav>
        </div>
  </header>
  <div id="main">
    <div class="wrapper">
      <div id="menu" class="row">
      <div class="col s10 offset-s1 m6 l4">
    <div class="card ">
      <div class="card-content">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="mdi-editor-insert-invitation medium"></i></h2>
          <div class="card-title">
            <h5 class="center">Check Orders</h5>
          </div>
          <p class="light center-align">All orders that you made can be referred in this section. You can also check the delivery status!</p>
        </div>
        <div class="card-action center-align">
        <a class="btn cyan waves-effect waves-light" href="orders.php" type="submit" name="action">Check Now!
                                <i class="mdi-content-send right"></i></a></div>  
      </div>
    </div>
  </div>
  <div class="col s10 offset-s1 m6 l4">
    <div class="card ">
      <div class="card-content">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="mdi-maps-local-restaurant medium"></i></h2>
          <div class="card-title">
            <h5 class="center">Our Menu</h5>
          </div>
          <p class="light center-align">All our delicious fried chicken and delicacies are all showed here ready to be ordered and delivered!</p>
        </div>
        <div class="card-action center-align">
        <a class="btn cyan waves-effect waves-light" href="index.php" type="submit" name="action">Order Now!
                                <i class="mdi-content-send right"></i></a></div>  
      </div>
    </div>
  </div>
  <div class="col s10 offset-s1 m6 l4">
    <div class="card ">
      <div class="card-content">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="mdi-action-question-answer medium"></i></h2>
          <div class="card-title">
            <h5 class="center">Check Inquiries</h5>
          </div>
          <p class="light center-align">All orders,delivery status and other technical related issues and inquiries can all be relayed here!</p>
        </div>
        <div class="card-action center-align">
        <a class="btn cyan waves-effect waves-light" href="inquiry.php" type="submit" name="action">Issue Inquiry
                                <i class="mdi-content-send right"></i></a></div>  
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
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>s
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script type="text/javascript">
</body>

</html>
<?php
	}
	else
	{
     header("location:login.php");
	}
?>
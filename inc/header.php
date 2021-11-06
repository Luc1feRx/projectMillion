<?php
    include_once 'lib/session.php';
    Session::init();

    // $_SESSION['title'] = 'Shop Laptop';
    // $actual_link = $_SERVER['PHP_SELF'];
    // switch($actual_link){
    //     case '/localhost/FrontEnd/index.php':
    //     $_SESSION['title'] = 'Shop Laptop ';
    //     break;
    // }
?>

<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
    spl_autoload_register(function($class){
      include_once "classes/".$class.".php";
    });

    $db = new Database();
    $fm = new Format();
    $ct = new cart();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bán Laptop</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="./fonts/fontawesome-free-5.15.4-web/css/all.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SupportDeskIT</title>
  <meta name="description" content="Support Ticket System.">
  <meta name="author" content="ZF">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='//fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href='//weloveiconfonts.com/api/?family=entypo' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
  <link rel="stylesheet" href="../css/jquery-fancybox.min.css">
  <link rel="icon" type="image/png" href="">
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/jquery-fancybox.min.js"></script>
  <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/index.js"></script>
  <script type="text/javascript" src="../js/foot.js"></script>

<script>
/*$(document).ready(function(){
setInterval(function(){
$("#log").load(location.href + " #log");
$("#update").load(location.href + " #update");
$("#update1").load(location.href + " #update1");
}, 1000);
});*/

</script>
</head>
<body>
	
<div style="margin-top:5%;display: block;"><!-- space acting nav --></div>

<main class="py-4">
    @yield('content')
</main>
    @stack('scripts')

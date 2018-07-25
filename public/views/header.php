<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
   -->
  <meta charset="utf-8">
  <title><?= $data['title'] . ' - ' . SITETITLE ?></title>
  <meta name="description" content="">
  <meta name="author" content="ew">

  <!-- Mobile Specific Metas
  ************************* -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  ************************* -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  ************************* -->
  <link rel="stylesheet" href="<?= URL::STYLES('normalize') ?>">
  <link rel="stylesheet" href="<?= URL::STYLES('skeleton') ?>">
  <link rel="stylesheet" href="<?= URL::STYLES('rome.min') ?>">
  <link rel="stylesheet" href="<?= URL::STYLES('custom') ?>">
 
  <!--  JS	-->
  <script src="<?= URL::JS('rome.min') ?>"></script>
  	
  <!-- Favicon
  ************************* -->
  <link rel="icon" type="image/x-icon" href="<?= URL::IMG("favicon.ico"); ?>">

</head>
<body>
<div class="container" id="main">
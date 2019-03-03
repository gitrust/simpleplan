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
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('normalize') ?>">
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('skeleton') ?>">
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('rome.min') ?>">
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('custom') ?>">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <!--link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"-->
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />

  <!--  JS	-->
  <script src="<?= URL::JS('rome.min') ?>"></script>
  <!-- Remember to include jQuery :) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <!-- selectize plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

  	
  <!-- Favicon
  ************************* -->
  <link rel="icon" type="image/x-icon" href="<?= URL::IMG("favicon.ico"); ?>">

</head>
<body>
<div class="container" id="main">
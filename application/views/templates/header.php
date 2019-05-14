<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $title ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Font Awesome -->
	<!-- Z nejakeho dovodu nejde odkaz na stiahnuty font-awesome.min.css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css" />
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css" />
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css" />
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" />
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

	<!-- jQuery -->
	<!-- Presunul som jQuery a morrisJs aby som mohol pouzit morris skript v index.php -->
	<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
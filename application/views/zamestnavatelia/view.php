<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Detail zamestnávateľa</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo site_url('zamestnavatelia/'); ?>">Zamestnávatelia</a></li>
						<li class="breadcrumb-item active">Detail zamestnávateľa</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<section class="col-md-12">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card card-primary card-outline">
					<div class="card-header d-flex p-0">
						<h3 class="card-title p-3">
							<i class="fa fa-building mr-1"></i>
							<?php echo !empty($zamestnavatel['nazov']) ? $zamestnavatel['nazov'] : ''; ?>
						</h3>
						<ul class="nav nav-pills ml-auto p-2">
							<li class="nav-item"><a class="nav-link active" href="<?php echo site_url('zamestnavatelia/') ?>"><i class="fa fa-arrow-left"></i></a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo site_url('zamestnavatelia/edit/' . $zamestnavatel['id']); ?>"><i class="fa fa-edit"></i></a></li>
						</ul>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<dl>
							<dt>#ID</dt>
							<dd><?php echo !empty($zamestnavatel['id']) ? $zamestnavatel['id'] : ''; ?></dd>
							<dt>Názov</dt>
							<dd><?php echo !empty($zamestnavatel['nazov']) ? $zamestnavatel['nazov'] : ''; ?></dd>
							<dt>Adresa</dt>
							<dd><?php echo !empty($zamestnavatel['adresa']) ? $zamestnavatel['adresa'] : ''; ?></dd>
							<dt>Email</dt>
							<dd><?php echo !empty($zamestnavatel['email']) ? $zamestnavatel['email'] : ''; ?></dd>
							<dt>Telefón</dt>
							<dd><?php echo !empty($zamestnavatel['telefon']) ? $zamestnavatel['telefon'] : ''; ?></dd>
						</dl>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<!-- Main row -->

				</div>
		</div>
</div>
</section>
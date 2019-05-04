<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Zamestnávatelia</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Domov</a></li>
						<li class="breadcrumb-item active">Zamestnávatelia</li>
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
			<?php if ($this->session->userdata['success_msg'] != "") : ?>
				<div class="col-md-12 alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="icon fa fa-check"></i> Úspech!</h5>
					<?php echo $this->session->userdata['success_msg']; ?>
				</div>
				<?php $this->session->userdata['success_msg'] = "";
			endif; ?>
			<section class="col-md-12 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card card-primary card-outline">
					<div class="card-header d-flex p-0">
						<h3 class="card-title p-3">
							<i class="fa fa-briefcase mr-1"></i>
							Zamestnávatelia
						</h3>
						<!-- zmenit na button -->
						<ul class="nav nav-pills ml-auto p-2">
							<li class="nav-item">
								<!-- zmenit na button -->
								<a href="<?php echo site_url('zamestnavatelia/add/'); ?>" class="nav-link active">Pridať</a>
							</li>
						</ul>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						<?php if (!empty($success_msg)) { ?>
							<div class="col-12">
								<div class="alert alert-success"><?php echo $success_msg; ?></div>
							</div>
						<?php } elseif (!empty($error_msg)) { ?>
							<div class="col-12">
								<div class="alert alert-danger"><?php echo $error_msg; ?></div>
							</div>
						<?php } ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="25%">Názov</th>
									<th width="20%">Adresa</th>
									<th width="20%">Email</th>
									<th width="20%">Telefón</th>
									<th width="15%">Akcie</th>
								</tr>
							</thead>
							<tbody id="userData">
								<?php if (!empty($zamestnavatelia)) : foreach ($zamestnavatelia as $zamestnavatel) : ?>
										<tr>
											<td><?php echo $zamestnavatel['nazov']; ?></td>
											<td><?php echo $zamestnavatel['adresa']; ?></td>
											<td><?php echo $zamestnavatel['email']; ?></td>
											<td><?php echo $zamestnavatel['telefon']; ?></td>
											<td>
												<a href="<?php echo site_url('zamestnavatelia/view/' . $zamestnavatel['id']); ?>" class="fa fa-eye"></a>
												<a href="<?php echo site_url('zamestnavatelia/edit/' . $zamestnavatel['id']); ?>" class="fa fa-edit"></a>
												<a href="<?php echo site_url('zamestnavatelia/delete/' . $zamestnavatel['id']); ?>" class="fa fa-trash" onclick="return confirm('Are you sure to delete?')"></a>
											</td>
										</tr>
									<?php endforeach;
							else : ?>
									<tr>
										<td colspan="4">Žiadny zamestnávatelia ......</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<!-- Main row -->

				</div>
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
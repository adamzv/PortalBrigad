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
			<div class="row">
				<?php if (isset($this->session->userdata['success_msg']) and $this->session->userdata['success_msg'] != "") : ?>
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
								<i class="fa fa-building mr-1"></i>
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
						<div class="card-body table-responsive p-2">
							<div id="zamestnavateliaTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
								<div class="row">
									<div class="col-sm-12"></div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table id="zamestnavateliaTable" class="table table-hover dataTable">
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
																<a href="<?php echo site_url('zamestnavatelia/delete/' . $zamestnavatel['id']); ?>" data-href="<?php echo site_url('zamestnavatelia/delete/' . $zamestnavatel['id']); ?>" class="fa fa-trash" data-toggle="modal" data-target="#deleteModal"></a>
															</td>
														</tr>
													<?php endforeach;
											else : ?>
													<tr>
														<td colspan="4">Žiadny zamestnávatelia</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<!-- /.card -->
						</div>
				</section>
			</div>
		</div>
		<!-- /.container-fluid -->
		<!-- Modal -->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-danger" id="deleteModalLabel">DANGER ZONE</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Chcete vymazať zamestnávateľa?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvoriť</button>
						<a class="btn btn-danger btn-ok">Vymazať</a>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
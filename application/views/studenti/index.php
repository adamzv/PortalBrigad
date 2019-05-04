<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Študenti</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Domov</a></li>
            <li class="breadcrumb-item active">Študenti</li>
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
              Študenti
            </h3>
            <!-- zmenit na button -->
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item">
                <!-- zmenit na button -->
                <a href="<?php echo site_url('studenti/add/'); ?>" class="nav-link active">Pridať</a>
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
                  <th width="16%">Meno</th>
                  <th width="16%">Priezvisko</th>
                  <th width="16%">Email</th>
                  <th width="16%">Telefón</th>
                  <th width="16%">Vzdelanie</th>
                  <th width="15%">Akcie</th>
                </tr>
              </thead>
              <tbody id="userData">
                <?php if (!empty($studenti)) : foreach ($studenti as $student) : ?>
                    <tr>
                      <td><?php echo $student['meno']; ?></td>
                      <td><?php echo $student['priezvisko']; ?></td>
                      <td><?php echo $student['email']; ?></td>
                      <td><?php echo $student['telefon']; ?></td>
                      <td><?php echo $student['vzdelanie']; ?></td>
                      <td>
                        <a href="<?php echo site_url('studenti/view/' . $student['id']); ?>" class="fa fa-eye"></a>
                        <a href="<?php echo site_url('studenti/edit/' . $student['id']); ?>" class="fa fa-edit"></a>
                        <a href="<?php echo site_url('studenti/delete/' . $student['id']); ?>" data-href="<?php echo site_url('studenti/delete/' . $student['id']); ?>" class="fa fa-trash" data-toggle="modal" data-target="#deleteModal"></a>
                      </td>
                    </tr>
                  <?php endforeach;
              else : ?>
                  <tr>
                    <td colspan="4">Žiadny študenti</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
            <!-- /.card-body -->
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
                    Chcete vymazať študenta?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvoriť</button>
                    <a class="btn btn-danger btn-ok">Vymazať</a>
                  </div>
                </div>
              </div>
            </div>
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
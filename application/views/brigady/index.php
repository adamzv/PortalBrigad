<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Brigády</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Domov</a></li>
            <li class="breadcrumb-item active">Brigády</li>
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
                <i class="fa fa-briefcase mr-1"></i>
                Brigády
              </h3>
              <!-- zmenit na button -->
              <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item">
                  <!-- zmenit na button -->
                  <a href="<?php echo site_url('brigady/add/'); ?>" class="nav-link active">Pridať</a>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
              <div id="brigadyTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12"></div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="brigadyTable" class="table table-hover dataTable">
                      <thead>
                        <tr>
                          <!-- TODO šírka -->
                          <th width="10%">Kategória</th>
                          <th width="19%">Názov</th>
                          <th width="19%">Zamestnávateľ</th>
                          <th width="19%">Popis</th>
                          <th width="12%">Hod. mzda</th>
                          <th width="19%">Nástup od</th>
                          <th width="19%">Aktívna</th>
                          <th width="19%">Akcie</th>
                        </tr>
                      </thead>
                      <tbody id="userData">
                        <?php if (!empty($brigady)) : foreach ($brigady as $brigada) : ?>
                            <tr>
                              <td><?php echo $brigada['kategoria']; ?></td>
                              <td><?php echo $brigada['nazov']; ?></td>
                              <td><?php echo $brigada['zamestnavatel']; ?></td>
                              <td><?php echo substr($brigada['popis'], 0, 20) . '...'; ?></td>
                              <td><?php echo $brigada['hod_mzda'] . '€'; ?></td>
                              <td><?php echo date('d.m.Y', strtotime($brigada['od'])); ?></td>
                              <td><?php if ($brigada['aktivna'] == 1) {
                                    echo 'aktuálna';
                                  } else {
                                    echo 'neaktuálna';
                                  } ?></td>
                              <td>
                                <a href="<?php echo site_url('brigady/view/' . $brigada['idbrigady']); ?>" class="fa fa-eye"></a>
                                <a href="<?php echo site_url('brigady/edit/' . $brigada['idbrigady']); ?>" class="fa fa-edit"></a>
                                <a href="<?php echo site_url('brigady/delete/' . $brigada['idbrigady']); ?>" data-href="<?php echo site_url('brigady/delete/' . $brigada['idbrigady']); ?>" class="fa fa-trash" data-toggle="modal" data-target="#deleteModal"></a>
                              </td>
                            </tr>
                          <?php endforeach;
                      else : ?>
                          <tr>
                            <td colspan="4">Žiadne brigády</td>
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
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
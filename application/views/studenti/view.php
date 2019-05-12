<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail študenta</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('studenti/'); ?>">Študenti</a></li>
            <li class="breadcrumb-item active">Detail študenta</li>
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
        <div class="card card-primary card-outline">
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">
              <i class="fa fa-user mr-1"></i>
              <?php echo !empty($student['meno']) && !empty($student['priezvisko']) ? $student['meno'] . ' ' . $student['priezvisko'] : 'Žiadne meno'; ?>
            </h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="<?php echo site_url('studenti/') ?>"><i class="fa fa-arrow-left"></i></a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url('studenti/edit/' . $student['idstudenti']); ?>"><i class="fa fa-edit"></i></a></li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <dl>
              <dt>#ID</dt>
              <dd><?php echo !empty($student['idstudenti']) ? $student['idstudenti'] : ''; ?></dd>
              <dt>Meno</dt>
              <dd><?php echo !empty($student['meno']) ? $student['meno'] : ''; ?></dd>
              <dt>Priezvisko</dt>
              <dd><?php echo !empty($student['priezvisko']) ? $student['priezvisko'] : ''; ?></dd>
              <dt>Email</dt>
              <dd><?php echo !empty($student['email']) ? $student['email'] : ''; ?></dd>
              <dt>Telefón</dt>
              <dd><?php echo !empty($student['telefon']) ? $student['telefon'] : ''; ?></dd>
              <dt>Vzdelanie</dt>
              <dd><?php echo !empty($student['vzdelanie']) ? $student['vzdelanie'] : ''; ?></dd>
              <dt>Zručnosti</dt>
              <dd>
                <?php if (!empty($zrucnosti)) : foreach ($zrucnosti as $zrucnost) : ?>
                    <span class="badge badge-primary"><?php echo $zrucnost->zrucnost; ?></span>
                  <?php endforeach;
              else : ?>
                  <p>Žiadne zručnosti</p>
                <?php endif; ?></dd>
            </dl>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- Main row -->
        </div>
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card card-primary card-outline">
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">
              <i class="fa fa-briefcase mr-1"></i>
              Zoznam brigád
            </h3>
            <!-- zmenit na button -->
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item">
                <!-- zmenit na button -->
                <a href="<?php echo site_url('brigady/addbrigada/'); ?>" class="nav-link active">Pridať</a>
              </li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-2">
            <div id="brigadyStudentTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12"></div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="brigadyStudentTable" class="table table-hover dataTable">
                    <thead>
                      <tr>
                        <!-- TODO šírka -->
                        <th width="10%">#ID</th>
                        <th width="19%">Brigáda</th>
                        <th width="19%">Nástup</th>
                        <th width="19%">Ukončenie</th>
                        <th width="19%">Aktívna</th>
                        <th width="12%">Dohodnutá hod. mzda</th>
                        <th width="19%">Provízia</th>
                        <th width="19%">Akcie</th>
                      </tr>
                    </thead>
                    <tbody id="userData">
                      <?php if (!empty($brigady)) : foreach ($brigady as $brigada) : ?>
                          <tr>
                            <td><?php echo $brigada['id']; ?></td>
                            <td><a href="<?php echo site_url('brigady/view/' . $brigada['idbrigady']); ?>">Odkaz [<?php echo $brigada['idbrigady']; ?>]</a></td>
                            <td><?php echo !empty($brigada['nastup']) ? $brigada['nastup'] : '-'; ?></td>
                            <td><?php echo !empty($brigada['ukoncenie']) ? $brigada['ukoncenie'] : '-'; ?></td>
                            <td><?php if ($brigada['aktivna'] == 1) {
                                  echo 'aktuálna';
                                } else {
                                  echo 'neaktuálna';
                                } ?>
                            </td>
                            <td><?php echo $brigada['doh_hod_mzda'] . '€'; ?></td>
                            <td><?php echo $brigada['provizia'] . '€'; ?></td>
                            <td>
                              <a href="<?php echo site_url('brigady/editbrigada/' . $brigada['id']); ?>" class="fa fa-edit"></a>
                              <a href="<?php echo site_url('brigady/deletebrigada/' . $brigada['id']); ?>" data-href="<?php echo site_url('brigady/delete/' . $brigada['idbrigady']); ?>" class="fa fa-trash" data-toggle="modal" data-target="#deleteModal"></a>
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
        </div>
    </div>
</div>
</section>
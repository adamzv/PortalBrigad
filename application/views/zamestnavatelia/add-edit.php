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
            <li class="breadcrumb-item active"><a href="<?php echo site_url('zamestnavatelia/'); ?>">Zamestnávatelia</a></li>
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <?php if ($action == 'Editovať') {
          echo form_open('zamestnavatelia/edit/' . $post['id']);
        } else {
          echo form_open('zamestnavatelia/add/');
        } ?>
        <div class="card-body">
          <?php if (validation_errors()) {
            echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
          } ?>
          <div class="form-group">
            <label for="nazov">Názov zamestnávateľa:</label>
            <input type="text" class="form-control" id="nazov" name="nazov" value="<?php echo !empty($post['nazov']) ? $post['nazov'] : set_value('nazov'); ?>">
          </div>
          <div class="form-group">
            <label for="adresa">Adresa</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
              </div>
              <input type="text" class="form-control" id="adresa" name="adresa" value="<?php echo !empty($post['adresa']) ? $post['adresa'] : set_value('adresa'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-at"></i></span>
              </div>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo !empty($post['email']) ? $post['email'] : set_value('email'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label>Tel. číslo:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask="'mask': '+421 999 999 999'" name="telefon" id="telefon" value="<?php echo !empty($post['telefon']) ? $post['telefon'] : set_value('telefon'); ?>">
            </div>
            <!-- /.input group -->
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <input type="submit" name="postSubmit" class="btn btn-primary" value="<?php echo $action; ?>">
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </section>
</div>
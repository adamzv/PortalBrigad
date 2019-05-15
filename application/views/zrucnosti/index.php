<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Zručnosti</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Domov</a></li>
            <li class="breadcrumb-item active">Zručnosti</li>
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
        <section class="col-lg-7 connectedSortable ui-sortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card card-primary card-outline">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">
                <i class="fa fa-book mr-1"></i>
                Zručnosti
              </h3>
              <!-- zmenit na button -->
              <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item">
                  <!-- zmenit na button -->
                  <a href="<?php echo site_url('zrucnosti/add/'); ?>" class="nav-link active">Pridať</a>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
              <div id="zrucnostiTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12"></div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="zrucnostiTable" class="table table-hover dataTable">
                      <thead>
                        <tr>
                          <th width="80%">Zručnosť</th>
                          <th width="20%">Akcie</th>
                        </tr>
                      </thead>
                      <tbody id="userData">
                        <?php if (!empty($zrucnosti)) : foreach ($zrucnosti as $zrucnost) : ?>
                            <tr>
                              <td><?php echo $zrucnost['zrucnost']; ?></td>
                              <td>
                                <a href="<?php echo site_url('zrucnost/delete/' . $zrucnost['idzrucnosti']); ?>" data-href="<?php echo site_url('zrucnosti/delete/' . $zrucnost['idzrucnosti']); ?>" class="fa fa-trash" data-toggle="modal" data-target="#deleteModal"></a>
                              </td>
                            </tr>
                          <?php endforeach;
                      else : ?>
                          <tr>
                            <td colspan="4">Žiadne zručnosti</td>
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
        </section>
        <section class="col-lg-5 connectedSortable ui-sortable">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Pridať zručnosť</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="form-zrucnosti" method="post">
              <div class="card-body">
                <div id="result">
                  <script>
                    document.addEventListener('DOMContentLoaded', () => {
                      if (localStorage.getItem('msg')) {
                        let msg = localStorage.getItem('msg');
                        let alert = document.createElement('div');
                        if (msg == "true") {
                          alert.setAttribute('class', 'alert alert-success');
                          alert.innerHTML = "Zručnosť bola pridaná.";
                        } else {
                          alert.setAttribute('class', 'alert alert-danger');
                          alert.innerHTML = "The zručnosť field is required.";
                        }
                        document.querySelector('#result').appendChild(alert);
                        localStorage.removeItem('msg');
                      }
                    })
                  </script>
                </div>
                <div class="form-group">
                  <label for="zrucnost">Zručnosť:</label>
                  <input type="text" class="form-control" id="zrucnost" name="zrucnost" placeholder="Zručnosť">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button id="zrucnosti-button" class="btn btn-primary">Pridať</button>
              </div>
            </form>
            <script>
              document.addEventListener('DOMContentLoaded', () => {

                document.querySelector('#zrucnosti-button').addEventListener('click', (e) => {
                  let zrucnost = document.querySelector('#zrucnost').value;
                  let formdata = new FormData();
                  formdata.append('zrucnost', zrucnost);
                  this.axios({
                      method: 'post',
                      url: '<?php echo site_url("zrucnosti/add/"); ?>',
                      data: formdata,
                      config: {
                        headers: {
                          'Content-Type': 'multipart/form-data'
                        }
                      }
                    })
                    .then(res => {
                      document.querySelector('#result').innerHTML = res.data;
                      console.log(res.data);
                      localStorage.setItem('msg', res.data);
                      return true;
                    })
                    .catch(err => {
                      console.log("Error");
                      console.log(err);
                    })
                });
              })
            </script>
          </div>
          <div class="card card-success card-outline">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">
                Zručnosti študentov
              </h3>
              <div class="card-tools p-1">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div id="graph">
                <script>
                  var bar = Morris.Bar({
                    element: 'graph',
                    resize: true,
                    data: <?php echo $graf; ?>,
                    xkey: 'zrucnost',
                    ykeys: ['pocet'],
                    labels: ['Počet'],
                    barColors: ['#28a745'],
                    hideHover: 'auto',
                  });
                </script>
              </div>
            </div>
            <!-- /.card-body -->
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
            Chcete vymazať zručnosť?
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
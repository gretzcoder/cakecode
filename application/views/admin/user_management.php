        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mb-4">All User</h1>
            <?php if ($this->session->flashdata()) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                User<strong> seccessful</strong> <?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <!-- /.container-fluid -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($alluser as $a) : ?>
                        <tr>
                          <td><?= $a['username'] ?></td>
                          <td><?= $a['email'] ?></td>
                          <td><?= $a['date_created'] ?></td>
                          <td><?php if ($a['role_id'] == 1) {
                                echo ('Admin');
                              } else {
                                echo ('Member');
                              }
                              ?></td>
                          <td>
                            <a data-toggle="modal" data-target="#logoutModal<?= $a['id'] ?>" href="#" class="badge badge-danger" data-toggle="tooltip" data-placement="bottom" title="Delete this account">Delete</a>
                          </td>
                        </tr>
                        <!-- Delete Modal-->
                        <div class="modal fade" id="logoutModal<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">Are you sure want to permanently delete this Account ?</div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="<?= base_url('admin/delete/') . $a['id'] ?>">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      <?php endforeach ?>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
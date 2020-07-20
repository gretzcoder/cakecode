        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="align-items-center justify-content-between mb-4">
                <div class="container" style="display: flex; justify-content: space-between;">
                    <h1 class="h3 mb-0 text-gray-800 mb-4">All Product</h1>
                    <a href="<?= base_url('admin/addproduct') ?>" data-toggle="tooltip" data-placement="bottom" title="Add new product"><i class="fas fa-plus-circle" style="font-size: 40px;"></i></a>
                </div>
                <?php if ($this->session->flashdata()) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('message'); ?>
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
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product as $p) : ?>
                                        <tr>
                                            <td>
                                                <img src="<?= base_url('assets/img/product/') . $p['photo'] ?>" class="img-thumbnail" width="100">
                                            </td>
                                            <td><?= $p['title'] ?></td>
                                            <td><?= $p['description'] ?></td>
                                            <td><?= $p['price'] ?></td>
                                            <td><?= $p['category'] ?></td>
                                            <td><?php if ($p['status'] == 1) {
                                                    echo ('publish');
                                                } else {
                                                    echo ('archive');
                                                }  ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/editproduct/') . $p['id'] ?>" class="badge badge-primary" data-toggle="tooltip" data-placement="bottom" title="Edit this product">Edit</a>
                                                <a data-toggle="modal" data-target="#deleteModal<?= $p['id'] ?>" href="#" class="badge badge-danger" data-toggle="tooltip" data-placement="bottom" title="Delete this product">Delete</a>
                                            </td>
                                            <!-- Delete Modal-->
                                            <div class="modal fade" id="deleteModal<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Are you sure want to permanently delete this Product ?</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <a class="btn btn-danger" href="<?= base_url('admin/deleteproduct/') . $p['id'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
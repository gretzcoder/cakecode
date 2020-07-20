      <!-- Begin Page Content -->
      <div class="container">
          <div class="row mx-auto">
              <div class="col-lg-8">
                  <?php if ($this->session->flashdata()) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?= $this->session->flashdata('message'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  <?php endif; ?>
                  <!-- Page Heading -->
                  <h1 class="h3 mb-3 text-gray-800">Add some Product</h1>

                  <?= form_open_multipart('admin/addProduct/'); ?>

                  <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                          <input type="title" name="title" class="form-control" id="title" value="<?= set_value('title'); ?>">
                          <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="description" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" id="description" rows="3" name="description"><?= set_value('description'); ?></textarea>
                          <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="price" class="col-sm-2 col-form-label">Price</label>
                      <div class="col-sm-10">
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">Rp</div>
                              </div>
                              <input type="number" class="form-control py-0" id="price" name="price" value="<?= set_value('price'); ?>">
                          </div>
                          <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label">Category</label>
                      <div class="col-sm-8 checkbox" style="display: flex; flex-direction: column;">
                          <?php foreach ($categories as $c) : ?>
                              <label for="<?= $c ?>">
                                  <input type="checkbox" name="category[]" value="<?= $c ?>" id="<?= $c ?>" />
                                  <span class="fake-input"></span>
                                  <span class="fake-label"><?= $c ?></span>
                              </label>
                          <?php endforeach ?>
                      </div>
                  </div>
                  <div class=" form-group row">
                      <label for="status" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                          <select class="form-control" name="status" id="status">>
                              <option value="0">Archive</option>
                              <option value="1" selected="selected">Publish</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Picture</label>
                      <div class="col-sm-3">
                          <img src="<?= base_url('assets/img/product/default.jpg') ?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-7">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="photo" name="photo">
                              <label class="custom-file-label" style="overflow: hidden; line-height: 29px;" for="photo">Choose file</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row justify-content-end mr-1 mt-10">
                      <button type="submit" class="btn btn-primary">Confirm</button>
                  </div>
                  </form>
              </div>
          </div>

      </div>
      <!-- /.container-fluid -->
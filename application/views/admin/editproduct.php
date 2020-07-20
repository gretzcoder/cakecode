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
                  <h1 class="h3 mb-3 text-gray-800">Edit Product</h1>

                  <?= form_open_multipart('admin/editProduct/' . $product['id']); ?>

                  <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                          <input type="title" name="title" class="form-control" id="title" value="<?php if (!empty(set_value('title'))) {
                                                                                                        echo (set_value('title'));
                                                                                                    } else {
                                                                                                        echo ($product['title']);
                                                                                                    } ?>">
                          <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="description" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" id="description" rows="3" name="description"><?php if (!empty(set_value('description'))) {
                                                                                                            echo (set_value('description'));
                                                                                                        } else {
                                                                                                            echo ($product['description']);
                                                                                                        } ?></textarea>
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
                              <input type="number" class="form-control py-0" id="price" name="price" value="<?php if (!empty(set_value('price'))) {
                                                                                                                echo (set_value('price'));
                                                                                                            } else {
                                                                                                                echo ($product['price']);
                                                                                                            } ?>">
                          </div>
                          <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label">Category</label>
                      <div class="col-sm-8 checkbox" style="display: flex; flex-direction: column;">
                          <?php foreach ($categories as $c) : ?>
                              <?php if (stripos(json_encode($category), $c)) : ?>
                                  <label for="<?= $c ?>">
                                      <input type="checkbox" name="category[]" value="<?= $c ?>" id="<?= $c ?>" checked />
                                      <span class="fake-input"></span>
                                      <span class="fake-label"><?= $c ?></span>
                                  </label>
                              <?php else : ?>
                                  <label for="<?= $c ?>">
                                      <input type="checkbox" name="category[]" value="<?= $c ?>" id="<?= $c ?>" />
                                      <span class="fake-input"></span>
                                      <span class="fake-label"><?= $c ?></span>
                                  </label>
                              <?php endif; ?>
                          <?php endforeach ?>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="status" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                          <select class="form-control" name="status" id="status">
                              <?php if ($product['status'] == 0) : ?>
                                  <option value="0" selected="selected">Archive</option>
                                  <option value="1">Publish</option>
                              <?php else : ?>
                                  <option value="0">Archive</option>
                                  <option value="1" selected="selected">Publish</option>
                              <?php endif; ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Picture</label>
                      <div class="col-sm-3">
                          <img src="<?= base_url('assets/img/product/') . $product['photo'] ?>" class="img-thumbnail">
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
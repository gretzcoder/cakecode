    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navigation">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('welcome'); ?>"><img src="<?= base_url('assets/img/logowhite4.png'); ?>" alt="CakeCode" height="50"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('main') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('main') ?>">Secret</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('main') ?>">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('main') ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <?php if (!empty($user)) : ?>
                            <div class="dropdown">
                                <a class="dropdown-toggle nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    hello, <strong><span style="text-transform : capitalize;"><?= $user['username'] ?></span></strong>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url('maintenance'); ?>">My Shopping Cart</a>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Sign out</a>
                                </div>
                            </div>
                        <?php else :  ?>
                            <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top: 60px; width:100vw">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-3" style="font-size: 40px">Search some cake</h1>
                <form class="form-group" id="form" action="<?= base_url('main/product') ?>" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="keyword" name="title" value="<?php if (!empty($search)) {
                                                                                                        echo ($search);
                                                                                                    } ?>" placeholder="Cake name..">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="search-button">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <nav class="nav nav-pills flex-column flex-sm-row mx-auto">
            <a class="flex-sm-fill text-sm-center nav-link btn-outline-success mr-1 <?php if ($category == 'best-seller') {
                                                                                        echo ('active');
                                                                                    } ?>" href="<?= base_url('main/product/best-seller') ?>">Best seller</a>
            <a class="flex-sm-fill text-sm-center nav-link btn-outline-success mr-1 <?php if ($category == 'cake') {
                                                                                        echo ('active');
                                                                                    } ?>" href="<?= base_url('main/product/cake') ?>">Cake</a>
            <a class="flex-sm-fill text-sm-center nav-link btn-outline-success mr-1 <?php if ($category == 'bread') {
                                                                                        echo ('active');
                                                                                    } ?>" href="<?= base_url('main/product/bread') ?>">Bread</a>
            <a class="flex-sm-fill text-sm-center nav-link btn-outline-success mr-1 <?php if ($category == 'snack') {
                                                                                        echo ('active');
                                                                                    } ?>" href="<?= base_url('main/product/snack') ?>">Snack</a>
        </nav>

        <hr style="border: solid #75ad0c 1px;">
        <?php if (!empty($search) && empty($product)) : ?>
            Results with '<strong><?= $search ?></strong>' keywords not found
        <?php endif; ?>
        <div class="row mt-2" id="output">
            <?php foreach ($product as $p) : ?>
                <div class="col-md-3 mb-3" style="text-align : center;">
                    <div class="card mb-3" style="height: 300px;">
                        <img src="<?= base_url('assets/img/product/') . $p['photo'] ?>" class="card-img-top" height="180" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: 600; font-size: 18px;"><?= $p['title'] ?></h5>
                        </div>
                        <button type="button" data-toggle="modal" data-target="#modalproduct<?= $p['id'] ?>" class="btn btn-success card-footer">See Detail</button>
                        <div id="modalproduct<?= $p['id'] ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="<?= base_url('assets/img/product/') . $p['photo'] ?>" class="img-fluid" alt="" />
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <h3><?= $p['title'] ?></h3>
                                                        </li>
                                                        <li class="list-group-item"><?= $p['description'] ?></li>
                                                        <li class="list-group-item"><del>IDR <?= number_format($p['price'] + ($p['price'] * 20 / 100), 0, ',', '.') ?></del><br>
                                                            <h4 class="d-inline font-weight-bold">IDR <?= number_format($p['price'], 0, ',', '.') ?></h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if (empty($user)) : ?>
                                            <button type="button" class="btn btn-success" onclick="window.location.href = '<?= base_url('auth') ?>';">Add to cart</button>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="chartSuccess();">Add to cart</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<div id="main">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navigation">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('welcome'); ?>"><img src="<?= base_url('assets/img/logowhite4.png'); ?>" alt="CakeCode" height="50"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#secret">Secret</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#location">Location</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>

          <?php if (!empty($user)) : ?>
            <li class="nav-item">
              <div class="dropdown">
                <a class="dropdown-toggle nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  hello, <strong><span style="text-transform : capitalize;"><?= $user['username'] ?></span></strong>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="<?= base_url('maintenance'); ?>">My Shopping Cart</a>
                  <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Sign out</a>
                </div>
              </div>
            </li>
          <?php else :  ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
            </li>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
  <div id="home">
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url('assets/img/kue1.jpg') ?>" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('assets/img/kue2.jpg') ?>" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('assets/img/kue3.jpg') ?>" alt="Third slide">
          </div>
        </div>
      </div>
      <h1>learn code with some cake</h1>
    </div>
  </div>

  <div class="secret" id="secret">
    <div class="container">
      <h1>why choose us</h1>
      <div class="rbulet">
        <div class="content">
          <img src="<?= base_url('assets/img/whychooseus1.jpg') ?>" height="200px" width="200px">
          <h4 class="mt-3">High Quality<br>Ingredients</h4>
        </div>
        <div class="content">
          <img src="<?= base_url('assets/img/whychooseus2.jpg') ?>" height="200px" width="200px">
          <h4 class="mt-3">With Special<br>Code Inside</h4>
        </div>
        <div class="content">
          <img src="<?= base_url('assets/img/whychooseus3.jpg') ?>" height="200px" width="200px">
          <h4 class="mt-3">Fresh Look<br>Form Us</h4>
        </div>
      </div>
      <div>
        <h2>CAKES ARE SPECIAL</h2>
        <h4>Every collaboration ends with something<br>sweet, a cake and people remember<br>its all about the memories</h4>
      </div>
    </div>
  </div>

  <div class="product" style="padding-top: 65px;" id="product">
    <div class="container">
      <h1 class="mb-3">our product</h1>
      <div style="display: flex; flex-direction:row; justify-content:space-between;">
        <h3 style=" font-weight: 600; border-bottom: solid #75ad0c 2px; width: 150px; color:#75ad0c;">Best Sellers</h3>
        <a href="<?= base_url('main/product/best-seller') ?>" style="text-decoration: none">
          <h4 style="text-align:right; font-weight: 600; border-bottom: solid #75ad0c 2px; width: 130px; color:#75ad0c;">See more<i class="fas fa-angle-double-right ml-2"></i></h4>
        </a>
      </div>
      <div class="row mt-2" id="output">
        <?php foreach ($product as $p) : ?>
          <div class="col-md-3 mb-3">
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
  </div>

  <div class="location" id="location">
    <div class="container">
      <h1>our location</h1>
      <div class="rbulet">
        <div class="content">
          <a href="https://www.google.com/maps/place/Jl.+Kemang+Sel.+No.7,+RT.4%2FRW.4,+Cilandak+Tim.,+Kec.+Ps.+Minggu,+Kota+Jakarta+Selatan,+Daerah+Khusus+Ibukota+Jakarta+12560/data=!4m2!3m1!1s0x2e69f220b4ee6ca9:0x11ba8f535bd68885?sa=X&ved=2ahUKEwiVrJve_tDmAhXZAnIKHQokAsAQ8gEwAHoECAoQAQ" target="_blank">
            <img src="<?= base_url('assets/img/kemang.jpg') ?>" height="200px" width="200px">
          </a>
          <h3>Kemang</h3>
          <h4>Jl. Kemang Selatan No.7<br>Jakarta Selatan</h4>
        </div>
        <div class="content">
          <a href="https://www.google.com/maps/place/Jl.+Abdul+Majid+Raya+No.7,+RT.11%2FRW.2,+Cipete+Sel.,+Kec.+Cilandak,+Kota+Jakarta+Selatan,+Daerah+Khusus+Ibukota+Jakarta+12410/data=!4m2!3m1!1s0x2e69f19963672919:0xcd87211d371cd5ef?sa=X&ved=2ahUKEwi5p6KC_9DmAhWXXisKHXTtBMcQ8gEwAHoECAsQAQ" target="_blank">
            <img src="<?= base_url('assets/img/pim.png') ?>" height="200px" width="200px">
          </a>
          <h3>Pondok Indah</h3>
          <h4>Jl. Raya Pondok Indah No.7<br>Jakarta Selatan</h4>
        </div>
        <div class="content">
          <a href="https://www.google.com/maps/place/Jl.+Ciputat+Raya+No.7,+Rempoa,+Kec.+Ciputat+Tim.,+Kota+Tangerang+Selatan,+Banten+15419/data=!4m2!3m1!1s0x2e69f02d8d7e7fd5:0x1d78f3297161bad7?sa=X&ved=2ahUKEwiqlfnA_9DmAhVHOSsKHcChA1QQ8gEwAHoECAsQAQ" target="_blank">
            <img src="<?= base_url('assets/img/ciputat.png') ?>" height="200px" width="200px">
          </a>
          <h3>Ciputat</h3>
          <h4>Jl. Ciputat Raya No.7<br>Tangerang Selatan</h4>
        </div>
      </div>
      <div>
        <h4>We Deliver to</h4>
        <h2>JABODETABEK</h2>
        <h4>same day delivery before 3pm<br>nextday delivery before 6pm<br>order up to 14 days in advance<br>store pickup available</h4>
        <h3>free delivery for Platinum Members & Orders over Rp.500.000*</h3>
      </div>
    </div>
  </div>

  <div class="about" id="about">
    <h1>About Us</h1>
    <div class="container">
      <div class="abtkiri">
        <img src="<?= base_url('assets/img/about.png') ?>" height="427px" width="533px">
      </div>
      <div class="abtkanan">
        <div class="company">
          <h4>the company</h4>
          <p>perusahaan yang berdiri pada tahun 2019 ini didirikan oleh sekelompok pemuda yang berprofesi sebagai programmer dan juga suka dengan kue. Inisiatifnya ini muncul ketika mereka sedang ngoding dan butuh kue secara cepat.</p>
        </div>
        <div class="creative">
          <h4>the creative</h4>
          <p>dibuat untuk memenuhi nilai kelompok pemrograman web I dengan kelompok sebagai berikut :</p>
          <ol style="font-family : century gothic; font-weight: bold;">
            <li>M. Iqbal Aifudin</li>
            <li>Ahmad Nurul Fiqri</li>
            <li>Ferdian Dwi. K</li>
            <li>Syafiq Khoiri. R</li>
            <li>Alfi Syahri. R</li>
          </ol>
        </div>
        Any question ? <a href="https://api.whatsapp.com/send?phone=6285893656332&text=&source=&data=" style="color: #99ca3c; text-decoration: none;" target="_blank"><strong> talk with us!</strong></a>
      </div>
    </div>
  </div>

</div>
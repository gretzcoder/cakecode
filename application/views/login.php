<body>
    <div class="loginwrapper">
        <div class="loginkiri">
            <a href="<?= base_url('main') ?>"><i class="fas fa-arrow-left fa-2x"></i></a>
        </div>
        <div class="loginkanan">
            <div class="loginlogo">
                <img src="<?= base_url('assets/img/cakecode.png') ?>" alt="logo" width="125">
            </div>
            <div class="loginform">
                <?= $this->session->flashdata('message'); ?>
                <h3>Sign In</h3>
                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email"  value="<?= set_value('email');?>" required>
                        <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password" required>
                        <?= form_error('password', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
                <h4>Need account ? <a href="<?= base_url('auth/signup') ?>">Sign up</a></h4>
            </div>
            <div class="loginsosmed2">
                Follow Us<br>
                <div class="loginsosmed" style="font-size: 0.5rem;">
                    <a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook-f fa-3x"></i></a>
                    <a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram fa-3x"></i></a>
                    <a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
                    <a href="http://www.youtube.com" target="_blank"><i class="fab fa-youtube fa-3x"></i></a>
                    <a href="http://www.whatsapp.com" target="_blank"><i class="fab fa-whatsapp fa-3x"></i></a>
                </div>
            </div>
        </div>
    </div>
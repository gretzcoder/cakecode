<body>
    <div class="loginwrapper">
        <div class="loginkiri">
            <a href="<?= base_url('main') ?>"><i class="fas fa-arrow-left fa-2x"></i></a>
        </div>
        <div class="loginkanan">
            <div class="loginlogo">
                <img src="<?= base_url('assets/img/cakecode.png') ?>" alt="logo" width="125">
            </div>
            <div class="loginform signupform">
                <?= $this->session->flashdata('message'); ?>
                <h3>Sign Up</h3>
                <form action="<?= base_url('auth/signup'); ?>" method="post">
                    <div class="form-group">
                        <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" name="username" value="<?= set_value('username'); ?>" required>
                        <?= form_error('username', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email" value="<?= set_value('email'); ?>" required>
                        <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password1" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="re-type password" name="password2" required>
                        <?= form_error('password2', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                    <button type="submit" name="registrasi" class="btn btn-primary">Submit</button>
                </form>
                <h4>Have an account ? <a href="<?= base_url('auth') ?>">Sign in</a></h4>
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
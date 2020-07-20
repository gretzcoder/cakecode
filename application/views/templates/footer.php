<div class="alert alert-success" role="alert" id="chart-alert" style="position: fixed; left: 50%; bottom: 30px; z-index: 100; transform: translate(-50%, -50%)">
    <strong>Success! </strong> Product have added to your chart.
</div>

<?php if (!empty($user) && $user['role_id'] == 1) : ?>
    <div id="hidden" style="position: fixed; bottom: 40px; left: 30px;">
        <a href="<?= base_url('admin/productmanagement') ?>" style="display: flex; align-items:center;">
            <i class="fas fa-undo-alt fa-2x"></i><span style="margin-left: 5px;">Back to admin page</span>
        </a>
    </div>
<?php endif; ?>

<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.4.1.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/script.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/fontawesome/all.min.js'); ?>"></script>
</body>

</html>
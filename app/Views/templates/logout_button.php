<form action="<?= base_url('logout') ?>" method="POST">
    <?= csrf_field() ?>
    <button type="submit">Logout</button>
</form>
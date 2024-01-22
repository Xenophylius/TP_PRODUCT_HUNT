<?php if (!empty($_GET['success'])) {?>
    <div class="alert alert-success text-center alert-dismissible fade show" id="slide" role="alert"><i class="fa-solid fa-bell fa-shake fa-lg mx-3"></i>
        <?= $_GET['success'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php if (!empty($_GET['error'])) {?>
    <div class="alert alert-danger text-center alert-dismissible fade show" id="slide" role="alert"><i class="fa-solid fa-bell fa-shake fa-lg mx-3"></i>
        <?= $_GET['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
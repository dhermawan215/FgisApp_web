<div class="col-md-12">
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('berhasil') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('gagal') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif ?>
    <?php if (session()->getFlashdata('info')) : ?>
        <div class="alert alert-info" role="alert">
            <?= session()->getFlashdata('info') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif ?>
</div>
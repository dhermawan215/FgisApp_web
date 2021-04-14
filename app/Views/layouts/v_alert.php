<?php

$success = $this->session->flashdata('success');
$danger = $this->session->flashdata('danger');

if ($success) {
    $class = 'success';
    $status = 'Sukses!';
    $message = $success;
}

if ($danger) {
    $class = 'danger';
    $status = 'Gagal!';
    $message = $danger;
}
?>

<div class="alert alert-<?= $class ?> alert-dismissible fade show" role="alert">
    <strong><?= $status ?></strong> <?= $message ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
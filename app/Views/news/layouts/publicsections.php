
<?= $this->extend('news/publicview') ?>


<?= $this->section('nav') ?> 

    <?=$this->include("news/layouts/navigation/navbar") ?>

<?= $this->endSection() ?>


<?= $this->section('footer') ?> 

    <?=$this->include("news/layouts/footer/footer") ?>

<?= $this->endSection() ?>

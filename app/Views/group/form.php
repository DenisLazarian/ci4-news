<?= $this->extend('layouts/form') ?>


<?= $this->section('edit-group') ?> 


    <h3><?=$title; ?></h3>
    <?php if($controller == 'edit-group'){ ?>
    
        <?=csrf_field(); ?>    
    <form action="<?=base_url()?>/group/update/<?=$group['id']?>" method="post" class="mt-5">
    <div class="mb-3">
            <label for="name" class="fw-bold form-label txt-bolt">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$group['name']?>">
        </div>
        <div class="mb-3">
            <label for="description" class=" fw-bold form-label">Descripció</label>
            <input type="text" class="form-control" id="description" name="description" value="<?=$group['description']?>">
        </div>
        <!-- <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="text" class="form-control" id="id" name="id" value="<?=$group['id']?>" readonly>
        </div> -->
        <button type="submit" class="mt-4 btn btn-danger w-100">Guardar</button>
    </form>
    <?php } ?>




<?= $this->endSection() ?>

<?= $this->section('create-group') ?> 


    <h3><?=$title; ?></h3>

    <form action="<?=base_url()?>/group/insert" method="post" class="mt-5">
    <?=csrf_field(); ?>    
    <div class="mb-3">
            <label for="name" class="fw-bold form-label txt-bolt">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="">
        </div>
        <div class="mb-3">
            <label for="description" class=" fw-bold form-label">Descripció</label>
            <input type="text" class="form-control" id="description" name="description" value="">
        </div>
        <!-- <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="text" class="form-control" id="id" name="id" value="" readonly>
        </div> -->
        <button type="submit" class="mt-4 btn btn-danger w-100">Guardar</button>
    </form>

    




<?= $this->endSection() ?>





<?= $this->extend('layouts/listColumn') ?>


<?= $this->section('navigation') ?> 
    `<?=$this->include('Views/templates/navigation/navbar'); ?>
<?= $this->endSection() ?>


<?= $this->section('content') ?> 

<h1>Pagina privada</h1>
<p>Bienvenido a tu pagina privada <?=$_SESSION['name']; ?></p>

<?= $this->endSection() ?>

<?= $this->section('footer') ?> 

    <?= $this->include('templates/footer/footer') ?>
<?= $this->endSection() ?>


<?= $this->section('list-users') ?>     

    <a href="#" class="btn btn-success" type="button">Añadir usuario</a>


    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>id</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Group</th>
                <th>Acciones</th>
            </tr>        
        </thead>
        <tbody>
            <?php for($i = 0; $i< count($users) ; $i++){ ?>
            
            <tr>
                <td><?=$users[$i]['id']; ?></td>
                <td><?=$users[$i]['username']; ?></td>
                <td><?=$users[$i]['name']; ?></td>
                <td><?=$users[$i]['email']; ?></td>
                <td><?=$users[$i]['group'][0]['name']; ?></td>
                <td>
                    <a href="<?=base_url()."user/edit/".$users[$i]['id']; ?>" class="btn btn-primary" >Editar</a>
                    <a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModId<?=$i; ?>">Eliminar</a>
                </td>

            </tr>


            
            
            <?php } ?>
            
        </tbody>


    </table>
    
    <?php for($i = 0; $i< count($users) ; $i++){ ?>

        <div class="modal fade" id="delModId<?=$i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Estas segur de que vols borrar l'usuari <strong><?=$users[$i]['username']; ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="<?=base_url()."user/delete/".$users[$i]['id']; ?>" method="post">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    <?php } ?>



<?= $this->endSection() ?>





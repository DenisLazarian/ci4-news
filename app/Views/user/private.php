



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

    <a href="<?=base_url()."user/add"; ?>" class="btn btn-success" type="button">Añadir usuario</a>

    <?php if($_SESSION['add'] ?? false){

        echo "<div class='mt-3 alert alert-info'><i class='bi bi-info-circle'></i> ";
        echo $_SESSION['add'];
        echo "</div>";

    } ?>
    <?php if($_SESSION['updated'] ?? false){

        echo "<div class='mt-3 alert alert-info '><i class='bi bi-info-circle'></i> ";
        echo $_SESSION['updated'];
        echo "</div>";

    } ?>
    <?php if($_SESSION['deleted'] ?? false){

        echo "<div class='mt-3 alert alert-info'> <i class='bi bi-info-circle'></i> ";
        echo $_SESSION['deleted'];
        echo "</div>";

    } ?>

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

                    <?php 
                    if(!(session()->get('id') == $users[$i]['id'])){  // un usuari no pot eliminarse a si mateix?>
                        <a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModId<?=$i; ?>">Eliminar</a>
                    
                    <?php 
                    } ?>
                        
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar usuari</h1>
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


    <?=$pager->simpleLinks('default','daw_template'); ?>




<?= $this->endSection() ?>





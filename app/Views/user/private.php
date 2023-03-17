



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
                    <a href="edit/<?=$users[$i]['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="delete/<?=$users[$i]['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>

            </tr>
            
            
            <?php } ?>
            
        </tbody>


    </table>

<?= $this->endSection() ?>





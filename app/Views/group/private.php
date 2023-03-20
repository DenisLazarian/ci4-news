<?= $this->extend('layouts/listcolumn') ?>


<?= $this->section('list-groups') ?> 

    <a href="<?=base_url()."group/add"; ?>" class="btn btn-success"> Afegir grup</a>

    <table class="table table-striped mt-4">
        <thead >
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Decripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php 
            for ($i=0; $i < count($groups); $i++) { 
                echo "<tr>";
                echo "<td>".$groups[$i]['id']."</td>";
                echo "<td>".$groups[$i]['name']."</td>";
                echo "<td>".$groups[$i]['description']."</td>";
                echo "<td>";
                echo "<a href='".base_url()."/group/edit/".$groups[$i]['id']."' class='me-1 btn btn-warning'>Editar</a>";
                echo "<a  data-bs-toggle='modal' data-bs-target='#delete-group-".$groups[$i]['id']."'  href='#' class='btn btn-danger'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            
        </tbody>
    </table>

    <?=$pager->simpleLinks('default','daw_template'); ?>

    <?php   
    for ($i=0; $i < count($groups); $i++) { ?>
    
    <div class="modal fade" id="delete-group-<?=$groups[$i]['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Grup</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Estas segur de que vols borrar el grup <strong><?=$groups[$i]['name']; ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="<?=base_url()."/group/delete/".$groups[$i]['id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    
    <?php }?>
    


<?= $this->endSection() ?>





<?= $this->section('navigation') ?> 
    `<?=$this->include('Views/templates/navigation/navbar'); ?>
<?= $this->endSection() ?>

<?= $this->section('footer') ?> 

    <?= $this->include('templates/footer/footer') ?>
<?= $this->endSection() ?>
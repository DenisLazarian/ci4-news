<?= $this->extend('layouts/listcolumn') ?>





<?= $this->section('navigation') ?> 
    <?= $this->include('templates/navigation/navbar') ?>
<?= $this->endSection() ?>



<?= $this->section('footer') ?> 
    <?= $this->include('templates/footer/footer') ?>


<?= $this->endSection() ?>



<?= $this->section('paginator') ?> 
        <?=$pager->simpleLinks('default','daw_template'); ?>
<?= $this->endSection() ?>



<?= $this->section('table-rows-tbody-list') ?> 

    <?php foreach ($news as $new): ?>
        <tr>
            <td><?=$new['id']; ?></td>
            <td><?=$new['titol']; ?></td>
            <td><?=$new['text']; ?></td>
            <td><?=$new['data_publicacio']; ?></td>
            <td><?=$new['state']; ?></td>
            <td>
                <a href="<?=base_url('show/'.$new['url']); ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                <a href="#" id="button-edit-<?=$new['id']; ?>" data-bs-toggle="modal" data-bs-target="#editModalFor<?=($new['id']) ?>" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="#" id="button-delete-<?=$new['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteModalFor<?=($new['id']) ?>" role="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
        </tr>




        <?= $this->renderSection('delete-modal') ?>





        <?= $this->section('delete-modal') ?> 


        <!-- Delete Modal -->
        <div class="modal fade text-left" id="deleteModalFor<?=$new['id']; ?>" tabindex="-1" aria-labelledby="deleteModalFor<?=$new['id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalFor<?=$new['id'] ?>"> Eliminar noticia </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esteu segur que voleu eliminar l'article?
                    <br>
                    <br>

                    <p>titol: <strong>"<?=$new['titol']; ?>"</strong> </p>
                </div>
                
                <div class="modal-footer">
                    <a type="button" class="text-secondary me-3" data-bs-dismiss="modal">Cancelar</a>
                    <form action="<?=base_url("delete/".$new['id']) ?>" method="POST">
                    <?= csrf_field() ?>
                    
                        <input type="hidden" name="place" value="table_list">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i> Eliminar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <!-- fin delete modal -->



        <?= $this->endSection() ?>


        <?= $this->renderSection('edit-modal') ?>


        <?= $this->section('edit-modal') ?> 
        <!-- edit Modal -->
        <div class="modal fade text-left modal-xl" id="editModalFor<?=$new['id']; ?>" tabindex="-1" aria-labelledby="editModalFor<?=$new['id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalFor<?=$new['id']; ?>">Editar noticia </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formEdit<?=$new['id']; ?>" action="<?=base_url("edit/".$new['id'].""); ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="modal-body">
                            
                            <div class="mb-3">
                                <label for="editTitle" class="form-label text-bold"><strong>Titular</strong> </label>
                                <input name="editTitle" type="text" value="<?=$new['titol'] ?>" class="form-control" id="editTitle<?=$new['id'] ?>" placeholder="Greu accident a...">
                            </div>
                            <div class="mb-3">
                                <label for="text-edit" class="form-label text-bold"><strong>Cos de l'article</strong> </label>
                                <textarea name="editText" type="text" value="<?=$new['text']."hola" ?>" class="form-control" id="text-edit<?=$new['id'] ?>" rows="4" placeholder="La artista hispano-cubana ganó la anterior edición con..."></textarea>
                            </div>
                            <input type="hidden" name="place" value="table_list">
                            
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="text-secondary me-3" data-bs-dismiss="modal">Cancelar</a>

                            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div>
<!-- fin edit modal -->
<?= $this->endSection() ?>

    <?php endforeach; ?>




<?= $this->endSection() ?>


<?= $this->section('bootstrap-links-CDN') ?> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<?= $this->endSection() ?>




<?= $this->section('modal-add-new') ?> 
<!--Modal for add new -->

<div class="modal fade text-left modal-xl" id="AddModal" tabindex="-1" aria-labelledby="AddModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AddModal">Afegir noticia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url("create"); ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    
                <div class="mb-3">
                    <label for="title" class="form-label "> <strong>Titular </strong> </label>
                    <input name="articleTitle" type="text" class="form-control" id="title" placeholder="Greu accident a...">
                </div>
                <div class="mb-3">
                    <label for="text-article" class="form-label "> <strong> Cos de l'article</strong> </label>
                    <textarea name="articleText" class="form-control" id="text-article" rows="3" placeholder="La artista hispano-cubana ganó la anterior edición con..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="text-article" class="form-label "> <strong>Data publicació </strong> </label> <a role="button" data-bs-toggle="collapse" class="text-primary" data-bs-target="#collapseInfo" aria-expanded="false" aria-controls="collapseInfo"><i class="bi bi-patch-question-fill"></i></a>
                    <div class="collapse" id="collapseInfo">
                        <div class="alert alert-primary">
                            <i class="bi bi-info-circle-fill"></i> Podeu programar una data de publicació posterior, heu de tenir en compte que l'article no es publicara fins que arribi aquesta data. Si no especifiqueu cap data, l'article es publicara a l'instant.
                        </div>

                    </div>
                    <div>
                        <input class="form-control mx-w-8" type="date" name="publish-date" id="date">
                    </div>
                </div>
                <input type="hidden" name="place" value="table_list">
                </div>
                <div class="modal-footer">
                    <a type="button" class="text-secondary me-3" data-bs-dismiss="modal">Cancelar</a>

                    <button type="submit" class="btn btn-primary">Afegir</button>

                </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
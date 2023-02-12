
<?= $this->extend('news/list') ?>





<?= $this->section('navigation') ?> 
    <?= $this->include('news/layouts/navigation/navbar') ?>
<?= $this->endSection() ?>



<?= $this->section('footer') ?> 
    <?= $this->include('news/layouts/footer/footer') ?>


<?= $this->endSection() ?>


<?= $this->section('cards-list') ?> 

<?php
    for ($i=0; $i < count($news); $i++) { // FOR "list news" ?>
    
    <?= $this->renderSection('list-of-news') ?>
    
    <?= $this->renderSection('delete-modal') ?>

    <?= $this->renderSection('edit-modal') ?>

    <?= $this->renderSection('js-script') ?>



<?= $this->section('list-of-news') ?> 
<div class="card mt-5">
    <div class="card-header" style="background-color:<?= $news[$i]['color']?>">
        &nbsp;<?=$news[$i]['state']?>
    </div>
    <div class="card-body" >
        <h5 class="card-title">
            <?php 
            echo $news[$i]['titol'];
            ?>
        </h5>
        <small class="text-muted"> <?=str_contains($news[$i]['state'], 'Publicat') ? "Publicat el" : "Es publicarà el"; ?>  <?=$news[$i]['data_publicacio'] ?>h</small>
        <p class="card-text mt-2" style="max-height:70px; overflow:auto">
            <?= $news[$i]["text"]; ?>
            
        </p>
        <a href="<?= base_url("show/".$news[$i]["url"]); ?>" class="btn btn-warning"><i class="bi bi-search"></i> Mostrar article</a>

    </div>
    <div class="card-footer  text-end ">
        
        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModalFor<?=($news[$i]['id']) ?>" class='text-secondary me-3'>Eliminar</a>
        
        <a href="#" data-bs-toggle='modal' data-bs-target="#editModalFor<?=$news[$i]['id'] ?>" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i> Editar</a>
    </div>
</div>        
<?= $this->endSection() ?>


<?= $this->section('js-script') ?> 
    <script>    // per establir al value el text guardat en db per mitja de un script.
        var textArea<?=$news[$i]['id'] ?> = document.getElementById("text-edit<?=$news[$i]['id'] ?>");
        textArea<?=$news[$i]['id'] ?>.value = '<?=$news[$i]['text'] ?>';
    </script>
<?= $this->endSection() ?>




<?= $this->section('delete-modal') ?> 
<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteModalFor<?=$news[$i]['id']; ?>" tabindex="-1" aria-labelledby="deleteModalFor<?=$news[$i]['id']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalFor<?=$news[$i]['id'] ?>"> Eliminar noticia </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Esteu segur que voleu eliminar l'article?
            <br>
            <br>

            <p>titol: <strong>"<?=$news[$i]['titol']; ?>"</strong> </p>
        </div>
        <div class="modal-footer">
            <a type="button" class="text-secondary me-3" data-bs-dismiss="modal">Cancelar</a>
            <form action="<?=base_url("delete/".$news[$i]['id']) ?>" method="POST">
                <?= csrf_field() ?>

                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i> Eliminar</button>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- fin delete modal -->

<?= $this->endSection() ?>


<?= $this->section('edit-modal') ?> 
 <!-- edit Modal -->
 <div class="modal fade text-left modal-xl" id="editModalFor<?=$news[$i]['id']; ?>" tabindex="-1" aria-labelledby="editModalFor<?=$news[$i]['id']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalFor<?=$news[$i]['id']; ?>">Editar noticia </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url("edit/".$news[$i]['id'].""); ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    
                    <div class="mb-3">
                        <label for="editTitle" class="form-label text-bold"><strong>Titular</strong> </label>
                        <input name="editTitle" type="text" value="<?=$news[$i]['titol'] ?>" class="form-control" id="editTitle<?=$news[$i]['id'] ?>" placeholder="Greu accident a...">
                    </div>
                    <div class="mb-3">
                        <label for="text-edit" class="form-label text-bold"><strong>Cos de l'article</strong> </label>
                        <textarea name="editText" type="text" value="<?=$news[$i]['text']."hola" ?>" class="form-control" id="text-edit<?=$news[$i]['id'] ?>" rows="4" placeholder="La artista hispano-cubana ganó la anterior edición con..."></textarea>
                    </div>
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
    <?php } // fin FOR "list news" ?>

<?= $this->endSection() ?>




<?= $this->section('modal-add-news') ?> 
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



<?= $this->section('bootstrap-links-CDN') ?> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<?= $this->endSection() ?>



<?= $this->section('bootstrap-scrips-CDN') ?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<?= $this->endSection() ?>





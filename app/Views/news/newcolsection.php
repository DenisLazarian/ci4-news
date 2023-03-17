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



<?= $this->section('table-rows-list') ?> 

            <h1 class=" mb-5"><?=$title; ?></h1>
                <!-- <?= session()->getFlashdata('flash-message') ?> -->
                <!-- <?= session()->getFlashdata('flash-message-validation') ?> -->

                <?php 
                if(isset($_SESSION['flash-message'])){
                    echo "<div class='alert alert-primary'><i class='bi bi-check-circle-fill'></i> ".$_SESSION['flash-message']."</div>";
                }
                if(isset($_SESSION['flash-message-validation-1']) && isset($_SESSION['flash-message-validation-2'] )){

                    echo "<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill' style='display:inline-block'></i> <h4 style='display:inline-block'>Error</h4><br> ".$_SESSION['flash-message-validation-1']."</br>".$_SESSION['flash-message-validation-2']."</div>";


                }elseif(isset($_SESSION['flash-message-validation-1']) || isset($_SESSION['flash-message-validation-2'])){
                    
                    echo "<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill' style='display:inline-block'></i> <h3 style='display:inline-block'>Error</h3><br> ".($_SESSION['flash-message-validation-1']??$_SESSION['flash-message-validation-2'])."</div>";
                }

                if(isset($_SESSION['error'])){
                
                echo "<div class='alert alert-danger'> ".$_SESSION['error'] ."</div>";
                }
                ?>

                
                
                <div class="text-right">
                    <a type="button" href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="bi bi-plus-circle"></i> Nou article</a>
                </div>

               
                <table class="table table-striped mt-5">
                    <thead>
                        <tr><th>  Id                
                            <?php if ($orderby== 'id' && $direction == 'asc'):  ?>
                            <a href="<?= base_url('listCol?orderBy=id&direction=desc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-numeric-down"></i></a>
                            <?php  else: ?>
                                <a href="<?= base_url('listCol?orderBy=id&direction=asc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-numeric-up"></i></a> 
                            <?php endif; ?>
                            </th>
                            
                            <th>  Titol             
                            <?php if ($orderby== 'titol' && $direction == 'asc'):  ?>
                            <a href="<?= base_url('listCol?orderBy=titol&direction=desc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-alpha-up"></i></a>
                            <?php  else: ?>
                                <a href="<?= base_url('listCol?orderBy=titol&direction=asc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-alpha-down"></i></a>
                            <?php endif; ?>
                            </th>

                            <th> Contingut          
                                <?php if ($orderby== 'text' && $direction == 'asc'):  ?>
                                <a href="<?= base_url('listCol?orderBy=text&direction=desc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-alpha-up"></i></a>
                                <?php  else: ?>
                                    <a href="<?= base_url('listCol?orderBy=text&direction=asc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-alpha-down"></i></a>
                                <?php endif; ?>
                            
                            </th>
                            
                            <th>Data de publicació  
                            <?php if ($orderby== 'data_publicacio' && $direction == 'asc'):  ?>
                            <a href="<?= base_url('listCol?orderBy=data_publicacio&direction=desc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-numeric-down"></i></a>
                            <?php  else: ?>
                                <a href="<?= base_url('listCol?orderBy=data_publicacio&direction=asc&page='.$pager->getCurrentPage()); ?>"><i class="bi bi-sort-numeric-up"></i></a> 
                            <?php endif; ?>
                            </th>
                            
                            <th>Estat de la noticias</th>
                            <th>Accions</th>
                        </tr>
                    </thead>


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

    </table>
                
                

                <?= $this->renderSection('modal-add-new') ?>
                


                <?= $this->renderSection('paginator') ?>


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
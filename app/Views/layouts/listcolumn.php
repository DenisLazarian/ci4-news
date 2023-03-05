<html>
    <head>
        <title>Lista de noticias version columnas</title>
        <?= $this->renderSection('bootstrap-links-CDN') ?>
        
    </head>
    <body>
   


    <?= $this->renderSection('navigation') ?>


    <main class="m-sm-5">
        <div class="m-sm-5">
            <div class="m-sm-5">


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

                    <?= $this->renderSection('table-rows-tbody-list') ?>
                </table>
                
                

                <?= $this->renderSection('modal-add-new') ?>
                


                <?= $this->renderSection('paginator') ?>
            </div>
        </div>
            
            
            
    </main>
    


    <?= $this->renderSection('footer') ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    

    </body>
</html>
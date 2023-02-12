<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $this->renderSection('bootstrap-links-CDN') ?>
</head>
<body>
   
    <?= $this->renderSection('navigation') ?>

    
    <main class="m-sm-5">
        <div class="m-sm-5">
            <div class="m-sm-5">


                <h1 class=" mb-5">Gestió de noticias</h1>
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

                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="bi bi-plus-circle"></i> Nou article</a>
                </div>
                
                <?= $this->renderSection('cards-list') ?>

                <?= $this->renderSection('modal-add-news') ?>
            </div>
        </div>
            
            
            
    </main>
    
    
    
    
    <?= $this->renderSection('footer'); ?>

    
    
    <?= $this->renderSection('bootstrap-scrips-CDN') ?>

</body>
</html>
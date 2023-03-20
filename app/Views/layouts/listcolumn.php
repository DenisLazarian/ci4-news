<html>
    <head>
        <title>Lista de noticias version columnas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
    </head>
    <body>
   


    <?= $this->renderSection('navigation') ?>

    <main class="m-sm-5">
        <div class="m-sm-5">
            <div class="m-sm-5">
                <!-- <p><?=$controller; ?></p> -->
                <?php if(session()->getFlashdata('error') ?? false){
                    echo "<div class='alert alert-danger'> ".$_SESSION['error'] ."</div>";
                } ?>
                <?= $this->renderSection($controller) ?>
            </div>
        </div>
    </main>
    


    <?= $this->renderSection('footer') ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    

    </body>
</html>
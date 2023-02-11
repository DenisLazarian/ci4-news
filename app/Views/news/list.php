<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
   
    <nav class="navbar navbar-expand-lg bg-light ">
        <div class="container-fluid me-5 ms-5">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    
                </ul>
                <div>
                <li class="nav-item dropdown list-unstyled">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Perfil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Iniciar sessió</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Registrarse</a></li>
                    </ul>
                </li>


                </div>
            </div>
        </div>
    </nav>

    
    <main class="m-sm-5">
        <div class="m-sm-5">
            <div class="m-sm-5">


                <h1 class=" mb-5">Gestió de noticias</h1>
                <?= session()->getFlashdata('error') ?>

                <?php 
                if(isset($_SESSION['flash-message'])){
                    echo "<div class='alert alert-primary'><i class='bi bi-check-circle-fill'></i> ".$_SESSION['flash-message']."</div>";
                };
                ?>
                

                <div class="text-right">

                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="bi bi-plus-circle"></i> Nou article</a>
                </div>
                    <?php

                    
                    
                    for ($i=0; $i < count($news); $i++) { // FOR "list news" ?>
                    
                    <div class="card mt-5">
                        <div class="card-header" style="background-color:<?= $news[$i]['color']?>">
                            &nbsp;<?=$news[$i]['state']?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php 
                                echo $news[$i]['titol'];
                                ?>
                            </h5>
                            <small class="text-muted"> <?=str_contains($news[$i]['state'], 'Publicat') ? "Publicat el" : "Es publicarà el"; ?>  <?=$news[$i]['data_publicacio'] ?>h</small>
                            <p class="card-text mt-2">
                                <?= $news[$i]["text"]; ?>
                                
                            </p>
                            <a href="<?= base_url("show/".$news[$i]["url"]); ?>" class="btn btn-warning"><i class="bi bi-search"></i> Mostrar article</a>

                        </div>
                        <div class="card-footer  text-end ">
                            
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModalFor<?=($news[$i]['id']) ?>" class='text-secondary me-3'>Eliminar</a>
                            
                            <a href="#" data-bs-toggle='modal' data-bs-target="#editModalFor<?=$news[$i]['id'] ?>" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i> Editar</a>
                        </div>
                    </div>        
                    
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

                    <script>    // per establir al value el text guardat en db per mitja de un script.
                        var textArea<?=$news[$i]['id'] ?> = document.getElementById("text-edit<?=$news[$i]['id'] ?>");
                        textArea<?=$news[$i]['id'] ?>.value = '<?=$news[$i]['text'] ?>';
                    </script>

                    
                    <?php } // fin FOR "list news" ?>
                    
                </div>

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
                
        </div>
            
            
            
    </main>
    
    
    
    
    <?= $this->renderSection('footer'); ?>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
</body>
</html>
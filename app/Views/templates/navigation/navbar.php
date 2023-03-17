<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<nav class="navbar navbar-expand-lg bg-light "> 
        <div class="container-fluid me-5 ms-5">
            <a class="navbar-brand" href="<?=base_url("public"); ?>">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=base_url("public"); ?>">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li> -->


                    <!-- <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestió de noticies
                        </a>
                        <ul class="dropdow-menu">
                            <li class="">   
                                <a class="nav-link dropdown-item" href="<?=base_url("list"); ?>" >Gestió versió amb cel·les</a>
                            </li>
                            <li class="">
                                <a class="nav-link dropdown-item" href="<?=base_url("listCol"); ?>">Gestió de versió en columnes</a>
                            </li>
    
                        </ul>
                    </div> -->
                    <div class="dropdown nav-item">
                        <a class="btn btn-light dropdown-toggle mt-1" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestió de noticies
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?=base_url("list"); ?>">Gestió versió amb cel·les</a></li>
                            <li><a class="dropdown-item" href="<?=base_url("listCol"); ?>">Gestió versió en columnes</a></li>
                        </ul>
                    </div>
                    
                    <div class="dropdown nav-item">
                        <a class="btn btn-light dropdown-toggle mt-1" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestió administratives
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?=base_url("user/list"); ?>">Gestió usuaris</a></li>
                            <!-- <li><a class="dropdown-item" href="<?=base_url("listCol"); ?>">Gestió versió en columnes</a></li> -->
                        </ul>
                    </div>
                    
                </ul>
                <!-- <form action="<?=base_url('list'); ?>" method="GET" class="d-flex me-5" role="search">
                    <input class="form-control me-2" name="buscar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <div class="me-5 bg bg-light pt-100 ps-2  border-secondary border-start border-end pe-2">
                    <div class="d-flex gap-2 ">
                        <div class="">
                            <?=$_SESSION['captcha'] ?? '<i class="bi bi-person-circle"></i>'; ?>
                        </div>
                        <div class="">
                            <span><?=($_SESSION['name'])?? ('not logged'); ?></span>
                            <br>
                            <small style="color:#686767"><?=$_SESSION['group'] ?? "non group"; ?></small>
                        </div>
                    </div>
                </div>

                
                
                
                <div>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                    
                                <?= !isset($_SESSION['loggedIn']) ?('<a class="dropdown-item" href="user/login">Iniciar sessió</a>') : '<a class="dropdown-item" href="user/change-pass">Canviar contraseña</a>' ?>

                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <?=
                                    !isset($_SESSION['loggedIn']) ?('<a class="dropdown-item" href="user/register">Registrar-se</a>') : '<a class="dropdown-item" href="user/logout">Tancar sessió</a>'
                                ?>
                            
                                
                                
                            
                            </li>
                        </ul>
                    </li>

                </div>
            </div>
        </div>
    </nav>
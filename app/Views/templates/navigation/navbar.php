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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("list"); ?>">Gestió de noticies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("listCol"); ?>">Gestió de noticies en columnes</a>
                    </li>
                    
                </ul>
                <!-- <form action="<?=base_url('list'); ?>" method="GET" class="d-flex me-5" role="search">
                    <input class="form-control me-2" name="buscar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <div>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Iniciar sessió</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Registrar-se</a></li>
                        </ul>
                    </li>

                </div>
            </div>
        </div>
    </nav>
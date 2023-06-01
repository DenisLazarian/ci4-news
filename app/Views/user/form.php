<?= $this->extend('layouts/form') ?>




<?= $this->section('contact')  // formulario de contacto ?>  

            <a href="<?=base_url().'public'; ?>" class="btn btn-light"> <i class="bi bi-arrow-left"></i> Tornar</a>
            <h2 class="mb-4 pt-4">  
                Formulari amb estils
            </h2>
        
            <div>
                <div class="alert alert-info">
                    <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  L'asterisco (<span class="text-danger">*</span>) indica els camps obligatoris. </p>     
                </div>

            </div>
            
            <br>
            <form action="<?=base_url()."user/message-contact"; ?>" method="POST">
                <?= csrf_field() ?>
            
                <div>
                    <!-- Els placeholders són textos que es mostren dins dels camps de text per ajudar a l'usuari a saber què ha d'introduir, serveix com una ajuda pero no substirueix la etiqueta <label> per a les persones amb discapacitat visual. Tecnica: G131 de la normativa WCAG 2.0 -->
                    <label class="form-label fw-bold" for="no-cognom">Nom i cognom: </label> <span class="text-danger"></span> 
                    <input class="form-control" name="nom-cognom" id="nom-cognom" value="<?=$_SESSION['name'] ?? ""; ?>" type="text" placeholder="Federico Monteros...">
                </div>
                <div>
                    <!-- Establim un contrast alt per diferenciar els camps de text del fons. Tecnica: G17 de la normativa WCAG 2.0 -->
                    <!-- els name dels input sera el mateix que el id del inputs a recomanació de la W3C  -->
                    <label class="form-label fw-bold mt-3" for="email">Correu: </label><span class="text-danger">*</span>
                    <input class="form-control" name="email" id="Correu" value="<?=$_SESSION['email'] ?? ""; ?>" type="text" placeholder="mfederico@example.com">
                </div>
                <div> </div>
                <div>
                    <label class="form-label fw-bold mt-3" for="Assumpte">Assumpte: <span class="text-danger">*</span></label>
                    <input class="form-control" id="Assumpte" name="Assumpte" type="text" placeholder="En relació a l'ús de...">
                </div>
                <div class="form-floating mt-4">
                    <textarea class="form-control" cols="90" placeholder="Leave a comment here" name="floatingTextarea" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea" class="text-secondary">Missatge <span class="text-danger">*</span></label>
                </div>
                <div class="input-group mb-3 mt-3">
                    <div class="mb-3 form-check">
                        <input name="confirm" type="checkbox" class="form-check-input" id="confirm">
                        <!-- Lo ideal es subratllar els texts dels enllaços per diferenciar-los del text normal, que es una ajuda per a les persones amb daltonisme. Tecnica: G183 de la normaitva WCAG 2.0 -->
                        <label class="form-check-label" for="confirm">Estic d'actord amb les </label> <a href="#" class="link text-danger"> polítiques de privacitat </a> <span class="text-danger">*</span>.
                    </div>
                </div>
                <div class="text-center mb-4">
                    <!-- <img  style="height:130px;"  src="https://www.pandasecurity.com/es/mediacenter/src/uploads/2014/09/evitar-captcha.jpg"  alt="Imagen captcha" title="Se trata de una imagen captcha"> -->
                    <?=$captcha ?? ""; ?>
                </div>
                <div>
                    <div>
                        <label for="caracteres-capcha" class="form-label fw-bold">Escriu els caracters que figuren en la foto: </label><span class="text-danger">*</span>
                        <div>
                            <input name="text-captcha" type="text" id="caracteres-capcha" class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <input style="height:40px" class="mt-5 btn btn-danger text-center" type="submit" name="enviar-formulario" id="submit-form" value ="Enviar">
                </div>
            </form>

<?= $this->endSection() ?>


<?= $this->section('login') ?> 

            <h2 class="mb-4 pt-1">  
                Login
            </h2>

            <div>
                <div class="alert alert-info">
                    <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  L'asterisco (<span class="text-danger">*</span>) indica els camps obligatoris. </p>     
                </div>
            </div>
            
            <br>
            <form action="private" method="POST">
                <?= csrf_field() ?>
                <div>
                    <!-- Els placeholders són textos que es mostren dins dels camps de text per ajudar a l'usuari a saber què ha d'introduir, serveix com una ajuda pero no substirueix la etiqueta <label> per a les persones amb discapacitat visual. Tecnica: G131 de la normativa WCAG 2.0 -->
                    <label class="form-label fw-bold" for="no-cognom">Email o usuari: <span class="text-danger">*</span> </label> <span class="text-danger"></span> 
                    <input class="form-control bg" name="username" id="username" type="text" placeholder="pascu@example.com">
                </div>
                <div>
                    <!-- Establim un contrast alt per diferenciar els camps de text del fons. Tecnica: G17 de la normativa WCAG 2.0 -->
                    <!-- els name dels input sera el mateix que el id del inputs a recomanació de la W3C  -->
                    <label class="form-label fw-bold mt-3" for="password">Contraseña: </label><span class="text-danger"> *</span>
                    <input class="form-control" name="password" id="password" type="password" placeholder="Escriu la teva contraseña">
                </div>
                
                <div class="d-grid">
                    <input style="height:40px" class="mt-5 btn btn-danger text-center" type="submit" name="enviar-formulario" id="submit-form" value ="Enviar">
                </div>
                <div class="mt-2">
                    <label >No dispone de cuenta? registrate </label>
                    <span >
                        <a  href="<?=base_url()."user\\register"; ?>" class="mt-2">aqui</a>.
                    </span> 
                </div>
            </form>
            <!-- <frame> -->
                


<?= $this->endSection() ?>




<?= $this->section('register') ?> 

<h2 class="mb-4 pt-4">  
                <?=$title; ?>
            </h2>

            <div>
                <div class="alert alert-info">
                    <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  L'asterisc (<span class="text-danger">*</span>) indica els camps obligatoris. </p>     
                </div>
            </div>
            
            <br>
            <form action="save" method="POST">
                <?= csrf_field() ?>
                <div>
                    
                    <label class="form-label fw-bold" for="no-cognom">Usuari: <span class="text-danger"></span> </label> <span class="text-danger"></span> 
                    <input class="form-control bg" name="username" id="username" type="text" placeholder="">
                </div>
                <div class="mt-2">
                    <label class="form-label fw-bold" for="no-cognom">Nom: <span class="text-danger">*</span> </label> <span class="text-danger"></span> 
                    <input class="form-control bg" name="name" id="name" type="text" placeholder="">

                    <?php if(isset($_SESSION['name'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['name']; ?> </p>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label fw-bold" for="no-cognom">Email: <span class="text-danger">*</span> </label> <span class="text-danger"></span> 
                    <input class="form-control bg" name="email" id="email" type="text" placeholder="">

                    <?php if(isset($_SESSION['error-mail'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['error-mail']; ?> </p>
                    </div>
                    <?php } ?>
                </div>
                <div>
                   
                    <label class="form-label fw-bold mt-3" for="password">Contraseña: </label><span class="text-danger"> *</span>
                    <input class="form-control" name="password" id="password" type="password" placeholder="">

                    <?php if(isset($_SESSION['error-pass'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['error-pass']; ?> </p>
                    </div>
                    <?php } ?>
                </div>
                
                <div class="d-grid">
                    <input style="height:40px" class="mt-5 btn btn-danger text-center" type="submit" name="enviar-formulario" id="submit-form" value ="Enviar">
                </div>
                <div class="mt-2">
                    <label for="linkToLog">Ya dispone de cuenta? inicia sessión </label>
                    <span id='linkToLog'>
                        <a  href="login" class="link">aqui</a>.
                    </span> 
                </div>
            </form>

<?= $this->endSection() ?>



<?= $this->section('edit-user') ?> 

            <a href="<?=base_url()."user\\list"; ?>" class="btn btn-secondary" title="tornar a la llista d'usuaris"> <i class="bi bi-arrow-left"></i> Tornar</a>
            <h2 class="mb-4 pt-4">  
                <?=$title; ?>
            </h2>
            <div>
                <div class="alert alert-info">
                    <!-- <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  L'asterisc (<span class="text-danger">*</span>) indica els camps obligatoris. </p>      -->
                    <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i> En cas que es deixi buit un camp, no es farà cap modificació.</p>
                </div>
            </div>
            
            <br>
            <form action="<?=base_url()."user/update/".($user['id'] ?? ""); ?>" method="POST">
                <?= csrf_field() ?>

                <div>
                    <label class="form-label fw-bold" for="username">Usuari:  </label> <span class="text-danger"></span> 
                    <input class="form-control bg" name="username" id="username" type="text" placeholder="">
                </div>

                <div class="mt-2">
                    <label class="form-label fw-bold" for="name">Nom:  </label> <span class="text-danger"></span> 
                    <input class="form-control bg" name="name" id="name" type="text" placeholder="">

                    <!-- <?php if(isset($_SESSION['name'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['name']; ?> </p>
                    </div>
                    <?php } ?> -->

                </div>

                <div class="mt-2">
                    <label class="form-label fw-bold" for="email">Email:  </label> <span class="text-danger"></span> 
                    <input class="form-control bg" name="email" id="email" type="text" placeholder="">

                    <!-- <?php if(isset($_SESSION['error-mail'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['error-mail']; ?> </p>
                    </div>
                    <?php } ?> -->
                </div>

                <div>
                    <label class="form-label fw-bold mt-3 mb-2" for="group">Grupo: </label>
                    <!-- <input class="form-control" name="group" id="grp" type="text" placeholder=""> -->
                        <select class="form-select" name="id_group" id="group">
                        <?php 
                        if($controller == 'edit-user'){
                            for ($i=0; $i < count($groups) ; $i++) { 
                                if($groups[$i]['id'] == $user['id_group']){
                                    echo "<option value='".$groups[$i]['id']."' selected>".$groups[$i]['name']."</option>";
                                }else{
                                    echo "<option value='".$groups[$i]['id']."'>".$groups[$i]['name']."</option>";
                                }
                            }
                        }
                        ?>
                        
                        </select>
                    <!-- <?php if(isset($_SESSION['error-pass'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['error-pass']; ?> </p>
                    </div>
                    <?php } ?> -->
                </div>

                <div class="d-grid">
                    <input style="height:40px" class="mt-5 btn btn-danger text-center" type="submit" name="enviar-formulario" id="submit-form" value ="Enviar">
                </div>

            </form>
<?= $this->endSection() ?>


<?= $this->section('add-user') ?> 
<!-- <?=$controller; ?> -->
<a href="<?=base_url()."user\\list"; ?>" class="btn btn-secondary"> <i class="bi bi-arrow-left"></i> Tornar</a>
            <h2 class="mb-4 pt-4">  
                <?=$title; ?>
            </h2>
            <div>
                <div class="alert alert-info">
                    <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  L'asterisc (<span class="text-danger">*</span>) indica els camps obligatoris. </p>     
                    <!-- <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i> En cas que es deixi buit un camp, no es farà cap modificació.</p> -->
                </div>
            </div>

            
            
            
            <br>
            <form action="<?=base_url()."user/insert"; ?>" method="POST" title="Per afegir un nou usuari">
                <?= csrf_field() ?>

                <div>
                    <label class="form-label fw-bold" for="username">Usuari:  </label> <span class="text-danger">*</span> 
                    <input class="form-control bg" name="username" id="username" type="text" placeholder="">
                </div>

                <div class="mt-2">
                    <label class="form-label fw-bold" for="name">Nom:  </label> <span class="text-danger">*</span> 
                    <input class="form-control bg" name="name" id="name" type="text" placeholder="">

                    <!-- <?php if(isset($_SESSION['name'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['name']; ?> </p>
                    </div>
                    <?php } ?> -->

                </div>

                <div class="mt-2">
                    <label class="form-label fw-bold" for="email">Email:  </label> <span class="text-danger">*</span> 
                    <input class="form-control bg" name="email" id="email" type="text" placeholder="" title="Exemple: federico@example.com">

                    <!-- <?php if(isset($_SESSION['error-mail'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['error-mail']; ?> </p>
                    </div>
                    <?php } ?> -->
                </div>
                <div class="mt-2">
                    <label class="form-label fw-bold" for="password">Contrasenya:  </label> <span class="text-danger">*</span> 
                    <input  class="form-control bg <?=(session()->getFlashdata('error-pass') ?? false) ? 'is-invalid':'' ; ?>" name="password" id="password" type="password" placeholder=""  >
                    <?=!(session()->getFlashdata('password') ?? false) ? '':'<p class="text-danger" id="error-pass">getFlashdata("password")</p>' ; ?>
                </div>

                <div>
                    <label class="form-label fw-bold mt-3 mb-2" for="group">Grupo: </label> <span class="text-danger">*</span>
                        <select class="form-select" name="id_group" id="group" title="Selector de grups">
                        <?php 
                        if($controller == 'add-user'){
                            for ($i=0; $i < count($groups) ; $i++) { 
                                if($groups[$i]['id'] == 2){
                                    echo "<option value='".$groups[$i]['id']."' selected>".$groups[$i]['name']."</option>";
                                }else{
                                    echo "<option value='".$groups[$i]['id']."'>".$groups[$i]['name']."</option>";
                                }
                            }
                        }
                        ?>
                        
                        </select>
                    <!-- <?php if(isset($_SESSION['error-pass'])){ ?>
                    
                    <div class="alert alert-danger">
                        <p> <i class="bi bi-info-circle-fill" aria-hidden="true" alt="Icona d'un signe d'excalamació"></i>  <?=$_SESSION['error-pass']; ?> </p>
                    </div>
                    <?php } ?> -->
                </div>

                <div class="d-grid">
                    <input style="height:40px" class="mt-5 btn btn-danger text-center" type="submit" name="enviar-formulario" id="submit-form" value ="Enviar">
                </div>

            </form> 

<?= $this->endSection() ?>





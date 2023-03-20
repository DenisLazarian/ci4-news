
<?= $this->extend('Views/layouts/publicmessage') ?>


<?= $this->section('list-public-messages') ?> 

    <h3><?=$title; ?></h3>

    <table class="table table-striped mt-4 mt-5">
        <thead >
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Correu</th>
                <th>Assumpte</th>
                <th>Text</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php 
            for ($i=0; $i < count($messages); $i++) { 
                echo "<tr>";
                echo "<td>".$messages[$i]['id']."</td>";
                echo "<td>".$messages[$i]['name']."</td>";
                echo "<td>".$messages[$i]['email']."</td>";
                echo "<td>".$messages[$i]['assumpte']."</td>";
                echo "<td>".$messages[$i]['body']."</td>";
                echo "<td>";
                echo "<a href='".base_url()."/public_message/edit/".$messages[$i]['id']."' class='me-1 btn btn-warning'>Editar</a>";
                echo "<a href='".base_url()."/public_message/delete/".$messages[$i]['id']."' class='btn btn-danger'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            
        </tbody>
    </table>

    <?=$pager->simpleLinks('default','daw_template'); ?>



<?= $this->endSection() ?>



<?= $this->section('navigation') ?> 
    <?=$this->include('Views/templates/navigation/navbar'); ?>
<?= $this->endSection() ?>




<?= $this->section('footer') ?> 

    <?= $this->include('templates/footer/footer') ?>
<?= $this->endSection() ?>

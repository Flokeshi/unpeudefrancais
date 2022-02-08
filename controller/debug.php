<div style="position: relative; z-index: 9; background-color: white; border: 2px solid black; float: right;">
    <?php
    var_dump(isset($_SESSION['idCart'])); // Insérez la variable qui peut poser problème
    /*print_r($user_id);*/
    var_dump(isset($_SESSION['idUser']));
    // Ne pas oubier de faire un try catch pour voir si le code fonctionne
    ?>
</div>
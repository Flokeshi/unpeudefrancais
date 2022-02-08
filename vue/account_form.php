<div class="dropdown-list">
    <ul class="p-dropdown-content w-50">
        <li class="list-entry writeBlue">
            <a href="../vue/myinformation_page.php" class="list-entry">
                <i class="fa fa-user"></i>   
                <?php if ($_SESSION['lang']=="EN") { ?>
                    My information
                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                    <small>Mes informations</small>
                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                    Mi informacion
                <?php } ?>
            </a>
        </li>
        <li class="list-entry">
            <a href="../vue/orders_page.php" class="list-entry">
                <i class="fas fa-file-invoice"></i>   
                <?php if ($_SESSION['lang']=="EN") { ?>
                    My orders
                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                    Mes commandes
                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                    Mis pedidos
                <?php } ?>
            </a>
        </li>
        <li class="list-entry">
            <a href="../controller/traitement_deconnexion.php" class="list-entry">
                <i class="fas fa-sign-out-alt"></i>   
                <?php if ($_SESSION['lang']=="EN") { ?>
                    Log out
                <?php }elseif ($_SESSION['lang']=="FR") { ?>
                    Déconnexion
                <?php }elseif ($_SESSION['lang']=="ES") { ?>
                    Cerrar sesión
                <?php } ?>
            </a>
        </li>
    </ul>  
</div>

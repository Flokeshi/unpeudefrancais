<!-- Topbar -->
<div id="topbar" class="d-none d-xl-block d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="topbar-dropdown">
                    <a class="title">English <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-list">
                        <a class="list-entry" href="../controller/traitement_FR.php">French</a>
                        <a class="list-entry" href="../controller/traitement_ES.php">Spanish</a>
                    </div>
                </div>
                <div class="topbar-dropdown">
                    <div class="title">
                        <?php if (!isset($_SESSION['idUser'])) { ?>
                            <i class="fas fa-sign-in-alt"></i>
                            <a href="../vue/connexion_page.php"> Log in</a>
                        <?php }else{ ?>
                            <i class="fa fa-user"></i>
                            <a href="../vue/account_page.php"> Account</a>
                        <?php }?>
                    </div>
                    <?php
                    if (!isset($_SESSION['idUser'])) {
                        if ($_SERVER['REQUEST_URI']!="/vue/connexion_page.php") {
                            include('connexion_form.php');
                        }
                    }else{
                        include('account_form.php');
                    }?>
                </div>

                <div class="topbar-dropdown">
                    <div class="title"><i class="icon-info"></i><a href="../vue/about.php"> About</a></div>
                </div>

                <!-- isset vérifie si la variable déclarée est différente de null (ici, on vérifie si c'est null car ! ) -->
                <?php
                if (!isset($_SESSION['idUser'])) { ?>
                    <!-- Si aucune session utilisateur existe, alors... -->
                    <div></div>
                <?php } else if ($_SESSION['role'] == 'admin') { ?>
                    <!-- Sinon, si une session utilisateur existe ET que c'est un admin :  -->
                    <div class="topbar-dropdown">
                        <div class="title"><i class="fas fa-wrench"></i><a href="../vue/dashboard_page.php"> Dashboard</a></div>
                    </div>                          
                <?php } ?>
                
            </div>
            <div class="col-md-6 d-none d-sm-block">
                <?php 
                $countSocialNetwork=0;
                include('../vue/socialnetwork.php'); 
                ?>
            </div>
        </div>
    </div>
</div>
<!-- end: Topbar -->
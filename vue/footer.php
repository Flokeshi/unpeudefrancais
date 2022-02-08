<!-- Footer -->
<footer id="footer">
    <div class="footer-content p-t-20">
        <div class="container">
            <div class="row boxFooter text-center" style="background: url('../public/assets/images/footer/footer.jpg') no-repeat center; background-size: cover; background-color: lightcoral;">
                <div class="col-lg-3">

                    <div class="widget">
                        <div class="widget-title">Paiement sécurisé</div>
                        <p>Paiement sécurisé via Paypal.<br>Pour plus d'informations,<br> veuillez vous rediriger vers le site suivant :</p>
                        <a href="https://paypal.com" target="_blank"><img src="../public/assets/images/shop/paypal-logo"></a>
                    </div>
                    
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="widget">
                                <div class="widget-title">Shop</div>
                                <ul class="list">
                                    <li><a href="../vue/shop.php?category=A1" value="A1">Niveau A1</a></li>
                                    <li><a href="../vue/shop.php?category=A2" value="A2">Niveau A2</a></li>
                                    <li><a href="../vue/shop.php?category=B1" value="B1">Niveau B1</a></li>
                                    <li><a href="../vue/shop.php?category=B2" value="B2">Niveau B2</a></li>
                                    <li><a href="../vue/shop.php?category=C1" value="C1">Niveau C1</a></li>
                                    <li><a href="../vue/shop.php?category=C2" value="C2">Niveau C2</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="widget">
                                <div class="widget-title">A propos</div>
                                <ul class="list">
                                    <li><a href="../vue/contact.php">Nous contacter</a></li>
                                    <li><a href="../vue/legal_notice.php">Mentions légales</a></li>
                                    <li><a href="../vue/terms_of_sales.php">Conditions Générales de Vente</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="widget">
                                <div class="widget-title">Suivez-nous sur:</div>
                                <div class="d-sm-block br">
                                    <?php 
                                    $countSocialNetwork=1;
                                    include('../vue/socialnetwork.php'); 
                                    $countSocialNetwork=0;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="widget">
                                <div class="widget-title">Inscrivez-vous à la newsletter :</div>
                                <form method="POST" action="../controller/traitement_newsletter.php">
                                    <div class="form-group">
                                        <label class="sr-only">Email</label>
                                        <input type="text" placeholder="Your email" name="email" class="form-control">
                                    </div>
                                    <div class=" form-group btn-submit">
                                        <a href=""><p class="evenboxinner" style="font-size: 25px; transform: none; width: 200px; margin: 0;">Submit</p></a>
                                    </div>
                               </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="row">
                <div class="d-sm-block text-center">
                    <?php include('../vue/socialnetwork.php'); ?>
                </div>
                <div class="copyright-text text-center">&copy; 2021 UNPEUDEFRANCAIS - All Rights Reserved.</div>
            </div>
        </div>
    </div>
</footer>
<!-- end: Footer -->
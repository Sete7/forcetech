<main class="main_contato">
    <div class="container">
        <div class="content">                    
            <h3 class="titulo_menu"><a href="#">HOME</a>  <span class="fa fa-angle-right"></span> Contato</h3>

            <!----------------------------------------QUEM SOMOS --------------------------------------------------->
            <section class="page_contato">
                <h1 class="titulo_contato"><span class="fa fa-envelope"></span> CONTATO</h1>
                <article class="art_contato">
                    <h1 class="art_titulo_contato"> DIGA-NOS COMO PODEMOS TE AJUDAR?</h1>

                    <div class="box_form column column-7">
                       <?php
                        require_once './mailer/contato-force.php';
                       ?>
                    </div>

<!--                    <div class="mapa column column-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15353.152975911964!2d-48.0440205!3d-15.8414407!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd082313d70393121!2sTaguatinga+Shopping!5e0!3m2!1spt-BR!2sbr!4v1528729513620" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>-->
                </article>
            </section>
        </div>

        <div class="clear"></div>
    </div>
</main>
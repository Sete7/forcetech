<?php
require 'app/Config.inc.php';
$usuarioController = new UsuarioController();
$usuarioLogado = $usuarioController->IsLogginIn();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Forcetech</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="<?= INCLUDE_PATH; ?>/img/png" href="<?= INCLUDE_PATH; ?>/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
        <link href="<?= INCLUDE_PATH; ?>/css/toastr.min.css" media="all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/estilo.css">
        <link href="<?= INCLUDE_PATH; ?>/css/jcarousel.responsive.css" rel="stylesheet" type="text/css"/>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122623160-1"></script>        
    </head>
    <body>
        <!--<! ----------------------------- CABECALHO ---------------------------->
        <div class="site">
            <header class="main_cabecalho container">
                <div class="content">
                    <div class="search_form search_ative">
                        <form method="post" action="<?= HOME ?>/single-search">
                            <input type="text" name="textoPesquisado" placeholder="Pesquisar Produto..">
                            <input type="submit" name="search" value="Pesquisar">
                        </form> 
                    </div>

                    <div class="box_usuario">
                        <div class="bem_vindo"><p>Seja Bem-vindo a Forcetech</p></div>
                        <div class="conta">
                            <div class="box_conta">
                                <?php
                                if ($usuarioLogado == true):
                                    ?>
                                    <a href="<?= HOME; ?>/minha-conta"><i class="fas fa-key"></i>  Seja bem-vindo, <?= $_SESSION["nome"]; ?></a>
                                    <?php
                                else:
                                    ?>
                                    <a href="<?= HOME; ?>/minha-conta"><span class="fa fa-user"></span>  Minha Conta</a>
                                <?php
                                endif;
                                ?>                               
                                <a href="<?= HOME; ?>/carrinho"> <span class="fa fa-shopping-cart"></span> Carrinho de compra</a>
                            </div>
                        </div>							
                    </div>
                    <div class="clear"></div>
                </div>			

                <nav class="main_nav">


                    <!--------------------------------------MENU MOBILE -------------------------------------->     
                    <button class="menu-abrir"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    <div class="main_nav_mob">
                        <button class="menu-fechar"><i class="fa fa-times"></i></button>
                        <ul class="menu_mobile">
                            <li class="li_mobi"><a href="<?= HOME; ?>" title="Início">Inicio</a></li>
                            <li class="li_mobi"><a href="<?= HOME; ?>/quem-somos" title="Quem Somos">Quem Somos</a></li>
                            <li class="li_mobi"><a href="<?= HOME; ?>/contato" title="Contato">Contato</a></li>
                            <?php
                            $categoriaController = new CategoriaController();
                            $produtoController = new ProdutoController();
                            $functions = new Functions();
                            $listaMenu = $categoriaController->ListarTodaCategoria();
                            foreach ($listaMenu as $menu):
                                ?>
                                <li class="li_mobi"><a href="<?= HOME ?>/categoria/<?= $menu->getCategoria_url(); ?>" title="<?= $menu->getCategoria_nome(); ?>"><?= $menu->getCategoria_nome(); ?></a></li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class=" content">
                        <!--<! ------------------------------- LOGO -------------------------------->
                        <div class="logo">
                            <a href="<?= HOME; ?>" class="box_logo" title="Forcetech">
                                <img src="<?= INCLUDE_PATH; ?>/img/forcetech.png" class="img_logo" alt="" title="Forcetech">
                            </a>
                        </div>                   
                        <!-- ------------------------------- MENU PRINCIPAL -------------------------------->
                        <ul class="menu">
                            <img id="search" src="<?= INCLUDE_PATH; ?>/img/search.png"  alt="Pesquisar" title="Pesquisar">	
                            <li><a href="<?= HOME; ?>" title="Início">Início</a></li>
                            <li><a href="<?= HOME; ?>/quem-somos" title="Quem Somos">Quem Somos</a></li>
                            <li><a href="<?= HOME; ?>/contato" title="Fale Conosco">Contato</a></li>                       	
                        </ul>  
                        <div class="clear"></div>
                    </div>
                </nav>
                <!-- ------------------------------- MENU PRODUTO -------------------------------->
                <article class="menu_produtos">
                    <div class="content">			 
                        <div class="box_menu_pdr">
                            <?php
                            $listaMenu = $categoriaController->ListarTodaCategoria();
                            foreach ($listaMenu as $menu):
                                ?>
                                <div><a href="<?= HOME ?>/categoria/<?= $menu->getCategoria_url(); ?>" title="<?= $menu->getCategoria_nome(); ?>"><?= $menu->getCategoria_nome(); ?></a></div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </article>
            </header>
            <!--------------------------------- CONTEUDO -------------------------------->
            <?php
            $Url[1] = (empty($Url[1]) ? null : $Url[1]);
            if (file_exists(REQUIRE_PATH . '/' . $Url[0] . '.php')):
                require REQUIRE_PATH . '/' . $Url[0] . '.php';
            elseif (file_exists(REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php')):
                require REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php';
            else:
                require REQUIRE_PATH . '/404.php';
            endif;
            ?>
            <!--------------------------------- CONTEUDO -------------------------------->

            <!--------------------------------- RODAPE -------------------------------->
            <div class="container">
                <div class="content">
                    <div class="jbrands" style="margin-top: 1.5rem;">
                        <ul>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/001.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/002.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/004.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/005.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/006.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/007.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/008.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/009.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/010.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/011.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/012.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/013.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/014.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/015.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/016.png" alt=""/></li>
                            <li><img src="<?= INCLUDE_PATH; ?>/img/brands/017.png" alt=""/></li>

                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <section class="container">
                <h1 class="font-zero">Produtos em Destaque, Lançamentos e Mais vistos</h1>
                <div class="content row">
                    <article class="column column-4 home-product-featured">                                    
                        <h1>Destaque</h1>
                        <?php
                        $listarProdutos = $produtoController->ListarProduto(0, 2);
                        if ($listarProdutos == null):
                            echo 'Não existe produtos mais vistos';
                        else:
                            foreach ($listarProdutos as $produtos):
                                ?>
                                <section class="product-featured">
                                    <a href="<?= HOME ?>/single-produto/<?= $produtos->getProduto_url(); ?>">
                                        <div class="product-featured-thumb">
                                            <img src="<?= HOME ?>/upload/<?= $produtos->getProduto_thumb(); ?>" alt=""/>
                                        </div>
                                        <div class="product-featured-text">
                                            <h1><?= $produtos->getProduto_nome(); ?></h1>
                                            <?php
                                            $valorProd2 = $produtos->getProduto_preco();
                                            $parcelas = $functions->Parcelas(5, $valorProd2);
                                            ?>
                                            <p class="product-featured-price">R$ <?= number_format($produtos->getProduto_preco(), 2, ",", ".") ?></p>
                                            <p>Em até 5x R$ <?= number_format($parcelas, 2, ",", ".") ?> s/ juros </p>
                                        </div>
                                    </a>
                                </section>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </article>

                    <article class="column column-4 home-product-featured">                                    
                        <h1>Lançamentos</h1>
                        <?php
                        $listarProdutos = $produtoController->produtosRelacionados(2, 0, 2);
                        if ($listarProdutos == null):
                            echo 'Não existe produtos mais vistos';
                        else:
                            foreach ($listarProdutos as $produtos):
                                ?>
                                <section class="product-featured">
                                    <a href="<?= HOME ?>/single-produto/<?= $produtos->getProduto_url(); ?>">
                                        <div class="product-featured-thumb">
                                            <img src="<?= HOME ?>/upload/<?= $produtos->getProduto_thumb(); ?>" alt=""/>
                                        </div>
                                        <div class="product-featured-text">
                                            <h1><?= $produtos->getProduto_nome(); ?></h1>
                                            <?php
                                            $valorProd2 = $produtos->getProduto_preco();
                                            $parcelas = $functions->Parcelas(5, $valorProd2);
                                            ?>
                                            <p class="product-featured-price">R$ <?= number_format($produtos->getProduto_preco(), 2, ",", ".") ?></p>
                                            <p>5x sem juros R$ <?= number_format($parcelas, 2, ",", ".") ?></p>
                                        </div>
                                    </a>
                                </section>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </article>

                    <article class="column column-4 home-product-featured">                                    
                        <h1>Os mais vistos</h1>
                        <?php
                        $listarProdutos = $produtoController->maisVistos(0, 2);
                        if ($listarProdutos == null):
                            echo 'Não existe produtos mais vistos';
                        else:
                            foreach ($listarProdutos as $produtos):
                                ?>
                                <section class="product-featured">
                                    <a href="<?= HOME ?>/single-produto/<?= $produtos->getProduto_url(); ?>">
                                        <div class="product-featured-thumb">
                                            <img src="<?= HOME ?>/upload/<?= $produtos->getProduto_thumb(); ?>" alt=""/>
                                        </div>
                                        <div class="product-featured-text">
                                            <h1><?= $produtos->getProduto_nome(); ?></h1>
                                            <?php
                                            $valorProd2 = $produtos->getProduto_preco();
                                            $parcelas = $functions->Parcelas(5, $valorProd2);
                                            ?>
                                            <p class="product-featured-price">R$ <?= number_format($produtos->getProduto_preco(), 2, ",", ".") ?></p>
                                            <p>5x sem juros R$ <?= number_format($parcelas, 2, ",", ".") ?></p>
                                        </div>
                                    </a>
                                </section>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </article>
                </div>
                <div class="clear"></div>
            </section>

            <div class="container newsletter">
                <div class="content">

                    <div class="box_new_a">
                        <h1>Newsletter<span>, gostaria de receber novidades, promoções e dicas </span></h1> 
                    </div>
                    <div class="box_new_b">
                        <form class="form_news" action="https://integracao.nitronews.com.br/integracao.php" method="post">   
                            <input type="hidden" name="acao" value="1" />
                            <input type="hidden" name="chave" value="419090f8af223c706d07d4e768b044d2c5f079869960a4a" />
                            <input type="hidden" name="urlretorno" value="https://www.forcetech.com.br" />
                            <!-- caso sua página não seja em UTF-8, remova a linha abaixo -->
                            <input type="hidden" name="decodifica_utf8" value="1" />
                            <input type="email" name="email" class="email" required  placeholder="Digite seu Email"/>                                                                                               
                            <input type="submit"  name="enviar" class="btn_newsletter" value="Enviar" />                        
                        </form>
                    </div>                            
                    <div class="clear"></div>

                </div>
            </div>

            <!----------------------------------------------FOOTER ------------------------------------->	
            <footer class="container">                       
                <div class="content main_footer">
                    <section class="rede_social">
                        <a href="https://www.facebook.com/Forcetech.Oficial/" target="_blank">
                            <img src="<?= INCLUDE_PATH; ?>/img/facebook-forcetech.jpg" alt="Facebook" title="Facebook"/>
                        </a>

                        <div class="box_rede">                            
                            <ul>                                
                                <li><a href="https://www.instagram.com/forcetech.oficial/" target="_blank"><img src="<?= INCLUDE_PATH; ?>/img/icons/instan.png" alt=""/></a></li>
                                <li><a href="https://www.youtube.com/channel/UCOdewMxJHcFfiiBx6Wk2pwQ?view_as=subscriber" target="_blank"><img src="<?= INCLUDE_PATH; ?>/img/icons/tube.png" alt=""/></a></li>
                            </ul>                            
                        </div>
                    </section>

                    <section class="sec_contato">
                        <div class="sec_contato_text">
                            <h1>Contato</h1>
                            <p class="telefones"> (61) 3797-8388 / 99670-8388</p> 
                            <p>Horário de atendimento das 09:00 as 18:30</p>
                            <p>De segunda à sexta-feira</p>
                            <p>Forcetech Comercio de Eletrônicos LTDA</p> 
                            <p>CNPJ 28.655.997/0001-37</p> 
                            <p> QS1, Rua 210, Lote 40, Torre B, Taguatinga Shopping</p> 
                        </div>
                    </section>

                    <section class="selos">
                        <div class="div_selos">
                            <h1 class="titulo_selos">Selos de Segurança</h1>
                            <ul>
                                <li>
                                    <a id="seloEbit" class="box_selos" href="http://www.ebit.com.br/forcetech" target="_blank" data-noop="redir(this.href);">
                                        <script type="text/javascript" id="getSelo" src="https://imgs.ebit.com.br/ebitBR/selo-ebit/js/getSelo.js?92305"></script>
                                    </a>
                                </li>                                
                                <li>
                                    <a href="https://perfil.mercadolivre.com.br/FORCETECH.LOJA" target="_blank" class="box_selos"><img src="<?= INCLUDE_PATH; ?>/img/icons/SELO ML PHT.png" alt="Selo" title="Selo"/></a>
                                </li>

                                <li>
                                    <a href="https://www.google.com.br/search?source=hp&ei=lVY2W_WWGYOWwASwv6CIBQ&q=forcetech&oq=f&gs_l=psy-ab.3.0.35i39k1l2j0i131k1l2j0i67k1j0i131k1j0l4.2876.2876.0.4781.2.1.0.0.0.0.158.158.0j1.1.0....0...1.1.64.psy-ab..1.1.158.0...0.jB-vc3xnQBs#lrd=0x935a32897c4fae07:0xe20ef7d884d167ee,1,,," class="box_selos" target="_blank"><img src="<?= INCLUDE_PATH; ?>/img/icons/selo-google.png" alt=""/></a>
                                </li>

                                <li>
                                    <a href="" class="box_selos" target="_blank"><img src="<?= INCLUDE_PATH; ?>/img/icons/ssl.jpg" alt=""/></a>
                                </li>

                                <li>
                                    <a id="seloEbit" href="http://www.ebit.com.br/#forcetech" target="_blank" onclick="redir(this.href);"></a> <script type="text/javascript" id="getSelo" src="https://imgs.ebit.com.br/ebitBR/selo-ebit/js/getSelo.js?92305"></script>
                                </li>
                            </ul>                          
                        </div>

                        <div class="bandeiras">
                            <h1 class="titulo_cartao" > Formas de Pagamentos</h1>
                            <ul>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/boleto.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/visa.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/aura.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/americaexpress.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/bb.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/bradesco.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/dinnesclub.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/elo.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/discover.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/hiper.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/hipercard.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/itau.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/jcb.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/mastercard.png" alt=""/></li>
                            </ul>
                        </div>
                    </section>

                    <section class="selos2">
                        <div class="div_selos row-selos">
                            <h1 class="titulo_selos">Selos de Segurança</h1>
                            <ul>
                                <li>
                                    <a id="seloEbit" class="box_selos" href="http://www.ebit.com.br/forcetech" target="_blank" data-noop="redir(this.href);">
                                        <script type="text/javascript" id="getSelo" src="https://imgs.ebit.com.br/ebitBR/selo-ebit/js/getSelo.js?92305"></script>
                                    </a>
                                </li>                                
                                <li>
                                    <a href="#" class="box_selos"><img src="<?= INCLUDE_PATH; ?>/img/icons/SELO ML PHT.png" alt="Selo" title="Selo"/></a>
                                </li>

                                <li>
                                    <a href="" class="box_selos" ><img src="<?= INCLUDE_PATH; ?>/img/icons/selo-google.png" alt=""/></a>
                                </li>

                                <li>
                                <li>
                                    <a href="" class="box_selos" target="_blank"><img src="<?= INCLUDE_PATH; ?>/img/icons/ssl.jpg" alt=""/></a>
                                </li>
                                </li>
                            </ul>                          
                        </div>

                        <div class="bandeiras row-selos">
                            <h1 class="titulo_cartao" > Formas de Pagamentos</h1>
                            <ul>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/boleto.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/visa.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/aura.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/americaexpress.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/bb.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/bradesco.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/dinnesclub.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/elo.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/discover.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/hiper.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/hipercard.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/itau.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/jcb.png" alt=""/></li>
                                <li><img src="<?= INCLUDE_PATH; ?>/img/icons/mastercard.png" alt=""/></li>
                            </ul>
                        </div>
                    </section>
                </div>

                <nav class="nav_rodape">
                    <div class="content">
                        <div class="nav_menu">
                            <ul>
                                <li><a href="<?= HOME ?>/minha-conta">Minha Conta</a></li>
                                <li><a href="<?= HOME ?>/perguntas">Perguntas Frequentes</a></li>
                                <li><a href="<?= HOME ?>/contato">Contato</a></li>
                                <li><a href="<?= HOME ?>/central">Central de Trocas</a></li>
                                <li><a href="<?= HOME ?>/seguranca">Segurança e Privacidade</a></li>
                                <li><a href="<?= HOME ?>/comprar">Como Comprar</a></li>                        

                            </ul>   
                        </div>  
                        <div class="clear"></div>
                    </div>
                </nav>

                <div class="copy container">
                    <div class="content">
                        <div class="text_copy"><p>&copy; FORCETECH - TODOS OS DIREITOS RESERVADOS</p></div>
                    </div>
                </div>                               
            </footer>
        </div>

        <script src="<?= HOME; ?>/_cdn/jquery-3.2.1.min.js"></script> 
        <script src="<?= HOME; ?>/_cdn/jquery.jcarousel.min.js"></script>       
        <script src="<?= HOME; ?>/_cdn/slider_show.js"></script>
        <script src="<?= HOME; ?>/_cdn/menu.js"></script>
        <script src="<?= HOME; ?>/_cdn/jcarousel.responsive.js"></script>
        <script src="<?= HOME; ?>/_cdn/product_carrousel.js"></script>
        <script src="<?= HOME; ?>/_cdn/brands_carrousel.js"></script>
        <script src="<?= HOME; ?>/_cdn/fontawesome.js"></script>
        <script src="<?= HOME; ?>/_cdn/api-faceboock.js"></script>
        <script src="<?= HOME; ?>/_cdn/thumb.js"></script>  
        <!--formulario de pesquisa-->
        <script src="<?= HOME; ?>/_cdn/search.js"></script>        
        <script src="<?= HOME; ?>/_cdn/accordion.js"></script>
        <!--funcões genericas-->
        <script src="<?= HOME; ?>/_cdn/functions.js"></script>
        <!--validação dos dados como cpf, telefone, data-->
        <script src="<?= HOME; ?>/_cdn/validaCpfeTel.js"></script>
        <script src="<?= HOME; ?>/_cdn/validaCpf.js"></script>
        <!-- mostra notificação de erro-->
        <script src="<?= HOME; ?>/_cdn/toastr.min.js"></script> 

        <!--busca cep-->
        <script src="<?= HOME; ?>/_cdn/buscarCep.js"></script>        
        <script src="<?= REQUIRE_PATH; ?>/js/googleAnalytics.js"></script>
        
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0&appId=501983169994268&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </body>
</html>

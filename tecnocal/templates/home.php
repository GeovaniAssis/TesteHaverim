<?php
// Template name: Home
session_start();
$_SESSION['pagina'] = "home";
get_header();
include('include/auto_empreendimento_index.php');
?>
<script type="text/javascript">
    function inserirLoading(objHTML, url) {
        gifLoading = "http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/loading.gif";
        $(objHTML).html("<center><img src=" + gifLoading +
            " id='loading' style=' margin-top: 90px; height: 32px; width: 32px; margin-left: 15%; left: 0; '/></center>"
        );
        return;
    }

    function getEmpreendimento(empreendimento) {

        $('.thumb-txt-mp').show(10);

        inserirLoading('.thumb-txt-mp');

        jQuery.ajax({
            url: "http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/php/getEmpreendimento.php",
            dataType: 'html',
            data: 'empreendimento=' + empreendimento,
            type: 'POST',
            success: function(retorno) {

                $('.thumb-txt-mp').html(retorno);

            }

        });
    }
</script>

<main>

    <!-- Banner -->
    <section id="banner-home" class="bg--amarelo pd-bottom--40">
        <div id="owl-banner" class="owl-carousel owl-theme">

            <?php session_start();
			foreach ($_SESSION['banners'] as $banners) { ?>

            <div class="item">
                <?php if ($banners['ds_link'] != "") { ?>
                <a href="<?php echo $banners['ds_link']; ?>">
                    <?php } ?>

                    <img class="img-responsive desk-1925" style="height: 540px; object-fit: cover;"
                        src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/desktop/<?php echo $banners['ds_caminho_desktop']; ?>"
                        alt="banner-desktop">

                    <img class="img-responsive tabl-1200" style="height: 470px; object-fit: cover;"
                        src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/tablet1/<?php echo $banners['ds_caminho_tablet1']; ?>"
                        alt="banner-tablet">

                    <img class="img-responsive tabl-991" style="height: 360px; object-fit: cover;"
                        src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/tablet2/<?php echo $banners['ds_caminho_tablet2']; ?>"
                        alt="banner-tablet">

                    <img class="img-responsive mobi-767" style="height: 297px; object-fit: cover;"
                        src="http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/<?php echo $banners['cd_banner']; ?>/mobile/<?php echo $banners['ds_caminho_mobile']; ?>"
                        alt="banner-mobile">

                    <?php if ($banners['ds_link'] != "") { ?>
                </a>
                <?php } ?>
            </div>

            <?php } ?>

        </div>
    </section>

    <!-- Recidenciais -->
    <section id="recidenciais">
        <div class="container">
            <?php
    			session_start();
    			$cont = 0;
    			foreach ($_SESSION['empre_all'] as $empre) {
    				if ($cont == 0 || $cont == 2) { ?>
                        <div class="row recidencial menu-desktop">
                            <a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>" >
                                <div class="col-xl-5 col-lg-5 col-md-12 info">
                                    <hr>

                                    <div class="texto">
                                        <img class="max-wdt--50 lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_logo']; ?>"
                                            alt="logo-empreendimento">
                                        <p style="color: black;">
                                            <?php echo $empre['ds_empreendimento']; ?>
                                        </p>
                                    </div>

                                    <div class="conteudo" style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;">

                                        <div class="row mrg-lf--0 mrg-rt---30" style="background-color: #f4f4f4; color: black;">

                                            <?php if (isset($empre['ds_mar']) && $empre['ds_mar'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 mar">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png"
                                                    alt="icone-mar">
                                                <p><b><?php echo $empre['ds_mar']; ?> m</b><br>da praia</p>
                                            </div>
                                            <?php }

                									if (isset($empre['ic_1_vaga']) && $empre['ic_1_vaga'] != "off") { ?>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 vaga">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-vaga.png"
                                                    alt="icone-vagas">
                                                <p><b>1 vaga</b></p>
                                            </div>

                                            <?php }

                									if (isset($empre['ds_metra_min']) && $empre['ds_metra_min'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 metro">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png"
                                                    alt="icone-metro-quadrados">
                                                <p><b><?php echo $empre['ds_metra_min']; ?>m²</b></p>
                                            </div>
                                            <?php }

                									if (isset($empre['ic_2_dorm']) && $empre['ic_2_dorm'] != "off") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 dorm">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png"
                                                    alt="icone-dorms">
                                                <p><b>2 dorms</b></p>
                                            </div>
                                            <?php } ?>

                                        </div>

                                        <div class="row mrg-rt---30 valor">
                                            <?php if ($empre['vl_empreendimento'] != "") { ?>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <img class="flt--left lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon/icon-valor.png"
                                                    alt="icone-valor">

                                                <p class="flt--left">A partir<br>de R$ <?php echo $empre['vl_empreendimento']; ?></p>
                                            </div>
                                            <?php } ?>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 0 0 0 10px;">

                                                <img class="flt--left lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon/icon-lancamento.png"
                                                    alt="icone-lançamento">

                                                <p class="flt--left" style="margin-top: 10px;"><?php echo $empre['ds_situacao'] ?></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 foto-info pd-rgt--0">
                                    <?php $cont_lar = 1;
                							foreach ($_SESSION['empre_lazer'] as $lazer) {
                								if ($cont_lar <= 3 && $lazer['cd_empreendimento'] == $empre['cd_empreendimento']) { ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pd--0">
                                        <img class="img-responsive lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/lazer/<?php echo $lazer['im_lazer']; ?>"
                                            alt="imagem-lazer">
                                        <p style="text-shadow: 0 0 4px black;"><?php echo $lazer['nm_lazer'] ?></p>
                                    </div>
                                    <?php $cont_lar++;
                								}
                							}
                							?>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 foto-destaque pd--0">

                                    <img class=" lazyload"
                                        data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['im_empreendimento_principal']; ?>"
                                        alt="foto-principal-empreendimento">
                                </div>
                            </a>
                        </div>
                        <div class="row recidencial mobile">

                            <a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>" >
                                <div class="col-xs-12 info">
                                    <hr>

                                    <div class="texto">
                                        <img class="max-wdt--50 lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_logo']; ?>"
                                            alt="logo-empreendimento">
                                    </div>

                                    <div class="col-xs-12 foto-destaque pd--0">

                                        <img class="img-responsive lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['im_empreendimento_principal']; ?>"
                                            alt="foto-principal-empreendimento">

                                    </div>

                                    <div class="conteudo" style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;">

                                        <div class="row mrg-rt---30 valor">
                                            <?php if ($empre['vl_empreendimento'] != "") { ?>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <img class="flt--left lazyload" style="margin: 0 6px 0 -6px;" data-src="<?php bloginfo("template_url") ?>/img/icon/icon-valor.png" alt="icone-valor">

                                                <p class="flt--left">A partir<br>de R$ <?php echo $empre['vl_empreendimento']; ?></p>
                                            </div>
                                            <?php } ?>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 0 0 0 10px;">

                                                <img class="flt--left lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon/icon-lancamento.png"
                                                    alt="icone-lançamento">

                                                <p class="flt--left" style="margin-top: 10px;"><?php echo $empre['ds_situacao'] ?></p>

                                            </div>
                                        </div>

                                        <p style="padding: 20px 10px; margin: 0; color: black;">
                                            <?php echo $empre['ds_empreendimento']; ?>
                                        </p>

                                        <div class="row mrg-lf--0 mrg-rt---30" style="background-color: #f4f4f4; color: black;">

                                            <?php if (isset($empre['ds_mar']) && $empre['ds_mar'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 mar">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png"
                                                    alt="icone-mar">
                                                <p><b><?php echo $empre['ds_mar']; ?> m</b><br>da praia</p>
                                            </div>
                                            <?php }

                									if (isset($empre['ic_1_vaga']) && $empre['ic_1_vaga'] != "off") { ?>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 vaga">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-vaga.png"
                                                    alt="icone-vagas">
                                                <p><b>1 vaga</b></p>
                                            </div>

                                            <?php }

                									if (isset($empre['ds_metra_min']) && $empre['ds_metra_min'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 metro">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png"
                                                    alt="icone-metro-quadrados">
                                                <p><b><?php echo $empre['ds_metra_min']; ?>m²</b></p>
                                            </div>
                                            <?php }

                									if (isset($empre['ic_2_dorm']) && $empre['ic_2_dorm'] != "off") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 dorm">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png"
                                                    alt="icone-dorms">
                                                <p><b>2 dorms</b></p>
                                            </div>
                                            <?php } ?>

                                        </div>


                                    </div>
                                </div>
                            </a>
                            <div class="col-xs-12 foto-info">
                                <div class="owl-empreedimento owl-carousel owl-theme">
                                    <?php $cont_lar = 1;
            								foreach ($_SESSION['empre_lazer'] as $lazer) {
            									if ($cont_lar <= 3 && $lazer['cd_empreendimento'] == $empre['cd_empreendimento']) { ?>
                                    <div class="item">
                                        <img class="img-responsive owl-lazy"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/lazer/<?php echo $lazer['im_lazer']; ?>"
                                            alt="imagem-lazer">
                                        <p style="text-shadow: 0 0 4px black;"><?php echo $lazer['nm_lazer'] ?></p>
                                    </div>
                                    <?php $cont_lar++;
            									}
            								}
            								?>
                                </div>
                            </div>
                        </div>
                    <?php }
    				if ($cont == 1) { ?>
                        <div class="row recidencial invert menu-desktop">
                            <a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>" >
                                <div class="col-xl-5 col-lg-5 col-md-12 info">

                                    <hr>

                                    <div class="texto">
                                        <img class="mobile-100 max-wdt--50 lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_logo']; ?>"
                                            alt="logo-empreendimento">
                                        <p style="color: black;">
                                            <?php echo $empre['ds_empreendimento']; ?>
                                        </p>
                                    </div>

                                    <div class="conteudo" style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;">

                                        <div class="row mrg-rt--0 mrg-lf---30" style="background-color: #f4f4f4; color: black;">

                                            <?php if (isset($empre['ds_mar']) && $empre['ds_mar'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 mar">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png"
                                                    alt="icone-mar">
                                                <p><b><?php echo $empre['ds_mar']; ?> m</b><br>da praia</p>
                                            </div>
                                            <?php }

                									if (isset($empre['ic_1_vaga']) && $empre['ic_1_vaga'] != "off") { ?>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 vaga">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-vaga.png"
                                                    alt="icone-vagas">
                                                <p><b>1 vaga</b></p>
                                            </div>

                                            <?php }

                									if (isset($empre['ds_metra_min']) && $empre['ds_metra_min'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 metro">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png"
                                                    alt="icone-metro-quadrados">
                                                <p><b><?php echo $empre['ds_metra_min']; ?>m²</b></p>
                                            </div>
                                            <?php }

                									if (isset($empre['ic_2_dorm']) && $empre['ic_2_dorm'] != "off") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 dorm">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png"
                                                    alt="icone-dorms">
                                                <p><b>2 dorms</b></p>
                                            </div>
                                            <?php } ?>

                                        </div>

                                        <div class="row mrg-rt--25 mrg-lf---30 valor">
                                            <?php if ($empre['vl_empreendimento'] != "") { ?>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <img class="flt--left lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon/icon-valor.png"
                                                    alt="icone-valor">

                                                <p class="flt--left">A partir<br>de R$ <?php echo $empre['vl_empreendimento']; ?></p>

                                            </div>
                                            <?php } ?>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 0;">

                                                <img class="flt--left lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon/icon-lancamento.png"
                                                    alt="icone-lançamento">

                                                <p class="flt--left" style="margin-top: 10px;"><?php echo $empre['ds_situacao'] ?></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 foto-info pd-lft--0">
                                    <?php $cont_lar = 1;
                							foreach ($_SESSION['empre_lazer'] as $lazer) {
                								if ($cont_lar <= 3 && $lazer['cd_empreendimento'] == $empre['cd_empreendimento']) { ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pd--0">
                                        <img class="img-responsive lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/lazer/<?php echo $lazer['im_lazer']; ?>"
                                            alt="imagem-lazer">
                                        <p style="text-shadow: 0 0 4px black;"><?php echo $lazer['nm_lazer'] ?></p>
                                    </div>
                                    <?php $cont_lar++;
                								}
                							}
                							?>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 foto-destaque pd--0">

                                    <img class="lazyload"
                                        data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['im_empreendimento_principal']; ?>"
                                        alt="foto-empreendimento">
                                </div>
                            </a>
                        </div>
                        <div class="row recidencial mobile">
                            <a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>" >
                                <div class="col-xs-12 info">
                                    <hr>

                                    <div class="texto">
                                        <img class="max-wdt--50 lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_logo']; ?>"
                                            alt="logo-empreendimento">
                                    </div>

                                    <div class="col-xs-12 foto-destaque pd--0">

                                        <img class="img-responsive lazyload"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['im_empreendimento_principal']; ?>"
                                            alt="foto-principal-empreendimento">

                                    </div>

                                    <div class="conteudo" style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;">

                                        <div class="row mrg-rt---30 valor">
                                            <?php if ($empre['vl_empreendimento'] != "") { ?>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <img class="flt--left lazyload" style="margin: 0 6px 0 -6px;" data-src="<?php bloginfo("template_url") ?>/img/icon/icon-valor.png" alt="icone-valor">

                                                <p class="flt--left">A partir<br>de R$ <?php echo $empre['vl_empreendimento']; ?></p>
                                            </div>
                                            <?php } ?>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 0 0 0 10px;">

                                                <img class="flt--left lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon/icon-lancamento.png"
                                                    alt="icone-lançamento">

                                                <p class="flt--left" style="margin-top: 10px;"><?php echo $empre['ds_situacao'] ?></p>

                                            </div>
                                        </div>

                                        <p style="padding: 20px 10px; margin: 0; color: black;">
                                            <?php echo $empre['ds_empreendimento']; ?>
                                        </p>

                                        <div class="row mrg-lf--0 mrg-rt---30" style="background-color: #f4f4f4; color: black;">

                                            <?php if (isset($empre['ds_mar']) && $empre['ds_mar'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 mar">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mar.png"
                                                    alt="icone-mar">
                                                <p><b><?php echo $empre['ds_mar']; ?> m</b><br>da praia</p>
                                            </div>
                                            <?php }

                                                    if (isset($empre['ic_1_vaga']) && $empre['ic_1_vaga'] != "off") { ?>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 vaga">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-vaga.png"
                                                    alt="icone-vagas">
                                                <p><b>1 vaga</b></p>
                                            </div>

                                            <?php }

                                                    if (isset($empre['ds_metra_min']) && $empre['ds_metra_min'] != "") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 metro">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-mquadrado.png"
                                                    alt="icone-metro-quadrados">
                                                <p><b><?php echo $empre['ds_metra_min']; ?>m²</b></p>
                                            </div>
                                            <?php }

                                                    if (isset($empre['ic_2_dorm']) && $empre['ic_2_dorm'] != "off") { ?>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 pd--0 dorm">
                                                <img class="lazyload"
                                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/<?php echo $empre['cd_cor']; ?>-dorms.png"
                                                    alt="icone-dorms">
                                                <p><b>2 dorms</b></p>
                                            </div>
                                            <?php } ?>

                                        </div>


                                    </div>
                                </div>
                            </a>

                            <div class="col-xs-12 foto-info">
                                <div class="owl-empreedimento owl-carousel owl-theme">
                                    <?php $cont_lar = 1;
                                            foreach ($_SESSION['empre_lazer'] as $lazer) {
                                                if ($cont_lar <= 3 && $lazer['cd_empreendimento'] == $empre['cd_empreendimento']) { ?>
                                    <div class="item">
                                        <img class="img-responsive owl-lazy"
                                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/lazer/<?php echo $lazer['im_lazer']; ?>"
                                            alt="imagem-lazer">
                                        <p style="text-shadow: 0 0 4px black;"><?php echo $lazer['nm_lazer'] ?></p>
                                    </div>
                                    <?php $cont_lar++;
                                                }
                                            }
                                            ?>
                                </div>
                            </div>
                        </div>
                    <?php }
    				$cont++;
    			}
			?>
        </div>
    </section>

    <!-- Outros Empreendimentos -->
    <section class="titulo-grande">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <hr>
                    <img class="lazyload"
                        data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-empresa-titulo.png"
                        alt="icone-empresa">
                    <h2>OUTROS <b>EMPREENDIMENTOS</b></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="empreendimento">

        <div class="loading" style="padding-top: 220px;">
            <div class="loader5">
                <div class="loader-wrapper">
                    <div class="sk-folding-cube">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding-bottom: 40px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 pd--0">
                    <div id="form-busca">
                        <input type="text" id="busca" class="busca" placeholder="Faça uma busca">
                        <input type="submit" id="ir_busca" class="submit">
                    </div>
                </div>
            </div>

            <?php
			include('include/filtro.php');
			?>
            <div id="cards-empreendimento" class="row cards-empreendimento">
                <?php session_start();
				$cont = 0;
				foreach ($_SESSION['empre_all'] as $empre) { ?>
                <a href="<?php echo bloginfo('url'); ?>/empreendimento/interno/?e=<?php echo $empre['nm_url_empreendimento']; ?>"
                    class="ancora <?php if ($empre['ds_situacao'] == "Lançamentos") {
                        echo 'lancamento1';
                    } else {
                        echo 'lancamento0';
                    } ?>  <?php if ($empre['ds_situacao'] == "Em construção") {
                        echo 'construcao1';
                    } else {
                        echo 'construcao0';
                    } ?> <?php if ($empre['ds_situacao'] == "Prontos para Morar") {
                        echo 'pront1';
					} else {
						echo 'pront0';
					} ?> <?php if ($empre['ds_suites'] == "1") {
					    echo 'suite1';
					} else {
						echo 'suite0';
					} ?> <?php if ($empre['ds_situacao'] == "Prontos para Morar") {
					    echo 'pront1';
					} else {
						echo 'pront0';
					} ?> <?php if ($empre['ic_1_suite'] == "on" || $empre['ic_2_suite'] == "on" || $empre['ic_3_suite'] == "on" || $empre['ic_4_suite'] == "on") {
					    echo 'suite1';
					} else {
						echo 'suite0';
					} ?> <?php if ($empre['ic_1_vaga'] == "on") {
						echo 'vagas1';
					} else {
					    echo 'vagas0';
					} ?> <?php if ($empre['ic_2_dorm'] == "on") {
									echo 'dorm1';
								} else {
									echo 'dorm0';
								} ?> <?php if ($empre['ic_perto_praia'] == "on") {
												echo 'praia1';
											} else {
												echo 'praia0';
											} ?> <?php if ($empre['ic_revenda'] == "on") {
															echo 'revenda1';
														} else {
															echo 'revenda0';
														} ?> " <?php if ($cont >= 6) {
																		echo "style='display: none;'";
																	} ?>>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 card ">
                        <img class="foto lazyload"
                            data-src="<?php echo bloginfo('url'); ?>/s/assets/empreendimento/<?php echo $empre['cd_empreendimento']; ?>/<?php echo $empre['ds_thumb']; ?>"
                            style="background-color: <?php echo $empre['cd_hexadecimal']; ?>;"
                            alt="thumb-empreendimento">

                        <?php if ($empre['ds_situacao'] != "Prontos para Morar" && $empre['ds_situacao'] != "") { ?>
                        <p class="txt-destaque"><?php echo $empre['ds_situacao']; ?></p>
                        <?php } ?>

                        <div class="painel">

                            <?php if ($empre['ds_mar'] != "") { ?>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <img class="lazyload"
                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-mar.png"
                                    alt="icone-mar">
                                <p><b><?php echo $empre['ds_mar']; ?> m</b><br>do mar</p>
                            </div>
                            <?php } ?>

                            <?php if (
									$empre['ic_1_dorm'] == "on" ||
									$empre['ic_2_dorm'] == "on" ||
									$empre['ic_3_dorm'] == "on" ||
									$empre['ic_4_dorm'] == "on"
								) { ?>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <img class="lazyload"
                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-dorms.png"
                                    alt="icone-dorms">

                                <p><b><?php
												if ($empre['ic_1_dorm'] == "on") {
													echo "1";
													if ($empre['ic_2_dorm'] == "on") {
														echo ", 2";
														if ($empre['ic_3_dorm'] == "on") {
															echo ", 3";
															if ($empre['ic_4_dorm'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_dorm'] == "on") {
																echo " e 4";
															}
														}
													} else {
														if ($empre['ic_3_dorm'] == "on") {
															echo ", 3";
															if ($empre['ic_4_dorm'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_dorm'] == "on") {
																echo " e 4";
															}
														}
													}
												} else {
													if ($empre['ic_2_dorm'] == "on") {
														echo "2";
														if ($empre['ic_3_dorm'] == "on") {
															echo ", 3";
															if ($empre['ic_4_dorm'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_dorm'] == "on") {
																echo " e 4";
															}
														}
													} else {
														if ($empre['ic_3_dorm'] == "on") {
															echo "3";
															if ($empre['ic_4_dorm'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_dorm'] == "on") {
																echo "4";
															}
														}
													}
												} ?> dorm<?php if ($empre['ic_2_dorm'] == "on" || $empre['ic_3_dorm'] == "on" || $empre['ic_4_dorm'] == "on") {
																		echo "s";
																	} ?></b></p>
                            </div>
                            <?php } ?>

                            <?php if (
									$empre['ic_1_vaga'] == "on" ||
									$empre['ic_2_vaga'] == "on" ||
									$empre['ic_3_vaga'] == "on" ||
									$empre['ic_4_vaga'] == "on"
								) { ?>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <img class="lazyload"
                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-vaga.png"
                                    alt="icone-vagas">
                                <p><b><?php
												if ($empre['ic_1_vaga'] == "on") {
													echo "1";
													if ($empre['ic_2_vaga'] == "on") {
														echo ", 2";
														if ($empre['ic_3_vaga'] == "on") {
															echo ", 3";
															if ($empre['ic_4_vaga'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_vaga'] == "on") {
																echo " e 4";
															}
														}
													} else {
														if ($empre['ic_3_vaga'] == "on") {
															echo ", 3";
															if ($empre['ic_4_vaga'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_vaga'] == "on") {
																echo " e 4";
															}
														}
													}
												} else {
													if ($empre['ic_2_vaga'] == "on") {
														echo "2";
														if ($empre['ic_3_vaga'] == "on") {
															echo ", 3";
															if ($empre['ic_4_vaga'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_vaga'] == "on") {
																echo " e 4";
															}
														}
													} else {
														if ($empre['ic_3_vaga'] == "on") {
															echo "3";
															if ($empre['ic_4_vaga'] == "on") {
																echo " e 4";
															}
														} else {
															if ($empre['ic_4_vaga'] == "on") {
																echo "4";
															}
														}
													}
												} ?> vaga<?php if ($empre['ic_2_vaga'] == "on" || $empre['ic_3_vaga'] == "on" || $empre['ic_4_vaga'] == "on") {
																		echo "s";
																	} ?></b></p>
                            </div>
                            <?php } ?>

                            <?php if ($empre['ds_metra_min'] != "") { ?>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <img class="lazyload"
                                    data-src="<?php bloginfo("template_url") ?>/img/icon-color/12-mquadrado.png"
                                    alt="icone-metro-quadrados">
                                <p><b><?php
												echo $empre['ds_metra_min'];
												if ($empre['ds_metra_max'] != "") {
													echo " - ";
													echo $empre['ds_metra_max'];
												}
												echo " m²"; ?></b></p>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="nome">
                            <p><b class="nome_empree"><?php echo $empre['nm_empreendimento']; ?></b></p>
                            <p><?php echo $empre['ds_bairro']; ?>, Praia Grande</p>
                            <?php if ($empre['ds_situacao'] == "Prontos para Morar") { ?>
                            <img class="lazyload"
                                data-src="<?php bloginfo("template_url") ?>/img/icon/icon-pronto-morar.png"
                                alt="icone-pronto-para-morar">
                            <?php } ?>
                        </div>
                    </div>
                </a>
                <?php $cont++;
				}
				?>
            </div>
            <?php if ($cont >= 6) { ?>
            <div class="row">
                <div id="outro-empre" class="btn-tecnocal filtro-todos">
                    VER MAIS
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Mapa -->
    <section class="titulo-grande">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <hr>
                    <img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-local.png"
                        alt="icone-local">
                    <h2>ESCOLHA <b> SEU BAIRRO</b></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="mapa">
        <div class="container menu-desktop">
            <div class="row menu">

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 botao btn-canto-forte"
                    onclick="setBairro('canto-do-forte')">
                    <p>Canto do Forte</p>
                    <div class="seta"></div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 borda botao btn-guilhermina"
                    onclick="setBairro('guilhermina')">
                    <p>Guilhermina</p>
                    <div class="seta"></div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  botao btn-aviacao" onclick="setBairro('aviacao')">
                    <p>Aviação</p>
                    <div class="seta"></div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 borda botao btn-ocian" onclick="setBairro('ocian')">
                    <p>Ocian</p>
                    <div class="seta"></div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2  botao  btn-boqueirao "
                    onclick="setBairro('boqueirao')">
                    <p>Boqueirão</p>
                    <div class="seta"></div>
                </div>

            </div>

            <span id="top-mapa" style="margin-top: -45px; position: absolute;"></span>
        </div>

        <div class="container-fluid mapa-content">

            <div class="mapa-content  menu-desktop">
                <!-- PRAIA GRANDE -->
                <img class="mapa-praia-grande mapaimg" src="<?php bloginfo('template_url'); ?>/img/mapa/praia-mapa.jpg"
                    usemap="#mapa-praia-grande">
                <map name="mapa-praia-grande" class="menu-desktop">
                    <area class="marker-residencial-praia-do-leblon" target="" alt="residencial-praia-do-leblon"
                        title="residencial-praia-do-leblon" href="" coords="530,416,557,383,556,345,506,344,505,416"
                        shape="poly">
                    <area class="marker-residencial-praia-do-pontal" target="" alt="residencial-praia-do-pontal"
                        title="residencial-praia-do-pontal" href=""
                        coords="558,447,539,414,557,389,568,376,586,382,586,447" shape="poly">
                    <area class="marker-residencial-praia-do-arpoador" target="" alt="residencial-praia-do-arpoador"
                        title="residencial-praia-do-arpoador" href="" coords="826,259,877,340" shape="rect">
                    <area class="marker-residencial-praia-do-recreio" target="" alt="residencial-praia-do-recreio"
                        title="residencial-praia-do-recreio" href=""
                        coords="1000,227,1009,202,1014,189,1013,133,956,135,961,278,996,279,1007,260" shape="poly">
                    <area class="marker-residencial-barra-da-tijuca" target="" alt="residencial-barra-da-tijuca"
                        title="residencial-barra-da-tijuca" href=""
                        coords="1009,265,1008,293,1070,289,1065,194,1021,192,1011,201,1005,222,1002,238" shape="poly">
                    <area class="marker-residencial-amsterdam" target="" alt="residencial-amsterdam"
                        title="residencial-amsterdam" href="" coords="1070,155,1069,204,1081,202,1110,177,1112,153"
                        shape="poly">
                    <area class="marker-residencial-praia-das-conchas" target="" alt="residencial-praia-das-conchas"
                        title="residencial-praia-das-conchas" href=""
                        coords="1081,257,1076,206,1105,189,1117,194,1123,210,1125,223,1119,240,1109,253,1105,259"
                        shape="poly">
                    <area class="marker-residencial-londres" target="" alt="residencial-londres"
                        title="residencial-londres" href=""
                        coords="1127,259,1151,227,1150,175,1116,174,1110,184,1124,199,1125,221,1117,248" shape="poly">
                    <area class="marker-residencial-ottawa" target="" alt="residencial-ottawa"
                        title="residencial-ottawa" href="" coords="1203,115,1271,246" shape="rect">
                    <area class="marker-residencial-paris" target="" alt="residencial-paris" title="residencial-paris"
                        href="" coords="1284,130,1334,234" shape="rect">
                </map>

                <!-- CANTO DO FORTE -->
                <img class="mapa-canto-do-forte mapaimg"
                    src="<?php bloginfo('template_url'); ?>/img/mapa/forte-mapa.jpg" usemap="#mapa-canto-do-forte"
                    style="display: none;">
                <map name="mapa-canto-do-forte" class="menu-desktop">
                    <area class="marker-residencial-praia-do-leblon" target="" alt="residencial-praia-do-leblon"
                        title="residencial-praia-do-leblon" href="" coords="101,422,72,422,72,349,122,349,122,382"
                        shape="poly">
                    <area class="marker-residencial-praia-do-pontal" target="" alt="residencial-praia-do-pontal"
                        title="residencial-praia-do-pontal" href=""
                        coords="129,453,105,453,107,416,126,384,156,385,155,426" shape="poly">
                    <area class="marker-residencial-praia-do-arpoador" target="" alt="residencial-praia-do-arpoador"
                        title="residencial-praia-do-arpoador" href="" coords="391,265,442,343" shape="rect">
                    <area class="marker-residencial-praia-do-recreio" target="" alt="residencial-praia-do-recreio"
                        title="residencial-praia-do-recreio" href=""
                        coords="558,281,527,280,527,139,583,140,584,183,573,213,564,245,573,267" shape="poly">
                    <area class="marker-residencial-barra-da-tijuca" target="" alt="residencial-barra-da-tijuca"
                        title="residencial-barra-da-tijuca" href=""
                        coords="592,300,639,286,628,198,588,191,573,224,567,246" shape="poly">
                    <area class="marker-residencial-amsterdam" target="" alt="residencial-amsterdam"
                        title="residencial-amsterdam" href="" coords="635,209,634,156,677,158,673,176,647,211"
                        shape="poly">
                    <area class="marker-residencial-praia-das-conchas" target="" alt="residencial-praia-das-conchas"
                        title="residencial-praia-das-conchas" href=""
                        coords="665,265,646,261,642,215,671,178,680,192,691,229,682,250" shape="poly">
                    <area class="marker-residencial-londres" target="" alt="residencial-londres"
                        title="residencial-londres" href=""
                        coords="680,265,693,267,716,232,713,212,710,176,682,174,675,181,687,200,694,228,684,249"
                        shape="poly">
                    <area class="marker-residencial-ottawa" target="" alt="residencial-ottawa"
                        title="residencial-ottawa" href="" coords="768,117,837,250" shape="rect">
                    <area class="marker-residencial-paris" target="" alt="residencial-paris" title="residencial-paris"
                        href="" coords="850,133,898,236" shape="rect">
                </map>

                <!-- BOQUEIRÃO -->
                <img class="mapa-boqueirao mapaimg" src="<?php bloginfo('template_url'); ?>/img/mapa/boqueirao-mapa.jpg"
                    usemap="#mapa-boqueirao" style="display: none;">
                <map name="mapa-boqueirao" class="menu-desktop">
                    <area class="marker-residencial-praia-do-arpoador" target="" alt="residencial-praia-do-arpoador"
                        title="residencial-praia-do-arpoador" href="" coords="145,429,195,484" shape="rect">
                    <area class="marker-residencial-praia-do-recreio" target="" alt="residencial-praia-do-recreio"
                        title="residencial-praia-do-recreio" href="" coords="423,239,491,385" shape="rect">
                    <area class="marker-residencial-barra-da-tijuca" target="" alt="residencial-barra-da-tijuca"
                        title="residencial-barra-da-tijuca" href="" coords="506,310,574,413" shape="rect">
                    <area class="marker-residencial-amsterdam" target="" alt="residencial-amsterdam"
                        title="residencial-amsterdam" href="" coords="631,206,681,275" shape="rect">
                    <area class="marker-residencial-praia-das-conchas" target="" alt="residencial-praia-das-conchas"
                        title="residencial-praia-das-conchas" href="" coords="648,277,697,354" shape="rect">
                    <area class="marker-residencial-londres" target="" alt="residencial-londres"
                        title="residencial-londres" href="" coords="699,259,746,351" shape="rect">
                    <area class="marker-residencial-ottawa" target="" alt="residencial-ottawa"
                        title="residencial-ottawa" href="" coords="911,188,978,318" shape="rect">
                    <area class="marker-residencial-paris" target="" alt="residencial-paris" title="residencial-paris"
                        href="" coords="1060,190,1110,296" shape="rect">
                </map>

                <!-- GUILHERMINA -->
                <img class="mapa-guilhermina mapaimg"
                    src="<?php bloginfo('template_url'); ?>/img/mapa/guilhermina-mapa.jpg" usemap="#mapa-guilhermina"
                    style="display: none;">
                <map name="mapa-guilhermina" class="menu-desktop">
                    <area class="marker-residencial-praia-do-arpoador" target="" alt="residencial-praia-do-arpoador"
                        title="residencial-praia-do-arpoador" href="" coords="441,348,491,426" shape="rect">
                    <area class="marker-residencial-praia-do-recreio" target="" alt="residencial-praia-do-recreio"
                        title="residencial-praia-do-recreio" href="" coords="719,160,785,303" shape="rect">
                    <area class="marker-residencial-barra-da-tijuca" target="" alt="residencial-barra-da-tijuca"
                        title="residencial-barra-da-tijuca" href="" coords="801,229,872,336" shape="rect">
                    <area class="marker-residencial-amsterdam" target="" alt="residencial-amsterdam"
                        title="residencial-amsterdam" href="" coords="925,126,976,195" shape="rect">
                    <area class="marker-residencial-praia-das-conchas" target="" alt="residencial-praia-das-conchas"
                        title="residencial-praia-das-conchas" href="" coords="942,198,994,275" shape="rect">
                    <area class="marker-residencial-londres" target="" alt="residencial-londres"
                        title="residencial-londres" href="" coords="996,177,1041,273" shape="rect">
                    <area class="marker-residencial-ottawa" target="" alt="residencial-ottawa"
                        title="residencial-ottawa" href="" coords="1205,108,1274,236" shape="rect">
                    <area class="marker-residencial-paris" target="" alt="residencial-paris" title="residencial-paris"
                        href="" coords="1353,109,1408,216" shape="rect">
                </map>

                <!-- AVIAÇÃO -->
                <img class="mapa-aviacao mapaimg" src="<?php bloginfo('template_url'); ?>/img/mapa/aviacao-mapa.jpg"
                    usemap="#mapa-aviacao" style="display: none;">
                <map name="mapa-aviacao" class="menu-desktop">
                    <area class="marker-residencial-praia-do-leblon" target="" alt="residencial-praia-do-leblon"
                        title="residencial-praia-do-leblon" href="" coords="186,366,235,437" shape="rect">
                    <area class="marker-residencial-praia-do-pontal" target="" alt="residencial-praia-do-pontal"
                        title="residencial-praia-do-pontal" href="" coords="257,424,300,484" shape="rect">
                    <area class="marker-residencial-praia-do-arpoador" target="" alt="residencial-praia-do-arpoador"
                        title="residencial-praia-do-arpoador" href="" coords="825,201,876,278" shape="rect">
                    <area class="marker-residencial-praia-do-recreio" target="" alt="residencial-praia-do-recreio"
                        title="residencial-praia-do-recreio" href="" coords="1103,11,1172,157" shape="rect">
                    <area class="marker-residencial-barra-da-tijuca" target="" alt="residencial-barra-da-tijuca"
                        title="residencial-barra-da-tijuca" href="" coords="1185,80,1257,188" shape="rect">
                    <area class="marker-residencial-amsterdam" target="" alt="residencial-amsterdam"
                        title="residencial-amsterdam" href="" coords="1312,0,1360,47" shape="rect">
                    <area class="marker-residencial-praia-das-conchas" target="" alt="residencial-praia-das-conchas"
                        title="residencial-praia-das-conchas" href="" coords="1329,49,1377,129" shape="rect">
                    <area class="marker-residencial-londres" target="" alt="residencial-londres"
                        title="residencial-londres" href="" coords="1378,31,1425,124" shape="rect">
                    <area class="marker-residencial-ottawa" target="" alt="residencial-ottawa"
                        title="residencial-ottawa" href="" coords="1593,0,1659,89" shape="rect">
                    <area class="marker-residencial-paris" target="" alt="residencial-paris" title="residencial-paris"
                        href="" coords="1738,0,1791,67" shape="rect">
                </map>

                <!-- OCIAN -->
                <img class="mapa-ocian mapaimg" src="<?php bloginfo('template_url'); ?>/img/mapa/ocian-mapa.jpg"
                    usemap="#mapa-ocian" style="display: none;">
                <map name="mapa-ocian" class="menu-desktop">
                    <area class="marker-residencial-praia-do-leblon" target="" alt="residencial-praia-do-leblon"
                        title="residencial-praia-do-leblon" href="" coords="970,90,1022,167" shape="rect">
                    <area class="marker-residencial-praia-do-pontal" target="" alt="residencial-praia-do-pontal"
                        title="residencial-praia-do-pontal" href="" coords="1042,152,1089,224" shape="rect">
                </map>
            </div>

            <div class="mapa-content-mobile mobile">
                <img src="<?php bloginfo('template_url'); ?>/img/mapa/praia-grande-mobile.jpg"
                    usemap="#mapa-praia-grande-mobile" class="mapaimg">
                <map name="mapa-praia-grande-mobile" class="mobile">
                    <area class="marker-residencial-praia-do-leblon" target="" alt="residencial-praia-do-leblon"
                        title="residencial-praia-do-leblon" href="" coords="815,285,805,273,808,262,817,256,818,264"
                        shape="poly">
                    <area class="marker-residencial-praia-do-pontal" target="" alt="residencial-praia-do-pontal"
                        title="residencial-praia-do-pontal" href="" coords="817,285,825,291,834,281,826,268,819,273"
                        shape="poly">
                    <area class="marker-residencial-praia-do-arpoador" target="" alt="residencial-praia-do-arpoador"
                        title="residencial-praia-do-arpoador" href="" coords="885,235,903,264" shape="rect">
                    <area class="marker-residencial-praia-do-recreio" target="" alt="residencial-praia-do-recreio"
                        title="residencial-praia-do-recreio" href=""
                        coords="930,253,897,210,900,102,961,102,963,206,946,225,934,231" shape="poly">
                    <area class="marker-residencial-barra-da-tijuca" target="" alt="residencial-barra-da-tijuca"
                        title="residencial-barra-da-tijuca" href="" coords="935,245,941,253,946,243,944,229,935,234"
                        shape="poly">
                    <area class="marker-residencial-praia-das-conchas" target="" alt="residencial-praia-das-conchas"
                        title="residencial-praia-das-conchas" href=""
                        coords="955,244,964,235,963,226,956,220,949,228,949,236" shape="poly">
                    <area class="marker-residencial-londres" target="" alt="residencial-londres"
                        title="residencial-londres" href=""
                        coords="961,241,966,246,970,234,971,225,970,212,962,209,957,216,962,224,964,230,963,233,964,230"
                        shape="poly">
                    <area class="marker-residencial-ottawa" target="" alt="residencial-ottawa"
                        title="residencial-ottawa" href="" coords="981,202,1000,240" shape="rect">
                    <area class="marker-residencial-paris" target="" alt="residencial-paris" title="residencial-paris"
                        href="" coords="1002,201,1018,239" shape="rect">
                </map>
            </div>

            <div class="top-mapa mobile">
                <div class="">
                    <div class="title-map">
                        <h2><span>TOQUE</span> NO PIN PARA OBTER MAIS INFORMAÇÕES</h2>
                    </div>
                </div>
            </div>

            <div class="map-infos">
                <div class="main">
                    <div id="map-infos"></div>
                    <div class="thumb-txt-mp"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Carrossel Praia Grande -->
    <section id="owl-praia" class="owl-carousel owl-theme">
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/1.jpg"
                alt="foto-bairro-praia-grande">
        </div>
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/2.jpg"
                alt="foto-bairro-praia-grande">
        </div>
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/3.jpg"
                alt="foto-bairro-praia-grande">
        </div>
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/4.jpg"
                alt="foto-bairro-praia-grande">
        </div>
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/5.jpg"
                alt="foto-bairro-praia-grande">
        </div>
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/6.jpg"
                alt="foto-bairro-praia-grande">
        </div>
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/7.jpg"
                alt="foto-bairro-praia-grande">
        </div>
        <div class="item">
            <img class="owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/cidade/8.jpg"
                alt="foto-bairro-praia-grande">
        </div>
    </section>

    <!-- Depoimentos dos Clientes -->
    <section class="titulo-grande">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <hr>
                    <img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-play.png"
                        alt="icone-play">
                    <h2>DEPOIMENTOS <b>DOS CLIENTES</b></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="owl-depoimentos" class="owl-carousel owl-theme">


        <div class="item dep11">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image11.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep10">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image10.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep09">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image09.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep08">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image08.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <!-- <div class="item dep07">
			<img class="principal owl-lazy" data-src="<? php // echo bloginfo('template_url'); 
														?>/img/depoimentos/image07.jpg">
			<img class="play owl-lazy" data-src="<? php // echo bloginfo('template_url'); 
													?>/img/icon/play.png">
		</div> -->

        <div class="item dep06">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image06.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep05">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image05.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep04">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image04.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep03">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image03.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep02">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image02.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

        <div class="item dep01">
            <img class="principal owl-lazy"
                data-src="<?php echo bloginfo('template_url'); ?>/img/depoimentos/image01.jpg">
            <img class="play owl-lazy" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
        </div>

    </section>

    <!-- Notícias -->
    <section class="titulo-grande">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <hr>
                    <img class="lazyload" data-src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-noticias.png">
                    <h2>ÚLTIMAS <b>NOTÍCIAS</b></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="noticias-home" class="mrg-bt--60">
        <div class="container">
            <div class="row">

                <?php
				$paged      = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
				$args       = array('posts_per_page' => 3, 'paged' => $paged, 'cat' => -480);
				$wp_query   = new WP_Query($args);
				?>


                <?php if ($wp_query->have_posts()) {
					$cont = 0;
					while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if ($cont == 0) {  ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <?php if (has_post_thumbnail($post->ID)) { ?>

                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>

                        <?php
										$d = 0;
										$categories = get_the_category($post_ID);
										foreach ($categories as $category) {
											if ($category->name == "Vídeos") {
												$d++;
											};
										};
										?>
                        <img class="img-noticia lazyload" data-src="<?php echo $image[0]; ?>" <?php if ($d >= 1) { ?>
                            style="filter: brightness(0.5);" <?php } ?>>

                        <?php if ($d >= 1) { ?>
                        <img class="img-play lazyload"
                            data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                        <?php } ?>

                        <?php } else { ?>

                        <?php
										$d = 0;
										$categories = get_the_category($post_ID);
										foreach ($categories as $category) {
											if ($category->name == "Vídeos") {
												$d++;
											};
										};
										?>
                        <img class="img-noticia lazyload"
                            data-src="<?php bloginfo('template_url') ?>/img/tumb-tecnocal.jpg" <?php if ($d >= 1) { ?>
                            style="filter: brightness(0.5);" <?php } ?>>

                        <?php if ($d >= 1) { ?>
                        <img class="img-play lazyload"
                            data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                        <?php } ?>

                        <?php } ?>
                        <p><?php echo $post->post_title; ?></p>
                    </div>
                    <?php $cont++;
							} else { ?>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <?php if (has_post_thumbnail($post->ID)) { ?>

                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>

                        <?php
										$d = 0;
										$categories = get_the_category($post_ID);
										foreach ($categories as $category) {
											if ($category->name == "Vídeos") {
												$d++;
											};
										};
										?>
                        <img class="img-noticia lazyload" data-src="<?php echo $image[0]; ?>" <?php if ($d >= 1) { ?>
                            style="filter: brightness(0.5);" <?php } ?>>

                        <?php if ($d >= 1) { ?>
                        <img class="img-play lazyload"
                            data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                        <?php } ?>

                        <?php } else { ?>

                        <?php
										$d = 0;
										$categories = get_the_category($post_ID);
										foreach ($categories as $category) {
											if ($category->name == "Vídeos") {
												$d++;
											};
										};
										?>
                        <img class="img-noticia lazyload"
                            data-src="<?php bloginfo('template_url') ?>/img/tumb-tecnocal.jpg" <?php if ($d >= 1) { ?>
                            style="filter: brightness(0.5);" <?php } ?>>

                        <?php if ($d >= 1) { ?>
                        <img class="img-play lazyload"
                            data-src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                        <?php } ?>

                        <?php } ?>
                        <p><?php echo $post->post_title; ?></p>
                    </div>
                    <?php $cont++;
							} ?>
                </a>
                <?php endwhile; ?>
                <?php } ?>
            </div>

            <div class="row">
                <a href="<?php echo bloginfo('url'); ?>/noticias">
                    <div class="btn-tecnocal">
                        TODAS AS NOTÍCIAS
                    </div>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>
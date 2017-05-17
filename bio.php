<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include 'header.php'; ?>
        <title>Runika - Historia Zespołu</title>
        <script src="./js/sklad.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <!-- SOCIAL MEDIA -->

            <!-- LOGO AND MENUS -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div class="hidden-xs hidden-sm list-group" style="margin-top: 20%">
                        <a href="concerts.php" class="list-group-item text-center runika-nav-li">KONCERTY</a>
                        <a href="gallery.php" class="list-group-item text-center runika-nav-li">GALERIA</a>
                        <a href="media.php" class="list-group-item text-center runika-nav-li">MEDIA</a>
                        <a href="lyrics.php" class="list-group-item text-center runika-nav-li">TEKSTY</a>
                    </div>
                </div>
                <div class="col-md-4 logo">
                    <div class="media">
                        <img src="img/logo.png" class="media-object" style="width: 100%;">
                    </div>
                </div>
             
                
                <div class="col-md-2">
                    <div class="hidden-sm hidden-xs list-group" style="margin-top: 20%">
                        <a href="index.php" class="list-group-item text-center runika-nav-li">AKTUALNOŚCI</a>
                        <a href="bio.php" class="runika-active list-group-item text-center runika-nav-li">ZESPÓŁ</a>
                        <a href="contact.php" class="list-group-item text-center runika-nav-li">KONTAKT</a>
                        <a href="download.php" class="list-group-item text-center runika-nav-li">DO POBRANIA</a>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
               
            <!-- SMALL SCREEN MENU -->
                
            <nav id="nav" class="visible-xs-block visible-sm-block navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="hidden-sm navbar-brand" href="#">O ZESPOLE</a>
                    </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php">AKTUALNOŚCI</a></li>
                    <li class="active"><a href="bio.php">ZESPÓŁ</a></li>
                    <li><a href="contact.php">KONTAKT</a></li>
                    <li><a href="download.php">DO POBRANIA</a></li>
                    <li><a href="concerts.php">KONCERTY</a></li>
                    <li><a href="gallery.php">GALERIA</a></li>
                    <li><a href="media.php">MEDIA</a></li>
                    <li><a href="lyrics.php">TEKSTY</a></li>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="row">
                <div class="col-md-2"></div>

                
                <div class="runika-content col-md-8">
                    <!--SOCIAL MEDIA-->
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8" id="social-media">
                            </div>
                        </div>
                    </div>
                    <!--CONTENT-->
                    <div class="col-md-8">
                        <div class="row">
                            <ul class="nav nav-tabs nav-justified">
                              <li id="story-tab" class="runika-tab active"><a href="#">Historia</a></li>
                              <li id="band-tab" class="runika-tab"><a href="#">Skład</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div id="historia">
                                <div class="runika-post">
                                    <h2>Historia</h2>
                                </div>
                            </div>
                            
                            <div id="sklad" style="display: none">
                                <div id="Aminae" style="display: none" class="runika-post sklad-opis">
                                    <div class="row">
                                        <h2>Aminae</h2>
                                    </div>
                                    <div class="row runika-member">
                                        <div class="col-md-6">
                                            <img class="runika-album-img" src="img/aminae.jpg">
                                        </div>
                                        <div class="col-md-6">
                                            ggfdgfdgfdgfd
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="Rax" style="display: none" class="runika-post sklad-opis">
                                    <div class="row">
                                        <h2>Rax</h2>
                                    </div>
                                    <div class="row runika-member">
                                        <div class="col-md-6">
                                            <img class="runika-album-img" src="img/rax.jpg">
                                        </div>
                                        <div class="col-md-6">
                                            ggfdgfdgfdgfd
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="Kudlaty" style="display: none" class="runika-post sklad-opis">
                                    <div class="row">
                                        <h2>Kudłaty</h2>
                                    </div>
                                    <div class="row runika-member">
                                        <div class="col-md-6">
                                            <img class="runika-album-img" src="img/kudlaty.jpg">
                                        </div>
                                        <div class="col-md-6">
                                            ggfdgfdgfdgfd
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="Sigal" style="display: none" class="runika-post sklad-opis">
                                    <div class="row">
                                        <h2>Sigal</h2>
                                    </div>
                                    <div class="row runika-member">
                                        <div class="col-md-6">
                                            <img class="runika-album-img" src="img/sigal.jpg">
                                        </div>
                                        <div class="col-md-6">
                                            ggfdgfdgfdgfd
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="Mlody" style="display: none" class="runika-post sklad-opis">
                                    <div class="row">
                                        <h2>Mlody</h2>
                                    </div>
                                    <div class="row runika-member">
                                        <div class="col-md-6">
                                            <img class="runika-album-img" src="img/mlody.jpg">
                                        </div>
                                        <div class="col-md-6">
                                            ggfdgfdgfdgfd
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="Jacek" style="display: none" class="runika-post sklad-opis">
                                    <div class="row">
                                        <h2>Jacek</h2>
                                    </div>
                                    <div class="row runika-member">
                                        <div class="col-md-6">
                                            <img class="runika-album-img" src="img/jacek.jpg">
                                        </div>
                                        <div class="col-md-6">
                                            ggfdgfdgfdgfd
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="sklad-lista">
                                    <div class="col-md-4 runika-album-handler">
                                        <div class="col-md-12 runika-album">
                                            <a data-albumId="Aminae" class="runika-album-a" href="#Aminae">
                                                <img class="runika-album-img" style="width: 100%" src="./img/fb-logo.png" alt="Aminae">
                                                <div class="desc"><p class="runika-album-desc">Aminae - Wokal</p></div>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="col-md-4 runika-album-handler">
                                        <div class="col-md-12 runika-album">
                                            <a data-albumId="Rax" class="runika-album-a" href="#Rax">
                                                <img class="runika-album-img" style="width: 100%" src="./img/insta-logo.png" alt="Rax">
                                                <div class="desc"><p class="runika-album-desc">Rax - Bass</p></div>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="col-md-4 runika-album-handler">
                                        <div class="col-md-12 runika-album">
                                            <a data-albumId="Sigal" class="runika-album-a" href="#Sigal">
                                                <img class="runika-album-img" style="width: 100%" src="./img/logo.png" alt="Sigal">
                                                <div class="desc"><p class="runika-album-desc">Sigal - Gitara</p></div>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="col-md-4 runika-album-handler">
                                        <div class="col-md-12 runika-album">
                                            <a data-albumId="Mlody" class="runika-album-a" href="#Mlody">
                                                <img class="runika-album-img" style="width: 100%" src="./img/mail-logo.png" alt="Młody">
                                                <div class="desc"><p class="runika-album-desc">Młod - Klawisze</p></div>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="col-md-4 runika-album-handler">
                                        <div class="col-md-12 runika-album">
                                            <a data-albumId="Kudlaty" class="runika-album-a" href="#Kudlaty">
                                                <img class="runika-album-img" style="width: 100%" src="./img/plus.png" alt="Kudłaty">
                                                <div class="desc"><p class="runika-album-desc">Kudłaty - Gitara</p></div>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="col-md-4 runika-album-handler">
                                        <div class="col-md-12 runika-album">
                                            <a data-albumId="Jacek" class="runika-album-a" href="#Jacek">
                                                <img class="runika-album-img" style="width: 100%" src="./img/yt-logo.png" alt="Jacek">
                                                <div class="desc"><p class="runika-album-desc">Jacek - Perkusja</p></div>
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>

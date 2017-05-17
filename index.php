<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include 'header.php'; ?>
        <title>Runika - Aktualności</title>
    </head>
    <body>
        <div class="container-fluid">
            
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
                        <a href="index.php" class="runika-active list-group-item text-center runika-nav-li">AKTUALNOŚCI</a>
                        <a href="bio.php" class="list-group-item text-center runika-nav-li">ZESPÓŁ</a>
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
                        <a class="hidden-sm navbar-brand" href="#">AKTUALNOŚCI</a>
                    </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li href="index.php" class="active"><a href="#">AKTUALNOŚCI</a></li>
                    <li><a href="bio.php">ZESPÓŁ</a></li>
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
                    <?php
                        include 'src/post.php';
                        $posts = Post::loadAllPosts();
                        foreach ($posts as $post)
                        {
                            echo
                            (
                                '<div class="col-md-12 runika-post">
                                    <div class="runika-header"><h3>'.$post->getTitle().'</h3></div>
                                    <dl class="runika-date">'.$post->getDate().'</dl>
                                    <hr>
                                    <div itemprop="articleBody">
                                        <p>'.$post->getText().'</p>
                                    </div>
                                </div>'
                            );
                        }
                    ?>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>

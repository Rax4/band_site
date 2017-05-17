<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $pre ='<div id="Carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">';
    $album = $_POST['album'];
    for($i=0; $i < count($album); $i++)
    {
        if($i==0)
        {
            $pre .= '<li data-target="#Carousel" data-slide-to="'.$i.'" class="active"></li>';
        }
        else
        {
            $pre .= '<li data-target="#Carousel" data-slide-to="'.$i.'"></li>';
        }
    }
    $pre .= '</ol>
            <div class="carousel-inner runika-carousel">';

    for($j=0; $j < count($album); $j++)
    {
        if($j==0)
        {
            $pre .= '
                <div class="item active">
                <img class="runika-carousel-img" src="'.$album[$j]['src'].'">
                </div>';
        }
        else
        {
            $pre .= '
                    <div class="item">
                    <img class="runika-carousel-img" src="'.$album[$j]['src'].'">
                    </div>';
        }
    }
    $pre .= '</div>
        <a class="left carousel-control" href="#Carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#Carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>';
    echo json_encode($pre);
    return;
}
                        
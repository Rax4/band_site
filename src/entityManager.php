<?php
require 'loader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if ($_POST['request'] == 'photo')
    {
        $src = $_POST['src'];
        $albumId = $_POST['albumId'];
        $photo = new Photo();
        $photo->setSrc($src);
        $photo->setAlbumId($albumId);
        if( $photo->saveToDB() == false ) 
        {
            return false;
        }
        else 
        {
            return true;
        }
    }
    
    if ($_POST['request'] == 'album')
    {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $date = $_POST['date'];
        $thumbnail = $_POST['thumbnail'];
        $album = new Album();
        $album->setAuthor($author);
        $album->setDate($date);
        $album->setName($name);
        $album->setThumbnail($thumbnail);
        if ($album->saveToDB() == false)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    if ($_POST['request'] == 'post')
    {
        $title = $_POST['title'];
        $text = $_POST['text'];
        $date = $_POST['date'];
        $post = new Post();
        $post->setDate($date);
        $post->setText($text);
        $post->setTitle($title);
        if ($post->saveToDB() == false)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    if ($_POST['request'] == 'concert')
    {
        $title = $_POST['title'];
        $text = $_POST['text'];
        $date = $_POST['date'];
        $concert = new Concert();
        $concert->setDate($date);
        $concert->setText($text);
        $concert->setTitle($title);
        if ($concert->saveToDB() == false)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if ($_GET['request'] == 'albums')
    {
        $albums = Album::loadAllAlbums();
        
        echo json_encode($albums);
        return;
    }
    
    if ($_GET['request'] == 'album')
    {
        $album = Album::loadAlbumById($_GET['id']);
        
        echo json_encode($album);
        return;
    }
    
    if ($_GET['request'] == 'photos')
    {
        $photos = Photo::loadAllAlbumPhotos((int)$_GET['id']);

        echo json_encode($photos);
        return;
    }
    
    if ($_GET['request'] == 'concerts')
    {
        $concerts = Concert::loadAllConcerts();
        echo json_encode($concerts);
        return;
    }
    
    if ($_GET['request'] == 'lyrics')
    {
        $lyrics = Lyrics::loadAllLyrics();
        echo json_encode($lyrics);
        return;
    }
    
    if ($_GET['request'] == 'files')
    {
        $files = Download::loadAllDownloads();
        echo json_encode($files);
        return;
    }
    
}
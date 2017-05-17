<?php
    require 'connection.php';

class Photo implements JsonSerializable
{
    private $id;
    private $src;
    private $albumId;

    public function jsonSerialize()
    {
        return (object)get_object_vars($this);
    }
    public function __construct()
    {
        $this->id = -1;
        $this->src = null;
        $this->albumId = null;
    }
            
    function getId()
    {
        return $this->id;
    }

    function getSrc()
    {
        return $this->src;
    }

    function getAlbumId()
    {
        return $this->albumId;
    }

    function setSrc($src)
    {
        $this->src = $src;
    }

    function setAlbumId($albumId)
    {
        $this->albumId = $albumId;
    }

    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Photos(src, albumId) VALUES (?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute(["$this->src", $this->albumId]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                $album = Album::loadAlbumById($this->albumId);
                if ($album->getThumbnail() == null)
                {
                    $album->setThumbnail($this->src);
                    $album->saveToDB();
                }
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Photos SET src=?,albumId=? WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->src, $this->albumId, $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return false;
    }
        
    static public function loadPhotoById($id)
    {
        global $conn;
        $sql = "SELECT * FROM Photos WHERE id=$id";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() == 1)
        {
            $row = $result->fetch();
            $loadedPhoto = new Photo();
            $loadedPhoto->id = $row['id'];
            $loadedPhoto->src = $row['src'];
            $loadedPhoto->albumId = $row['albumId'];
            return $loadedPhoto;
        }
        return null;
    }  
    
    static public function loadAllAlbumPhotos($albumId)
    {
        global $conn;
        $sql = "SELECT * FROM Photos WHERE albumId=$albumId";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedPhoto = new Photo();
                $loadedPhoto->id = $row['id'];
                $loadedPhoto->src = $row['src'];
                $loadedPhoto->albumId = $row['albumId'];
                $ret[] = $loadedPhoto;
            }
        }
        return $ret;
    }
    
    public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Photos WHERE id=$this->id";
            $result = $conn->query($sql);
            if($result == true)
            {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }
}
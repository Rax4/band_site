<?php
    require 'connection.php';
class Album implements JsonSerializable
{   
    private $id;
    private $name;
    private $author;
    private $date;
    private $thumbnail;


    public function jsonSerialize()
    {
        return (object)get_object_vars($this);
    }

    public function __construct() 
    {
        $this->id=-1;
        $this->name='';
        $this->author='';
        $this->date = null;
        $this->thumbnail = null;
    }
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Albums(name, author, date, thumbnail) VALUES (?,?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->name, $this->author,  $this->date, $this->thumbnail]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Albums SET name=?,author=?,date=?,thumbnail=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->name, $this->author, $this->date, $this->thumbnail, $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return false;
    }
    
    static public function loadAlbumById($id)
    {
        global $conn;
        $sql = "SELECT * FROM Albums WHERE id=$id";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() == 1)
        {
            $row = $result->fetch();
            $loadedAlbum = new Album();
            $loadedAlbum->id = $row['id'];
            $loadedAlbum->name = $row['name'];
            $loadedAlbum->author = $row['author'];
            $loadedAlbum->date = $row['date'];
            $loadedAlbum->thumbnail = $row['thumbnail'];
            return $loadedAlbum;
        }
        return null;
    }    
    
    static public function loadAllAlbums()
    {
        global $conn;
        $sql = "SELECT * FROM Albums";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedAlbum = new Album();
                $loadedAlbum->id = $row['id'];
                $loadedAlbum->name = $row['name'];
                $loadedAlbum->author = $row['author'];
                $loadedAlbum->date = $row['date'];
                $loadedAlbum->thumbnail = $row['thumbnail'];
                $ret[] = $loadedAlbum;
            }
        }
        return $ret;
    }
    public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Albums WHERE id=$this->id";
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

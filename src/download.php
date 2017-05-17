<?php
require 'connection.php';

class Download implements JsonSerializable
{
    private $id;
    private $src;
    private $name;
    private $description;
    
    public function __construct()
    {
        $this->id = -1;
        $this->src = '';
        $this->name = '';
        $this->description = '';
    }

    public function jsonSerialize()
    {
        return (object)get_object_vars($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSrc()
    {
        return $this->src;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDesription()
    {
        return $this->description;
    }

    public function setSrc($src)
    {
        $this->src = $src;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDesription($desription)
    {
        $this->desription = $description;
    }

    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Downloads(src, name, description) VALUES (?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->src, $this->name,  $this->description]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Downloads SET src=?,name=?,description=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->src, $this->name, $this->description, $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return false;
    }
    
    static public function loadAllDownloads()
    {
        global $conn;
        $sql = "SELECT * FROM Downloads";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedFile = new Download();
                $loadedFile->id = $row['id'];
                $loadedFile->src = $row['src'];
                $loadedFile->description = $row['description'];
                $loadedFile->name = $row['name'];
                $ret[] = $loadedFile;
            }
        }
        return $ret;
    }
    public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Downloads WHERE id=$this->id";
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

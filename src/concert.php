<?php
    require 'connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of post
 *
 * @author piotr
 */
class Concert implements JsonSerializable
{
    private $id;
    private $title;
    private $text;
    private $date;
    
    public function jsonSerialize()
    {
        return (object)get_object_vars($this);
    }
    
    public function __construct()
    {
        $this->id = -1;
        $this->date = date('d:m:Y:H:i');
        $this->title = '';
        $this->text = '';
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getText()
    {
        return $this->text;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }

    function setDate($date)
    {
        $this->date = $date;
    }

    function setText($text)
    {
        $this->text = $text;
    }

    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Concerts(title, date, text) VALUES (?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->title, $this->date,  $this->text]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Concerts SET title=?,date=?,text=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->title, $this->date, $this->text, $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return false;
    }
    
    static public function loadConcertsById($id)
    {
        global $conn;
        $sql = "SELECT * FROM Concerts WHERE id=$id";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() == 1)
        {
            $row = $result->fetch();
            $loadedPost = new Concert();
            $loadedPost->id = $row['id'];
            $loadedPost->title = $row['title'];
            $loadedPost->date = $row['date'];
            $loadedPost->text = $row['text'];
            return $loadedPost;
        }
        return null;
    }    
    
    static public function loadAllConcerts()
    {
        global $conn;
        $sql = "SELECT * FROM Concerts ORDER BY date DESC ";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedPost = new Concert();
                $loadedPost->id = $row['id'];
                $loadedPost->title = $row['title'];
                $loadedPost->text = $row['text'];
                $loadedPost->date = $row['date'];
                $ret[] = $loadedPost;
            }
        }
        return $ret;
    }
    public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Concerts WHERE id=$this->id";
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
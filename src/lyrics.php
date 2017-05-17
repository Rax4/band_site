<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lyrics
 *
 * @author piotr
 */
require 'connection.php';

class Lyrics implements JsonSerializable
{
    private $id;
    private $title;
    private $text;
    private $words;
    private $music;
    
    public function __construct()
    {
        $this->id = -1;
        $this->title = '';
        $this->text = '';
        $this->words = '';
        $this->music = '';
    }
    
    public function jsonSerialize()
    {
        return (object)get_object_vars($this);
    }


    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getWords()
    {
        return $this->words;
    }

    public function getMusic()
    {
        return $this->music;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setWords($words)
    {
        $this->words = $words;
    }

    public function setMusic($music)
    {
        $this->music = $music;
    }

    public function saveToDB()
    {
        global $conn;
        if ($this->id == -1)
        {
            $sql = "INSERT INTO Lyrics(title, text, words, music) VALUES (?,?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->title, $this->text,  $this->words, $this->music]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else
        {
            $sql = "UPDATE Lyrics SET title=?,text=?,words=?,music=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->title, $this->text, $this->words, $this->music, $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return FALSE;
    }
    
    static public function loadAllLyrics()
    {
        global $conn;
        $sql = "SELECT * FROM Lyrics";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedLyrics = new Lyrics();
                $loadedLyrics->id = $row['id'];
                $loadedLyrics->title = $row['title'];
                $loadedLyrics->text = $row['text'];
                $loadedLyrics->music = $row['music'];
                $loadedLyrics->words = $row['words'];
                $ret[] = $loadedLyrics;
            }
        }
        return $ret;
    }
    
        public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Lyrics WHERE id=$this->id";
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

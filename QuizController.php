<?php
require_once 'DbConnection.php';

class QuizController extends DbConnection
{
    const CATEGORY = [
        1 => 'Osoba, Postać',
        2 => 'Film',
        3 => 'Przedmiot, Miejsce',
    ];

    private $randomId;
    private $randomRow;

    public function getQuestion()
    {
        $this->randomRow = $this->getRandomRow($this->getRows());
        $this->updateDisplayStatus($this->randomRow[0]);
        return $this->randomRow[1];
    }


    public function getImage()
    {
        return $this->randomRow[3] ? $this->randomRow[3] : '';
    }

    public function getAnswer()
    {
        return $this->randomRow[2];
//        return self::CATEGORY[$this->randomRow[2]];
    }

    public function getCategory()
    {
        return self::CATEGORY[$this->randomRow[2]];
    }

    public function resetDisplayStatus()
    {
        $sql = "UPDATE quiz SET is_displayed = 0";
        $this->getConnectDb()->query($sql);
        $this->closeDbConnection();
    }

    private function updateDisplayStatus($randomId)
    {
        $sql = "UPDATE quiz SET is_displayed = 1 WHERE id =" . $randomId . "" ;
        $this->getConnectDb()->query($sql);
        $this->closeDbConnection();
    }

    private function getRows()
    {
        $sql = "SELECT * FROM quiz WHERE is_displayed = 0";
        $result = $this->getConnectDb()->query($sql);
        if ($result->num_rows > 0) {
            $rows = $result->fetch_all();
            return $rows;
        }
        else
            echo "0 wyników";
        return [];
        $this->closeDbConnection();
    }

    private function getRandomRow($rows)
    {
        $this->randomId = array_rand($rows);
        return $rows[$this->randomId] ;
    }
}
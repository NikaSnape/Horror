<?php
require_once 'DbConnection.php';

class Kalambury extends DbConnection
{
    const CATEGORY = [
        1 => 'Osoba, Postać',
        2 => 'Film',
        3 => 'Przedmiot, Miejsce',
    ];

    private $randomId;
    private $randomRow;

    public function getEntry()
    {
        $this->randomRow = $this->getRandomRow($this->getRows());
        $this->updateDisplayStatus($this->randomRow[0]);
        return $this->randomRow[1];
    }

    public function getCategory()
    {
        return self::CATEGORY[$this->randomRow[2]];
    }

    public function resetDisplayStatus()
    {
        $sql = "UPDATE kalambury SET is_displayed = 0";
        $this->getConnectDb()->query($sql);
        $this->closeDbConnection();
    }

    private function updateDisplayStatus($randomId)
    {
        $sql = "UPDATE kalambury SET is_displayed = 1 WHERE id =" . $randomId . "" ;
        $this->getConnectDb()->query($sql);
        $this->closeDbConnection();
    }

    private function getRows()
    {
        $sql = "SELECT * FROM kalambury WHERE is_displayed = 0";
        $result = $this->getConnectDb()->query($sql);
        if ($result->num_rows > 0) {
            $rows = $result->fetch_all();
            return $rows;
        }
        else
            echo "0 wyników";
        $this->closeDbConnection();
    }

    private function getRandomRow($rows)
    {
        $this->randomId = array_rand($rows);
        return $rows[$this->randomId];
    }
}
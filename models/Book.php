<?php

namespace models;

use components\Db;
use PDO;

class Book
{
    public $id;
    public $isbn;
    public $ean;
    public $name;
    public $description;
    public $netto;
    public $brutto;
    public $language;
    public $series;
    public $code;

    static protected function tableName()
    {
        return 'books';
    }

    public function __construct($isbn, $name, $description, $netto, $language, $series, $code)
    {
        $this->isbn = $this->setIsbn($isbn);
        $this->ean = $this->setEan($isbn);
        $this->name = $name;
        $this->description = $description;
        $this->netto = $netto;
        $this->brutto = $this->setBrutto($netto);
        $this->language = $this->setLanguage($language);
        $this->series = $this->setSeries($series);
        $this->code = $code;
    }

    protected function setBrutto($netto)
    {
        return round($netto*1.1);
    }
    protected function setIsbn($isbn)
    {
        return preg_replace('/[^\d-]/','',$isbn);
    }
    protected function setEan($isbn)
    {
        $ean = preg_replace('/[^\d]/','',$isbn);
        $check = 3*($ean[1] + $ean[3] + $ean[5] + $ean[7] + $ean[9] + $ean[11]) + $ean[0] + $ean[2] + $ean[4] + $ean[6] + $ean[8] + $ean[10];
        $check = $check % 10;
        if ($check != 0) $check = 10 - $check;
        if ($ean[12] != $check)
        {
            $ean[12] = $check;
            $this->isbn = substr_replace($this->isbn, $check , -1 , 1);
        }
        return $ean;
    }
    protected function setLanguage($language)
    {
        return $language;
    }
    protected function setSeries($series)
    {
        return $series;
    }
    static public function getBookList()
    {
        $db = Db::getConnection();
        $bookList = array();
        $sql = 'SELECT * FROM '. self::tableName();
        $result = $db->query($sql);
        
        $i = 0;
        while($row = $result->fetch()) {
            $bookList[$i]['id'] = $row['id'];
            $bookList[$i]['isbn'] = $row['isbn'];
            $bookList[$i]['ean'] = $row['ean'];
            $bookList[$i]['name'] = $row['name'];
            $bookList[$i]['description'] = $row['description'];
            $bookList[$i]['netto'] = $row['netto'];
            $bookList[$i]['brutto'] = $row['brutto'];
            $bookList[$i]['language'] = $row['language'];
            $bookList[$i]['series'] = $row['series'];
            $bookList[$i]['code'] = $row['code'];
            $i++;
        }

        return $bookList;
    }
}
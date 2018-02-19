<?php

use models\Book;
use models\ReadXML;
use controllers\SiteController;

class BookController extends SiteController
{
    public function actionList()
    {
        $books = Book::getBookList();
        $this->setTitle('Список книг');
        return $this->render('books/list', ['books' => $books]);
    }
    public function actionAddFile()
    {
        if ($_REQUEST)
        {
            $file = $_FILES['importfile']['tmp_name'];
            $xml = new ReadXML($file);
            $xml_file = $xml->getBooksFromFile();
            //$xml_file = new SimpleXMLElement(file_get_contents($file));
            //$xml_file = $xml_file->book[0]->param;
            $ans = '';
            /*foreach ($xml_file as $name)
            {
                $ans .= (string) $name['name'] . ' = '.$name . '; ';
            }*/
            //$ans = $xml_file;
        }
        else {$ans = true;}
        $this->setTitle('Добавить файл данных');
        return $this->render('books/add_file', ['ans' => $ans, 'xml_file' => $xml_file]);
    }
}
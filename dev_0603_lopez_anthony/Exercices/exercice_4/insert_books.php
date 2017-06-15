<?php
use "Library\Book";
use Library\RandomBookDataGenerator;
use "Library\BookManager";


//insère 200 livres au hasard en base de données

class InsertBook extends RandomBookDataGenerator {
    function insertBook(){
        for($i=0; $i<201; $i++){
            $bookManager->findAll();
            $bookManager->insert($book);
        }
    }
}


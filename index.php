<?php

require_once "./vendor/autoload.php";
require_once "./generated-conf/config.php";

// $author = new Author();
// $author->setFirstName('António');
// $author->setLastName('Gabriel');

// $author->save();


// echo $author->getId();
// echo $author->getFirstName();

// $q = new AuthorQuery();
// $firstAuthor = $q->findPk(1);
// echo $firstAuthor;


$firstAuthor2 = AuthorQuery::create()->findPk(1);
echo $firstAuthor2;

// $author = AuthorQuery::create()->findOneById(1);

// $author->setFirstName('António Campos');

// $author->save();


    







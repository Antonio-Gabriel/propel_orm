<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'bookstore' => 
  array (
    0 => '\\Map\\AuthorTableMap',
    1 => '\\Map\\BookTableMap',
    2 => '\\Map\\PublisherTableMap',
  ),
));

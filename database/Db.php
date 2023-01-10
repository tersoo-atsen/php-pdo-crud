<?php

class DB
{

  static public function connect()
  {
    $host = 'localhost'; /* Host name of the MySQL server. */
    $user = 'root'; /* MySQL account username. */
    $passwd = ''; /* MySQL account password. */
    $schema = 'pdo_crud_db'; /* The default schema you want to use. */
    $pdo = NULL; /* The PDO object. */
    /* Connection string, or "data source name". */
    $dsn = 'mysql:host=' . $host . ';dbname=' . $schema;

    /* Connection inside a try/catch block. */
    try {
      /* PDO object creation. */
      $pdo = new PDO($dsn, $user,  $passwd);
      $pdo->exec("set names utf8");
      /* Enable exceptions on errors. */
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      /* If there is an error, an exception is thrown. */
      echo 'Database connection failed.';
      die();
    }
  }
}

<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class Connection
{
  private const HOST = "localhost";
  private const DBNAME = "fullstackphp";
  private const USER = "root";
  private const PORT = "3306";
  private const PASSWD = "";

  // Configurações que definem o comportamento do PDO com o Banco de dados
  private const DB_OPTIONS = [
  	 PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
  	 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  	 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  	 PDO::ATTR_CASE => PDO::CASE_NATURAL
  ];

  // propriedade responsável por armazenar o objeto PDO
  private static $instance;

  public static function getInstance(): PDO
  {
  	if(empty(self::$instance)){
  		try {
            self::$instance = new PDO(
            	"mysql:host=".self::HOST.";dbname=".self::DBNAME.";port=".self::PORT,
            	 self::USER,
                 self::PASSWD,
            	 self::DB_OPTIONS
            );

  		} catch(PDOException $exception){
  		  // A função die para execução do código e exibe uma mensagem
          die("<h1>Whoops! Erro ao conectar...</h1>"); 
  		}
  	}
     return self::$instance;
  	
  }


  final private function __construct()
  {

  }

  final private function __clone()
  {

  }


}

?>
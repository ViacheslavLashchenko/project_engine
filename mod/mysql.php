<?php

// *
//  * MySQL class
//  * @author Pulsar
//  * @package Class
//  * @name MySQL
 

class Sql{

  /**
   * MySQL link
   * @access public
   * @var link
   */
  public static $link;

  /**
   * MySQL connect
   * @author Pulsar
   * @param string $myhost mysql host
   * @param string $myuser mysql user name
   * @param string $mypass mysql password
   * @param string $mydbname mysql dbname
   * @return source
   * @uses $link
   */
  public function __construct($myhost, $myuser, $mypass, $mydbname){

    Sql::$link = new mysqli($myhost, $myuser, $mypass, $mydbname);
    if (Sql::$link->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . Sql::$link->connect_errno . ") " . Sql::$link->connect_error;
    }
  }
  /*================================================================*/

  /**
   * MySQL query
   * @author Pulsar
   * @param string $query mysql query
   * @param string $phpscript script file name
   * @param string $phpline script line number
   * @return source
   * @uses $link
   */
  static public function sqlQuery($query, $phpscript, $phpline){

    $res = Sql::$link->query($query);
    if(!$res){
      trigger_error($phpscript.'||'.$phpline.'||'.mysql_error(Sql::$link).'||'.'Query: '.$query, E_USER_ERROR);
    }else{
      return $res;
    }
  }
  /*================================================================*/
}
?>

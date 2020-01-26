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
  public function SqlM($myhost, $myuser, $mypass, $mydbname){

    Sql::$link = mysql_connect($myhost, $myuser, $mypass);
    if (!is_resource(Sql::$link)){
      trigger_error(mysql_error(Sql::$link), E_USER_WARNING);
    }
    mysql_query('SET NAMES "utf8"', Sql::$link);
    if (!mysql_select_db($mydbname, Sql::$link)) {
      trigger_error(mysql_error(Sql::$link), E_USER_WARNING);
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

    $res = mysql_query($query, Sql::$link);
    if(!$res){
      trigger_error($phpscript.'||'.$phpline.'||'.mysql_error(Sql::$link).'||'.'Query: '.$query, E_USER_ERROR);
    }else{
      return $res;
    }
  }
  /*================================================================*/
}
?>

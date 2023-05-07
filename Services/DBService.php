<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 11/27/2018
 * Time: 8:24 PM
 */

/*
 * For prod
 *
 * 'connectionString' => 'mysql:host=localhost;dbname=carms112_btmauctions',
			'emulatePrepare' => true,
			'username' => 'carms112_sari',
			'password' => 'G00342899',
			'charset' => 'utf8',

*
 * */

/**
 * Class DBService
 * used to generate database connections
 */
class DBService
{
    var $servername = "localhost";
    /**
     * These settings are used for development
     * @var string
     */
    var $username = "root";
    var $password = "reed2020";
    var $dbname = "btmauctions";

    /**
     * These settings are used for Production
     * @var string
     */
    //var $username = "carms112_sari";
    //var $password = "G00342899";
    //var $dbname = "carms112_btmauctions";

    public function __construct(){


        if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
            echo 'Why you no have mysqli!!!';
        }
        $conn = new mysqli($this->servername, $this->username, $this->password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    public function doQuery($qry){
        $mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $result = $mysqli->query($qry);
        $mysqli->close();
        return $result;
    }

    public function doNonQuery($qry){
        try{
            $mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            $mysqli->query($qry);
            $mysqli->close();
        }catch (Exception $ex){
            return "Error: "+$ex;
        }
        return true;
    }

    public function doNonQueryAndGetID($qry){
        try{
            $mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            $mysqli->query($qry);
            $row = $mysqli->query("SELECT LAST_INSERT_ID()");
            $mysqli->close();
            return $row->fetch_row()[0];
        }catch (Exception $ex){
            return "Error: "+$ex;
        }
    }
}
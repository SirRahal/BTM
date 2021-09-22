<?php

require_once "Classes/BTMAuction.php";
require_once "DBService.php";

class AuctionsService
{
    var $DBService;
    function __construct()
    {
        $this->DBService = new DBService();
    }

    function getAuction($ID){
        $qry = "SELECT * FROM auctions WHERE `ID`=".$ID;
        $results = $this->DBService->doQuery($qry);
        while ($row = $results->fetch_row()) {
            return new BTMAuction($row);
        }
    }

    function getAllAuctions(){
        $qry = 'SELECT * FROM auctions ORDER BY `date` DESC';

        $auctions = array();

        $results = $this->DBService->doQuery($qry);
        while ($row = $results->fetch_row()) {
            array_push($auctions, new BTMAuction($row));
        }
        return $auctions;
    }

    function getUpcomingAuctions($category = null){
        if($category == null){
            $qry = "SELECT * FROM auctions WHERE `Date` >= CURDATE() order by `Priority` asc, `Date` asc;";
        }else{
            $qry = "SELECT * FROM auctions WHERE `category` = '".$category."' AND `Date` >= CURDATE() order by `Priority` asc, `Date` asc;";
        }

        $auctions = array();
        try{
            $results = $this->DBService->doQuery($qry);
            while ($row = $results->fetch_row()) {
                array_push($auctions, new BTMAuction($row));
            }

        } catch(Exception $e){
            echo $e->getMessage();
        }
        return $auctions;
    }

    function getPastAuctions($category = null){
        if($category == null){
            $qry = "SELECT * FROM auctions WHERE `Date` < CURDATE() order by  `Date` DESC LIMIT 10";
        }else{
            $qry = "SELECT * FROM auctions WHERE `category` = '".$category."' AND `Date` < CURDATE() order by  `Date` DESC LIMIT 10";
        }
        $auctions = array();

        $results = $this->DBService->doQuery($qry);
        while ($row = $results->fetch_row()) {
            array_push($auctions, new BTMAuction($row));
        }
        return $auctions;
    }

    function updateAuction($id, $title, $description,$url, $date, $category, $location, $file = null){
        $qry = "UPDATE `auctions` SET `Title` = '$title', `URL` = '$url', `Description` = '$description', `Date` = '$date', `Category` = '$category', `Location` = '$location' WHERE (`ID` = '$id')";
        try {
            $results = $this->DBService->doNonQuery($qry);
            if($results && $file!=null){
                $results = $this->updateImageName($file, $id);
            }
        }catch (Exception $e){
            return "Failed to update Auction: ". $e->getMessage();
        }

        return $results;
    }

    function createAuction( $title, $description,$url, $date, $category, $location, $file = null){
        $qry = "INSERT INTO `auctions` (`Title`, `URL`, `Description`, `Date`, `Category`, `Location`) VALUES ('$title', '$url', '$description', '$date', '$category', '$location')";

        $ID = $this->DBService->doNonQueryAndGetID($qry);
        $results = true;
        if($ID && $file!=null && $file['size']>0){
            $results = $this->updateImageName($file, $ID);
        }
        return $results;
    }

    function updateImageName($file, $ID){
        try{
            $newFileName = $this->uploadImage($file, $ID);
            $qry = "UPDATE `auctions` SET `IMG` = '$newFileName'  WHERE (`ID` = '$ID')";
            $this->DBService->doNonQuery($qry);
        }catch (Exception $e){
            return $e->getMessage();
        }
        return true;

    }

    function deleteAuction($ID){
        $auction = $this->getAuction($ID);
        $qry = "DELETE FROM `auctions` WHERE (`ID` = '$ID')";
        $results = $this->DBService->doNonQuery($qry);
        //if record is deleted from the database and file isn't the default, delete it
        if($results && $auction->IMG != 'default.png'){
            $this->deleteAuctionImage($auction->IMG);
        }
        return true;
    }

    function deleteAuctionImage($fileName){
        $filePath = 'Images'.DIRECTORY_SEPARATOR.'Auctions'.DIRECTORY_SEPARATOR.$fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    /*
     *  [name] => 20201125_164833.jpg [type] => image/jpeg [tmp_name] => C:\PHP\temp\php7C3A.tmp [error] => 0 [size] => 3430030 )
     * */
    function uploadImage($file, $ID){
        $path_info = pathinfo($file["name"]);
        $newFileName = $ID.'.'.strtolower($path_info['extension']);
        $destinationPath = 'Images'.DIRECTORY_SEPARATOR.'Auctions'.DIRECTORY_SEPARATOR.$newFileName;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destinationPath);
        return $newFileName;
    }

}
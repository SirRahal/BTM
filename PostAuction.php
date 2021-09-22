<?php

/*
 *   Posted data structure
 * Array ( [ID] => NEW [title] => Laravel two-way binding with inputs [description] => asdf [url] => https://auctions.btmindustrial.com/Monthly-Machinery-Auction-Feb-23rd_as70531 [date] => 2021-02-24T08:30 [category] => 1 ) 1
 *
 * Array ( [fileToUpload] => Array ( [name] => 20201125_164833.jpg [type] => [tmp_name] => [error] => 1 [size] => 0 ) ) 1

 * */

include_once "Services/AuctionsService.php";
include_once "components/AuctionsEdit.php";

$auctionService = new AuctionsService();

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
}elseif (isset($_POST['ID'])){
    $ID = $_POST['ID'];
}
if (isset($_GET['ACTION'])) {
    $ACTION = $_GET['ACTION'];
}elseif (isset($_POST['ACTION'])){
    $ACTION = $_POST['ACTION'];
}

//escape special characters
$title = addslashes($_POST['title']);
$description = addslashes($_POST['description']);
$location = addslashes($_POST['location']);

/*GET first category of auctions*/
if($ID != 'NEW'){
    /*If this is a pre existing auction*/
    /*Deleting*/
    if(isset($ACTION)  && $ACTION == 'DELETE'){
        $results = $auctionService->deleteAuction($ID);
        if ($results === true){
            header("Location: auctionsEdit.php");
        }else{
            echo $results;
        }
    }else{
        /*Updating*/
        if(isset($_FILES["fileToUpload"]["tmp_name"]) && $_FILES["fileToUpload"]["tmp_name"] != '' && $_FILES["fileToUpload"]["tmp_name"] != null){
            $results = $auctionService->updateAuction($ID, $title, $description,$_POST['url'], $_POST['date'], $_POST['category'], $location, $_FILES["fileToUpload"]);
        }else{
            $results = $auctionService->updateAuction($ID, $title, $description,$_POST['url'], $_POST['date'], $_POST['category'], $location);
        }
    }
}else{
    /*if this is a new auction*/
    $results = $auctionService->createAuction($title, $description,$_POST['url'], $_POST['date'], $_POST['category'], $location, $_FILES["fileToUpload"]);
}
if ($results === true){
    header("Location: auctionsEdit.php");
}else{
    echo $results;
}

?>
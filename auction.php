<?php
if(isset($_GET['ID'])){
    $ID = $_GET['ID'];

    include_once "Services/AuctionsService.php";
    include_once "components/Auctions.php";

    $auctionService = new AuctionsService();
    /*GET auction by ID*/
    $auction = $auctionService->getAuction($ID);
    // redirect to that auctions URL
    header("Location: ".$auction->URL);
}
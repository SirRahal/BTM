<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 10/19/2019
 * Time: 11:18 AM
 */

include_once "Classes/GetLAGAuctions.php";

$testItem = new GetLAGAuctions();

echo '<br/>';
echo 'Auctions';
echo '<br/>';
if($testItem->Status){
    foreach ($testItem->Auctions as $auction) {
        echo $auction->URL;
        echo '<br/>';
    }
}
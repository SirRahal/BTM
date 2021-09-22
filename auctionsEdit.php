<!DOCTYPE html>
<html lang="en">
<head>
    <title>BTM Industrial - Auctions</title>
    <link rel="shortcut icon" href="Images/favicon.png">
    <link rel="icon" type="image/png" href="Images/favicon.png" />
</head>
<body>


<div id="wrapper">
    <?php include_once "nav.php" ?>
    <section id="maincontent">
        <div class="container">
            <?php
            include_once "Services/AuctionsService.php";
            include_once "components/AuctionsEdit.php";

            $auctionService = new AuctionsService();
            /*GET first category of auctions*/
            $auctions = $auctionService->getUpcomingAuctions();

            if(count($auctions) == 0 ){?>
                <div class="alert alert-block alert-error">
                    There are currently no auctions listed.  Add a new one Here: <a href="auctionEdit.php?ID=NEW"><button class="btn btn-theme"> <i class="icon-legal"> </i> New Auction</button></a>
                </div>

            <?php }else { ?>
                <h1>Upcoming Auctions <a href="auctionEdit.php?ID=NEW"><button class="btn btn-theme"> <i class="icon-legal"> </i> New Auction</button></a></h1>
                <?php printAuctionsEdit($auctions); ?>
            <?php } ?>

        </div>
    </section>

    <?php include_once "footer.php" ?>

</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BTM Industrial - Auctions</title>
    <link rel="shortcut icon" href="Images/favicon.png">
    <link rel="icon" type="image/png" href="Images/favicon.png"/>
</head>
<body>


<div id="wrapper">
    <?php include_once "nav.php" ?>


    <?php
    include_once "Services/AuctionsService.php";
    include_once "components/Auctions.php";

    $auctionService = new AuctionsService();
    /*GET first category of auctions*/
    $CAT_1_auctions = $auctionService->getUpcomingAuctions(1);
    /*GET second category of auctions*/
    $CAT_2_auctions = $auctionService->getUpcomingAuctions(2);
    $CAT_1_PastAuctions = $auctionService->getPastAuctions(1);
    $CAT_2_PastAuctions = $auctionService->getPastAuctions(2);
    $past_auctions = $auctionService->getPastAuctions();


    ?>

    <style>
        .tab-content {
            padding: 0px;
            border: none;
        }
    </style>

    <section id="maincontent">
        <div class="container">

            <div class="span12">
                <div class="tabbable tabs-top">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#one" data-toggle="tab"><i class="icon-legal"></i> Current</a></li>
                        <li class=""><a href="#two" data-toggle="tab"><i class="icon-calendar"></i> Past</a></li>
                    </ul>
                    <div class="tab-content" style="background: #f1f1f1; !important;">
                        <div class="tab-pane active" id="one">
                            <?php if (count($CAT_1_auctions) == 0 && count($CAT_2_auctions) == 0) { ?>
                                <div class="alert alert-block alert-error">
                                    There are currently no auctions listed
                                </div>
                            <?php } elseif (count($CAT_1_auctions) == 0) { ?>
                                <h1>Upcoming Auctions</h1>
                                <?php printAuctionsOneColumn($CAT_2_auctions); ?>
                            <?php } elseif (count($CAT_2_auctions) == 0) { ?>
                                <h1>Upcoming Auctions</h1>
                                <?php printAuctionsOneColumn($CAT_1_auctions); ?>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="span6">
                                        <h3 style="background: #656566; color: #ffffff; padding:5px;">Upcoming CNC Parts and<br>MRO Auctions</h3>
                                        <?php printAuctionsTwoColumn($CAT_1_auctions); ?>
                                    </div>
                                    <div class="span6">
                                        <h3 style="background: #656566; color: #ffffff; padding: 5px;">Upcoming Metalworking Machinery & Tooling and Accessories Auctions</h3>
                                        <?php printAuctionsTwoColumn($CAT_2_auctions); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane" id="two">
                            <?php if (count($CAT_1_PastAuctions) == 0 && count($CAT_2_PastAuctions) == 0) { ?>
                                <div class="alert alert-block alert-error">
                                    There are currently no auctions listed
                                </div>
                            <?php } elseif (count($CAT_1_PastAuctions) == 0) { ?>
                                <h1>Upcoming Auctions</h1>
                                <?php printAuctionsOneColumn($CAT_2_PastAuctions); ?>
                            <?php } elseif (count($CAT_2_PastAuctions) == 0) { ?>
                                <h1>Upcoming Auctions</h1>
                                <?php printAuctionsOneColumn($CAT_1_PastAuctions); ?>
                            <?php } else { ?>
                                <div class="row" style="margin-bottom: 0px !important;">
                                    <div class="span6">
                                        <h4>CNC Parts and MRO</h4>
                                    </div>
                                    <div class="span6">
                                        <h4>Metalworking Machinery & Tooling and Accessories</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span6">
                                        <?php printAuctionsTwoColumn($CAT_1_PastAuctions); ?>
                                    </div>
                                    <div class="span6">
                                        <?php printAuctionsTwoColumn($CAT_2_PastAuctions); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- end tab -->
            </div>

            <div>


            </div>
        </div>


    </section>

    <?php include_once "footer.php" ?>

</div>
</body>
</html>

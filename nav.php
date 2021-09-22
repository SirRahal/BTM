<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 1/22/2019
 * Time: 10:01 PM
 */

// Append the host(domain name, ip) to the URL.
//$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$url = $_SERVER['REQUEST_URI'];

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BTM Industrial provides many options for Asset Disposition. Find out which is best for you. Need your assets liquidated? We provide the best solution for your equipment sales needs.">
    <meta name="author" content="Sari Rahal">
    <meta name="keywords" content="Industrial Auctions,CNC Parts,MRO Surplus,Scrap Metal,Industrial Parts and Liquidation,Machine and Equipment Appraisal,Machine Valuation,Industrial Asset,Surplus CNC Equipment,Used CNC Machinery">
    <!-- styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="assets/css/flexslider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/color/grey.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="Images/favicon.png">
    <link rel="icon" type="image/png" href="Images/favicon.png" />
</head>
<!-- TODO -->
<!-- email this to warren@liveauctiongroup.com -->
<header>
    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
                <!-- logo -->
                <div class="logo" style="width:250px;">
                    <a href="index.php"><img src="Images/BTM Logo NEW.jpg"/></a>
                </div>
                <!-- end logo -->

                <!-- top menu -->
                <div class="navigation">
                    <nav style="padding-top: 30px;">
                        <ul class="nav topnav">
                            <li class="<?php if (strpos($url, "index")!==false){ echo "active"; } ?>">
                                <a href="index.php"><i class="icon-home"></i> Home </a>
                            </li>
                            <!--<li class="<?php /*if (strpos($url, "auctions")!==false){ echo "active"; } */?>">
                                <a href="https://auctions.btmindustrial.com/auctionlist.aspx"><i class="icon-legal"></i> Auctions</a>
                            </li>-->
                            <li class="<?php if (strpos($url, "auctions")!==false){ echo "active"; } ?>">
                                <a href="auctions.php"><i class="icon-legal"></i> Auctions</a>
                            </li>
                            <li>
                                <a href="https://auctions.btmindustrial.com/login.aspx?returnurl=http%3a%2f%2fauctions.btmindustrial.com%2fauctionlist.aspx" target="_blank"><i class="icon-exchange"></i> Bid Now</a>
                            </li>
                            <li>
                                <a href="https://auctions.btmindustrial.com/auctionlist.aspx?dv=2&so=2" target="_blank"><i class="icon-leaf"></i> Past Auctions</a>
                            </li>
                            <li class="dropdown
                            <?php
                                if (strpos($url, "contact-us")!==false ||
                                    strpos($url, "valuations")!==false ||
                                    strpos($url, "IndustrialPartsLiquidationProgram")!==false ||
                                    strpos($url, "testimonials")!==false ||
                                    strpos($url, "AssetRecoveryProgram")!==false||
                                    strpos($url, "assetservices")!==false
                                )
                                {
                                    echo "active";
                                }
                            ?>">
                                <a href="contact-us.php"><i class="icon-envelope-alt"></i> About Us<i class="icon-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="valuations.php">Equipment Valuations</a></li>
                                    <li><a href="AssetRecoveryProgram.php">Machinery & Equipment Recovery</a></li>
                                    <li><a href="IndustrialPartsLiquidationProgram.php">Industrial Parts Liquidation</a></li>
                                    <li><a href="testimonials.php">Testimonials</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>
                                    <li><a href="assetservices.php">Asset Management Services</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
<?php if(isset($_GET['alert']) &&  isset($_GET['message'])){?>
    <div class="container">
        <div class="alert alert-<?php echo $_GET['alert'];?>" role="alert">
            <?php

            switch (strtolower($_GET['message'])){
                case 'update':
                    echo "Thank you for updating your information";
                    break;
                case 'signup':
                    echo "Thank you for signing up";
                    break;
                default:
                    echo $_GET['message'];
                    break;
                break;
            }?>
        </div>
    </div>
<?php }?>
</header>

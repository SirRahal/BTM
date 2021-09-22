<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 8/16/2019
 * Time: 7:21 PM
 */?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>BTM Industrial - Machinery & Equipment Recovery</title>
    <link rel="shortcut icon" href="Images/favicon.png">
    <link rel="icon" type="image/png" href="Images/favicon.png" />
</head>
<body>
<div id="wrapper">
    <?php include_once "nav.php" ?>
    <script language='javascript' type='text/javascript'>
        function PopWindow (url) {
            var prams = 'menubar=0,location=0,resizable=1,scrollbars=1,width=900,height=290,border=2';
            newWin = window.open(url,'',prams);
            newWin.focus();
            return;
        }
    </script>
    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <!-- Place somewhere in the <body> of your page -->
                    <div id="mainslider" class="flexslider">
                        <ul class="slides">
                            <li data-thumb="Images/asset-disposition-slider.jpg">
                                <img src="Images/Assets_And_Recovery/main.png" alt="" />
                                <div class="flex-caption primary">
                                    <h2>Machinery & Equipment Recovery</h2>
                                    <p>Looking to sell your metalworking Industrial Machinery?</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="maincontent">
        <div class="container">
            <div class="wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
                <div class="box">
                    <h4 class="title">
                        Our Purpose
                    </h4>
                    <p class="description">
                        Our Goal is to establish a close partnership with our customers to help them meet their needs for
                        recovery. We find that every company and situation is different. There are times when the number one
                        priority for a company is that they can get the most money for a used machine they are selling, while
                        another customer might be saying ”I don’t care what it goes for but it MUST be out by Tuesday as we
                        have a new machine coming in Wednesday.” Our asset recovery program offers three main avenues to
                        help our Industrial Partners achieve maximum value for their unneeded assets.
                        <br/>
                        <br/>
                        Our overall goal at BTM Industrial is to develop and nature relationships that allow our customers to
                        receive maximum value for your company and asset disposition needs. Whether your company defines
                        value as quick turnaround, convenience or cash, we understand that true value is meeting and
                        exceeding your production needs, not worrying about old, unused machinery.
                    </p>
                </div>
            </div>
            <div class="wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
                <div class="box">
                    <h4 class="title">
                        BTM’s Brokerage Program
                    </h4>
                    <p class="description">
                        Our Brokerage Program has generally proven to give client the best monetary return on the asset they
                        are selling. Once it is known a machine will be sold, we can begin marketing and advertising the
                        machine, even if the actual release date is months away or yet to be determined. The more time to
                        market, the better the results. We list anything from a $1500 Milling Machine to a $500,000 CNC Boring
                        Mill! For more information about this program, contact us today!
                    </p>
                </div>
            </div>
            <div class="wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
                <div class="box">
                    <h4 class="title">
                        Scrap Machinery
                    </h4>
                    <p class="description">
                        Our sister company, USA Industrial Scrap, handles the scrap of all machines. USA Industrial Scrap’s
                        insured riggers allow for quick and efficient decommissioning and removal of machines when needed.
                        BTM can then assess/define the machines residual value from its resalable components . Our
                        comprehensible lineup of services gets our customers the best scrap value for CNC Machinery and
                        Automated Lines!
                    </p>
                </div>
            </div>
            <div class="wow bounceInUp" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.4s; animation-name: bounceInUp;">
                <div class="box">
                    <h4 class="title">
                        BTM Auctions
                    </h4>
                    <p class="description">
                        BTM Industrial offers a Monthly Machinery Auction (MMA) and can offer stand alone auctions if a
                        customer has enough inventory to warrant one. Our MMA is where customers looking for fair market
                        value sell their unwanted or decommissioned machinery.
                    </p>
                </div>
            </div>
            <?php include_once "components/Contact-Us-panel.html" ?>
        </div>
    </section>
    <?php include_once "footer.php" ?>
</div>
</body>
</html>

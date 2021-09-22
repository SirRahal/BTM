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
    <title>BTM Industrial - Testimonials</title>
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
                                <img src="Images/Testimonials/main.png" alt="" />
                                <div class="flex-caption primary">
                                    <h2>Testimonials</h2>
                                    <p>Don't just take our word for it. See what our customers have to say!</p>
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

            <div class="row ">
                <div class="span6">
                    <h4 class="rheading">Grand Rapids, MI – Large Area Manufacturer<span></span></h4>
                    <blockquote>
                        <p>
                            <i class="icon-quote-left"></i> BTM Industrial customer service, professionalism, and over knowledge of the metalworking industry is second to none! We had multiple pieces of machinery to get rid of and they handled the entire process front to back and got us great prices for our equipment in an auction sale!
                        </p>
                    </blockquote>
                </div>
                <div class="span6">
                    <img src="Images/Testimonials/Large%20Manufacturing%20Shop.jpg"/>
                </div>
            </div>

            <div class="row">
                <div class="span6">
                    <img src="Images/Testimonials/Metal%20Stamping%20Plant.jpg"/>
                </div>
                <div class="span6">
                    <h4 class="rheading">Jackson, MI – Metal Stamping Plant<span></span></h4>
                    <blockquote>
                        <p>
                            <i class="icon-quote-left"></i>BTM Industrial Asset Disposition program was PERFECT for our liquidation needs. They customized a liquidation program that allowed us to move equipment right away that wasn’t being used and taking up space, and then sell off good running equipment through their brokerage program. Took the stress of us handling the removal and selling our equipment right out of our hands and allowed us to concentrate on the new machinery coming in. THANK YOU BTM INDUSTRIAL!
                        </p>
                    </blockquote>
                </div>
            </div>

            <div class="row">
                <div class="span6">
                    <h4 class="rheading">GR, MI – Large Medical Instrument Manufacturer<span></span></h4>
                    <blockquote>
                        <p>
                            <i class="icon-quote-left"></i>We had three CNC machines that hadn’t been used for many years and were not desirable to sell whole. BTM came in and removed all the valuable parts out of them and hired their sister company Midway Machinery Movers to come in and dispose of the bases. The project not only saved us from having to pay our local rigger $8,000 to remove the machinery, it also put $30,000 in the sale of the electronics removed from the machinery. Highly recommend BTM Industrial to help with surplus machinery and parts!
                        </p>
                    </blockquote>
                </div>
                <div class="span6">
                    <img src="Images/Testimonials/Medical%20Equipment%20Manufacturing.jpg"/>
                </div>
            </div>

            <div class="row">
                <div class="span6">
                    <img src="Images/Testimonials/SMall%203%20Man%20Shop.jpg"/>
                </div>
                <div class="span6">
                    <h4 class="rheading">Traverse City, MI – Small Three Man Machine Shop<span></span></h4>
                    <blockquote>
                        <p>
                            <i class="icon-quote-left"></i>I was retiring and decided to sell off my machine shop through BTM Industrial. Their attention to detail on my machines was spot on! They treated my machinery like it was their own. We decided to us their brokerage sale program and sold off half my machinery in the first month! BTM saved my a ton of time and was a great partner in helping my recoup value out of my machinery that I had a lot of sweet equity in!
                        </p>
                    </blockquote>
                </div>
            </div>
            <?php include_once "components/Contact-Us-panel.html" ?>
        </div>
    </section>

    <?php include_once "footer.php" ?>

</div>

</body>
</html>

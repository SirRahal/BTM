
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
    <title>BTM Industrial - Valuations</title>
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
                                <img src="Images/Valuations/main.png" alt="" />
                                <div class="flex-caption primary">
                                    <h2>Valuations</h2>
                                    <p>Are you looking for an Equipment Valuation?</p>
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
                        Are you looking for an Equipment Valuation?
                    </h4>
                    <p class="description">
                        Customers count on BTM Industrial to help them accurately value their machine assets.  This market in particular is a special expertise for BTM Industrial. Sellers need to know that they are not selling to low or pricing their machinery/equipment above the fair market value. Buyers want to know that they are not paying too much to purchase the machinery/equipment.                    </p>
                </div>
            </div>

            <?php include_once "components/Contact-Us-panel.html" ?>
        </div>
    </section>

    <?php include_once "footer.php" ?>

</div>

</body>
</html>

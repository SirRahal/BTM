<!DOCTYPE html>
<html lang="en">
<head>
    <title>BTM Industrial - Home</title>
    <link rel="shortcut icon" href="Images/favicon.png">
    <link rel="icon" type="image/png" href="Images/favicon.png" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WKDNLHS');</script>
    <!-- End Google Tag Manager -->

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
                    <div id="mainslider" class="flexslider">
                        <ul class="slides">
                            <li data-thumb="Images/Assets_And_Recovery/main.png">
                                <img src="Images/Assets_And_Recovery/main.png" alt="" />
                                <div class="flex-caption primary">
                                    <h2>Machinery & Equipment Recovery</h2>
                                    <p>BTM Industrial provides many options for Asset Disposition. Find out which is best for you.</p>
                                </div>
                            </li>
                            <li data-thumb="Images/Liquidation_Program/main.png">
                                <img src="Images/Liquidation_Program/5.jpg" alt="" />
                                <div class="flex-caption primary">
                                    <h2>Industrial Parts And Liquidation</h2>
                                    <p>Need your assets liquidated? We provide the best solution for your equipment sales needs.</p>
                                </div>
                            </li>
                            <li data-thumb="Images/Valuations/main.png">
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
            <!--IF Auctions exist-->
            <style>
                #content-desktop {display: block;}
                #content-mobile {display: none;}

                @media screen and (max-width: 768px) {

                    #content-desktop {display: none;}
                    #content-mobile {display: block;}

                }
            </style>
            <div>
            <?php

            include_once "Classes/GetLAGAuctions.php";
            include_once "Services/AuctionsService.php";
            $auctionService = new AuctionsService();
            $auctions = $auctionService->getUpcomingAuctions();
            $AuctionsList = new GetLAGAuctions();
             if(count($auctions)>0){ ?>
                <div class="row">
                    <div class="span12 call-action" style="padding:0px;">
                        <h4 class="rheading" style="padding:10px;">Upcoming Auctions<span></span></h4>
                        <div class="row" >
                            <div class="span3">

                                <p class="hidden-phone" style="padding:10px;">
                                    Take a look at our upcoming auctions and get preregistered.
                                </p>
                                <div style="padding:10px;">
                                    <a href="https://auctions.btmindustrial.com/auctionlist.aspx" class="btn btn-theme e_pulse btn-large">See All Auctions</a>
                                </div>
                            </div>

                            <div class="span9">
                                <div id="latest-work" class="carousel btleft">
                                    <div class="carousel-wrapper">
                                        <ul class="da-thumbs">
                                            <?php foreach( $auctions as $auction){ ?>

                                                <li onclick="window.location.href='<?php echo $auction->URL;?>'" style="max-width: 200px;">
                                                    <a href="<?php echo $auction->URL;?>">
                                                    <img style="align max-height:160px; max-width:220px;" src="Images/Auctions/<?php echo $auction->IMG;?>" alt="" />
                                                    <article class="da-animate da-slideFromRight">
                                                        <div class="hidden-tablet"">
                                                        <p><?php echo $auction->Date;?></p>
                                                        <p><?php echo $auction->Description;?></p>
                                                        </div>
                                                            <i class="icon-circle-arrow-right icon-rounded icon-48 active"></i>
                                                    </article>
                                                    <p><?php echo $auction->Title;?></p>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
           /* if($AuctionsList->Status){ */?><!--
            <div class="row">
                <div class="span12 call-action" style="padding:0px;">
                    <h4 class="rheading" style="padding:10px;">Upcoming Auctions<span></span></h4>
                    <div class="row" >
                        <div class="span3">

                            <p class="hidden-phone" style="padding:10px;">
                                Take a look at our upcoming auctions and get preregistered.
                            </p>
                            <div style="padding:10px;">
                                <a href="https://auctions.btmindustrial.com/auctionlist.aspx" class="btn btn-theme e_pulse btn-large">See All Auctions</a>
                            </div>
                        </div>

                        <div class="span9">
                            <div id="latest-work" class="carousel btleft">
                                <div class="carousel-wrapper">
                                    <ul class="da-thumbs">
                                        <?php /*foreach( $auctions as $auction){ */?>
                                        <li onclick="window.location.href='<?php /*echo $auction->URL;*/?>'" style="max-width: 155px;">
                                            <a href="<?php /*echo $auction->URL;*/?>">
                                                <img style="align max-height:160px; max-width:220px;" src="<?php /*echo $auction->IMG;*/?>" alt="" />
                                                <article class="da-animate da-slideFromRight">
                                                    <div class="hidden-tablet"">
                                                    <p><?php /*echo $auction->Title;*/?></p>
                                </div>
                                <i class="icon-circle-arrow-right icon-rounded icon-48 active"></i>
                                </article>
                                </a>
                                </li>
                                <?php /*} */?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <?php /*}


             */?>
            </div>
            <div class="row">
                    <div class="span6">
                        <div class="call-action">
                            <div class="text">
                                <h2>Bid From Anywhere</h2>
                                <div class="span1">
                                    <img src="Images/app_logo.png" width="100" style="border: solid 2px #494949"/>
                                </div>
                                <div class="span4">
                                    <p>
                                        Try out our new mobile app BTM Industrial Auctions. Allows you to bid anywhere you want to be.
                                    </p>

                                    <div class="alignright">
                                        <a class="btn btn-large btn-theme flip" href="https://apkpure.com/btm-industrial-auctions/com.liveauctiongroup.btmindustrial">
                                            <i class="icon-cloud-download"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="call-action">
                            <div class="text">
                                <h2>Sign up for email alerts.</h2>
                                <p>
                                    We send out email notifications on upcoming auctions and liquidation sales.  Be the first to know what's on sale!
                                </p>
                            </div>
                            <div class="alignright">
                                <a class="btn btn-large btn-theme flip" href='javascript:PopWindow("https://secure.campaigner.com/CSB/Public/Form.aspx?fid=1760945&ac=9dk8")'>
                                    <i class="icon-envelope-alt "></i>Sign-up</a>

                                <button type="button" class="btn btn-large btn-theme flip" data-toggle="modal" data-target="#exampleModal">
                                    <i class="icon-envelope-alt "></i>Sign-up
                                </button>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none; width:auto !important; padding-top:  ">
                            <h1 style="padding-top:5px; padding-left:55px;">Sign-up Form</h1>
                            <iframe src="https://platform.trumpia.com/onlineSignup/embed_osp.php?user=btmindustrial&dname=OSP" frameborder="0" width="300" height="600" scrolling="no"></iframe>
                        </div>
                        <!--<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="subscriptionFormSend.php" method="post" role="form" class="contactForm">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sign Up Form
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                                <div class="row" style="padding-left:10px;">
                                                    <div class="form-group">
                                                        <label for="firstName">First Name</label>
                                                        <input type="text" name="firstName" aria-label="Large"  class="input-block-level" id="firstName" placeholder="First Name" data-msg="Please enter your first name" required/>
                                                        <div class="validation"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lastName">Last Name</label>
                                                        <input type="text" name="lastName" class="input-block-level" id="lastName" placeholder="Last Name" data-msg="Please enter your last name" required/>
                                                        <div class="validation"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email address</label>
                                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" style="width:98%;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mobileNumber">Phone Number</label>
                                                        <input type="tel" class="input-block-level" name="mobileNumber" id="mobileNumber" placeholder="Your Phone Number" data-rule="phone" data-msg="Please enter a valid phone number" />
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-large btn-theme btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-large btn-theme">Sign Up!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>-->
                    </div>
            </div>

            <div class="row">
                    <div class="span12" style="background:#494949; text-align: center; padding-top:15px; padding-bottom:15px;">
                        <h2 style=" color:#e8e8e8; margin-bottom: 0px;">BTM's Asset Management Program</h2>
                        <h3 style=" color:#e8e8e8; margin-bottom: 0px;">Your partner in maximizing asset value.</h3>
                        <h2 style=" color:#e8e8e8; margin-bottom: 0px;">How our process works in four easy steps:</h2>
                    </div>
            </div>

            <div class="row">
                <a href="valuations.php">
                    <div class="span3 features e_pulse">
                        <img src="Images/Valuations/main.png" alt="" />
                        <div class="box">
                            <div class="divcenter">
                                <i class="icon-circled icon-48 icon-money icon"></i>
                                <h4>Equipment<br />Valuations</h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="AssetRecoveryProgram.php">
                    <div class="span3 features e_pulse">
                        <img src="Images/Assets_And_Recovery/main.png" alt="" />
                        <div class="box">
                            <div class="divcenter">
                                <i class="icon-circled icon-48  icon-retweet icon"></i>
                                <h4>Machinery &<br />Equipment Recovery</h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="IndustrialPartsLiquidationProgram.php">
                    <div class="span3 features e_pulse">
                        <img src="Images/Liquidation_Program/5.jpg" alt="" />
                        <div class="box">
                            <div class="divcenter">
                                <i class="icon-circled icon-48 icon-wrench active icon"></i>
                                <h4>Industrial Parts <br />& Liquidation</h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="testimonials.php">
                    <div class="span3 features e_pulse">
                        <img src="Images/Testimonials/main.png" alt="" />
                        <div class="box">
                            <div class="divcenter">
                                <i class="icon-circled icon-48 icon-comment icon"></i>
                                <h4>Customer<br />Testimonials</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <?php include_once "components/Contact-Us-panel.html" ?>
        </div>
    </section>

    <?php include_once "footer.php" ?>

</div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKDNLHS"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>


</html>

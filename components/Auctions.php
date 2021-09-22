<?php
function printAuctionsOneColumn($auctions){?>
    <style>
        .auction{
            padding-top:5px;
            padding-bottom: 5px;
            margin-bottom: 10px !important;
        }
        .auction:hover {
            background: #ececec;
        }
        hr {
            margin: 5px 0;
            border: 0;
            border-top: 1px solid #bcbbbb;
            border-bottom: 1px solid #ffffff;
        }
        .row {
            margin-bottom: 0px;
        }
    </style>
    <ul class="media-list">
    <?php
    foreach($auctions as $auction){?>
            <li>
                    <a href="<?php echo $auction->URL;?>">
                        <div class="row auction">
                            <div class="span2">
                                <img class="media-object pull-left" src="Images/Auctions/<?php echo $auction->IMG;?>" style="width: 128px; height: 128px; border: solid 1px #494949">
                            </div>
                            <div class="span10">
                                <div class="row">
                                    <h6>
                                        <div class="span6">
                                            <?php echo $auction->Title;?>
                                        </div>
                                        <div class="span4">
                                            <?php echo $auction->Location;?>
                                        </div>
                                        <div class="span4">
                                            <?php echo $auction->Date;?>
                                        </div>
                                    </h6>
                                    <p>
                                        <?php echo $auction->Description;?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                <hr/>
            </li>
    <?php } ?>
    </ul>
<?php

}

function printAuctionsTwoColumn($auctions){?>
    <ul class="media-list">
        <?php
        foreach($auctions as $auction){?>
            <li >
                <a href="<?php echo $auction->URL;?>">
                    <div class="row auction">
                        <div class="span2">
                            <img class="media-object pull-left" src="Images/Auctions/<?php echo $auction->IMG;?>" style="width: 128px; height: 128px; border: solid 1px #494949">
                        </div>
                        <div class="span4">
                            <div class="row">
                                <h6 style="margin-bottom: 3px !important;">
                                    <div>
                                        <?php echo $auction->Title;?>
                                    </div>
                                    <div>
                                        <?php echo $auction->Location;?>
                                    </div>
                                    <div>
                                        <b>Sale Ends: </b><?php echo $auction->Date;?>
                                    </div>
                                </h6>
                                <em>
                                    <?php echo $auction->Description;?>
                                </em>
                            </div>
                        </div>
                    </div>
                </a>
                <hr/>
            </li>
        <?php } ?>
    </ul>
    <?php

}
<?php
function printAuctionsEdit($auctions){?>
    <style>
        .auction{
            padding-top:5px;
            padding-bottom: 5px;
            margin-bottom: 10px !important;
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
                <div class="row">
                    <div class="span10">
                        <div class="row auction">
                            <div class="span2">
                                <img class="media-object pull-left" src="Images/Auctions/<?php echo $auction->IMG;?>" style="width: 128px; height: 128px; border: solid 1px #494949">
                            </div>
                            <div class="span8">
                                <div class="row">
                                    <h5>
                                        <b>Title:</b> <?php echo $auction->Title;?>
                                    </h5>
                                    <div>
                                        <b>Location:</b> <?php echo $auction->Location;?>
                                    </div>
                                    <div>
                                        <b>Date:</b> <?php echo $auction->Date;?>
                                    </div>
                                    <p>
                                        <b>Description:</b> <?php echo $auction->Description;?>
                                    </p>
                                    <p>
                                        <b>ShortLink:</b> <?php echo $_SERVER['SERVER_NAME'];?>/auction.php?ID=<?php echo $auction->ID;?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span2">
                        <br/>
                        <a href="auctionEdit.php?ID=<?php echo $auction->ID;?>"><button class="btn btn-theme"><i class="icon-edit"></i>Edit</button></a>
                        <br/>
                        <br/>
                        <button class="btn btn-danger" onclick="deleteAuctionVerification(<?php echo $auction->ID; ?>)"> <i class="icon-trash"></i>Delete</button>
                    </div>
                </div>
                <hr/>
            </li>
    <?php } ?>
    </ul>
    <script>
        function deleteAuctionVerification(id){
            if(confirm('Are you sure you want to delete this auction?')){
                window.location.href = "PostAuction.php?ID="+id+"&ACTION=DELETE";
            }
        }
    </script>



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
                        <h6 style="margin-bottom: 3px !important;">
                            <div class="row">
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
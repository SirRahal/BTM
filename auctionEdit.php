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
    <section id="maincontent">
        <div class="container">
            <?php

            /*If there is an ID it's editing an existing auction*/
            if (isset($_GET['ID'])) {
                $ID = $_GET['ID'];

                include_once "Services/AuctionsService.php";
                include_once "components/Auctions.php";
                if($ID != "NEW"){
                    $auctionService = new AuctionsService();
                    /*GET auction by ID*/
                    $auction = $auctionService->getAuction($ID);
                    // redirect to that auctions URL

                    $ID = $_GET['ID'];
                    $auctionService = new AuctionsService();
                    /*GET first category of auctions*/
                    $auction = $auctionService->getAuction($ID);
                    echo "yay: ". $auction->RawDate;
                }else{
                    $auction = new BTMAuction(null);
                    $phpdate = strtotime( date('Y-m-d\13:00') );;
                    $auction->RawDate = date( 'Y-m-d\TH:i', $phpdate );
                }
                ?>


                <div class="row">
                    <form action="PostAuction.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ID" value="<?php echo $auction->ID;?>">
                        <h3>Title</h3>
                        <div class="span12 form-group">
                            <input type="text" class="input-block-level" name="title" id="title" placeholder="Title"
                                   required data-msg="Please enter a title" value="<?php echo $auction->Title; ?>">
                            <div class="validation"></div>
                        </div>

                        <h3>Description</h3>
                        <div class="span12 form-group">
                            <textarea type="textbox" class="input-block-level" name="description" id="description"
                                      placeholder="Description" rows="7" required
                                      data-msg="Please enter description"><?php echo $auction->Description; ?></textarea>
                            <div class="validation"></div>
                        </div>

                        <h3>URL</h3>
                        <div class="span12 form-group">
                            <input type="text" class="input-block-level" name="url" id="url" placeholder="URL" required
                                   data-msg="Please enter a URL" value="<?php echo $auction->URL; ?>">
                            <div class="validation"></div>
                        </div>

                        <h3>Date</h3>
                        <div class="span12 form-group">
                            <input type="datetime-local" class="input-block-level" name="date" id="date" required
                                   data-msg="Please enter a date" value="<?php echo $auction->RawDate; ?>">
                            <div class="validation"></div>
                        </div>

                        <h3>Location</h3>
                        <div class="span12 form-group">
                            <input type="text" class="input-block-level" name="location" id="location" placeholder="location" required
                                   data-msg="Please enter the location" value="<?php echo $auction->Location; ?>">
                            <div class="validation"></div>
                        </div>

                        <h3>Category</h3>
                        <div class="span12 form-group">
                            <select name="category" id="category" class="input-block-level">
                                <option value="1" <?php if ($auction->Category == 1) {
                                    echo "selected";
                                } ?>>CNC Parts & MRO
                                </option>
                                <option value="2" <?php if ($auction->Category == 2) {
                                    echo "selected";
                                } ?>>Metalworking Machinery & Tooling and Accessories
                                </option>
                            </select>
                            <div class="validation"></div>
                        </div>
                        <h3>Image</h3>
                        <div class="span12 form-group">
                            <input type="file" class="input-block-level" name="fileToUpload" id="fileToUpload" data-msg="Please select a file">
                        </div>
                        <br/>
                        <br/>
                        <button class="btn btn-theme" type="submit"> <i class="icon-save"></i> Save</button>
                    </form>
                </div>

            <?php } else { ?>
              <!-- Creating a new auction-->
            <?php } ?>
        </div>
    </section>

    <?php include_once "footer.php" ?>

</div>
</body>
</html>

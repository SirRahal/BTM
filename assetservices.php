<!DOCTYPE html>
<html lang="en">

<head>
    <title>BTM Industrial - Asset Services</title>
</head>

<body>
<div id="wrapper">
    <?php include_once "nav.php" ?>
    <section id="maincontent">
        <div class="container">
            <div class="row">
                <div class="span12">

                    <!--API Key = AIzaSyAUFl1ua1FdKxMNHLQ8PMbo9EhU34hvLKk  -->
                    <div style="width: 100%">
                        <script>
                            function CheckCondition(){
                                var selectComment = document.getElementById('condition');
                                var selectValue = selectComment.value;
                                var commentBox = null;
                                if(selectValue == null){
                                    selectComment.style = "color: #9a9a9a";
                                } else if(selectValue === 'Other'){
                                    commentBox = document.getElementById('comment');
                                    selectComment.style = "color: #55555; background: rgb(232, 240, 254)";
                                    commentBox.classList = "span8 form-group";
                                }else{
                                    selectComment.style = "color: #555555; background: rgb(232, 240, 254)";
                                    commentBox = document.getElementById('comment');
                                    commentBox.classList = "span8 form-group hidden";
                                }
                            }
                        </script>
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="assetservicesSend.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
                            <div>
                                <p>Please fill out the following fields so that we can evaluate the assets. Once submitted, you will be contacted shortly by a BTM Industrial Sales Professional to discuss how our services can add value to your organization.</p>
                            </div>
                            <div class="row">
                                <div style="clear: both">
                                    <div class="span4">
                                        Name:
                                    </div>
                                    <div class="span4 form-group">
                                        <input type="text" name="name" class="input-block-level" id="name" placeholder="Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                                        <div class="validation"></div>
                                    </div>
                                </div>

                                <div style="clear: both">
                                    <div class="span4">
                                        Email:
                                    </div>
                                    <div class="span4 form-group">
                                        <input type="email" class="input-block-level" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email"  required/>
                                        <div class="validation"></div>
                                    </div>
                                </div>

                                <div style="clear: both">
                                    <div class="span4">
                                        Company:
                                    </div>
                                    <div class="span4 form-group">
                                        <input class="input-block-level" name="company" id="company" placeholder="Company"  required/>
                                    </div>
                                </div>
                                <div style="clear: both">
                                    <div class="span4">
                                        Phone:
                                    </div>
                                    <div class="span4 form-group">
                                        <input type="tel" class="input-block-level" name="phone" id="phone" placeholder="Phone Number" data-rule="phone" data-msg="Please enter a valid phone number"  required/>
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div style="clear: both">
                                    <div class="span4">
                                        Machine Condition:
                                    </div>
                                    <div class="span4 form-group">
                                        <select class="input-block-level" aria-label="Default select example" id="condition" name="condition" style="width: 100%; color: #9a9a9a;" data-msg="Condition of Machinery" placeholder="Condition of Machinery" onchange="CheckCondition()" required>
                                            <option value="Good Condition" selected>Good Condition</option>
                                            <option value="In Plant/Under Power">In Plant/Under Power</option>
                                            <option value="In Storage, Not Under Power">In Storage, Not Under Power</option>
                                            <option value="Parts Only">Parts Only</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div style="clear: both">
                                    <div class="hidden" id="comment">
                                        <div class="span4">
                                            Condition Info:
                                        </div>
                                        <div class="span4 form-group">
                                            <input type="text" class="input-block-level" name="condition_info" id="comment" placeholder="Please give more info" />
                                        </div>
                                    </div>
                                </div>
                                <div style="clear: both">
                                    <div class="span4">
                                        Zip Code Location of Machinery:
                                    </div>
                                    <div class="span4 form-group">
                                        <input type="text" class="input-block-level" name="zip" id="zip" placeholder="Zip Code of Machinery" data-rule="zip" data-msg="Please enter a valid zip code"  required/>
                                        <div class="validation"></div>
                                    </div>
                                </div>


                                <div style="clear: both">
                                    <div class="span4">
                                        Can the location load:
                                    </div>
                                    <div class="span4 form-group">
                                        <div class="span1 form-group">
                                            <input type="radio" name="localLoader" value="yes" checked style="float:left;">
                                            <label for="huey" style="float:left;">Yes</label>
                                        </div>
                                        <div class="span1 form-group">
                                            <input type="radio" name="localLoader" value="no" style="float:left;">
                                            <label for="dewey" style="float:left;">No</label>
                                        </div>
                                    </div>
                                </div>
                                <!--<div style="clear: both">
                                    <div class="span3">
                                        Outside rigger be needed:
                                    </div>
                                    <div class="span4 form-group">
                                        <input type="checkbox" class="input-block-level" name="outsideRiggerNeeded" id="outsideRiggerNeeded" >
                                    </div>
                                </div>-->
                                <div style="clear: both">
                                </div>
                                <div style="clear: both">
                                    <div class="span4">
                                        Removal Date:
                                    </div>
                                    <div class="span4">
                                        <input type="date" name="date"/>
                                    </div>
                                </div>
                                <div style="clear: both">
                                    <div class="span4">
                                        Pictures, Specs, CSVs:
                                    </div>
                                    <div class="span4">
                                        <input name="infile[]" type="file" class="custom-file-input" multiple>
                                    </div>
                                </div>
                                <div style="clear: both" class="span12">
                                    Description:
                                </div>
                                <div class="span12 form-group" style="clear: both">
                                    <textarea class="input-block-level" name="description" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Description of Machinery or Asset" required></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div style="clear: both">

                                </div>

                                <div class="text-center">
                                    <button class="btn btn-theme animated btn-large e_tada" type="submit">Send a message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

    <?php include_once "footer.php" ?>

</div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BTM Industrial - Contact Us</title>
</head>

<body>
<div id="wrapper">
    <?php include_once "nav.php" ?>
    <section id="maincontent">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <aside>
                        <div class="widget">
                            <h4 class="rheading">Get in touch with us<span></span></h4>
                            <ul>
                                <li><label><strong>Phone : </strong></label>
                                    <p>
                                        616.745.5953
                                    </p>
                                </li>
                                <li><label><strong>Email : </strong></label>
                                    <p>
                                        sales@btmindustrial.com
                                    </p>
                                </li>
                                <li><label><strong>Adress : </strong></label>
                                    <p>
                                        2051 Harvey St,<br/>Muskegon, MI 49442
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="rheading">Find us on social networks<span></span></h4>
                            <ul class="social-links">
                                <!--<li><a href="https://twitter.com/btmauctions?lang=en" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square icon-32"></i></a></li>-->
                                <li><a href="https://www.facebook.com/btmindustrialauctions/" data-placement="bottom"
                                       title="Facebook"><i class="icon-facebook icon-square icon-32"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/btmindustrial/" data-placement="bottom"
                                       title="Linkedin"><i class="icon-linkedin icon-square icon-32"></i></a></li>
                                <!--<li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square icon-32"></i></a></li>-->
                                <!--<li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square icon-32"></i></a></li>-->
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="span8">

                    <!--API Key = AIzaSyAUFl1ua1FdKxMNHLQ8PMbo9EhU34hvLKk  -->
                    <div style="width: 100%">
                        <div style="width: 100%">
                            <iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=450&amp;hl=en&amp;q=2051%20Harvey%20St,%20%20Muskegon,%20MI%2049442+(BTM%20Industrial)&amp;t=&amp;z=7&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>

                        <div class="spacer30">
                        </div>

                        <script>
                            function CheckComment() {
                                var selectComment = document.getElementById('selectComment');
                                var selectValue = selectComment.value;
                                if (selectValue == 'NotSelected') {
                                    selectComment.style = "color: #9a9a9a";
                                } else if (selectValue == 'Other') {
                                    var commentBox = document.getElementById('comment');
                                    selectComment.style = "color: #55555; background: rgb(232, 240, 254)";
                                    commentBox.classList = "span8 form-group";
                                } else {
                                    selectComment.style = "color: #555555; background: rgb(232, 240, 254)";
                                    var commentBox = document.getElementById('comment');
                                    commentBox.classList = "span8 form-group hidden";
                                }
                            }
                        </script>
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="contactFormSend.php" method="post" role="form" class="contactForm">
                            <div><p>Have Assets or Machinery you would like to sell? Fill out our contact form and we
                                    can get in it our next auction!</p></div>
                            <div class="row">
                                <div class="span4 form-group">
                                    <input type="text" name="name" class="input-block-level" id="name"
                                           placeholder="Your Name" data-rule="minlen:4"
                                           data-msg="Please enter at least 4 chars" required/>
                                    <div class="validation"></div>
                                </div>

                                <div class="span4 form-group">
                                    <input type="email" class="input-block-level" name="email" id="email"
                                           placeholder="Your Email" data-rule="email"
                                           data-msg="Please enter a valid email" required/>
                                    <div class="validation"></div>
                                </div>

                                <div class="span4 form-group">
                                    <input class="input-block-level" name="company" id="company"
                                           placeholder=" Your Company" required/>
                                </div>
                                <div class="span4 form-group">
                                    <input type="tel" class="input-block-level" name="phone" id="phone"
                                           placeholder="Your Phone Number" data-rule="phone"
                                           data-msg="Please enter a valid phone number" required/>
                                    <div class="validation"></div>
                                </div>
                                <div class="span8 form-group">
                                    <select class="input-block-level" aria-label="Default select example"
                                            id="selectComment" name="selectComment" style="width: 100%; color: #9a9a9a;"
                                            data-msg="Please select how you heard of us."
                                            placeholder="How did you hear about us?" onchange="CheckComment()" required>
                                        <option value="NotSelected" selected>How did you hear about us</option>
                                        <option value="Email">Email</option>
                                        <option value="Text">Text</option>
                                        <option value="Ebay">Ebay</option>
                                        <option value="Craigslist">Craigslist</option>
                                        <option value="Postcard">Postcard</option>
                                        <option value="Phone">Phone</option>
                                        <option value="Google">Google</option>
                                        <option value="LinkedIn">LinkedIn</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Word_Of_Mouth">Word Of Mouth</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="validation"></div>
                                </div>
                                <div class="span8 form-group hidden" id="comment">
                                    <input type="text" class="input-block-level" name="comment" id="comment"
                                           placeholder="How did you hear about us?" data-rule="phone"
                                           data-msg="Please enter where you heard of us"/>
                                </div>
                                <div class="span8 form-group">
                                    <input type="text" class="input-block-level" name="subject" id="subject"
                                           placeholder="Subject" data-rule="minlen:4"
                                           data-msg="Please enter at least 8 chars of subject" required/>
                                    <div class="validation"></div>
                                </div>
                                <div class="span8 form-group">
                                    <textarea class="input-block-level" name="message" rows="5" data-rule="required"
                                              data-msg="Please write something for us" placeholder="Message"
                                              required></textarea>
                                    <div class="validation"></div>
                                    <div class="text-center">
                                        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

                                        <div id='html_element'></div>
                                        <button class="btn btn-theme animated btn-large e_tada" type="submit"
                                                style="margin-top:15px;" disabled id="SubmitButton">Send a message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        var onloadCallback = function () {
            grecaptcha.render('html_element', {
                'sitekey': '6LfVCvodAAAAAA371p1XIhDTp5ipSszqDom3Dlfv',
                'callback': correctCaptcha
            });
        };

        var correctCaptcha = function (response) {
            if(response.length !== 0)
            {
                var submitButton = document.getElementById("SubmitButton");
                submitButton.disabled = false;
            }
        };
    </script>

    <?php include_once "footer.php" ?>

</div>
</body>

</html>

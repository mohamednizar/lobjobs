<!-- FOOTER -->

<footer class="footer navbar-bottom">
    <div class="row middle">
        <div class="col-md6">
            <div id="site-info">

                All Copyrights reserved by lobJobs Sri Lanka, 2014

            </div>


        </div>	
        <div class="col-md6">
            <div id="footerbox"><a  target="_blank" href="https://www.facebook.com/pages/LOBJOBS/588674421159951"><span class="fbox1"></a><a  target="_blank" href="https://twitter.com/lobjobs"></span><span class="fbox2"></span></a><a target="_blank" href="http://www.linkedin.com/pub/lob-jobs/61/5a0/5b9"><span class="fbox3"></span></a><a target="_blank" href="https://plus.google.com/u/0/110552987318539134375/posts"><span class="fbox4"></span></a></div>
        </div>	
    </div>	
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<link type="css/text" href="css/jquery.alerts.css"></link>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.alerts.js"></script>
<script src="js/holder.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $('.slider_logo').bxSlider({
            auto: true,
            autoHover: true,
            speed: 4500,
            slideWidth: 300,
            minSlides: 2,
            maxSlides: 4,
            startSlide: 2,
            slideMargin: 10
        });
        
        $('.slider_banner').bxSlider({
            auto: true,
            autoHover: true,
            speed: 4500,
            slideWidth: 300,
            minSlides: 10,
            maxSlides: 10,
            startSlide: 2,
            slideMargin: 10,
            mode:'vertical'
        });
    });</script>	
<script type="text/javascript">
    $(document).ready(function () {


        $("#contact").click(function () {


            var frm_contact = $("#frm_contact").valid();
            if (frm_contact == true) {

                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var comments = $('#comments').val();
                var body = "name-" + name + "," + "email-" + email + "," + "phone-" + phone + "," + "comments-" + comments;
                $.ajax({
                    type: "post",
                    url: "jobseeker/email.php",
                    data: {
                        body: body

                    },
                    success: function (data) {

                        alert("your comments have been sent");
                    }
                });
            }
        });
        $('#frm_contact').validate({//validating the form data from jquery validate plugin
            rules: {
                name: {minlength: 3, maxlength: 50, required: true},
                phone: {minlength: 2, maxlength: 50, required: true},
                email: {minlength: 3, maxlength: 50, required: true},
                comments: {minlength: 2, maxlength: 1000, required: true}


            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }});
        $("#org_btn").click(function () {
            var cname = $("#Name").val();
            var phone = $("#Phone").val();
            var web = $("#Website").val();
            var address = $("#Address").val();
            var cperson = $("#Contact").val();
            var designation = $("#Designation").val();
            var mobile = $("#Mobile").val();
            var user = $("#Email").val();
            var pass = $("#Password").val();
            var form_true = $("#org").valid();
            if (form_true === true) {
                $.ajax({
                    type: "post",
                    url: "employers/org_save.php",
                    data: {
                        cname: cname,
                        phone: phone,
                        web: web,
                        address: address,
                        cperson: cperson,
                        designation: designation,
                        mobile: mobile,
                        user: user,
                        pass: pass
                    },
                    success: function (data) {
                     if (data.status == 'success') {
                            alert("You are successfully registerd!");
                            $link = "http://lobjobs.lk/employers/signin.php?cat=org";
                            window.location.href = $link;
                            
                        } else if (data.status == 'error') {
                            alert("The user name is alredy exist!pleas login or recover your password");
                            $link = "http://lobjobs.lk/employers/signin.php?cat=org";
                            window.location.href = $link;
                            
                        }



                    }
                });
            }
        });


        $('#org').validate({//validating the form data from jquery validate plugin
            rules: {
                Contact: {minlength:3,  required: true},
                Designation: {minlength: 3,  required: true},
                Mobile: {minlength: 3, required: true},
                Name: {minlength:3, required: true},
                Phone: {minlength:3, required: true},
                Address: {minlength: 3,  required: true},
                Email: {minlength: 3, required: true},
                Password: {minlength: 9,  required: true},
                Password2: {minlength: 9,  required: true, equalTo: "#Password"},
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }

        });
    });
</script>
<a href="jobseeker"></a>

</body>
</html>
$(document).ready(function () {

	 function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }

    $("#other_text_out").hide();
    $("#error").hide();
    $('#save_position').on("click", function () {
        function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }


        var pathname = document.URL;
        var idofurl = getParameterByName("id", pathname);//get the id



        var cat_total = "";
        var empty = "yes"; //This is where to check 

        var other_text = $('#other_txt').val();
        other_text_new = "Other-" + other_text;


        $("#jobseeker").find('td').each(function (i) {
            if ($(this).hasClass('greenDiv')) {
                var catgory = $(this).attr("name");
                cat_total = cat_total + catgory + ",";//add all the drive experience
                empty = "no";//user has selected the some catergory
            }
        });

        if (!other_text == "") {
            cat_total = cat_total + other_text_new;
            empty = "no";//user has selected the other catergory
        }


        if (empty == "no") {
            $("#error").hide();// hide the error msg
            $.ajax({
                type: "post",
                url: "update_cat.php",
                data: {
                    id: idofurl,
                    cat_info: cat_total
                },
                success: function (data) {
                    //console.log(data); // "something"
                    alert('your positions details ')
                    //console.log(data); // "something"
                    $link = "cv_gen.php?id=" + idofurl;
                    window.location.href = $link;
                }
            });
        }
        else {
            $("#error").show();// show the error msg

        }
    });//end of click 
    
    $("update_icm").on('click' , function (){
		var incname = $("#Incname").val();
		
	})
    
    $('#update_info').click(function () {
        var al_info = "";
        var ol_info = "";
        var form_true = $("#form").valid();//calling validate plugin

        var select = $("#date").val();//is to validate multiselect
        if (select == "") {
        }

        $("#subjects_al_table").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject_name = $tds.eq(0).text(),
                    grade = $tds.eq(1).text();

            // do something with productId, product, Quantity
            //alert(subject_name);
            if (!subject_name == " ") {
                var Subject = subject_name + ":" + grade;
                al_info = al_info + Subject + ",";
            }
        });





        $("#subject_ol_table").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject_name = $tds.eq(0).text(),
                    grade = $tds.eq(1).text(),
                    year = $tds.eq(2).text();

            // do something with productId, product, Quantity
            //alert(productId+":"+product);
            if (!subject_name == " ") {
                var Subject = subject_name + ":" + grade;
                ol_info = ol_info + Subject + ",";
            }
        });
        //alert(ol_info);
        function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        var pathname = document.URL;// get the current url of the document
        var idofurl = getParameterByName("id", pathname);//get the id

//$("#form :input[value!='']").serialize()

        //var frm = $("#form");//basic info from
        //var frm2 = $("#form_AL");//)L info from

        //var data = frm.serialize();
        //var data2 = JSON.stringify(frm2.serializeArray());

        var firstname = $("#name").val();
        var DOB = $("#DOB").val();
        var sex = $("#sex").val();
        var mstatus = $("#mstatus").val();
        var nationality = $("#nationality").val();
        var pliving = $("#pliving").val();
        var cliving = $("#cliving").val();
        var contactno = $("#contactno").val();
        var address = $("#address").val();
        var emailadd = $("#email").val();
        var Password = $("#Password").val();

        var basic_info = firstname + "|" + DOB + "|" + sex + "|" + mstatus + "|" + nationality + "|" + pliving + "|" + cliving + "|" + contactno + "|" + address + "|" + emailadd;

        if (form_true == true) {
            $.ajax({
                type: "post",
                url: "step_one.php",
                data: {
                    id: idofurl,
                    basic_info: basic_info,
                    ol_info: ol_info,
                    al_info: al_info,
                    emailadd: emailadd,
                    password: Password
                },
                success: function (data) {
                    //consalert('Position updated')
                    $link = "cv_gen.php?id=" + idofurl;
                    window.location.href = $link;
                }
            });



        }



    });

    $('#nextv').on('click', function () {
        var vacant = $('#vacant').val();
        $.ajax({
            type: 'post',
            url: 'jobseeker/vacant.php',
            data: {
                vacant: vacant
            },
            success: function (data) {
                //console.log(data); // "something"
                $link = "jobseeker/new_user.php?id=" + data;
                window.location.href = $link;
            }

        });
    });


    $('#updata_ol').click(function () {


        var pathname = document.URL;
        var idofurl = getParameterByName("id", pathname);//get the id
        var ol_info = "";
        $("#subject_ol_table").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject_name = $tds.eq(0).text(),
                    grade = $tds.eq(1).text(),
                    year = $tds.eq(2).text();

            // do something with productId, product, Quantity
            //alert(productId+":"+product);
            if (!subject_name == " ") {
                var Subject = subject_name + ":" + grade;
                ol_info = ol_info + Subject + ",";
            }
        });
        $("#subject_ol_table1").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject_name = $tds.eq(0).text(),
                    grade = $tds.eq(1).text(),
                    year = $tds.eq(2).text();

            // do something with productId, product, Quantity
            //alert(productId+":"+product);
            if (!subject_name == " ") {
                var Subject = subject_name + ":" + grade;
                ol_info = ol_info + Subject + ",";
            }
        });


        $.ajax({
            type: "post",
            url: "./update_ol.php",
            data: {
                id: idofurl,
                ol_info: ol_info
            },
            success: function (data) {
                //console.log(data); // "something"
                $link = "cv_gen.php?id=" + idofurl;
                window.location.href = $link;
            }
        });
    });

    $('#updata_al').click(function () {



        function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }


        var pathname = document.URL;
        var idofurl = getParameterByName("id", pathname);//get the id
        var al_info = "";
        $("#subject_table_al").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject_name = $tds.eq(0).text(),
                    grade = $tds.eq(1).text(),
                    year = $tds.eq(2).text();

            // do something with productId, product, Quantity
            //alert(productId+":"+product);
            if (!subject_name == " ") {
                var Subject = subject_name + ":" + grade;
                al_info = al_info + Subject + ",";
            }
        });
        $("#subject_table_al1").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject_name = $tds.eq(0).text(),
                    grade = $tds.eq(1).text(),
                    year = $tds.eq(2).text();

            // do something with productId, product, Quantity
            //alert(productId+":"+product);
            if (!subject_name == " ") {
                var Subject = subject_name + ":" + grade;
                al_info = al_info + Subject + ",";
            }
        });


        $.ajax({
            type: "post",
            url: "./update_al.php",
            data: {
                id: idofurl,
                al_info: al_info
            },
            success: function (data) {
                //console.log(data); // "something"
                $link = "cv_gen.php?id=" + idofurl;
                window.location.href = $link;
            }
        });
    });

    $('#updata_pro').click(function () {

        function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }
        var code_total = "";
        var pro_exp_total = "";// professional exp variable 
        var pathname = document.URL;
        var idofurl = getParameterByName("id", pathname);//get the id

        $("#subject_table_course").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    course = $tds.eq(0).text(),
                    status = $tds.eq(1).text(),
                    stage = $tds.eq(2).text();
            stage_stage = $tds.eq(3).text();
            if (stage == " ") {
                var quol_code = course.charAt(0);
                var quol_code_status = stage.charAt(0);
                var code = quol_code + quol_code_status;
                var pro_exp = course + ":" + status;

            }
            else {
                // do something with productId, product, Quantity
                var quol_code = course.charAt(0);
                var quol_code_status = stage.charAt(0);
                var code = quol_code + quol_code_status;
                var pro_exp = course + ":" + status + ":" + stage + ":" + stage_stage;

            }
            pro_exp_total = pro_exp_total + pro_exp + ",";//add all the pro experience
            code_total = code_total + code + ",";
        });

        $.ajax({
            type: "post",
            url: "update_pro.php",
            data: {
                id: idofurl,
                pro_info: pro_exp_total
            },
            success: function (data) {
                //console.log(data); // "something"
                $link = "cv_gen.php?id=" + idofurl;
                window.location.href = $link;
            }
        });

    });

    $('#updata_com').click(function () {


        function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }
        


        var pathname = document.URL;
        var idofurl = getParameterByName("id", pathname);//get the id

        var com_exp_total = "";
        var com = "";
        $("#computer_table1").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject = $tds.eq(0).text(),
                    level = $tds.eq(1).text(),
                    year = $tds.eq(2).text();
            var com_exp = subject + ":" + level + ":" + year;
            com_exp_total = com_exp_total + com_exp + ",";//add all the computer experience
        });
        var com_exp_total1 = "";
        $("#computer_table").find('tr').each(function (i) {
            var $tds = $(this).find('td'),
                    subject = $tds.eq(0).text(),
                    level = $tds.eq(1).text(),
                    year = $tds.eq(2).text();
            var com_exp1 = subject + ":" + level + ":" + year;
            com_exp_total1 = com_exp_total1 + com_exp1 + ",";//add all the computer experience
        });
        com = com_exp_total + com_exp_total1;
        $.ajax({
            type: "post",
            url: "./update_com.php",
            data: {
                id: idofurl,
                com_info: com
            },
            success: function (data) {
                //console.log(data); // "something"
                $link = "cv_gen.php?id=" + idofurl;
                window.location.href = $link;
            }
        });

    });



});

$('#updata_work').click(function () {

    var org_total = "";
    function getParameterByName(name, href)
    {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(href);
        if (results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var pathname = document.URL;
    var idofurl = getParameterByName("id", pathname);//get the id



    $("#work_ex").find('tr').each(function (i) {
        var $tds = $(this).find('td'),
                org = $tds.eq(0).text(),
                designation = $tds.eq(1).text(),
                period = $tds.eq(2).text();
        var org_exp = org + ":" + designation + ":" + period;
        org_total = org_total + org_exp + ",";//add all the work experience
    });
    $.ajax({
        type: "post",
        url: "update_work.php",
        data: {
            id: idofurl,
            work_info: org_total
        },
        success: function (data) {
            //console.log(data); // "something"
            $link = "cv_gen.php?id=" + idofurl;
            window.location.href = $link;
        }
    });



});

    $('#updata_sub').click(function () {
        var city_total = "";
    $(".city").find('td').each(function (i) {
				if($(this).hasClass('greenDiv') ){
				var city= $(this).attr("name");
				city_total=city_total+city+",";//add all the city experience
				
			}
			});
                        
                        
                          function getParameterByName(name, href)
    {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(href);
        if (results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var pathname = document.URL;
    var idofurl = getParameterByName("id", pathname);//get the id
    
     $.ajax({
        type: "post",
        url: "update_sub.php",
        data: {
            id: idofurl,
            city_info: city_total
        },
        success: function (data) {
            //console.log(data); // "something"
            $link = "cv_gen.php?id=" + idofurl;
            window.location.href = $link;
        }
    });
    
    
                        
                        


    });
    
     
    
     $('#updata_icm').click(function () {
        function getParameterByName(name, href)
	    {
	        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	        var regexS = "[\\?&]" + name + "=([^&#]*)";
	        var regex = new RegExp(regexS);
	        var results = regex.exec(href);
	        if (results == null)
	            return "";
	        else
	            return decodeURIComponent(results[1].replace(/\+/g, " "));
	    }
    	var pathname = document.URL;
    	var idofurl = getParameterByName("id", pathname);//get the id
        var Incname = $("#Incname").val();
        var cname = Incname.toString();
        
        
    	
    	 $.ajax({
	        type: "post",
	        url: "update_icm.php",
	        data: {
	            id: idofurl,
	            Incname: cname
	        },
	        success: function (data) {
	        	alert('Updated ')
	            //console.log(data); // "something"
	            $link = "cv_gen.php?id=" + idofurl;
	            window.location.href = $link;
	        },
	       
	    });
        
   
    
	
    });
    
    $('#updata_nicm').click(function () {
        function getParameterByName(name, href)
	    {
	        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	        var regexS = "[\\?&]" + name + "=([^&#]*)";
	        var regex = new RegExp(regexS);
	        var results = regex.exec(href);
	        if (results == null)
	            return "";
	        else
	            return decodeURIComponent(results[1].replace(/\+/g, " "));
	    }
    	var pathname = document.URL;
    	var idofurl = getParameterByName("id", pathname);//get the id
    	var NIncname = $("#NIncname").val();
    	var cname = NIncname.toString();
    	
 	$.ajax({
	        type: "post",
	        url: "update_nicm.php",
	        data: {
	            id: idofurl,
	            NIncname: cname
	        },
	        success: function (data) {
	        alert('Updated ')
	            //console.log(data); // "something"
	            $link = "cv_gen.php?id=" + idofurl;
	            window.location.href = $link;
	        }
	    });
        
   
    
	
    });
    
    $('#updata_type').click(function () {
        function getParameterByName(name, href)
	    {
	        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	        var regexS = "[\\?&]" + name + "=([^&#]*)";
	        var regex = new RegExp(regexS);
	        var results = regex.exec(href);
	        if (results == null)
	            return "";
	        else
	            return decodeURIComponent(results[1].replace(/\+/g, " "));
	    }
    	var pathname = document.URL;
    	var idofurl = getParameterByName("id", pathname);//get the id
    	var jobtype = $("#jobtype").val();
    	var jtype = jobtype.toString();
    	
 	$.ajax({
	        type: "post",
	        url: "update_type.php",
	        data: {
	            id: idofurl,
	            jobtype: jtype
	        },
	        success: function (data) {
	        alert('Updated ')
	            //console.log(data); // "something"
	            $link = "cv_gen.php?id=" + idofurl;
	            window.location.href = $link;
	        }
	    });
        
   
    
	
    });
    
      $('#updata_drive').click(function () {
        var drive_total = "";
    $(".Driving").find('td').each(function (i) {

			if($(this).hasClass('greenDiv') ){
			var drive= $(this).attr("name");
			drive_total =drive_total+drive+",";//add all the drive experience
		 }
		});
                        
                        
                          function getParameterByName(name, href)
    {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(href);
        if (results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var pathname = document.URL;
    var idofurl = getParameterByName("id", pathname);//get the id
    
     $.ajax({
        type: "post",
        url: "update_drive.php",
        data: {
            id: idofurl,
            drive_info: drive_total
        },
        success: function (data) {
            //console.log(data); // "something"
            $link = "cv_gen.php?id=" + idofurl;
            window.location.href = $link;
        }
    });
    
    
                        
                        


    });
    
$('#updata_lang').click(function () {


    function getParameterByName(name, href)
    {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(href);
        if (results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var lang_exp_total = "";
    var empty = "yes";

    var pathname = document.URL;
    var idofurl = getParameterByName("id", pathname);//get the id
    $(".lang").find('td').each(function (i) {//collect the language skills
        if ($(this).hasClass('greenDiv')) {
            var skill = $(this).attr("name");
            lang_exp_total = lang_exp_total + skill + ",";
            empty = "no";
        }
    });


    $.ajax({
        type: "post",
        url: "update_lang.php",
        data: {
            id: idofurl,
            lang_info: lang_exp_total
        },
        success: function (data) {
            //console.log(data); // "something"
            $link = "cv_gen.php?id=" + idofurl;
            window.location.href = $link;
        }
    });




});//end of document

$(document).ready(function() {
$('#error').hide();
$('#next2').on("click",function(){

	var pro_exp_total="";// professional exp variable 
	var com_exp_total="";// computer exp variable
	var lang_exp_total="";// professional exp variable 
 var code_total="";	
	var empty="yes";

    $("#subject_table").find('tr').each(function (i) {
        var $tds = $(this).find('td'),
            course = $tds.eq(0).text(),
            status = $tds.eq(1).text(),
            stage = $tds.eq(2).text();
			stage_stage = $tds.eq(3).text();
		if (stage == " "){
		var quol_code=course.charAt(0);
		var quol_code_status=status.substr(status.indexOf(":") + 1);
		var code=quol_code+quol_code_status;
		var pro_exp=course+":"+status;
		
		}
		else{
        // do something with productId, product, Quantity
			var quol_code=course.charAt(0);
		var quol_code_status=status.substr(status.indexOf(":") + 1);
		var code=quol_code+quol_code_status;
        var pro_exp=course+":"+status+":"+stage+":"+stage_stage;
	
		}
		pro_exp_total = pro_exp_total+pro_exp+",";//add all the pro experience
		code_total=code_total+code+",";
		});
	
	
	    $("#computer_table").find('tr').each(function (i) {
        var $tds = $(this).find('td'),
        subject = $tds.eq(0).text(),
        level = $tds.eq(1).text(),
        year = $tds.eq(2).text();
        var com_exp=subject+":"+level+":"+year;
	
		
		com_exp_total = com_exp_total+com_exp+",";//add all the computer experience
		});
	

	
	
		
  $(".lang").find('td').each(function (i) {//collect the language skills
		if($(this).hasClass('greenDiv') ){
		var skill= $(this).attr("name");
		lang_exp_total =lang_exp_total+skill+",";
		empty="no";
		 }

		});



//##### get of the value of the id #####

			function getParameterByName( name,href )
			{
			  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
			  var regexS = "[\\?&]"+name+"=([^&#]*)";
			  var regex = new RegExp( regexS );
			  var results = regex.exec( href );
			  if( results == null )
				return "";
			  else
				return decodeURIComponent(results[1].replace(/\+/g, " "));
			}
			
		var pathname = document.URL;// get the current url of the document
		var idofurl= getParameterByName("id",pathname);//get the id

//##### end of the value of the id #####		
			if (empty =="no"){
		$("#error").hide();// hide the error msg
			$.ajax({
						type: "post",
						url: "step_two.php",
						data: {
							id:idofurl,
							pro_info:pro_exp_total,
							exp_info:com_exp_total,
							lang_info:lang_exp_total,
							code_total:code_total
							},
						success: function(data) {
						//console.log(data); // "something"
						$link="add_info4.php?id="+idofurl;
						window.location.href = $link;
						}
						});

		}
		else{
		$("#error").show();// show the error msg
	
		}
				




});//end of click 
    
});//end of document ready 
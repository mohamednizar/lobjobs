$(document).ready(function() {
$('#error').hide();
$('#next2').on("click",function(){
	var drive_total="";// driving exp variable 	
	var city_total="";// city knowledge variable
	var pro_exp_total="";// professional exp variable 
	var com_exp_total="";// computer exp variable
	var lang_exp_total="";// professional exp variable 
        var code_total="";	
	var empty="yes";
	var NIncname=$("#NIncname").val();
	var Incname=$("#Incname").val();
	 
	
	    $("#computer_table").find('tr').each(function (i) {
        var $tds = $(this).find('td'),
        subject = $tds.eq(0).text(),
        level = $tds.eq(1).text(),
        year = $tds.eq(2).text();
        var com_exp=subject+":"+level+":"+year;
	
		
		com_exp_total = com_exp_total+com_exp+",";//add all the computer experience
		});
	

		$(".city").find('td').each(function (i) {
				if($(this).hasClass('greenDiv') ){
				var city= $(this).attr("name");
				city_total=city_total+city+",";//add all the city experience
				
			}
			});

		
		$(".Driving").find('td').each(function (i) {

			if($(this).hasClass('greenDiv') ){
			var drive= $(this).attr("name");
			drive_total =drive_total+drive+",";//add all the drive experience
		 }
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
                var cnames = Incname;
                var ncnames = NIncname; 

//##### end of the value of the id #####		
			if (empty =="no"){
					$("#error").hide();// hide the error msg
			$.ajax({
						type: "post",
						url: "step_two.php",
						data: {
							id:idofurl,
							
							city_info:city_total,
							lang_info:lang_exp_total,
							com_exp_total:com_exp_total,
							drive_info:drive_total,
							Incname:cnames,
							NIncname:ncnames
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
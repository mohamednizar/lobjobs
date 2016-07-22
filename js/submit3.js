$(document).ready(function() {

$('#next3').on("click",function(){


	var org_total="";// work exp variable 
	var pro_exp_total="";// professional exp variable 
	var code_total="";	
	var empty="yes";
	var al_info="";
		var ol_info="";

// ############# get the al info #####################

		$("#subjects_al_table").find('tr').each(function (i) {
        var $tds = $(this).find('td'),
		
		subject_name =$tds.eq(0).text(),
         grade =$tds.eq(1).text();
			       
        // do something with productId, product, Quantity
        //alert(subject_name);
		if (!subject_name==" "){
		var Subject=subject_name+":"+grade;
		al_info = al_info+Subject+",";
	}
		});
		
	
	// ############# get the ol info #####################
	
	
		 $("#subject_ol_table").find('tr').each(function (i) {
        var $tds = $(this).find('td'),
            subject_name =$tds.eq(0).text(),
            grade =$tds.eq(1).text(),
			year = $tds.eq(2).text();
           
        // do something with productId, product, Quantity
        //alert(productId+":"+product);
		if (!subject_name==" "){
		var Subject=subject_name+":"+grade;
		ol_info = ol_info+Subject+",";
	}
		});





		$("#work_ex").find('tr').each(function (i) {
				var $tds = $(this).find('td'),
				org = $tds.eq(0).text(),
				designation = $tds.eq(1).text(),
				period = $tds.eq(2).text();
				var org_exp=org+":"+designation+":"+period;
				org_total = org_total+org_exp+",";//add all the work experience
		});
	    

	
		 $("#subject_table_course").find('tr').each(function (i) {
        var $tds = $(this).find('td'),
            course = $tds.eq(0).text(),
            status = $tds.eq(1).text(),
            stage = $tds.eq(2).text();
			stage_stage = $tds.eq(3).text();
		if (stage == " "){
		var quol_code=course.charAt(0);
		var quol_code_status=stage.charAt(0);
		var code=quol_code+quol_code_status;
		var pro_exp=course+":"+status;
		
		}
		else{
        // do something with productId, product, Quantity
			var quol_code=course.charAt(0);
		var quol_code_status=stage.charAt(0);
		var code=quol_code+quol_code_status;
        var pro_exp=course+":"+status+":"+stage+":"+stage_stage;
	
		}
		pro_exp_total = pro_exp_total+pro_exp+",";//add all the pro experience
		code_total=code_total+code+",";
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
			

			$.ajax({
						type: "post",
						url: "step_three.php",
						data: {
							id:idofurl,
							pro_info:pro_exp_total,
							org_total:org_total,
							ol_info:ol_info,
							codes:code_total,
							al_info:al_info
							},
						success: function(data) {
							alert("your cv has been sent");
							$link="../services.php?cat=All Categories";
							window.location.href = $link;
							}
						
				});

});//end of click 
  
 
	  
});
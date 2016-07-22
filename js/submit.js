$(document).ready(function() {

$('#next').click(function(){

	
	var al_info="";
		var ol_info="";
		var form_true = $("#form").valid();//calling validate plugin

		var select =$("#date").val();//is to validate multiselect
		if (select ==""){
		}

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
		
	
	
	var j=$("#jobtype").val();
	if(j!==null){
	var jobtype = j.toString();
	}
	
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
			//alert(ol_info);
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

//$("#form :input[value!='']").serialize()

		//var frm = $("#form");//basic info from
		//var frm2 = $("#form_AL");//)L info from

		//var data = frm.serialize();
		//var data2 = JSON.stringify(frm2.serializeArray());
		
		var firstname=$("#name").val();
		var DOB=$("#DOB").val();
		var sex=$("#sex").val();
		var mstatus=$("#mstatus").val();
		var nationality=$("#nationality").val();
		var pliving=$("#pliving").val();
		var cliving=$("#cliving").val();
		var contactno=$("#contactno").val();
		var address=$("#address").val();
		var emailadd=$("#email").val();
		var Password=$("#Password").val();
		var job_type = jobtype;
		
			
		var basic_info =firstname+"|"+DOB+"|"+sex+"|"+mstatus+"|"+nationality+"|"+pliving+"|"+cliving+"|"+contactno+"|"+address+"|"+emailadd;
		
		if (form_true == true){
		$.ajax({
		type: "post",
		url: "step_one.php",
		data: {
			id:idofurl,
			basic_info:basic_info,
			job_type:job_type,
			ol_info:ol_info,
			al_info:al_info,
			emailadd:emailadd,
			password:Password
			},
		success: function(data) {
        //console.log(data); // "something"
		$link="add_info3.php?id="+idofurl;
		window.location.href = $link;
		}
		});

		
		
		}
	
		
		
});//end of click 
  
  
  

	
	  
});
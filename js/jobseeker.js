$(document).ready(function() {
$("#other_text_out").hide();
$("#error").hide();
			$('#next1').on("click",function(){
		var cat_total="";	
		var empty="yes"; //This is where to check 
		
		var other_text=$('#other_txt').val();
		other_text_new="Other-"+other_text;
		
		
		$("#jobseeker").find('td').each(function (i) {
			if($(this).hasClass('greenDiv') ){
			var catgory= $(this).attr("name");
			cat_total =cat_total+catgory+",";//add all the drive experience
			empty="no";//user has selected the some catergory
		 }
		});
		
		if (!other_text==""){
		cat_total=cat_total+other_text_new;
		empty="no";//user has selected the other catergory
		}
		
		
		if (empty =="no"){
		$("#error").hide();// hide the error msg
			$.ajax({
						type:"post",
						url: "./jobseeker/choose_cat.php",
						data: {
						 cat_info:cat_total
							},
						success: function(data) {
						//console.log(data); // "something"
						$link="jobseeker/new_user.php?id="+data;
						window.location.href =$link;
						}
				});
		}
		else{
		$("#error").show();// show the error msg
	
		}
		});//end of click 
                
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
             
    
    
});//end of document

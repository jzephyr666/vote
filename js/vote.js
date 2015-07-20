/**
 * vote.js
 * triggers for dropdown population and form submission
 */

$("#selectVotesOptions").change( function(){
	
	
	var voteStat = selectVotesOptions.options[selectVotesOptions.selectedIndex].value;
	
	if( voteStat == 2 ) {
		$("#divConstituencyWindow").show();
		$("#divPartyWindow").show();
		
		$.ajax({
	        url: "selectConstituency.php",
				data: { voteStat: voteStat },	
	        	success: function(data){
	        		var opts = $.parseJSON( data );
	        		$("#divConstituencyWindow").append('<p><select id="selectConstituencyOptions"></select></p>');
	        		$.each(opts, function(i, d) {
	        			$('#selectConstituencyOptions').append('<option value="' + i + '">' + d + '</option>');
	                 });
	        	}
	    });

	} else {
		$("#divConstituencyWindow").hide();
		$("#divPartyWindow").hide();
		$("#selectConstituencyOptions").remove();
	}
}); 


$("#selectVotesOptions").change( function(){

	var voteStat = selectVotesOptions.options[selectVotesOptions.selectedIndex].value;

	if( voteStat == 2 ) {
		$("#divPartyWindow").show();

		$.ajax({
	        url: "selectParty.php",
				data: { voteStats: voteStat },	
	        	success: function(data){
	        		var optss = $.parseJSON( data );
	        		$("#divPartyWindow").append('<p><select id="selectPartyOptions"></select></p>');
	        		$.each(optss, function(ids, des) {
	        			$('#selectPartyOptions').append('<option value="' + ids + '">' + des + '</option>');
	                 });
	        	}
	    });

	} else {
		$("#divPartyWindow").hide();
		$("#selectPartyOptions").remove();
	}
}); 


$("#selectVotesOptions").change( function(){

	var voteStat = selectVotesOptions.options[selectVotesOptions.selectedIndex].value;	

	if( voteStat == 2 ) {
		$("#divSubmitWindow").show();
		$('#divSubmitWindow').append('<button id="btnSubmit" type="button">Submit</button>');

		$("#btnSubmit").click( function(){
			$.ajax({
				url: 	"submitDetails.php",
				data: 	{ 	voteStat: 			voteStat, 
							voteConstituency: 	selectConstituencyOptions.options[selectConstituencyOptions.selectedIndex].value, 
							voteParty: 			selectPartyOptions.options[selectPartyOptions.selectedIndex].value 
						},	
		        success: function(data){
		        	$('#divSubmitWindow').append('<p><strong>Your input has been logged.</strong></p>');
		        }
		    });
		});
		
	} else {
		$("#divSubmitWindow").hide();
		$("#btnSubmit").remove();
	}

}); 	
	
	
$(document).ready(function(){
	$("#divConstituencyWindow").hide();
	$("#divPartyWindow").hide();
	
}); 
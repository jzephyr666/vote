/**
 * 
 */

$('#selectViewReports').change(function() {
    window.location = "viewResults.php?viewreportid=" + $(this).val();
});

$(document).ready(function(){
    
	$('#selectViewReports')[3].attr('selected', 'selected');

});
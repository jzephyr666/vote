<html>
<head>
</head>
<?php 
#import libraries and initialise
require_once 'lib.php';
$dbVotes = new persistDisplay();
$votes = new voteoptions() ;
?>


<body>
<p>Are you going to vote?</p>
<div id="divVoteOptions">

<?php
# process and display voting option
$votes->sVoteOptions = $dbVotes->votesOptionsList();
$voteslist = $votes->populateVoteOptions();
echo $voteslist;
?>
 
</div>

<!-- Set up containers -->
<div id="divPartyWindow"></div>
<div id="divConstituencyWindow"></div>
<div id="divSubmitWindow"></div>
<div id="resultsWindow"><p><a href="viewResults.php">View Results</a></p></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="js/vote.js"></script>
 </body>
</html>
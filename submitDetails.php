<?php

# import required library and initiate 
require_once 'lib.php';
$dbVotes = new persistDisplay();

/**
 * Triggered via jQuery/Ajax
 * Submits log details to database
 */
if ( isset( $_GET['voteStat'] )  ) {
	$voteStatGet = $_GET['voteStat'];
	$voteConstituency = $_GET['voteConstituency'];
	$votingParty = $_GET['voteParty'];
	if( $voteStatGet == 2 ) {
		$sbtLog = $dbVotes->logResults($voteStatGet, $votingParty, $voteConstituency);
		//echo json_encode( $dbVotes->constituencyList( ) ) ;
		//$sbtLog = $dbVotes->logResults(2, 3, 4);
	}
}


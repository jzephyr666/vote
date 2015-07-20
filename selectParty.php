<?php

# import required library and initiate 
require_once 'lib.php';
$dbVotes = new persistDisplay();

/**
 * Triggered via jQuery/Ajax
 * Return json encoded party list
 */
if( isset( $_GET['voteStats'] ) ) {
	$party = $_GET['voteStats'] ;
	if( $party == 2 ) {
		//echo "$party";
		echo json_encode( $dbVotes->partyList() ); 
	}
}
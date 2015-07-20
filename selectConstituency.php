<?php

# import required library and initiate 
require_once 'lib.php';
$dbVotes = new persistDisplay();

/**
 * Triggered via jQuery/Ajax
 * Return json encoded constituencies
 */
if ( isset( $_GET['voteStat'] )  ) {
	$voteStatGet = $_GET['voteStat'];
	if( $voteStatGet == 2 ) {
		echo json_encode( $dbVotes->constituencyList( ) ) ;
	}
}
<?php

/**
 * @name voteoptions class
 * Initialise and process vote options for drop down
 * @author Saqib
 * @return select element
 */
class voteoptions {
	
	public $sVoteOptions = array();
	
	/**
	 * @name populateVoteOptions
	 * Generate select element
	 * @return select element
	 */
	function populateVoteOptions( ) {
		$votesOptionsList = $this->sVoteOptions ;
		$selectVotesOptions = '<select id="selectVotesOptions">';
		foreach ( $votesOptionsList as $k => $svote ) {
			 $selectVotesOptions.= "<option value=$svote[id]>$svote[votestat]</option>";
		}
		$selectVotesOptions.= '</select>';
		return $selectVotesOptions;
	}
}




/**
 * Testing purposes
 */

//require_once 'db/persistence.php';
//$dbVotes = new persistDisplay();
//$votes = new voteoptionsdiv() ;
//
//$votes->sVoteOptions = $dbVotes->votesOptionsList();
//$voteslist = $votes->populateVoteOptions();
//echo $voteslist;

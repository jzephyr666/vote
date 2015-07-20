<?php


/**
 * @name persist
 * Class for persistence
 * @author Saqib
 */
class persist {

	private $user 	= 'pollsuser';
	private $pass 	= 'pollspass';
	private $db		= 'polls';

	/**
	 * @name dbconn
	 * Execute given query
	 * @param string $query
	 */
	private function dbconn( $query ) {
		$mysqli = new mysqli("localhost", $this->user, $this->pass, $this->db);

		if ($mysqli->connect_errno) {
		    printf("Connect failed: %s\n", $mysqli->connect_error);
		    exit();
		} 

		$rst = mysqli_query( $mysqli, $query );
		mysqli_close($mysqli);
		return $rst;
	} 

	/**
	 * @name execQuery
	 * Submit query and restun array resultset
	 * @param string $query
	 * @return array $rst
	 */
	public function execQuery( $query = null) {
		$rst = $this->dbconn( $query );
		return $rst;
	}

	/**
	 * @name votesOptionsList
	 * return options for voting drop down ...
	 * @return resultset $voteOptionsList
	 */
	public function votesOptionsList( ) {
		$q = "SELECT `id`, `votestat` FROM `svote` WHERE `isDeleted` = 0";
		$voteOptionsList = $this->execQuery( $q ) ; 
		return $voteOptionsList;
	}

	/**
	 * @name constituencyList
	 * Return dropdown list for constituencies
	 * @return array $constituencyList
	 */
	public function constituencyList( ) {
		$constituencyList = '';
		$q = "SELECT `id`, `constituency` FROM `constituency` WHERE `isdeleted` = 0 ";
		$constituencyListQ = $this->execQuery( $q ); 
		foreach ( $constituencyListQ as $k => $v ) {
			$constituencyList[ $v['id'] ] = $v['constituency'];
		}
		return $constituencyList ;
	}

	/**
	 * @name partyList
	 * Return drop down list of political parties
	 * @return array $partyList
	 */
	public function partyList( ) {
		$partyList = '';
		$q = "SELECT `id`, `party` FROM `party` WHERE `isdeleted` = 0 ";
		$partyListQ = $this->execQuery( $q ) ;
		foreach ( $partyListQ as $k => $v ) {
			$partyList[ $v['id'] ] = $v['party'];
		}
		return $partyList;
	}

	/**
	 * @name logResults
	 * Log current vote submission
	 * @param int $isVoting
	 * @param int $votingParty
	 * @param int $voteConstituency
	 */
	public function logResults( $isVoting, $votingParty, $voteConstituency ) {
		$q = "INSERT INTO `log`( `isVoting`, `party`, `constituency` ) VALUES ( '$isVoting','$votingParty', '$voteConstituency' )";
		echo $q;
		$qu = $this->execQuery( $q );
	}
	
	/**
	 * @name partyVoters
	 * Return individual party votes for report
	 * @param string $sort
	 * @return array $partyvoters
	 */
	public function partyVoters( $sort = NULL ) {
		$partyvoters=array();
		$q="
			SELECT p. party, count(l.party) votes
			FROM party p
			left join log l on p.id = l.party
			group by p.party, l.party
			order by count(l.party) $sort"
		;		
		$qu = $this->execQuery( $q );
		foreach ( $qu as $k => $v ) {
			$partyvoters[ $v['party'] ] = $v['votes'];			
		}
		return $partyvoters;
	}

	/**
	 * @name constituentVoters
	 * Returns votes per constutuency for report
	 * @param string $sort
	 * @return array $constVoters
	 */
	public function constituentVoters( $sort = NULL ) {
		$constVoters=array();
		$q="
			SELECT c.constituency , count(l.constituency) votes
			FROM `constituency` c
			left join log l on c.id = l.constituency
			group by c.constituency, l.constituency
			order by count(l.constituency) $sort"
		;		
		$constVoters = $this->execQuery( $q );
		return $constVoters;
	}

	/**
	 * @name partyConstituentVotes
	 * Returns Votes per party per constituency
	 * @param string $sort
	 * @return array $pcVotes
	 */
	public function partyConstituentVotes( $sort = NULL) {
		$pcVotes = array( );
		$q="
			SELECT p.party, c.constituency
			FROM `log` l
			join party p on l.party = p.id
			join constituency c on l.constituency = c.id		
		";
		$pcVotes = $this->execQuery( $q );
		return $pcVotes;		
	}
		
}

/**
 * @name persistDisplay
 * 
 * This class has been created and USED purely to demonstrate
 * inheritance and dependancies
 * 
 * @author Saqib
 */
class persistDisplay extends persist {

	/**
	 * @name displayResults
	 * Used to test this class below
	 * @param array $results
	 */
	public function displayResults( $results ) {
		foreach ( $results as $k => $v ) {
			echo "$k=>$v <br />";
		}
	}
}

// TEST AND GO!!
//$dbp = new persistDisplay();
//$dbp->votesOptionsList();
//$q = "SELECT `id`, `votestat` FROM `svote` WHERE `isDeleted` = 0";
//$q = "SELECT `id`, `constituency` FROM `constituency` WHERE `isdeleted` = 0 ";
//$rst = $dbp->execQuery($q);
//$dbp->constituencyList();
//print_r($rst);
//print_r( $dbp->partyList() );
//$r = $dbp->partyVoters();
//print_r($r);

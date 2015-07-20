<?php

# import required library and initiate 
require_once 'db/persistence.php';
$dbr = new persistDisplay();

/**
 * @name viewReports
 * Report Handling
 * @author Saqib
 *
 */
class viewReports {
	
	public $pList = '', $cList = '', $pcList = '';
	
	/**
	 * @name showPartyReport
	 * Display Party votes report
	 */
	public function showPartyReport( ) {		
		echo '<table><tr><th>Party</th><th>Votes</th></tr>';
		foreach ( $this->pList as $k => $v ){
			echo "<tr><td align=\"left\">".$k."</td><td align=\"right\">$v</td></tr>";
		}
		echo'</table>';
	}
	
	/**
	 * @name showConstituencyReport
	 * Display constituency votes report
	 */
	public function showConstituencyReport( ) {
		echo '<table><tr><th>Constituency</th><th>Votes</th></tr>';
		foreach ( $this->cList as $k => $v ){
			echo "<tr><td>".$v['constituency']."</td><td>".$v['votes']."</td></tr>";
		}
		echo'</table>';
	}

	/**
	 * @name showPartyConstituencyReport
	 * Display party/constituency votes report
	 */	
	public function showPartyConstituencyReport( ) {
		echo '<table><tr><th>Party</th><th>Constituency</th></tr>';
		foreach ( $this->pcList as $k => $v ){
				echo "<tr><td>".$v['party']."</td><td>".$v['constituency']."</td></tr>";
		}
		echo'</table>';
	}	
	
}

/**
 * Report Display Handler
 */

$vp = new viewReports();

switch ( $viewReport ) {
	case 1:
		$vp->pList = $dbr->partyVoters('desc');
		$vp->showPartyReport();
		break;
	case 2:
		$vp->cList = $dbr->constituentVoters('desc');
		$vp->showConstituencyReport();
		break;
	case 3:
		$vp->pcList = $dbr->partyConstituentVotes('desc');
		$vp->showPartyConstituencyReport();
		break;
}
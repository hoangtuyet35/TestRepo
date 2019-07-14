<?php
// get input string
$str = $argv[1];
//call checkHand function
$output = checkHand($str);
//output result
echo $output;

/*---- Defined functions ---- */
function checkHand($str) {
	//get list Ranks from input string
	$delimiter = '-';
	$replacedStr = preg_replace(array('/H/','/S/','/C/','/D/'),$delimiter,$str);
	$arrRank = array_filter(explode($delimiter, $replacedStr));
	
	//get number of occurences of each Rank in input string
	$arrNumOfOccurrence = array_count_values($arrRank);

	//Check number of Ranks and number of occurences of each Rank to find hand
	$numOfRank = count($arrNumOfOccurrence);
	$output = "Error";

	if($numOfRank == 5) {
		$output = '--';
	} else if ($numOfRank == 4) {
		$output = '1P';
	} else if ($numOfRank == 3) {
		//if there is rank which occur 3 times => the hand is 3C
		//else the hand is 2P
		if(in_array('3', $arrNumOfOccurrence)) {
			$output = '3C';
		} else {
			$output = '2P';
		}
	} else if ($numOfRank == 2) {
		//if there is rank which occur 4 times => the hand is 4C
		// else the hand is FH
		if(in_array('4', $arrNumOfOccurrence)) {
			$output = '4C';
		} else {
			$output = 'FH';
		}
	}
	return $output;
}

?>


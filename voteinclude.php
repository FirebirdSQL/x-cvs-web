<?PHP

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* ====================================                                 */
/* Web Links Modified from the original                                 */
/* Copyright (c) 2000 by James Knickelbein                              */
/* Journey Milwaukee (http://www.journeymilwaukee.com)                  */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

            include ("config.php");  
	    $outsidevotes = 0;
	    $anonvotes = 0;
	    $outsidevoteval = 0;
	    $anonvoteval = 0;
	    $regvoteval = 0;	
	    $truecomments = $totalvotesDB;
	    while(list($ratingDB, $ratinguserDB, $ratingcommentsDB)=mysql_fetch_row($voteresult)) {
	 	if ($ratingcommentsDB=="") $truecomments--;
	        if ($ratinguserDB==$anonymous) {
	       		$anonvotes++;
	        	$anonvoteval += $ratingDB;
	        }
	        if ($useoutsidevoting == 1) {
	        	if ($ratinguserDB=='outside') {
	        		$outsidevotes++;
	        		$outsidevoteval += $ratingDB;
	        	}
	        }
	        else { $outsidevotes = 0; }
	        
	     	if ($ratinguserDB!=$anonymous && $ratinguserDB!="outside") { $regvoteval += $ratingDB; }
	     }
	     $regvotes = $totalvotesDB - $anonvotes - $outsidevotes;
	     
	     # echo "Link ID: $lid   Reg: $regvotes  Unreg:  $anonvotes  Outside:  $outsidevotes<br>";
	     if ($totalvotesDB == 0) { $finalrating = 0; }
	     	 else if ($anonvotes == 0 && $regvotes == 0) {
	     	 	// Figure Outside Only Vote
	     	 	# echo "outside ";
	     	 	$finalrating = $outsidevoteval / $outsidevotes;
	     	 	$finalrating = number_format($finalrating, 4); 
	     	 }
	     	 else if ($outsidevotes == 0 && $regvotes == 0) {
	     	 	// Figure Anon Only Vote
	     	 	# echo "unREG ";
	     	 	$finalrating = $anonvoteval / $anonvotes;	     	 	
	     	 	$finalrating = number_format($finalrating, 4); 
	     	 }
	     	 else if ($outsidevotes == 0 && $anonvotes == 0) {
	     	 	# echo "REG ";
	     	 	// Figure Reg Only Vote
	     	 	$finalrating = $regvoteval / $regvotes;	     	 	
	     	 	$finalrating = number_format($finalrating, 4); 	     	 	
	     	 }	
	     	 
	 	 else if ($regvotes == 0 && $useoutsidevoting == 1 && $outsidevotes != 0 && $anonvotes != 0 ) {
	 	 // Figure Reg and Anon Mix
	 	 	# echo "REGANONMIX ";
	 	 	$avgAU = $anonvoteval / $anonvotes;
	 	 	$avgOU = $outsidevoteval / $outsidevotes;	 	 	
	 	 	
	         	if ($anonweight > $outsideweight ) {
	         		// Anon is 'standard weight'
				$newimpact = $anonweight / $outsideweight;
				$impactAU = $anonvotes;
				$impactOU = $outsidevotes / $newimpact;

		         	$finalrating = ((($avgOU * $impactOU) + ($avgAU * $impactAU)) / ($impactAU + $impactOU));
		         	$finalrating = number_format($finalrating, 4); 
	         	}
	         	else {
		         	// Outside is 'standard weight'
		                $newimpact = $outsideweight / $anonweight;
		         	$impactOU = $outsidevotes;
		         	$impactAU = $anonvotes / $newimpact;
		         	
		         	$finalrating = ((($avgOU * $impactOU) + ($avgAU * $impactAU)) / ($impactAU + $impactOU));
		         	$finalrating = number_format($finalrating, 4); 
	         	
	         	}       		         	
	 	 }
	 	 else {
	         	//REG User vs. Anonymous vs. Outside User Weight Calutions
	         	# echo "ALL ";
	         	$impact = $anonweight;  				// REG users are weighted by the impact.
	         	$outsideimpact = $outsideweight;
	         	if ($regvotes == 0) { $regvotes = 0; }
	         		else { $avgRU = $regvoteval / $regvotes; }
	         	if ($anonvotes == 0) { $avgAU = 0; }
	         		else { $avgAU = $anonvoteval / $anonvotes; }
	         	if ($outsidevotes == 0 ) { $avgOU = 0; }
	         		else { $avgOU = $outsidevoteval / $outsidevotes; }
	         	$impactRU = $regvotes;
			if ($anonvotes>=1 && $impact>=1) {
	         	    $impactAU = $anonvotes / $impact;
			}
			if ($outsidevotes>=1 && outsideimpact>=1) {
	         	    $impactOU = $outsidevotes / $outsideimpact;
			}
	         	$finalrating = (($avgRU * $impactRU) + ($avgAU * $impactAU) + ($avgOU * $impactOU)) / ($impactRU + $impactAU + $impactOU);
	         	$finalrating = number_format($finalrating, 4); 
	          }

?>
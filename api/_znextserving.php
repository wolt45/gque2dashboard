
            /////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////
            /// LOOP FOR NOW SERVINGS

//             $query4 = "SELECT qregsRID 
//                 FROM que_regs 
//                 WHERE purpose = '$purposeONLY' 
//                 AND questatus = 1
//                 ORDER BY qregsRID
//                 LIMIT 1
//                 ;";

// $wfp = fopen("zzz.query4.txt", "w");
// fwrite($wfp, $query4);
// fclose($wfp);


//             $stmt4 = $this->ipadrbg->prepare($query4);
//             $stmt4->execute();
//             $result4 = $stmt4->get_result();
//             while ($row4 = $result4->fetch_assoc()) {
//                 $qregsRID4 = $row4['qregsRID'];

//                 $queryNS = "UPDATE que_regsTally SET 
//                     NowServing = '$qregsRID4'
//                     WHERE purpose = '$purposeONLY'
//                     ";

// $wfp = fopen("zzz.queryNS.txt", "w");
// fwrite($wfp, $queryNS);
// fclose($wfp);

//                 $stmtNS= $this->ipadrbg->prepare($queryNS);
//                 $stmtNS->execute();
//             }
            /// LOOP FOR NOW SERVINGS - end

            //////////////////////////////////////////
            //////////////////////////////////////////
            //////////////////////////////////////////
            //////////////////////////////////////////
            //Count for ON-HOLDS


/*
            $query21 = "SELECT qregsRID from que_regs 
                WHERE purpose = '$purposeONLY' 
                AND questatus = 2
                ORDER BY qregsRID
                LIMIT 3
                ;";

            $stmt21 = $this->ipadrbg->prepare($query21);
            $stmt21->execute();
            $result21 = $stmt21->get_result();

            $hold = 1;

            while ($row21 = $result21->fetch_assoc()) {
                $rows21[] = $row21;

                $qregsRID21 = $row21['qregsRID'];


                $HOLDX = 'hold' . $hold;

                $queryHOLDS = "UPDATE que_regsTally SET 
                    $HOLDX = '$qregsRID21'
                    WHERE purpose = '$purposeONLY'
                    ";
                $stmtHOLD= $this->ipadrbg->prepare($queryHOLDS);
                $stmtHOLD->execute();

                $hold += 1;
            }
*/

            // m1..m3 Ques - Loop End
            // m1..m3 Ques - Loop End
            // m1..m3 Ques - Loop End
            // m1..m3 Ques - Loop End
            // m1..m3 Ques - Loop En
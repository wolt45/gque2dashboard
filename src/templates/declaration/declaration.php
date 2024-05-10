<style>
    .progress-container {
        width: 100%;
        margin: 10px auto;
    }

    .progress-bar {
        width: 0;
        height: 10px;
        background-color: #4CAF50;
        text-align: center;
        line-height: 20px;
        color: white;
    }

    input[type=checkbox] {
        border: 1px;
        width: 30px;
        height: 30px;
        }

</style>



<div class="row">
    <ng-include src="'src/templates/common/pxhead.php'"></ng-include>
</div>

<br><br>


<!-- <div class="row align-items-center mb-3 px-3">
    <div class="col-lg-6">
        <h4 class="fw-bold text-uppercase mb-0">DECLARATION</h4> -->
        <!-- <small>???</small> -->
<!--     </div>
</div> -->


<div class="container mt-3">
    <h2>DECLARATION</h2>




    <table class="table table-condensed">
        <tr class="table-primary">
            <td colspan="3" class="text-center" nowrap>
                <h3>
                    MAY ARA KA BALA SANG MGA MASUNOD?
                </h3>
            </td>    
            <td></td>
        </tr>

        <tr class="table-primary">
            <th class="text-center bg-danger" width="1%"><h4>ARA</h4></th>
            <th class="text-center bg-info" width="1%"><h4>WALA</h4></th>
            <th width="1%"></th>
            <th></th>
        </tr>             


        <!-- defrmOBJ -->
        <tbody ng-repeat="defrmOBJ in declaration_obj">
            
            <tr class="table-secondary">
                <td class="text-center bg-danger" width="1%">                                                
                    <input class="form-check-input" type="checkbox" name="ubo" ng-model="defrmOBJ.ubo" ng-checked= "defrmOBJ.ubo == 1">
                </td>
                <td class="text-center bg-info" width="1%">
                    <input class="form-check-input" type="checkbox" name="ubo" ng-model="defrmOBJ.ubo" ng-checked= "defrmOBJ.ubo == 0">
                </td>
                <td class="text-start" width="1%" nowrap>
                    <h4>Ubo</h4>
                </td>

                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="sipon" ng-model="defrmOBJ.sipon" ng-checked="defrmOBJ.sipon == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="sipon" ng-model="defrmOBJ.sipon" ng-checked="defrmOBJ.sipon == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Sip-on</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="hilanat" ng-model="defrmOBJ.hilanat" id="hilanat1" ng-checked="defrmOBJ.hilanat == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="hilanat" ng-model="defrmOBJ.hilanat" id="hilanat2" ng-checked="defrmOBJ.hilanat == 0">
                </td>
                <td class="text-start">
                    <h4>Hilanat</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="lupot" ng-model="defrmOBJ.lupot" ng-checked="defrmOBJ.lupot == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="lupot" ng-model="defrmOBJ.lupot" ng-checked="defrmOBJ.lupot == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Lupot</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="sorethroat" ng-model="defrmOBJ.sorethroat" ng-checked="defrmOBJ.sorethroat == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="sorethroat" ng-model="defrmOBJ.sorethroat" ng-checked="defrmOBJ.sorethroat == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Sakit ang tutunlan</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="headache" ng-model="defrmOBJ.headache" ng-checked="defrmOBJ.headache == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="headache" ng-model="defrmOBJ.headache" ng-checked="defrmOBJ.headache == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Sakit ang Ulo</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="bodyache" ng-model="defrmOBJ.bodyache" ng-checked="defrmOBJ.bodyache == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="bodyache" ng-model="defrmOBJ.bodyache" ng-checked="defrmOBJ.bodyache == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Sakit ang Kalawasan</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="shortbreath" ng-model="defrmOBJ.shortbreath" ng-checked="defrmOBJ.shortbreath == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="shortbreath" ng-model="defrmOBJ.shortbreath" ng-checked="defrmOBJ.shortbreath == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Nabudlayan mag ginhawa</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="notaste" ng-model="defrmOBJ.notaste" ng-checked="defrmOBJ.notaste == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="notaste" ng-model="defrmOBJ.notaste" ng-checked="defrmOBJ.notaste == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Indi maka panabor</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="checkbox" name="nosmell" ng-model="defrmOBJ.nosmell" ng-checked="defrmOBJ.nosmell == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="checkbox" name="nosmell" ng-model="defrmOBJ.nosmell" ng-checked="defrmOBJ.nosmell == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Indi maka panimaho</h4>
                </td>
                <td></td>
            </tr>


            <!-- ///////////////////////////////////////////////////////// -->


            <tr class="table-secondary">
                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" name="nakabyahe" ng-model="defrmOBJ.nakabyahe" ng-checked="defrmOBJ.nakabyahe == 1">
                </td>

                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" name="nakabyahe" ng-model="defrmOBJ.nakabyahe" ng-checked="defrmOBJ.nakabyahe == 0">
                </td>

                <td class="text-start" nowrap>
                    <h4>Nakabiyahe o nakahalin sa iban nga pungsod sa nagligad nga katorse ka adlaw. </h4>
                </td>
            </tr>

            <tr class="table-secondary">
                <td></td>

                <td class="text-center" nowrap>                                                
                    Trip Details
                </td>


                <td class="text-start" nowrap>
                    Place of Exit: <input type="text" type="text" ng-model="defrmOBJ.nakabyahe_placeexit">
                    <br>Date of Departure: <input type="text" ng-model="defrmOBJ.nakabyahe_datedeparture">
                    <br>Date of Arrival to the city: <input type="text" ng-model="defrmOBJ.nakabyahe_datearrival">
                </td>

            </tr>

            <tr>
                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" name="nakatiner" ng-model="defrmOBJ.nakatiner" ng-checked="defrmOBJ.nakatiner == 1"> 
                </td>
                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" name="nakatiner" ng-model="defrmOBJ.nakatiner" ng-checked="defrmOBJ.nakatiner == 0"> 
                </td>
                <td class="text-start" nowrap>
                    <h4>Nakabiyahe o naka tinir sa mga pungsod o lugar nga may kumpirmado nga kaso sang COVID-19</h4>
                </td>
            </tr>

            <tr class="table-secondary">
                <td></td>
                <td class="text-center" nowrap>                                                
                    Trip Details
                </td>
                <td class="text-start" nowrap>
                    Place of Exit: <input type="text" type="text" ng-model="defrmOBJ.nakatiner_placeexit">
                    <br>Date of Departure: <input type="text" ng-model="defrmOBJ.nakatiner_datedeparture">
                    <br>Date of Arrival to the city: <input type="text" ng-model="defrmOBJ.nakatiner_datearrival">
                </td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" ng-model="defrmOBJ.nakaatubang" ng-checked="defrmOBJ.nakaatubang == 1">
                </td>
                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" ng-model="defrmOBJ.nakaatubang" ng-checked="defrmOBJ.nakaatubang == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naka atubang sa tawo nga kumpirmado ukon ginsuspetsahan nga may ara COVID-19.</h4>
                </td>
            </tr>



            <tr class="table-secondary">
                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" ng-model="defrmOBJ.may_pending_rt_pcr" ng-checked="defrmOBJ.may_pending_rt_pcr == 1">
                </td>
                <td class="text-center">                                                
                    <input class="form-check-input" type="checkbox" ng-model="defrmOBJ.may_pending_rt_pcr" ng-checked="defrmOBJ.may_pending_rt_pcr == 0">
                </td>
                <td colspan="3" class="text-start" nowrap>
                    <h4>May pending nga RT-PCR Result?</h4>
                </td>
            </tr>

            <tr class="table-secondary">
                <td colspan="3" class="text-start" nowrap>
                    <h4>I declare that all statement given are true and correct to the best of my ability, I shall be held liable for any misinformation I have given.</h4>
                </td>
            </tr>

            <tr> 
                <td><br><br></td>
            </tr>

            <tr class="table-secondary">
                <td colspan="3" class="text-center" nowrap>
                    _________________________________________
                    <h4>Signature over printed name/Date</h4>
                    <h4>Parent/Guardian</h4>
                </td>
            </tr>

            <tr>
                <td class="text-center" colspan="9">
                    <button class="btn btn-theme-green btn-block" ng-click="saveDeclaration(defrmOBJ)">
                        <i class="far fa-save"></i>
                        save
                    </button>

                    <button class="btn btn-theme-dark" ng-click="resetDeclaration(sid, startDate, endDate)">
                        <i class="fas fa-bell"></i>
                        reset
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- <div style="overflow-x:auto;">
    <div class="d-flex align-items-center justify-content-center" style="gap:5px">
 
    </div>
</div>
-->

    <div class="col-lg-5">

        <a class="btn btn-block btn-info btn-lg"  ng-click="queNEWDeclare()">
            <i class="fa-solid fa-circle-dot me-3 text-primary"></i>
            <span>CREATE</span>
        </a>

    </div>


</body>
</html>







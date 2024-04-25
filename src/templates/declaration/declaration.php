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

    input[type=radio] {
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
        <thead>
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
        </thead>


        <!-- declaration_item -->
        <tbody ng-repeat="decobj in declaration_obj">
            
            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="ubo" ng-model="decobj.ubo" id="ubo1" ng-checked="decobj.ubo == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="ubo" ng-model="decobj.ubo" id="ubo2" ng-checked="decobj.ubo == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Ubo</h4>
                </td>

                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="sipon" ng-model="decobj.sipon" id="sipon1" ng-checked="decobj.sipon == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="sipon" ng-model="decobj.sipon" id="sipon2" ng-checked="decobj.sipon == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Sip-on</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="hilanat" ng-model="decobj.hilanat" id="hilanat1" ng-checked="decobj.hilanat == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="hilanat" ng-model="decobj.hilanat" id="hilanat2" ng-checked="decobj.hilanat == 0">
                </td>
                <td class="text-start">
                    <h4>Hilanat</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="lupot" ng-model="decobj.lupot" ng-checked="decobj.lupot == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="lupot" ng-model="decobj.lupot" ng-checked="decobj.lupot == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Lupot</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="sorethroat" ng-model="decobj.sorethroat" ng-checked="decobj.sorethroat == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="sorethroat" ng-model="decobj.sorethroat" ng-checked="decobj.sorethroat == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Sakit ang tutunlan</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="headache" ng-model="declaration_item.headache" ng-checked="declaration_item.headache == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="headache" ng-model="declaration_item.headache" ng-checked="declaration_item.headache == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Sakit ang Ulo</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="bodyache" ng-model="declaration_item.bodyache" ng-checked="declaration_item.bodyache == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="bodyache" ng-model="declaration_item.bodyache" ng-checked="declaration_item.bodyache == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Naga Sakit ang Kalawasan</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="shortbreath" ng-model="declaration_item.shortbreath" ng-checked="declaration_item.shortbreath == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="shortbreath" ng-model="declaration_item.shortbreath" ng-checked="declaration_item.shortbreath == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Nabudlayan mag ginhawa</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="notaste" ng-model="declaration_item.notaste" ng-checked="declaration_item.notaste == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="notaste" ng-model="declaration_item.notaste" ng-checked="declaration_item.notaste == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Indi maka panabor</h4>
                </td>
                <td></td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center bg-danger">                                                
                    <input class="form-check-input" type="radio" name="nosmell" ng-model="declaration_item.nosmell" ng-checked="declaration_item.nosmell == 1">
                </td>
                <td class="text-center bg-info">
                    <input class="form-check-input" type="radio" name="nosmell" ng-model="declaration_item.nosmell" ng-checked="declaration_item.nosmell == 0">
                </td>
                <td class="text-start" nowrap>
                    <h4>Indi maka panimaho</h4>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered">
        <tbody ng-repeat="declaration_item in declaration_obj">
            <tr class="table-secondary">
                <td class="text-center" width="1%">                                                
                    <input class="form-check-input" type="radio" name="nakabyahe" ng-model="declaration_item.nakabyahe" ng-checked="declaration_item.nakabyahe == 1">
                </td>
                <td class="text-start" colspan="2" width="1%" nowrap>
                    <h4>Nakabiyahe o nakahalin sa iban nga pungsod sa nagligad nga katorse ka adlaw. </h4>
                </td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center" width="1%" nowrap>                                                
                    Trip Details
                </td>


                <td class="text-start" width="1%" nowrap>
                    Place of Exit: 
                    <br>Date of Departure: 
                    <br>Date of Arrival to the city:
                </td>

                <td class="text-start" width="1%" nowrap>
                    <input type="text" type="text" ng-model="declaration_item.nakabyahe_placeexit">
                    <br><input type="text" ng-model="declaration_item.nakabyahe_datedeparture">
                    <br><input type="text" ng-model="declaration_item.nakabyahe_datearrival">
                </td>

                <td>SPACER</td>
            </tr>

            <tr>
                <td class="text-center">                                                
                    <input class="form-check-input" type="radio" name="nakatiner" ng-model="declaration_item.nakatiner" ng-checked="declaration_item.nakatiner == 1"> 
                </td>
                <td colspan="2" class="text-start" nowrap>
                    <h4>Nakabiyahe o naka tinir sa mga pungsod o lugar nga may kumpirmado nga kaso sang COVID-19</h4>
                </td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center" nowrap>                                                
                    Trip Details
                </td>
                <td class="text-start" nowrap>
                    Place of Exit: 
                    <br>Date of Departure: 
                    <br>Date of Arrival to the city:
                </td>
                <td class="text-start" nowrap>
                    <input type="text" type="text" ng-model="declaration_item.nakatiner_placeexit">
                    <br><input type="text" ng-model="declaration_item.nakatiner_datedeparture">
                    <br><input type="text" ng-model="declaration_item.nakatiner_datearrival">
                </td>
            </tr>

            <tr class="table-secondary">
                <td class="text-center">                                                
                    <input class="form-check-input" type="radio" ng-model="declaration_item.nakaatubang" ng-checked="declaration_item.nakaatubang == 1">
                </td>
                <td colspan="3" class="text-start" nowrap>
                    <h4>Naka atubang sa tawo nga kumpirmado ukon ginsuspetsahan nga may ara COVID-19.</h4>
                </td>
            </tr>



            <tr class="table-secondary">
                <td class="text-center" width="1%">                                                
                    <input class="form-check-input" type="radio" ng-model="declaration_item.may_pending_rt_pcr" ng-checked="declaration_item.may_pending_rt_pcr == 1">
                </td>
                <td colspan="3" class="text-start" width="1%" nowrap>
                    <h4>May pending nga RT-PCR Result?</h4>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-condensed">
        <tbody>
            <tr class="table-secondary">
                <td class="text-start" nowrap>
                    <h4>I declare that all statement given are true and correct to the best of my ability, I shall be held liable for any misinformation I have given.</h4>
                </td>
            </tr>

            <Tr> <td><br><br></td></Tr>

            <tr class="table-secondary">
                <td class="text-center" nowrap>
                    _________________________________________
                    <h4>Signature over printed name/Date</h4>
                    <h4>Parent/Guardian</h4>
                </td>
            </tr>
        </tbody>
    </table>

</div>




<div style="overflow-x:auto;">
    <div class="d-flex align-items-center justify-content-center" style="gap:5px">
        <button class="btn btn-theme-green btn-block" ng-click="saveDeclaration(decobj)">
            <i class="far fa-save"></i>
            save
        </button>

        <button class="btn btn-theme-dark" ng-click="resetDeclaration(sid, startDate, endDate)">
            <i class="fas fa-bell"></i>
            reset
        </button>

    </div>
</div>

</body>
</html>







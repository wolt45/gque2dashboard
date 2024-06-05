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
</style>
<div class="row align-items-center mb-3 px-3">
    <div class="col-lg-6">
        <h4 class="fw-bold text-uppercase mb-0">PATIENT PROFILE</h4>
        <!-- <small></small> -->
    </div>
    <div class="col-lg-6">
        <div class="d-flex aling-items-center justify-content-end" style="gap:5px">
            <!--             <button type="button" class="btn btn-theme-green" ng-click="patch(0)">
                RUN
            </button> -->
        </div>
    </div>
</div>



<div class="row my-3 px-3">
    <div class="col-lg-12">
        <div class="progress-container">
            <div class="progress-bar" ng-style="{ 'width': progress + '%' }">{{ progress | number: 2}}%</div>
        </div>

        <!-- <div class="table-in" style="height:calc(100vh - 255px)"> -->
        <div class="table-responsive">
               
            <table class="table table-bordered table-striped">
              
                <tr class="table-info" style="color: black;" ng-repeat="queOBJItem in queOBJ">
                    <th class="text-left" width="1%" nowrap>
                        QUEUE Date:
                        <span style="color: black; font-size: 24px; font-weight: bold">  
                            <!-- &nbsp; {{queOBJItem.DateEntered | date: 'mediumDate'}} -->
                            &nbsp; {{queOBJItem.DateEntered | date:'MMM dd, yyyy'}}
                            <!-- &nbsp; {{queOBJItem.DateEntered | date:'h:i:sa'}} -->
                        </span>

                        <?php
                            // echo "<br><br><br>";

                            // echo "{{queOBJItem.DateEntered | date:'hh:mm a'}}";
                        ?>
                    </th>

                    <th class="text-center bg-light" rowspan="10">
                        <span style="font-size: 24px; color: black; font-weight: bold">Appointment Number:</span>
                        <br>
                        <span style="font-size: 180px; color: red; font-weight: bolder">
                            {{LS_qregsRID}}
                        </span>
                    </th>

                </tr>

                <tr class="table-info" style="color: black;"  ng-repeat="queOBJItem in queOBJ">
                <!-- <tr class="table-info" style="color: black;"> -->
                    <th class="text-end" colspan="1" nowrap>
                        Last Name: <input ng-model="queOBJItem.LastName" style="font-size:20px" type="text" required>
                        <br>
                        First Name: <input ng-model="queOBJItem.FirstName" style="font-size:20px" type="text" required>
                        <br>
                        Middle Name: <input ng-model="queOBJItem.MiddleName" style="font-size:20px" type="text" required>
                        <br>
                        <!-- Purpose: <input ng-model="queOBJItem.purpose" style="font-size:20px" type="text" required> -->

  
                        <label for="purpose">Purpose:</label>
                        <!-- <input list="purposeList" name="queOBJItem.purpose" ng-model="queOBJItem.purpose" id="purpose" style="font-size:20px" type="text" required> -->
                        <input list="purposeList" ng-model="queOBJItem.purpose" id="purpose" style="font-size:20px" required>

                        <datalist id="purposeList">
                            <option value="For Registration">
                            <option value="Cashier">
                            <option value="Check Up">
                            <option value="CT-SCAN">
                            <option value="MRI">
                            <option value="X-RAY">
                            <option value="ULTRASOUND">
                        </datalist>
 
                        <br><br>

                        <button class="btn btn-block btn-success btn-lg" ng-click="queSave(queOBJItem)">SAVE</button>
                        <button class="btn btn-block btn-warning btn-lg" ng-click="queCancel()">CANCEL</button>

                        <button class="btn btn-block btn-danger btn-lg" ng-click="quePrint(queOBJItem, in_print)">PRINT</button>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <!-- <button class="btn btn-block btn-info btn-lg" ng-click="queCancel()">NEW APPOINTMENT</button> -->
                        <!-- <a class="btn btn-block btn-info btn-lg" ui-sref="newprofile"><i class="fa-solid fa-circle-dot me-3 text-primary"></i><span>NEW APPOINTMENT</span></a> -->
                        <a class="btn btn-block btn-info btn-lg"  ng-click="queNEW()">
                            <i class="fa-solid fa-circle-dot me-3 text-primary"></i>
                            <span>NEW APPOINTMENT</span>
                        </a>
                    </th>
                </tr>

                <tr class="table-info" style="color: black;">
                    <th class="text-center">

                    </th>
                </tr>
            </table>
        </div>
    </div>
</div>


    <!-- // ng-click="print("in_print")"; -->

<div id="in_print">
</div>

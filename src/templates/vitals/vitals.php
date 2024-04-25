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


<div class="row">
    <ng-include src="'src/templates/common/pxhead.php'"></ng-include>
</div>

<br><br>

<div class="row align-items-center mb-3 px-3">
    <div class="col-lg-6">
        <h4 class="fw-bold text-uppercase mb-0">VITAL SIGNS</h4>
        <!-- <small></small> -->
    </div>
</div>

<div class="row px-3">
    <div class="col-lg-5">
        
        <div class="table-in" style="height:calc(100vh - 255px)">
            <table class="table table-bordered bg-white mb-0 align-middle">
                <thead>
                    <tr>
                        <th width="1%" class="text-center fw-semibold" nowrap>File #: </th>
                        <th width="1%" class="text-center fw-semibold" nowrap>Description</th>
                        <th width="1%" class="text-center fw-semibold">Vital</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr ng-repeat = "vitals_item in vitals_obj">
                        <td class="text-center" nowrap>
                            <button class="btn btn-info btn-0" ng-click="GetPxProfile(vitals_item.CVitRID)">
                                {{vitals_item.CVitRID}}
                            </button>
                        </td>
                        <th class="fw-bold;" nowrap>
                            <i class="{{vitals_item.fontawesome}}" data-toggle="tooltip" data-placement="bottom"></i>
                            {{vitals_item.Description}}
                        </th>
                        <th class="text-center" nowrap>{{vitals_item.Value}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- <div class="table-in" style="height:calc(100vh - 255px)"> -->
<div style="overflow-x:auto;">
    <div class="d-flex align-items-left justify-content-center" style="gap:5px">

        <!-- <button class="btn btn-theme-green" ng-click="EncodeVitals(LS_qregsRID)">
            <i class="fas fa-folder-open"></i>
            edit
        </button> -->

        <div class="input-form-grp w-50">
            <select ng-model="EncodeVital.VitalsRID" class="form-control">
                <option value=""> </option>
                <option value="{{vitalsLookUp_item.VitalsRID}}" ng-repeat="vitalsLookUp_item in vitalsLookUp_obj"> 
                    {{vitalsLookUp_item.Description}}   
                    <!-- {{vitalsLookUp_item.fontawesome}} -->
                </option>
            </select>
            <!-- <span class="fw-semibold me-2">BP:</span> -->
            <input type="text" class="input-form" ng-model="EncodeVital.VitalsValue" style="background-color: lightgreen;">

            <!-- <input type="hidden" class="input-form" ng-model="LS_qregsRID" style="background-color: lightblue;" disabled> -->
        </div>

        <button class="btn btn-theme-green btn-block" ng-click="SaveVitalEncoded(EncodeVital, LS_qregsRID)">
            <i class="far fa-save"></i>
            save
        </button>

        <!-- <button class="btn btn-theme-dark" ng-click="filter_dr(sid, startDate, endDate)">
            <i class="fas fa-bell"></i>
            reset
        </button> -->
    </div>
</div>
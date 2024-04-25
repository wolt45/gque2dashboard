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
        <h4 class="fw-bold text-uppercase mb-0">VITAL SIGNS ENCODE RIGHT</h4>
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
                    <tr ng-repeat = "vitalsencode_item in vitalsencode_obj">
                        
                        <td class="text-center" nowrap>
                            <!-- <button class="btn btn-info btn-0" ng-click="GetPxProfile(vitalsencode_item.CVitRID)"> -->
                                {{vitalsencode_item.CVitRID}}
                            <!-- </button> -->
                        </td>

                        <th class="fw-bold;" nowrap>
                            <i class="{{vitalsencode_item.fontawesome}}" data-toggle="tooltip" data-placement="bottom"></i>
                            {{vitalsencode_item.Description}}
                        </th>

                        <th class="text-center" nowrap>
                            <input type="text" ng-model="vitalsencode_item.Value">
                        </th>

                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</div>



<!-- <div class="table-in" style="height:calc(100vh - 255px)"> -->
<div style="overflow-x:auto;">
    <div class="d-flex align-items-center justify-content-center" style="gap:5px">

        <button class="btn btn-theme-green" ng-click="SaveVitals(LS_qregsRID)">
            <i class="fas fa-folder-open"></i>
            SAVE
        </button>


        <!-- <button class="btn btn-theme-green btn-block" ng-click="filter_dr(sid, startDate, endDate)">
            <i class="far fa-save"></i>
            save
        </button> -->

        <!-- <button class="btn btn-theme-dark" ng-click="filter_dr(sid, startDate, endDate)">
            <i class="fas fa-bell"></i>
            reset
        </button> -->
    </div>
</div>
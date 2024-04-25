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
        <div class="input-form-grp w-50">
            <i class="fas fa-heartbeat" data-toggle="tooltip" data-placement="bottom" title="Required Field."></i>
            &nbsp;
            &nbsp;
            <span class="fw-semibold me-2">BP:</span>
            <input type="text" class="input-form" placeholder="blood pressure" ng-model="vBP">
        </div>

        <div class="input-form-grp w-50">
            <i class="fas fa-stethoscope" data-toggle="tooltip" data-placement="bottom" title="Required Field."></i>
            &nbsp;
            &nbsp;
            <span class="fw-semibold me-2">PR:</span>
            <input type="text" class="input-form" placeholder="pulse rate" ng-model="vPR">
        </div>

        <div class="input-form-grp w-50">
            <i class="fas fa-lungs-virus" data-toggle="tooltip" data-placement="bottom" title="Required Field."></i>
            &nbsp;
            &nbsp;
            <span class="fw-semibold me-2">RR:</span>
            <input type="text" class="input-form" placeholder="resperation rate" ng-model="vRR">
        </div>

        <div class="input-form-grp w-50">
            <i class="fas fa-thermometer" data-toggle="tooltip" data-placement="bottom" title="Required Field. The amount to credit or debit for non-specific item(s)!"></i>
            &nbsp;
            &nbsp;
            <span class="fw-semibold me-2">T:</span>
            <input type="text" class="input-form" placeholder="Temperature" ng-model="vRR">
        </div>

        <div class="input-form-grp w-50 text-nowrap">
            <i class="fas fa-head-side-cough" data-toggle="tooltip" data-placement="bottom" title="Required Field. The amount to credit or debit for non-specific item(s)!"></i>
            &nbsp;
            &nbsp;
            <span class="fw-semibold me-2">O2 Sat:</span>
            <input type="text" class="input-form" placeholder="O2 Saturation" ng-model="vRR">
        </div>

        <div class="input-form-grp w-50 text-nowrap">
            <i class="fas fa-hand-holding-medical" data-toggle="tooltip" data-placement="bottom" title="Required Field. The amount to credit or debit for non-specific item(s)!"></i>
            &nbsp;
            &nbsp;
            <span class="fw-semibold me-2">WT:</span>
            <input type="text" class="input-form" placeholder="weight" ng-model="vRR">
        </div>

        <div class="input-form-grp w-50 text-nowrap">
            <i class="fas fa-hand-holding-medical" data-toggle="tooltip" data-placement="bottom" title="Required Field. The amount to credit or debit for non-specific item(s)!"></i>
            &nbsp;
            &nbsp;
            <span class="fw-semibold me-2">HT:</span>
            <input type="text" class="input-form" placeholder="height" ng-model="v_HT">
        </div>
    </div>
</div>



<!-- <div class="table-in" style="height:calc(100vh - 255px)"> -->
<div style="overflow-x:auto;">
    <div class="d-flex align-items-center justify-content-center" style="gap:5px">
        <button class="btn btn-theme-green btn-block" ng-click="filter_dr(sid, startDate, endDate)">
            <i class="far fa-save"></i>
            save
        </button>

        <button class="btn btn-theme-dark" ng-click="filter_dr(sid, startDate, endDate)">
            <i class="fas fa-bell"></i>
            reset
        </button>
    </div>
</div>
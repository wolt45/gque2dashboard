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
        <h4 class="fw-bold text-uppercase mb-0">ON-QUEUE LIST</h4>
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

<div class="row px-3">
    <div class="col-lg-5">
        <div class="input-form-grp w-50">
            <input type="text" placeholder="Search..." ng-model="search">
            <i class="fa-solid fa-search"></i>
        </div>
    </div>

    <div class="col-lg-5">

        <a class="btn btn-block btn-info btn-lg"  ng-click="queNEW()">
            <i class="fa-solid fa-circle-dot me-3 text-primary"></i>
            <span>NEW APPOINTMENT</span>
        </a>

    </div>



</div>

<div class="row my-3 px-3">
    <div class="col-lg-12">
        <div class="progress-container">
            <div class="progress-bar" ng-style="{ 'width': progress + '%' }">{{ progress | number: 2}}%</div>
        </div>


        <div class="table-in" style="height:calc(100vh - 255px)">
            <table class="table table-bordered bg-white mb-0 align-middle">
                <thead>
                    <tr>
                        <th width="1%" class="text-center fw-semibold" nowrap>Sequence #:</th>
                        <th class="text-center fw-semibold">Patient Name</th>
                        <th width="1%" class="text-center fw-semibold">PURPOSE</th>
                        <th width="1%" class="text-center fw-semibold">Date Entered</th>
                        <th width="1%" class="text-center fw-semibold">SERVE</th>
                        <th width="1%" class="text-center fw-semibold">SKIP</th>
                        <th width="1%" class="text-center fw-semibold">DONE</th>
                        <th width="1%" class="text-center fw-semibold">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr ng-repeat="item in filtered = (item_obj | filter: search ) | limitTo:items_per_page:items_per_page*(current_page-1) ">
                        
                        <td class="text-center" nowrap>
                            <button class="btn btn-info btn-0" ng-click="GetPxProfile(item.qregsRID)">
                                <!-- <i class="fa fa-check-circle text-black"></i> -->
                                <b style="font-size: 20px">{{item.qregsRID}}</b>
                            </button>
                        </td>

                        <th class="fw-bold;" style="font-size: 20px; font-weight: bolder;">{{item.PxName}}</th>
                        <td class="text-center" nowrap>{{item.purpose}}</td>
                        <td class="text-end" nowrap>{{item.DateEntered | date}}</td>
                        
                        <td class="text-center" nowrap><a class="btn btn-info"><span class="fas fa-heart" title="waiting" ng-click="queAction(item.qregsRID, 0)"></span></a></td>
                        <td class="text-center" nowrap><a class="btn btn-danger"><span class="fas fa-eye-slash" title="skip" ng-click="queAction(item.qregsRID, 13)"></span></a></td>
                        <td class="text-center" nowrap><a class="btn btn-warning"><span class="fas fa-lightbulb-slash" title="done" ng-click="queAction(item.qregsRID, 9)"></span></a></td>

                        <td class="text-center" style="font-size: 16px" nowrap>{{item.StatusDesc}}</td>
                    </tr>
                </tbody>

            </table>
        </div>


        <div class="d-flex align-items-center justify-content-end pt-3">
            <ul style="margin-bottom: 0 !important;" uib-pagination total-items="filtered.length" num-pages="numPages" items-per-page="items_per_page" ng-model="current_page" max-size="5" boundary-link-numbers="true" ng-change="pageChanged()"></ul>
        </div>
    </div>
</div>
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

<meta http-equiv="refresh" content="7">

<div class="row align-items-center mb-3 px-3">

    <div class="col-md-2 text-start">
        <!-- <button type="button" class="btn btn-success btn-block" ng-click="goHome()">
            HOME
        </button> -->

        <!-- <a type="button" class="btn btn-warning btn-block" ng-click="goRefresh()">
            Refresh
        </a> -->
    </div>

    <div class="col-lg-12 text-center">
        <a type="button" class="btn btn-success btn-block" ng-click="goRefresh()">
        <h4 class="fw-bold text-uppercase mb-0" style="color: white;">DR. RAMON B. GUSTILO HOSPITAL</h4>
        </a>
        <!-- <small></small> -->
    </div>
    <!--  <div class="col-lg-6">
        <div class="d-flex aling-items-center justify-content-end" style="gap:5px"> -->
            <!--             <button type="button" class="btn btn-theme-green" ng-click="patch(0)">
                RUN
            </button> -->
        <!-- </div>
    </div> -->
</div>


    <!-- page content -->
    <div class="row my-3 px-3">
        <div class="col-md-2 col-sm-4 col-xs-6 col-lg-3 text-center bg-success" style="border: 2px solid yellow;" ng-repeat="quePurposeMembersOBJItem in quePurposeMembersOBJ">
            <!-- <i class="fas fa-user-md me-3"></i> -->
            <span class="text-light" style="font-size:16px; font-weight: bold;"> {{quePurposeMembersOBJItem.purpose}} </span>

            <!-- <div class="text-center" ng-repeat="queListItem in queListOBJ">
                <span class="text-primary" style="font-size:50px; font-weight: bold;"> {{queListItem.qregsRID}} </span>
            </div> -->
            
            <div class="text-center bg-light">
                NOW SERVING
                <br>
                <!-- <span style="font-size:60px; font-weight: bold;">
                    {{quePurposeMembersOBJItem.NowServing}}
                </span> -->

                <button type="button" class="btn btn-block" style="font-size:50px; font-weight: bold;" 
                    ng-click="queActionNowServeDone(quePurposeMembersOBJItem.NowServing, 9, quePurposeMembersOBJItem.purpose)">

                    {{quePurposeMembersOBJItem.NowServing}}

                </button>

                <button type="button" class="btn btn-sm btn-block btn-light" style="font-size:12px;" ng-click="putOnHold(quePurposeMembersOBJItem.NowServing)">
                    hold
                </button>

            </div>

            <!-- <div class="text-center bg-light">
                <button type="button" class="btn btn-block" style="font-size:60px; font-weight: bold;" ng-click="queAction(quePurposeMembersOBJItem.m1, 9)">
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    {{quePurposeMembersOBJItem.m1}}
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </button>
            </div> -->

            <div class="row mt-2">
                <div class="col-lg-8">
                     <div class="text-center bg-primary">
                        <span class="text-warning" style="font-size:24px; font-weight: bold;" ng-show="quePurposeMembersOBJItem.m1 > 0"> 
                            {{quePurposeMembersOBJItem.m1}} 
                            <br>
                            {{quePurposeMembersOBJItem.m2}}
                        </span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="text-center bg-info" ng-show="quePurposeMembersOBJItem.hold1 > 0"> 
                        on hold
                        <br>
                        <span style="color: red; font-size:16px; font-weight: bold;"> 

                            <button type="button" class="btn btn-sm btn-block btn-danger" style="font-size:16px;" ng-click="putNowServing(quePurposeMembersOBJItem.NowServing, quePurposeMembersOBJItem.hold1)">
                                {{quePurposeMembersOBJItem.hold1}}
                            </button>
                            <br>
                            {{quePurposeMembersOBJItem.hold2}}
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->
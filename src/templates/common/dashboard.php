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

<meta http-equiv="refresh" content="10">

<div class="row align-items-center mb-3 px-3">
    <div class="col-lg-12 text-center">
        <h4 class="fw-bold text-uppercase mb-0">DR. RAMON B. GUSTILO HOSPITAL</h4>
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
        <div class="col-md-2 col-sm-4 col-xs-6 col-lg-3 text-center bg-info" style="border: 1px solid white;" ng-repeat="quePurposeMembersOBJItem in quePurposeMembersOBJ">
            <!-- <i class="fas fa-user-md me-3"></i> -->
            <span class="text-danger" style="font-size:26px; font-weight: bold;"> {{quePurposeMembersOBJItem.purpose}} </span>



            <!-- <div class="text-center" ng-repeat="queListItem in queListOBJ">
                <span class="text-primary" style="font-size:50px; font-weight: bold;"> {{queListItem.qregsRID}} </span>
            </div> -->


            <div class="text-center bg-light">
                <span style="font-size:60px; font-weight: bold;"> {{quePurposeMembersOBJItem.m1}} </span>
            </div>

            <div class="text-center bg-success">
                <span class="text-warning" style="font-size:40px; font-weight: bold;" ng-show="quePurposeMembersOBJItem.m2 > 0"> 
                    {{quePurposeMembersOBJItem.m2}} 
                    <br>
                    {{quePurposeMembersOBJItem.m3}}
                </span>
            </div>
        </div>



    </div>
    <!-- /page content -->
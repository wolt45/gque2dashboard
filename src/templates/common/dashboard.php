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


<?php
// $page = $_SERVER['PHP_SELF'];
// $sec = "5";
?>
<!--
<html>
    <head>
    <meta http-equiv="refresh" content="<?php //echo $sec?>;URL='<?php //echo $page?>'">
    </head>
    <body>
    <?php
        // echo "Watch the page reload itself in 5 second!";
    ?>
    </body>
</html> -->


<!-- <script>

$(function(){
  $("a").click(function(e){
    e.preventDefault();
    $("#refresh").remove();
    alert("Refresh Disabled! ");
  });
});
</script> -->


<div class="row align-items-center mb-3 px-3">

    <div class="col-md-2 text-start">
        <!-- <button type="button" class="btn btn-success btn-block" ng-click="goHome()">
            HOME
        </button> -->

        <!-- <a type="button" class="btn btn-warning btn-block" ng-click="goRefresh()">
            Refresh
        </a> -->
    </div>

    <div class="col-lg-12 text-end">
        <!-- <a type="button" class="btn btn-success" ng-click="goRefresh()">
            <span class="fw-bold text-uppercase mb-0" style="font-size: 26px; color: white;">DR. RAMON B. GUSTILO HOSPITAL</span>
        </a> -->

        <!-- <span class="fw-bold text-uppercase mb-0" style="font-size: 26px; color: white;">DR. RAMON B. GUSTILO HOSPITAL</span> -->
<!-- 
                    <button class="dropdown-item" type="button" ng-click="logout_user()">
                        <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                        Logout
                    </button> -->

        <!-- <a class="btn btn-block btn-primary btn-sm" ng-click="SHOWqueSettingsModal(x)">

            QUEUE Settings

        </a> -->

        <!-- <div class="d-flex align-items-center justify-content-end">
            <div class="profile dropdown-toggle"> -->
                <!-- <button class="btn btn-light" data-bs-toggle="dropdown" aria-expanded="false"> -->
                 <!--    <img src="../../../../dump_px/{{info.foto}}" alt="profile" onerror="this.onerror=null;this.src='favicon.png'"> -->
                    <!-- <span class="ms-2">{{info.shortname}} </span> -->
                    <!-- <i class="fa-solid fa-angle-down"></i> -->
                <!-- </button> -->

                <!-- <div class="dropdown-menu dropdown-menu-right"> -->
                    <!-- <div class="user-box">
                        <img src="../../../../dump_px/{{info.foto}}" alt="profile" onerror="this.onerror=null;this.src='favicon.png'">
                        <div class="ms-2">
                            <div class="fw-bold mb-0">{{info.fullname}}</div>
                            <small>{{info.ut_n}}</small>
                        </div>
                    </div> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <!-- <button class="dropdown-item" type="button" ng-click="logout_user()">
                        <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                        Logout
                    </button> -->
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
    </div>
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

        <div class="dropdown-divider"></div>

        <div class="col-lg-12 text-center">
            <button class="btn btn-warning" type="button" ng-click="logout_user()">
                <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                Logout
            </button>

            <!-- <button class="btn btn-success" type="button" ng-click="SHOWqueSettingsModal(x)">
                <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>
                Display Settings
            </button> -->

            <!-- <a class="btn btn-danger" href="#">Stop refresh</a> -->

        </div>
    </div>
    <!-- /page content -->

    <?php
    include "modal.setAppointment.php";
    ?>

<div class="row medcertremovetop" ng-controller="PXDetailCtrl" id="DontPrint" style="position: fixed;top: 60px; z-index:99;">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="table-responsive">
            <table class= "table table-bordered" style="background-color: #fff">
                <tr>
                    <td width="1%" class="text-start" ng-repeat="queOBJItem in queOBJ" nowrap>
                        APPOINTMENT #: 
                        <span style="font-size: 20px; font-weight: bold;"> {{LS_qregsRID}} 
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            {{queOBJItem.LastName}}, 
                            {{queOBJItem.FirstName}} 
                            {{queOBJItem.MiddleName}}
                        </span>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        {{queOBJItem.DateEntered | date : ' MMMM d, yyyy'}}
                    </td>
                </tr>
            </table>
        </div>

    </div>
</div>



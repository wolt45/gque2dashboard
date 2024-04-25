<div id="DontShowOnScreen">
    <div id="tbl_prints">
        <div class="d-flex">
            <div class="col-lg-6 w-75">
                <div class="d-flex align-items-center printable">
                    <img src="src/assets/images/glogo_watermark.png" alt="logo" class="img-25">
                    <div class="ms-3">
                        <h6 class="fw-bold mb-0">DR. RAMON B. GUSTILO HOSPITAL</h6>
                        <div class="text-uppercase xsd">Provincial Road, Brgy 1-A</div>
                        <div class="text-uppercase xsd">Manapla Negros Occidental, 6120</div>
                        <div class="text-uppercase xsd">034 471 0060 | 034 719 1282</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 w-50">
                <div class="d-flex align-items-end flex-column justify-content-end">
                    <h2 class="mb-1">RMA LIST</h2>
                </div>
                <div class="fs-5 class text-end mt-3">
                    <small>{{rma_info.rma_date | date:'MM/dd/yyyy'}}</small>
                </div>
            </div>
        </div>
        <div class="d-flex mt-5 w-100">
            <div class="col-lg-6 w-50" ng-if="startDate != '' || endDate != ''">
                <h6 class="fw-bold">Date Filtered: From {{startDate | date:'MMM dd, yyyy'}} - To {{endDate | date:'MMM dd, yyyy'}}</h6>
            </div>
        </div>
        <div class="mt-3">
            <table class="table" id="tbl_exports">
                <thead>
                    <tr>
                        <th width="8%" class="fw-semibold">File #</th>
                        <th width="15%" class="fw-semibold">Date</th>
                        <th width="20%" class="fw-semibold">Destination</th>
                        <th width="20%" class="fw-semibold">Entered By</th>
                        <th width="8%" class="text-end fw-semibold">Qty</th>
                        <th width="8%" class="text-end fw-semibold">Cost</th>
                        <th width="15%" class="text-center fw-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in list_obj | filter: {RMAStatus: 3} as filtered">
                        <td>{{item.fileno}}</td>
                        <td>{{item.RMAEntered | date:'MMM dd, yyyy'}}</td>
                        <td>{{item.vendor}}</td>
                        <td>{{item.userby_name}}</td>
                        <td class="text-end">{{item.TotalQty | number:2}}</td>
                        <td class="text-end">{{get_total_multi(filtered, 'TotalAmount', 'TotalQty')|number:2}}</td>
                        <td class="text-center">{{exp_status(item.RMAStatus)}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <table class="table table-borderless w-50">
                    <thead>
                        <tr>
                            <th width="10%" colspan="4" class="fw-semibold text-center" nowrap></th>
                            <th width="10%" class="fw-bold text-end" nowrap>Total Qty Return</th>
                            <th width="10%" class="fw-semibold text-end" nowrap>
                                {{getTotal('TotalQty') | number:2}}
                            </th>
                        </tr>
                        <tr>
                            <th width="10%" colspan="4" class="fw-semibold text-center" nowrap></th>
                            <th width="10%" class="fw-bold text-end" nowrap>Total Cost</th>
                            <th width="10%" class="fw-semibold text-end" nowrap>
                                {{getTotal('TotalAmount') | number:2}}
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
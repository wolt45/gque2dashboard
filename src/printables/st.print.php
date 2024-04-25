<div id="in_print">
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
                <h2 class="mb-1">Stock Transfer</h2>
                <small class="fs-5 class text-end">Ref No#: {{st_info.refno}}</small>
            </div>
            <div class="fs-5 class text-end mt-3">
                #TRANSFER-{{fileno}}<br>
                <small>{{st_info.st_date | date:'MM/dd/yyyy'}}</small>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5 w-100">
        <div class="col-lg-6 w-50">
            <div class="d-flex align-items-center">
                <h6 class="fw-bold text-uppercase mb-0 me-2">Transfer To:</h6>
                <div style="line-height:18px">{{st_info.transfered_to}}</div>
            </div>
            <div class="fw-bold text-uppercase" style="line-height:18px">Date Transfered:</div>
        </div>
        <div class="col-lg-6 w-50">
            <div class="text-end w-100">
                <h4 class="fw-bold text-uppercase">Total Qty</h4>
                <h1 class="fw-bold">{{st_info.qty | number:2}}</h1>
            </div>
        </div>
    </div>
    <div class="mt-3 px-2" style="background-color:#E6E6E6 !important">
        <strong class="me-2">Memo:</strong>{{st_info.remarks}}
    </div>
    <div class="mt-3">
        <table class="table">
            <thead style="background-color:#E6E6E6 !important">
                <tr>
                    <th class="fw-semibold">#</th>
                    <th class="fw-semibold">Items</th>
                    <th class="fw-semibold">Brand</th>
                    <!-- <th class="fw-semibold">Expiry</th> -->
                    <th width="10%" class="fw-semibold text-center" nowrap>Quantity</th>
                    <th width="10%" class="fw-semibold text-end" nowrap ng-if="show_cost_print == true">Cost</th>
                    <th width="10%" class="fw-semibold text-end" nowrap ng-if="show_cost_print == true">Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="itemp in filtered = (item_list)">
                    <td><small>{{$index+1}}</small></td>
                    <td><small>{{itemp.descriptions}}</small></td>
                    <td><small>{{itemp.brand}}</small></td>
                    <!-- <td><small>{{itemp.expiry_date}}</small></td> -->
                    <td class="text-center"><small>{{itemp.Qty}}</small></td>
                    <td class="text-end" ng-if="show_cost_print==true"><small>{{itemp.PurchasePrice | number:2}}</small></td>
                    <td class="text-end" ng-if="show_cost_print==true"><small>{{itemp.PurchasePrice * itemp.Qty | number:2}}</small></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th class="text-center">{{get_total(filtered, 'Qty')}}</th>
                    <th class="text-end" ng-if="show_cost_print == true">{{get_total(filtered, 'PurchasePrice') | number:2}}</th>
                    <th class="text-end" ng-if="show_cost_print == true">{{get_total_multi(filtered, 'PurchasePrice', 'Qty') | number:2}}</th>
                </tr>
            </tfoot>
        </table>
        <!-- <div class="d-flex justify-content-end">
            <table class="table table-borderless w-50">
                <thead>
                    <tr>
                        <th width="10%" colspan="4" class="fw-semibold text-center" nowrap></th>
                        <th width="10%" class="fw-bold text-end" nowrap>Subtotal (Net Of Vat)</th>
                        <th width="10%" class="fw-semibold text-end" nowrap>
                            {{(get_total_multi(filtered, 'PurchasePrice', 'QtyOrdered') / vatvalue) | number:2}}
                        </th>
                    </tr>
                    <tr>
                        <th width="10%" colspan="4" class="fw-semibold text-center" nowrap></th>
                        <th width="10%" class="fw-bold text-end" nowrap>Tax Total (Inclusive %)</th>
                        <th width="10%" class="fw-semibold text-end" nowrap>
                            {{
                                (get_total_multi(filtered, 'PurchasePrice', 'QtyOrdered') / vatvalue) * vatperc
                                | number:2
                            }}
                        </th>
                    </tr>
                    <tr>
                        <th width="10%" colspan="4" class="fw-semibold text-center" nowrap></th>
                        <th width="10%" class="fw-bold text-end" nowrap style="background-color:#E6E6E6 !important">Total</th>
                        <th width="10%" class="fw-semibold text-end" nowrap style="background-color:#E6E6E6 !important">
                            {{get_total_multi(filtered, 'PurchasePrice', 'QtyOrdered') | number:2}}
                        </th>
                    </tr>
                </thead>
            </table>
        </div> -->

    </div>
    <div class="d-flex mt-5 pt-3">
        <div class="col-lg-6 w-50">
            <small class="pb-4">Prepared By:</small><br>
            <h6 class="mb-0 mt-4 pt-3 fw-bold text-uppercase">
                <u class="text-underline">{{st_info.enterby}}</u>
            </h6>
            <i style="font-size:12px;">Signature over printed name</i>
        </div>
        <div class="col-lg-6 w-50">
            <small class="pb-3">Received By:</small><br>
            <h6 class="mb-0 mt-4 pt-3 fw-bold text-uppercase">
                <div>___________________________________</div>
            </h6>
            <i style="font-size:12px;">Signature over printed name</i>
        </div>
    </div>
</div>
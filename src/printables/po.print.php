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
            <div class="d-flex align-items-center justify-content-end">
                <h2 class="">Purchase Order</h2>
            </div>
            <div class="fs-5 class text-end mt-3">
                #PO-{{fileno}}<br>
                <small>{{po_info.po_date | date:'MM/dd/yyyy'}}</small>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5 w-100">
        <div class="col-lg-6 w-50">
            <h6 class="fw-bold">Vendor</h6>
            <div style="line-height:18px">{{po_info.vendorcode}} {{po_info.vendor}}</div>
            <div style="line-height:18px">{{po_info.vendor}}</div>
            <div class="w-75" style="line-height:18px">{{po_info.vendoradd}}</div>
        </div>
        <div class="col-lg-6 w-50">
            <div class="text-end w-100">
                <h4 class="fw-bold text-uppercase">Total</h4>
                <h1 class="fw-bold">{{po_info.amountdue | number:2}}</h1>
            </div>
        </div>
    </div>
    <div class="mt-3 px-2" style="background-color:#E6E6E6 !important">
        <strong class="me-2">Memo:</strong>{{po_info.remarks}}
    </div>
    <div class="mt-3">
        <table class="table">
            <thead style="background-color:#E6E6E6 !important">
                <tr>
                    <th width="5%" class="fw-semibold text-center" nowrap>Quantity</th>
                    <th width=" 15%" class="fw-semibold">Items</th>
                    <th width="5%" class="fw-semibold" nowrap>Brand</th>
                    <th width=" 10%" class="fw-semibold text-end" nowrap>Rate</th>
                    <!-- <th width="10%" class="fw-semibold text-end" nowrap>Discount</th> -->
                    <th width="10%" class="fw-semibold text-end" nowrap>Net Amount</th>
                    <!-- <th width="10%" class="fw-semibold text-end" nowrap>Tax Amt</th> -->
                    <!-- <th width="10%" class="fw-semibold text-end" nowrap>Gross Amt</th> -->
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="itemp in filtered = (item_list)">
                    <td class="text-center"><small>{{itemp.QtyOrdered}}</small></td>
                    <td><small>{{itemp.descriptions}}</small></td>
                    <td><small>{{itemp.brand}}</small></td>
                    <td class="text-end"><small>{{itemp.PurchasePrice | number:2}}</small></td>
                    <!-- <td class="text-end"><small>{{itemp.LineDiscount | number:2}}</small></td> -->
                    <td class="text-end"><small>{{itemp.PurchasePrice * itemp.QtyOrdered | number:2}}</small></td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
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
                        <th width="10%" class="fw-bold text-end" nowrap>Tax Total(%)</th>
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
        </div>

    </div>
    <div class="d-flex mt-5 pt-3">
        <div class="col-lg-6 w-50">
            <small class="pb-4">Prepared By:</small><br>
            <h6 class="mb-0 mt-4 pt-3 fw-bold text-uppercase">
                <u class="text-underline">{{po_info.enterby}}</u>
            </h6>
            <i style="font-size:12px;">Purchasing Officer</i>
        </div>
        <div class="col-lg-6 w-50">
            <small class="pb-3">Approved By:</small><br>
            <h6 class="mb-0 mt-4 pt-3 fw-bold text-uppercase">
                <u class="text-underline">ANN S. FLORES</u>
            </h6>
            <i style="font-size:12px;">Hospital Administrator</i>
        </div>
    </div>
</div>
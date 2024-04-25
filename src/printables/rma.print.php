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
                <h2 class="mb-1">RMA Report</h2>
                <small class="fs-5 class text-end">Ref No#: {{rma_info.refno}}</small>
            </div>
            <div class="fs-5 class text-end mt-3">
                #RMA-{{fileno}}<br>
                <small>{{rma_info.rma_date | date:'MM/dd/yyyy'}}</small>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5 w-100">
        <div class="col-lg-6 w-50">
            <h6 class="fw-bold">Vendor</h6>
            <div style="line-height:18px">{{rma_info.vendorcode}} {{rma_info.vendor}}</div>
            <div style="line-height:18px">{{rma_info.vendor}}</div>
            <div class="w-75" style="line-height:18px">{{rma_info.vendoradd}}</div>
        </div>
        <div class="col-lg-6 w-50">
            <div class="text-end w-100">
                <h4 class="fw-bold text-uppercase">Total</h4>
                <h1 class="fw-bold">{{rma_info.amountdue | number:2}}</h1>
            </div>
        </div>
    </div>
    <div class="mt-3 px-2" style="background-color:#E6E6E6 !important">
        <strong class="me-2">Memo:</strong>{{rma_info.remarks}}
    </div>
    <div class="mt-3">
        <table class="table">
            <thead style="background-color:#E6E6E6 !important">
                <tr>
                    <th width="1%">#</th>
                    <th width="1%" class="fw-semibold text-center" nowrap>Quantity</th>
                    <th width="15%" class="fw-semibold">Items</th>
                    <th width="10%" class="fw-semibold" nowrap>Brand</th>
                    <th width=" 1%" class="fw-semibold text-end" nowrap>Unit Cost</th>
                    <!-- <th width="10%" class="fw-semibold text-end" nowrap>Discount</th> -->
                    <!-- <th width="10%" class="fw-semibold text-end" nowrap>Gross Cost</th> -->
                    <!-- <th width="10%" class="fw-semibold text-end" nowrap>Tax Amt</th> -->
                    <th width="1%" class="fw-semibold text-end" nowrap>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="itemp in filtered = (item_list)">
                    <td>{{$index+1}}</td>
                    <td class="text-center"><small>{{itemp.Qty}}</small></td>
                    <td>
                        <small>{{itemp.descriptions}}</small>
                    </td>
                    <td>
                        <small>{{itemp.brand}}</small>
                    </td>
                    <td class="text-end"><small>{{itemp.PurchasePrice | number:2}}</small></td>
                    <!-- <td class="text-end"><small>{{itemp.InputVat | number:2}}</small></td> -->
                    <td class="text-end"><small>{{itemp.PurchasePrice * itemp.Qty| number:2}}</small></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th class="text-center">{{get_total(filtered, 'Qty')}}</th>
                    <th></th>
                    <th></th>
                    <th class="text-end">{{get_total(filtered, 'PurchasePrice') | number:2}}</th>
                    <!-- <th class="text-end">{{get_total(filtered, 'InputVat') | number:2}}</th> -->
                    <th class="text-end">{{get_total_multi(filtered, 'PurchasePrice', 'Qty') | number:2}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="d-flex mt-5 pt-3">
        <div class="col-lg-6 w-50">
            <small class="pb-4">Prepared By:</small><br>
            <h6 class="mb-0 mt-4 pt-3 fw-bold text-uppercase">
                <u class="text-underline">{{rma_info.enterby}}</u>
            </h6>
            <i style="font-size:12px;">Signature over printed name</i>
        </div>
        <div class="col-lg-6 w-50">
            <small class="pb-3">Checked/Received By:</small><br>
            <h6 class="mb-0 mt-4 pt-3 fw-bold text-uppercase">
                <div>______________________________</div>
                <!--   <u class="text-underline">JERMAINE D. FLORES</u> -->
            </h6>
            <i style="font-size:12px;">Signature over printed name</i>
        </div>
    </div>
</div>
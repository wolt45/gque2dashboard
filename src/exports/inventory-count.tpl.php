<div id="DontShowOnScreen">
    <table id="tbl_exports">
        <thead>
            <tr>
                <th class="fw-semibold">#</th>
                <th class="fw-semibold">Product</th>
                <th class="fw-semibold">Brand</th>
                <th class="fw-semibold">Department</th>
                <th class="fw-semibold">Class</th>
                <th class="fw-semibold">UOM</th>
                <th class="fw-semibold text-end" width="10%">Cost</th>
                <th class="fw-semibold text-end" width="10%">SRP</th>
                <th class="fw-semibold text-end" width="10%">Last Count</th>
                <th class="fw-semibold text-end" width="10%">CS Minor</th>
                <th class="fw-semibold text-end" width="10%">Variance</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="item in list_obj">
                <td>{{item.ProductRID}}</td>
                <td>{{item.Description}}</td>
                <td>{{item.Brand}}</td>
                <td>{{item.deparments}}</td>
                <td>{{item.classes}}</td>
                <td>{{item.uomcode}}</td>
                <td class=" text-end"><strong>{{item.UnitCost | number:2}}</strong></td>
                <td class=" text-end"><strong>{{item.SRP1 | number:2}}</strong></td>
                <td class=" text-end">{{item.LastCount == NULL? 0.00 : item.LastCount}}</td>
                <td class=" text-end"><strong>{{item.CSMinor | number:2}}</strong></td>
                <td class=" text-end"><strong>{{item.LastCount - item.CSMinor | number:2}}</strong></td>
            </tr>
        </tbody>
    </table>
</div>
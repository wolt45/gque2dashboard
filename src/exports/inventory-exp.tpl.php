<div id="DontShowOnScreen">
    <table id="tbl_exports">
        <thead>
            <tr>
                <th>Product ID</th>
                <th class="fw-semibold">Description</th>
                <th class="fw-semibold">UPC</th>
                <th class="fw-semibold">Lot No.</th>
                <th class="fw-semibold">Expiry</th>
                <th class="fw-semibold text-end">Stock</th>
                <th class="fw-semibold text-end">Cost</th>
                <th class="fw-semibold text-end">OPD Price</th>
                <th class="fw-semibold text-end">OPD Night</th>
                <th class="fw-semibold text-end">ER Price</th>
                <th class="fw-semibold text-end">Semi Private</th>
                <th class="fw-semibold text-end">Private</th>
                <th class="fw-semibold text-end">Suite Price</th>
                <th class="fw-semibold text-end">WARD Annex</th>
                <th class="fw-semibold text-end">HCP Price</th>
                <th class="fw-semibold text-end">INDIGENTS</th>
                <th class="fw-semibold text-end">Stat Procedure Only</th>
                <th class="fw-semibold text-end">Stat Procedure & Reading</th>
                <th class="fw-semibold text-end">Special Discount</th>
                <th class="fw-semibold text-end">Special Discount Stat</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="item in filtered = (list_obj | filter: search)">
                <td>{{item.ProductRID}}</td>
                <td>{{item.Description}}</td>
                <td>{{item.UPC}}</td>
                <td>{{item.LotNumber}}</td>
                <td>{{!item.ExpiryDate || item.ExpiryDate == '0000-00-00'? "" : item.ExpiryDate | date:'MMM-dd-yyyy'}}</td>
                <td>{{item.CSMinor | number:2}}</td>
                <td>{{item.UnitCost | number:2}}</td>
                <td>{{item.SRP1 | number:2}}</td>
                <td>{{item.SRP2 | number:2}}</td>
                <td>{{item.SRP3 | number:2}}</td>
                <td>{{item.SRP5 | number:2}}</td>
                <td>{{item.SRP6 | number:2}}</td>
                <td>{{item.SRP7 | number:2}}</td>
                <td>{{item.SRP12 | number:2}}</td>
                <td>{{item.SRP8 | number:2}}</td>
                <td>{{item.SRP9 | number:2}}</td>
                <td>{{item.SRP10 | number:2}}</td>
                <td>{{item.SRP11| number:2}}</td>
                <td>{{item.SRP13 | number:2}}</td>
                <td>{{item.SRP14 | number:2}}</td>
            </tr>
        </tbody>
    </table>
</div>
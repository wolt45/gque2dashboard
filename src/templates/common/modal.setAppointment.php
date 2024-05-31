        <div id="AppointmentSetModal">
            <div id="AppointmentSetModal" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg" style="width: 100%">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background-color: lightskyblue;">
                    <button type="button" class="close"  ng-click="closeSetAppointmentModal()">&times;</button>
                    <span style="font-size: 20px;color: #000; font-weight: bolder;">
                      QUEUE VIEW SETTINGS
                    </span>

  

                  </div>

                  <div class="modal-body">
                    <div class="table-responsive" style="overflow-x: scroll;" style="padding:0px; max-height: 800px; overflow-x: scroll;">
                      <table class="table table-bordered table-hover" style="color: #000; background-color: lightblue;">
                        <tr>
                          <td class='text-center' width='1%' nowrap>file#:  <br>
                            <span style="color: #000; font-weight: bolder; font-size: 20px;">{{pxDataObj.ClinixRID}}
                              <br>
                            <span style="font-size: 9px">({{pxDataObj.TranStatus}})</span>
                            {{pxDataObj.TrnStts}}
                            </span>
                          </td>

                          <td class='text-right' width="1%" nowrap><span style="color: #000; font-size: 12px;"> Date: </span></td>
                          
                          <td class='text-left'>
                            <span style="color: #000; font-weight: bolder; font-size: 16px;">
                              {{pxDataObj.AppDateSet | date:'dd MMM yyyy'}}
                            </span>
                            <!-- {{pxDataObj.AppDateSet | date:'dd MMM yyyy'}} -->
                            <input type='date' class='form-control' size=10 name='txtVisitDate' ng-model="pxDataObj.AppDateSet" required>
                          </td>   

                          <td class='text-center' rowspan="9" ng-show = "pxDataObj.ClinixRID > 0" width="1%">
                            <span style="color: #000; font-weight: bolder;"> VITALS </span>

                            <?php include "vitals.php"; ?>

                          </td>
                        </tr>


                        <tr>
                          <td class='text-right' nowrap>
                            Appointment Type: 
                          </td>
                          <!-- <td colspan="2" nowrap>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' ng-model='pxDataObj.ApptType' value='0'/> out-patient
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' ng-model='pxDataObj.ApptType' value='1'/> admitted
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' ng-model='pxDataObj.ApptType' value='2'/> home-care
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' ng-model='pxDataObj.ApptType' value='3'/> others
                          </td> -->


                          <td colspan="2" nowrap>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' ng-model='pxDataObj.ApptType' value='0'/> short term
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' ng-model='pxDataObj.ApptType' value='1'/> long term
                          </td>

                        </tr>


                        <tr>
                          <td nowrap>Chief Complaint: </td>
                          <td colspan="2">
                            <!-- <textarea class="form-control" name="ChiefComplaint" ng-model="pxDataObj.ChiefComplaint" rows="3" size="100" style="color: #000"></textarea> -->


                            <textarea class="form-control" data-ui-tinymce id="tinymce1" name="ChiefComplaint" ng-model="pxDataObj.ChiefComplaint" rows="5"></textarea>

                          </td>
                        </tr>

                        <tr>
                          <td class='text-right'>PHYSICIAN</td>
                          <td colspan="2" nowrap>
                              <select ng-model="pxDataObj.DokPxRID" style="color: #000">
                                <option value="0">select md</option>
                                <option ng-repeat="DoctorsLists in DoctorsListOBJ" value="{{DoctorsLists.PxRID}}">
                                    {{DoctorsLists.docPxName}}
                                </option>
                              </select>
                          </td>
                        </tr>

                        <tr>
                          <td class='text-right'>ASSIGN NURSE</td>
                          <td colspan="2" nowrap>
                              <select ng-model="pxDataObj.NursePxRID" style="color: #000">
                                <option value="0">assign nurse</option>
                                <option ng-repeat="NurseItem in NursesListOBJ" value="{{NurseItem.PxRID}}">
                                    {{NurseItem.NursePxName}}
                                </option>
                              </select>

                              <div ng-repeat="NursesAssigned in NursesAssignedOBJ">
                                <button class="btn btn-danger btn-sm btn-primary" ng-click="cancelAssingment(NursesAssigned.CoMgrRID);"> 
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span>
                                </button>
                                <!-- {{NursesAssigned.CoMgrRID}} - -->
                                {{NursesAssigned.NursePxName}}

                              </div>
                          </td>
                        </tr>

                        <tr>
                          <td class='text-center' colspan="3" nowrap>
                            <button class="btn btn-primary btn-sm" ng-click="setAppointment(pxDataObj, pxDataObj.PxRID)">
                                <span class="glyphicon glyphicon-pencil"></span>
                                SAVE
                            </button>
                            <button class="btn btn-warning btn-sm" ng-click="closeSetAppointmentModal()">
                                <span class="glyphicon glyphicon-trash"></span>
                                IGNORE
                            </button>
                            <!-- <button class="btn btn-danger btn-sm" ng-click="cancelAppointment(pxList.ClinixRID);">
                                <span class="glyphicon glyphicon-trash"></span>
                                CANCEL
                            </button> -->    

                           <button class="btn btn-info btn-sm" ng-click="closeSetAppointmentModal()">
                                <span class="glyphicon glyphicon-folder-close"></span>
                                CLOSE
                            </button>   
                          </td>
                        </tr>

                        <tr ng-show = "pxDataObj.ClinixRID > 0">
                          <td class='text-center'>VITALS</td>
                          <td colspan="2" nowrap>
                            <select class="form-control" ng-model="VitalsInputOBJ.VitalsRID">
                              <option value="0">select item</option>
                              <option ng-repeat="VitalsListItem in VitalsListOBJ" value="{{VitalsListItem.VitalsRID}}">
                                  {{VitalsListItem.Description}}
                                  &nbsp;
                                  ({{VitalsListItem.UOM}})
                              </option>
                            </select>
                            <br>
                            Value: <input name="VitalValue" ng-model="VitalsInputOBJ.VitalsValue" size="10" style="color: #000" />
                          
                            <button class="btn btn-info btn-xs" ng-click="addVital(VitalsInputOBJ, pxDataObj.ClinixRID, pxDataObj.PxRID)">
                              <span class="glyphicon glyphicon-floppy-disk" style="color: black"></span>
                            </button>
                          </td>

                        </tr>

                      </table>
                    </div>
                  </div>

                  <!-- <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" ng-click="setAppointment(pxDataObj, pxDataObj.PxRID)">
                        <span class="glyphicon glyphicon-pencil"></span>
                        SAVE
                    </button>
                    <button class="btn btn-warning btn-sm" ng-click="closeSetAppointmentModal()">
                        <span class="glyphicon glyphicon-trash"></span>
                        ABORT
                    </button>
                    <button class="btn btn-danger btn-sm" ng-click="closeSetAppointmentModal()">
                        <span class="glyphicon glyphicon-trash"></span>
                        CANCEL
                    </button>    

                   <button class="btn btn-info btn-sm" ng-click="closeSetAppointmentModal()">
                        <span class="glyphicon glyphicon-close"></span>
                        CLOSE
                    </button>   
                  </div> -->

                </div>
              </div>
            </div>
        </div>
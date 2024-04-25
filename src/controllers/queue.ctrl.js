app.controller(
  "queue",
  function (
    $scope,
    $state,
    $filter,
    $rest,
    $uibModal,
    SweetAlert2,
    $decrypt,
    $timeout
  ) {
    document.title = "GMMR | GQUE2";
    $scope.supplier = 0;
    $scope.items_per_page = 50;
    $scope.current_page = 1;
    $scope.items_per_pagei = 50;
    $scope.current_pagei = 1;
    $scope.drid = localStorage.getItem("gls_dr_id");
    let queue_user = localStorage.getItem("queue_user");
    let descrypted_o = queue_user ? $decrypt.decrypted(queue_user) : "";
    $scope.userid = queue_user ? JSON.parse(descrypted_o) : "";
    $scope.fileno = 0;
    $scope.classes = 0;
    $scope.department = 0;
    $scope.selectedItems = [];
    $scope.do = 0;
    $scope.startDate = "";
    $scope.endDate = "";
    $scope.vatvalue = 1;
    $scope.vatperc = 0;
    $scope.list_obj = [];
    $scope.item_obj = [];
    $scope.totalamount = 0;
    $scope.sid = 0;

    $scope.pxprofile_list = function (sid, startDate, endDate) {
      $rest
        .get(`pxprofile_list&sid=${sid}&startDate=${startDate}&endDate=${endDate}`)
        .then(
          function success(res) {
            $scope.item_obj = res.data;
            // $scope.progressbar($scope.item_obj.length);
          },
          function error(err) {
            console.error(err);
            $scope.item_obj = [];
          }
        );
    };
    $scope.pxprofile_list($scope.sid, $scope.startDate, $scope.endDate);

    $scope.patch = function (vr) {
      $scope.progressbar($scope.item_obj.length);
      if (vr == 0) {
        angular.forEach($scope.item_obj, function (item) {
          $scope.update_pd(item);
        });
      } else if (vr == 1) {
        angular.forEach($scope.item_obj, function (item) {
          $scope.update_p(item);
        });
      }
    };



    $scope.GetPxProfile = function (qregsRID) {
      localStorage.setItem("LS_qregsRID", qregsRID);
      $scope.LS_qregsRID =  localStorage.getItem("LS_qregsRID");

      // $window.location.href = '#/Today';

      // $window.location.href = '#/profile';


      // var url = $state.href(url, { params: params, value: value });
        // window.open(url, "_blank");

      window.location.href = '#/profile';

    };
    

    $scope.queNEW = function(){
      $scope.queOBJ=[];
      localStorage.setItem("LS_qregsRID", 0);

      console.log("HIT");

      // $scope.queNumberOBJ = response.data;
      window.location.href = '#/newprofile';
    }


    $scope.queAction = function (rid, stts) {
      if (confirm("Proceed #" + rid + "? ")) {
        $scope.$emit('LOAD');

        $rest
        .get(`apiqueAction&rid=${rid}&stts=${stts}`)

        .then(function success(response) {
          $scope.$emit('UNLOAD');
          $scope.pxprofile_list($scope.rid, $scope.startDate, $scope.endDate);
        });
      }
    };



    $scope.pxprofile_list = function (sid, startDate, endDate) {
      $rest
        .get(`pxprofile_list&sid=${sid}&startDate=${startDate}&endDate=${endDate}`)
        .then(
          function success(res) {
            $scope.item_obj = res.data;
            // $scope.progressbar($scope.item_obj.length);
          },
          function error(err) {
            console.error(err);
            $scope.item_obj = [];
          }
        );
    };









  }
);

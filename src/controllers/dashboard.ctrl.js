app.controller(
  "dashboard",
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

    $scope.dateNow = new Date;

    $scope.queListOBJ=[];
    $scope.quePurposeOBJ=[];
    $scope.quePurposeMembersOBJ=[];

    $scope.LS_qregsRID =  localStorage.getItem("LS_qregsRID");

    $scope.displayques = function (startDate, endDate) {
      $rest
        .get(`displayques&startDate=${startDate}&endDate=${endDate}`)
        .then(
          function success(res) {
            $scope.queListOBJ = res.data;
          },
          function error(err) {
            console.error(err);
            $scope.queListOBJ = [];
          }
        );
    };
    // $scope.displayques($scope.startDate, $scope.endDate);



    $scope.getQueDistinctPurposes = function (startDate, endDate) {
      $rest
        .get(`getQueDistinctPurposes&startDate=${startDate}&endDate=${endDate}`)
        .then(
          function success(res) {
            $scope.quePurposeOBJ = res.data;

            for (var i = 0; i < res.data.length; i++) {
              var purpose = res.data[0].purpose;
              console.log(purpose);
              $scope.getQuePurposeMembers(purpose);
            }
          },
          function error(err) {
            console.error(err);
            $scope.quePurposeOBJ = [];
          }
        );
    };
    // $scope.getQueDistinctPurposes($scope.startDate, $scope.endDate);


    $scope.getQuePurposeMembers = function (startDate, endDate) {
      $rest
        .get(`getQuePurposeMembers&startDate=${startDate}&endDate=${endDate}`)
        .then(
          function success(res) {
            $scope.quePurposeMembersOBJ = res.data;
            console.log($scope.quePurposeMembersOBJ);
          },
          function error(err) {
            console.error(err);
            $scope.quePurposeMembersOBJ = [];
          }
        );
    };
    $scope.getQuePurposeMembers($scope.startDate, $scope.endDate);



    $scope.progressbar = function (ct) {
      var totalItems = ct;
      var processedItems = 0;

      function processItem() {
        processedItems++;

        $scope.progress = (processedItems / totalItems) * 100;

        // Check if all items are processed
        if (processedItems < totalItems) {
          // Simulate asynchronous processing
          $timeout(processItem, 30);
        } else {
          setTimeout(function () {
            $state.reload();
          }, 1000);
        }
      }

      // Start processing
      processItem();
    };

    $scope.check_loggedIn = function () {
      let queue_user = localStorage.getItem("queue_user");
      if (queue_user) {
        $state.go(".");
      } else {
        $state.go("login");
      }
    };


    $scope.goHome = function(){
      window.location.href = '#/queue';
    }


    $scope.queAction = function (rid, stts) {
      if (confirm("Done with Appointment? #" + rid + "? ")) {
        $scope.$emit('LOAD');

        $rest
        .get(`apiqueAction&rid=${rid}&stts=${stts}`)

        .then(function success(response) {
          // $scope.$emit('UNLOAD');
          location.reload();
        });
      }
    };




    // floor
  }
);

app.controller(
  "declaration",
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
    document.title = "DECLRATION";
    $scope.supplier = 0;
    $scope.items_per_page = 50;
    $scope.current_page = 1;
    $scope.items_per_pagei = 50;
    $scope.current_pagei = 1;
    $scope.drid = localStorage.getItem("gls_dr_id");
    let queue_user = localStorage.getItem("queue_user");
    let descrypted_o = queue_user ? $decrypt.decrypted(queue_user) : "";
    $scope.userid = queue_user ? JSON.parse(descrypted_o) : "";


    $scope.LS_qregsRID =  localStorage.getItem("LS_qregsRID");

    $scope.declaration_obj = [];
    $scope.frmObj = [];


    $scope.get_declaration = function (LS_qregsRID) {
      // console.log(LS_qregsRID);
      $rest.get(`apiget_declaration&qregsRID=${LS_qregsRID}`)
      .then(
        function success(res) {
          $scope.declaration_obj = res.data;
        },
        function error(err) {
          console.error(err);
        }
      );
    };
    $scope.get_declaration($scope.LS_qregsRID);


    $scope.show_modal = function () {
      var $uibModalInstance = $uibModal.open({
        animation: true,
        templateUrl: "src/templates/modal/loading.tpl.php",
        backdrop: "static",
        scope: $scope,
        size: "sm",
        // windowClass: "cls",
      });
      $scope.closeModal = function () {
        $uibModalInstance.close();
      };
    };

    $scope.filter_dr = function (sid, startDate, endDate) {
      let fromDate = $filter("date")(startDate, "yyyy-MM-dd");
      let toDate = $filter("date")(endDate, "yyyy-MM-dd");
      $scope.sales_list(sid, fromDate, toDate);
    };



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


    $scope.saveDeclaration = function(frmObj){
      

      // frmObj.qregsRID = $scope.LS_qregsRID;

      console.log(frmObj);


      if (confirm("Are your entries final?")) {


        $rest
          .post('APIsaveDeclaration', frmObj)
          .then(function success(response) {

          // $window.location.href = 'pages/queShow.php&newRID';

          // $scope.queGetNumber(queobj);

           // alert("QUEUE Data Saved! ");
           $state.reload();
        });
      }
    }






    $scope.queNEWDeclare = function(){

      var qregsRID =  localStorage.getItem("LS_qregsRID");

      console.log(qregsRID);

      if (confirm("Proceed? " + qregsRID)) {
        $rest
          .post('APIqueNEWDeclare', {"qregsRID":qregsRID})
          .then(function success(response) {

           $state.reload();
        });
      }
    }




  }
);

app.controller(
  "vitals",
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

    $scope.vitalsencode_obj = [];
    $scope.vitals_obj = [];
    $scope.vitalsLookUp_obj = [];

    $scope.LS_qregsRID =  localStorage.getItem("LS_qregsRID");

    $scope.check_loggedIn = function () {
      let queue_user = localStorage.getItem("queue_user");
      if (queue_user) {
        $state.go(".");
      } else {
        $state.go("login");
      }
    };


    $scope.getVitalsList = function () {
      $rest
        .get(`getVitalsList`)

        .then(
          function success(res) {
            $scope.vitalsLookUp_obj = res.data;
          },
          function error(err) {
            console.error(err);
            $scope.vitalsLookUp_obj = [];
          }
        );
    };
    $scope.getVitalsList();



    $scope.pxVitals = function (LS_qregsRID) {
      $rest
        .get(`pxVitals&qregsRID=${LS_qregsRID}`)

        .then(
          function success(res) {
            $scope.vitals_obj = res.data;
          },
          function error(err) {
            console.error(err);
            $scope.vitals_obj = [];
          }
        );
    };
    $scope.pxVitals($scope.LS_qregsRID);




    $scope.pxVitalsEncode = function (LS_qregsRID) {
      $rest
        .get(`pxVitalsEncode&qregsRID=${LS_qregsRID}`)

        .then(
          function success(res) {
            $scope.vitalsencode_obj = res.data;
          },
          function error(err) {
            console.error(err);
            $scope.vitalsencode_obj = [];
          }
        );
    };
    $scope.pxVitalsEncode($scope.LS_qregsRID);





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



    $scope.EncodeVitals = function (LS_qregsRID) {
      console.log(LS_qregsRID);

      window.location.href = '#/vitalsEncode';
      // window.location.href = '#/profile';
    };
    

    $scope.SaveVitalEncoded = function (EncodeVital, LS_qregsRID) {
      // console.log(EncodeVital.VitalsRID);
      // console.log(EncodeVital.VitalsValue);

      EncodeVital.qregsRID = LS_qregsRID

      $rest
        .post('APISaveVitalEncoded', EncodeVital)
        .then(function success(response) {

        // $window.location.href = 'pages/queShow.php&newRID';

        // $scope.queGetNumber(queobj);

         // alert("QUEUE Data Saved! ");
         $state.reload();
      });
    };
    

    $scope.SaveVitalEncodedZZZ = function(EncodeVital){
      if (confirm("Are your entries final?")) {
        // let qObj={
        //   lname: txtLastName,
        //   fname: txtFirstName,
        //   mname: txtMiddleName,
        // }

        $rest
          .post('APIqueSave', queobj)
          .then(function success(response) {

          // $window.location.href = 'pages/queShow.php&newRID';

          // $scope.queGetNumber(queobj);

           // alert("QUEUE Data Saved! ");
           $state.reload();
        });
      }
    }



  }
);

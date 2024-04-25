app.controller("profile", function ($scope, $state, $filter, $rest, $uibModal, SweetAlert2, $decrypt, $timeout) {
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

  $scope.dateNow = new Date();

  $scope.queOBJ = [];

  $scope.LS_qregsRID = localStorage.getItem("LS_qregsRID");

  $scope.pxprofile_list = function (sid, startDate, endDate) {
    $rest.get(`pxprofile_list&sid=${sid}&startDate=${startDate}&endDate=${endDate}`).then(
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

  $scope.GetPxProfile = function (qregsRID) {
    $scope.queOBJ = [];

    $rest.get(`apiGetPxProfile&qregsRID=${qregsRID}`).then(
      function success(res) {
        $scope.queOBJ = res.data;
        // $scope.progressbar($scope.item_obj.length);

        // $scope.queOBJ={
        //     xRID: $scope.LS_qregsRID
        //     , txtLAST: 'Seballos'
        //     , txtFIRST: 'Walter Frederick'
        //     , txtMIDDLE: 'Sayo'
        // };
        // console.log($scope.queOBJ);
      },
      function error(err) {
        console.error(err);
        $scope.queOBJ = [];
      }
    );
  };
  $scope.GetPxProfile($scope.LS_qregsRID);

  $scope.queCancel = function () {
    // alert("Please specify the Bank where to Deposit! " + $scope.LS_qregsRID);
    if (confirm("Are you sure to CLEAR entries?")) {
      $scope.queOBJ = [];
      localStorage.setItem("LS_qregsRID", 0);
      $scope.LS_qregsRID = localStorage.getItem("LS_qregsRID");

      location.reload();
    }
  };

  $scope.queSave = function (queobj) {
    console.log(queobj);

    if (confirm("Are your entries final?")) {
      // let qObj={
      //   lname: txtLastName,
      //   fname: txtFirstName,
      //   mname: txtMiddleName,
      // }

      $rest.post("APIqueSave", queobj).then(function success(response) {
        // $window.location.href = 'pages/queShow.php&newRID';

        // $scope.queGetNumber(queobj);

        // alert("QUEUE Data Saved! ");
        $state.reload();
      });
    }
  };

  $scope.quePrintZ = function (queobj) {
    // console.log(queobj);

    if (confirm("Print?")) {
      $rest.post("APIquePrint", queobj).then(function success(response) {
        // $window.location.href = 'pages/queShow.php&newRID';

        // $scope.queGetNumber(queobj);

        // alert("QUEUE Data Saved! ");
        $state.reload();
      });
    }
  };

  //call print function with id value
  $scope.quePrint = function (queOBJItem, divId) {
    console.log(queOBJItem);
    let pxname = `FirstName: ${queOBJItem.FirstName}\nMiddleName: ${queOBJItem.MiddleName}\nLastName: ${queOBJItem.LastName}`;
    let purpose = `${queOBJItem.purpose}`;
    let visitdate = `${queOBJItem.QueTS}`;
    let queno = `${queOBJItem.qregsRID}`;
    if (confirm("Print Bluetooth")) {
      var DATA =
        "" +
        "\x1B" +
        "\x61" +
        "\x31" +
        "\x1D" +
        "\x21" +
        "\x05" +
        "Dr. Ramon B. Gustilo Hospital\n\n" +
        "\x1D" +
        "\x21" +
        "\x14" +
        "No. " +
        queno +
        `\n\n` +
        "\x1B" +
        "\x61" +
        "\x30" +
        "\x1D" +
        "\x21" +
        "\x00" +
        pxname +
        `\n\n` +
        "\x1B" +
        "\x61" +
        "\x30" +
        "\x1D" +
        "\x21" +
        "\x00" +
        "Purpose: " +
        purpose +
        `\n` +
        "\x1D" +
        "\x21" +
        "\x00" +
        "Date: " +
        visitdate +
        `\n\n\n\n`;
      var SERVICE = "000018f0-0000-1000-8000-00805f9b34fb";
      var WRITE = "00002af1-0000-1000-8000-00805f9b34fb";
      blprinter.print(DATA, SERVICE, WRITE);
    }
    // if (confirm("Print Bluetooth?")) {
    //   printJS({
    //     printable: divId,
    //     type: "html",
    //     documentTitle: "Print Example",
    //     css: [
    //       "api/zzz.qprint.txt",
    //       "modules/bootstrap/css/bootstrap.min.css",
    //     ],
    //     scanStyles: false,
    //   });
    // }
  };

  // ng-click="print("in_print")";
  // <div id="in_print">
  // </div>

  $scope.queNEW = function () {
    $scope.queOBJ = [];
    localStorage.setItem("LS_qregsRID", 0);

    console.log("HIT");

    // $scope.queNumberOBJ = response.data;
    window.location.href = "#/newprofile";
  };

  $scope.queGetNumber = function (txtLastName, txtFirstName, txtMiddleName) {
    dbServices.apiqueGetNumber(txtLastName, txtFirstName, txtMiddleName).then(function success(response) {
      console.log("HIT");

      $scope.queNumberOBJ = response.data;
    });
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
});

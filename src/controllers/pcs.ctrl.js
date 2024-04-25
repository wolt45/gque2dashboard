ZZZZZZZZZZZZZZZZZZZZZZZZZZ
ZZZZZZZZZZZZZZZZZZZZZZZZZZ
ZZZZZZZZZZZZZZZZZZZZZZZZZZ
ZZZZZZZZZZZZZZZZZZZZZZZZZZ
ZZZZZZZZZZZZZZZZZZZZZZZZZZ
ZZZZZZZZZZZZZZZZZZZZZZZZZZ
app.controller(
  "pcs",
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
    document.title = "PHARMACY CS | GMMRP";
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
    $scope.status = 0;
    $scope.tranid = 0;
    console.log($scope.userid);

    $scope.cs_list = function (tranid, startDate, endDate) {
      $rest
        .get(
          `cs_list&tranid=${tranid}&startDate=${startDate}&endDate=${endDate}`
        )
        .then(
          function success(res) {
            $scope.item_obj = res.data;
          },
          function error(err) {
            console.error(err);
            $scope.item_obj = [];
          }
        );
    };
    $scope.cs_list($scope.tranid, $scope.startDate, $scope.endDate);

    $scope.patch = function (vr) {
      $scope.progressbar($scope.item_obj.length);
      angular.forEach($scope.item_obj, function (item) {
        $scope.update_p(item);
        $scope.add_stockard(item);
      });
    };
    $scope.update_p = function (item) {
      let patch_obj = { id: item.proid, qty: item.qty, csminor: item.csminor };

      /*  $rest.post("patch_pcs", patch_obj).then(
        function success(res) {
          console.log(res);
        },
        function error(err) {
          console.error(err);
        }7372
      ); */
    };
    $scope.add_stockard = function (item) {
      let patch_obj = {
        id: item.tranrid,
        prodid: item.proid,
      };
      $rest.post("add_stockcards", patch_obj).then(
        function success(res) {
          console.log(res);
        },
        function error(err) {
          console.error(err);
        }
      );
    };

    $scope.get_status = function () {
      $rest.get("get_status").then(
        function success(res) {
          $scope.status_obj = res.data;
        },
        function error(err) {
          console.error(err);
        }
      );
    };
    $scope.get_status();

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

    $scope.filter_dr = function (tranid, startDate, endDate) {
      let fromDate = $filter("date")(startDate, "yyyy-MM-dd");
      let toDate = $filter("date")(endDate, "yyyy-MM-dd");
      $scope.cs_list(tranid, fromDate, toDate);
    };
    $scope.sortingKey = "qty * srp";
    $scope.reverse = false;

    $scope.orderByTotalAmount = function () {
      $scope.sortingKey = "qty * srp";
      $scope.reverse = !$scope.reverse;
    };
    $scope.orderByTotalAmount();

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
    $scope.get_total = function (list, type) {
      var total = 0;
      angular.forEach(list, function (el) {
        total += el[type] * 1;
      });
      return total;
    };
    $scope.get_total_bal = function (list, i, x) {
      var total = 0;
      angular.forEach(list, function (el) {
        total += el[i] - el[x] * 1;
      });
      return total;
    };
  }
);

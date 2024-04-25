app.controller(
  "finance",
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
    document.title = "FINANCE | GMMRP";
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

    $scope.sales_list = function (sid, startDate, endDate) {
      $rest
        .get(`sales_list&sid=${sid}&startDate=${startDate}&endDate=${endDate}`)
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
    $scope.sales_list($scope.sid, $scope.startDate, $scope.endDate);

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
    $scope.update_pd = function (item) {
      let patch_obj = { id: item.tranrid };
      $rest.post("patch_pd", patch_obj).then(
        function success(res) {
          angular.forEach(res.data, function () {
            console.log("success");
          });
          $scope.update_p(item);
        },
        function error(err) {
          console.error(err);
        }
      );
    };
    $scope.update_p = function (item) {
      let patch_obj = { id: item.tranrid };
      $rest.post("patch_ps", patch_obj).then(
        function success(res) {
          angular.forEach(res.data, function () {
            console.log("success");
          });
        },
        function error(err) {
          console.error(err);
        }
      );
    };

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

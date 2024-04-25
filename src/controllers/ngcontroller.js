app.controller(
  "ngcontroller",
  function ($scope, Idle, Keepalive, $uibModal, SweetAlert2, $decrypt, $state) {
    $scope.logout_user = function () {
      SweetAlert2.fire({
        title: "Continue to logout?",
        text: "Your about to logout from the system!",
        icon: "question",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: "#02AA53",
        cancelButtonColor: "#E4E4E4",
        cancelButtonClass: "text-dark",
        confirmButtonText: "Continue",
        position: "top",
      }).then((result) => {
        if (result.value) {
          localStorage.clear();
          // location.reload(true);
          $state.go("login");
        }
      });
    };
    $scope.countdown = Idle.getTimeout();
    $scope.user_info = function () {
      let descrypted_o = $decrypt.decrypted(localStorage.getItem("queue_user"));
      let queue_user = JSON.parse(descrypted_o);
      $scope.info = {
        fullname: queue_user.pxName,
        shortname: queue_user.shortName,
        ut_n:
          queue_user.UserType == "ADMIN" || "Admin" || "admin"
            ? "ADMINISTRATOR"
            : queue_user.UserType,
        foto: queue_user.foto,
      };
    };
    $scope.user_info();

    // idle functions
    $scope.$on("IdleStart", function () {
      // $scope.modal_idle();
      console.log("Idle system started...");
    });

    $scope.$on("IdleTimeout", function () {
      // $scope.closeModal();
      localStorage.clear();
      location.reload(true);
      Idle.unwatch();
    });

    $scope.start = function () {
      Idle.watch();
    };
    $scope.start();

    $scope.modal_idle = function () {
      var $uibModalInstance = $uibModal.open({
        animation: true,
        templateUrl: "src/templates/modals/logout-modal.tpl.php",
        backdrop: "static",
        scope: $scope,
        size: "sm",
      });
      $scope.closeModal = function () {
        $uibModalInstance.close();
      };
    };

    $scope.toggleMenu = function () {
      jQuery("#sidebar").toggleClass("sidebar-collapse");
      jQuery("#content").toggleClass("content-collapse");
    };
    $scope.goto = function (url) {
      $state.go(url);
    };
  }
);

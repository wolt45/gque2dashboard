app.controller("home", function ($scope, $state, $filter, $rest) {
  document.title = "GMMR | GQUE2";

  $scope.check_loggedIn = function () {
    let queue_user = localStorage.getItem("queue_user");
    if (queue_user) {
      $state.go("home");
    } else {
      $state.go("login");
    }
  };

  $scope.todayDate = $filter("date")(new Date(), "MMM dd, yyyy");
  var date = new Date();
  date.setDate(date.getDate() - 7);
  $scope.startDate = date;
  $scope.endDate = new Date();
  $scope.check_loggedIn();
  $scope.xlabel = JSON.parse(localStorage.getItem("date_range_lbl"));
  $scope.inrange = "weekly";
});
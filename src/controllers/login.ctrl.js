app.controller("login", function ($scope, $state, $filter, $rest) {
  document.title = "LOGIN | GQue2";

  $scope.users = {
    username: "",
    password: "",
  };
  $scope.msg = "";
  $scope.login_user = function (users) {
    if (users.username == "" || users.password == "") {
      $scope.msg = "Invalid username or password!";
    } else {
      let userObj = {
        username: users.username,
        password: users.password,
      };
      $rest.post("login_user", userObj).then(
        function success(res) {
          if (res.data.userTypeRID == 1) {
            $scope.msg = "";


            $state.go("queue");

            
            var encryptedUser = CryptoJS.AES.encrypt(
              JSON.stringify(res.data),
              "Passphrase"
            );
            localStorage.setItem("queue_user", encryptedUser);
          } else {
            $scope.msg = "Invalid to login on this system";
          }
        },
        function error(err) {
          $scope.msg = err.data.msg;
          console.error(err);
        }
      );
    }
  };

  $scope.check_loggedIn = function () {
    let queue_user = localStorage.getItem("queue_user");
    if (queue_user) {
      $state.go("queue");
    } else {
      $state.go("login");
    }
  };
  $scope.check_loggedIn();
});

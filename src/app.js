var app = angular.module("app", [
  "ui.router",
  "ngAnimate",
  "ngSanitize",
  "ngIdle",
  "angular.filter",
  "recepuncu.ngSweetAlert2",
  "ui.bootstrap",
  "monospaced.qrcode",
]);
app.config(function (
  $stateProvider,
  $urlRouterProvider,
  IdleProvider,
  KeepaliveProvider,
  $locationProvider
) {
  $locationProvider.hashPrefix("");
  IdleProvider.idle(5000);
  IdleProvider.timeout(20);
  KeepaliveProvider.interval(5000);
  $urlRouterProvider.otherwise("/login");

  // authentication
  $stateProvider.state("login", {
    url: "/login",
    templateUrl: "src/templates/auth/login.tpl.php",
    controller: "login",
  });
  
  // $stateProvider.state("home", {
  //   url: "/dashboard",
  //   templateUrl: "src/templates/home.tpl.php",
  //   controller: "home",
  // });


  $stateProvider.state("dashboard", {
    url: "/dashboard",
    templateUrl: "src/templates/common/dashboard.php",
    controller: "dashboard",
  });


  // //dashboard
  // $stateProvider.state("dashboard", {
  //   url: "/dashboard",
  //   redirectTo: "dashboard.fixed",
  //   templateUrl: "src/templates/common/common.tpl.php",
  //   controller: "home",
  // });
  // $stateProvider.state("dashboard.fixed", {
  //   url: "/dashboard",
  //   templateUrl: "src/templates/common/dashboard.php",
  //   controller: "home",
  // });

  //queue
  $stateProvider.state("queue", {
    url: "/queue",
    redirectTo: "queue.fixed",
    templateUrl: "src/templates/common/common.tpl.php",
    controller: "queue",
  });
  $stateProvider.state("queue.fixed", {
    url: "/queue",
    templateUrl: "src/templates/queue/queue.tpl.php",
    controller: "queue",
  });

  //vitals
  $stateProvider.state("vitals", {
    url: "/vitals",
    redirectTo: "vitals.fixed",
    templateUrl: "src/templates/common/common.tpl.php",
    controller: "vitals",
  });
  $stateProvider.state("vitals.fixed", {
    url: "/vitals",
    templateUrl: "src/templates/vitals/vitals.php",
    controller: "vitals",
  });





  //vitals encode
  $stateProvider.state("vitalsEncode", {
    url: "/vitalsEncode",
    redirectTo: "vitals.encode",
    templateUrl: "src/templates/common/common.tpl.php",
    controller: "vitals",
  });
  $stateProvider.state("vitals.encode", {
    url: "/vitalsEncode",
    templateUrl: "src/templates/vitals/vitals.encode.php",
    controller: "vitals",
  });

  //cf4
  // $stateProvider.state("cf4", {
  //   url: "/cf4",
  //   redirectTo: "cf4.fixed",
  //   templateUrl: "src/templates/common/common.tpl.php",
  //   controller: "cf4",
  // });
  // $stateProvider.state("cf4.fixed", {
  //   url: "/cf4",
  //   templateUrl: "src/templates/cf4/cf4.tpl.php",
  //   controller: "cf4",
  // });

  //profile
  $stateProvider.state("profile", {
    url: "/profile",
    redirectTo: "profile.fixed",
    templateUrl: "src/templates/common/common.tpl.php",
    controller: "profile",
  });
  $stateProvider.state("profile.fixed", {
    url: "/profile",
    templateUrl: "src/templates/profile/profile.tpl.php",
    controller: "profile",
  });

  //new profile
  $stateProvider.state("newprofile", {
    url: "/newprofile",
    redirectTo: "profile.new",
    templateUrl: "src/templates/common/common.tpl.php",
    controller: "profile",
  });
  $stateProvider.state("profile.new", {
    url: "/newprofile",
    templateUrl: "src/templates/profile/newprofile.php",
    controller: "profile",
  });

  //fixed central supply
  // $stateProvider.state("centralsupply", {
  //   url: "/centralsupply",
  //   redirectTo: "centralsupply.fixed",
  //   templateUrl: "src/templates/common/common.tpl.php",
  //   controller: "centralsupply",
  // });
  // $stateProvider.state("centralsupply.fixed", {
  //   url: "/centralsupply",
  //   templateUrl: "src/templates/centralsupply/centralsupply.tpl.php",
  //   controller: "centralsupply",
  // });
  

  //declaration
  $stateProvider.state("declaration", {
    url: "/declaration",
    redirectTo: "declaration.fixed",
    templateUrl: "src/templates/common/common.tpl.php",
    controller: "declaration",
  });
  $stateProvider.state("declaration.fixed", {
    url: "/declaration",
    templateUrl: "src/templates/declaration/declaration.php",
    controller: "declaration",
  });
  
  
});

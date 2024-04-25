app.controller('PXDetailCtrl', function(
    $scope,
    $state,
    $filter,
    $rest,
    $uibModal,
    SweetAlert2,
    $decrypt,
    $timeout
    ) 
    {
    $scope.PxRID = localStorage.getItem("rbgregPxRID");
    $scope.ClinixRID = localStorage.getItem("rbgregClinixRID");
    $scope.userPxRID = localStorage.getItem("rbgreguserPxRID");
    $scope.userTypeRID = localStorage.getItem("rbgreguserTypeRID");

    $scope.LS_qregsRID =  localStorage.getItem("LS_qregsRID");

    $scope.LoadService = function() {
        if ($scope.ClinixRID == null || $scope.ClinixRID == '') {
            $scope.getPxItem($scope.PxRID)
            .then(function success(response) {
                // console.log(response);
                $scope.clinixItem = response.data;
            },
            function error(response) {
                $scope.message = '';
                if (response.status === 404) {
                    $scope.errorMessage = 'No data Found';
                } else {
                    $scope.errorMessage = "Error";
                }
            });

        } else {
            $scope.getCLINIXItem($scope.ClinixRID)
            .then(function success(response) {
                // console.log(response.data.RegDateAgeDay);
                if (response.data.DateTimeOfAdmission != "0000-00-00 00:00:00") {
                  response.data.DateTimeOfAdmission = moment(response.data.DateTimeOfAdmission).format();
                }
                $scope.clinixItem = response.data;
                $scope.getExactAge($scope.clinixItem.RegDateAgeDay);
            },
            function error(response) {
                $scope.message = '';
                if (response.status === 404) {
                    $scope.errorMessage = 'No data Found';
                } else {
                    $scope.errorMessage = "Error";
                }
            });
        }
    };
    // $scope.LoadService();


    $scope.GetPxProfile = function (qregsRID) {
      $scope.queOBJ=[];

      $rest
      .get(`apiGetPxProfile&qregsRID=${qregsRID}`)
      .then(
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
          $scope.item_obj = [];
        }
      );
    };
    $scope.GetPxProfile($scope.LS_qregsRID);

    
    }
);
app.directive("emailValidator", function () {
  return {
    // require: "ngModel",
    // link: function (scope, element, attrs, ctrl) {
    //   ctrl.$validators.validEmail = function (modelValue, viewValue) {
    //     if (ctrl.$isEmpty(modelValue)) {
    //       return true; // return true for empty input
    //     }
    //     const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //     return re.test(viewValue);
    //   };
    //   ctrl.$parsers.push(function (inputValue) {
    //     return inputValue ? inputValue.trim() : inputValue;
    //   });
    // },
    require: "ngModel",
    link: function (scope, element, attrs, ctrl) {
      ctrl.$validators.validEmail = function (modelValue, viewValue) {
        if (ctrl.$isEmpty(modelValue)) {
          return true; // return true for empty input
        }
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(viewValue) ? true : ""; // return empty string if invalid
      };
      ctrl.$parsers.push(function (inputValue) {
        return inputValue ? inputValue.trim() : inputValue;
      });
    },
  };
});

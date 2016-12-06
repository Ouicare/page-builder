app.controller('customButtonController', function ($scope) {
    $scope.options = {
        modules: $.extend($.summernote.options.modules, {"Models": Models}),
    };
});

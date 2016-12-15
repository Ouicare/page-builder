app.controller('ModelsController', function ($scope, $http) {
    $scope.varmodel = "";
    $scope.models = "";
    $scope.isInit = false;
    setTimeout(function () {
        $http.get(Routing.generate('api_get_entities_models'))
                .success(function (data, status, headers, config) {
                    $scope.models = data;
                    $scope.isInit = true;
                }).error(function (error, status, headers, config) {
            $scope.dataLoading = false;
        });
    }, 1000);


    $scope.selectedModels = function (branch) {
        $scope.varmodel = "";
        if (branch.level == 2) {
            console.log(branch);
            $scope.varmodel = "{{" + branch.data.parent.name + "." + branch.name + "}}";
        }
        console.log($scope.varmodel);
    };
});
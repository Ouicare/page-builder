app.controller('ModelsController', function ($scope, $http) {
    $scope.result = "";

    $http.get(Routing.generate('api_get_entities_models'))
            .success(function (data, status, headers, config) {
                $scope.models = data;
            }).error(function (error, status, headers, config) {

    });

    $scope.selectedModels = function (branch) {
        $scope.result = "";
        if (branch.level == 2) {
            console.log(branch);
            $scope.result = "{{" + branch.data.parent + "." + branch.labels + "}}";
        }
        console.log($scope.result);
    };
});
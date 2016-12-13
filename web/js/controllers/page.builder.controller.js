app.controller('PageBuilderController', PageBuilderController);
function PageBuilderController($scope, toastr, $http) {
    var vm = $scope;
    vm.result = {
        category: '',
        type: '',
        items: []
    }
    vm.name = 'The page builder';

    $http.get(Routing.generate('api_get_input'))
            .success(function (data, status, headers, config) {
                vm.components = data;
                vm.orig_components = angular.copy(vm.components);
            }).error(function (error, status, headers, config) {

    });

    $scope.sortableOptions = {
        update: function (e, ui) {
            console.log(vm.result.items);
            vm.reset();
        },
        receive: function (e, ui) {

        },
        over: function (e, ui) {
        },
        handle: ".fa.fa-arrows",
        placeholder: "placeholder-over",
        connectWith: ".apps-container",
        revert: true
    };
    vm.getView = function (item) {
        /*
         you can return a different url
         to load a different template dynamically
         based on the provided item
         */
        if (item) {
            return "templates/" + item.type + ".html";
        }
        return null;
    };
    vm.remove = function (item, index) {
        if (item) {
            console.log(item.title);
            item.composants.splice(index, 1);
        } else {
            $scope.result.items.splice(index, 1);
        }

    };
    vm.getName = function () {
        return vm.name;
    };
    vm.setName = function (name) {
        vm.name = name;
    };
    vm.reset = function () {
        vm.components = angular.copy(vm.orig_components);
    }
    vm.transform = function (attributes) {
        var data = [];
        angular.forEach(attributes, function (value, key) {
            data.push({name: value, ticked: false});
        });
        return data;
    }
    vm.save = function () {
        console.log(vm.result);
        $http.post(Routing.generate('api_post_output_model'),
                {
                    data: vm.result
                }
        ).success(function (data, status, headers, config) {

        }).error(function (error, status, headers, config) {

        });
    }
}


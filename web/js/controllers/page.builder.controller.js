app.controller('PageBuilderController', PageBuilderController);
function PageBuilderController($scope, toastr, $http) {
    var vm = $scope;
    vm.result = {
        category: '',
        items: []
    }
    vm.name = 'The page builder';
    vm.components = {
        categories: ['consultation', 'prescription', 'email'],
        headers: [
            {title: 'Header 1', locked: true, type: 'header', text: ''},
            {title: 'Header 2', locked: true, type: 'header', text: ''}
        ],
        layouts: [
            {title: '1 Column', text: "1 x 100%", type: 'layout', composants: []},
            {title: '2 Columns', text: "2 x 50%", type: 'layout', left: [], right: []}
        ],
        graphicals: [
            {
                title: 'Antecedents', text: "liste des antécédents", type: 'table',
                data: [
                    {name: "Acte", ticked: false},
                    {name: "start Date", ticked: false},
                    {name: "End Date", ticked: false}
                ],
                fields: []
            },
            {
                title: 'Consultations', text: "liste des Consultations", type: 'table',
                data: [
                    {name: "type", ticked: false},
                    {name: "etablissement", ticked: false},
                    {name: "date", ticked: false},
                    {name: "description", ticked: false}
                ],
                fields: []
            },
            {
                title: 'Prescriptions', text: "liste des Prescriptions", type: 'table',
                data: [
                    {name: "medicament", ticked: false},
                    {name: "dose", ticked: false},
                    {name: "fréquences", ticked: false}
                ],
                fields: []
            },
        ]
    };
    vm.orig_components = angular.copy(vm.components);
    vm.model = [];
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


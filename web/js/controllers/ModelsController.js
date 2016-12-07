app.controller('ModelsController', function ($scope) {
    $scope.result = "";
    $scope.models = [
        {
            id: 1,
            label: 'Groupement de santé',
            children: [
                {
                    label: 'Logo',
                    data: {
                        description: "description",
                        parent: 1
                    }
                },
                {
                    label: 'Nom',
                    data: {
                        description: "description",
                        parent: 1
                    }
                },
                {
                    label: 'Adresse',
                    data: {
                        description: "description",
                        parent: 1
                    }
                }
            ]
        },
        {
            id: 2,
            label: 'Etablissment de santé',
            children: [
                {
                    label: 'Logo',
                    data: {
                        description: "description",
                        parent: 2
                    }
                },
                {
                    label: 'Nom',
                    data: {
                        description: "description",
                        parent: 2
                    }
                },
                {
                    label: 'Adresse',
                    data: {
                        description: "description",
                        parent: 2
                    }
                }
            ]
        },
        {
            id: 3,
            label: 'Antécedents',
            children: [
                {
                    label: 'Acte',
                    data: {
                        description: "description",
                        parent: 3
                    }
                },
                {
                    label: 'Date début',
                    data: {
                        description: "description",
                        parent: 3
                    }
                },
                {
                    label: 'Date Fin',
                    data: {
                        description: "description",
                        parent: 3
                    }
                }
            ]
        }
    ];


    $scope.selectedModels = function (branch) {
        $scope.result = "";
        if (branch.level == 2) {
            console.log(branch);
            $scope.result = "[" + branch.data.parent + ">" + branch.label + "]";
        }
        console.log($scope.result);
    };
});
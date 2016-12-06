app.controller('PageBuilderController', PageBuilderController);
function PageBuilderController($scope, toastr) {
    var vm = $scope;
    vm.items = [];
    vm.name = 'The page builder ';
    vm.headers = [{title: 'Header 1', locked: true, type: 'header'}, {title: 'Header 2', locked: true, type: 'header'}];
    vm.layouts = [{title: '1 Column', text: "1 x 100%", type: 'layout', composants: []}, {title: '2 Columns', text: "2 x 50%", type: 'layout', left: [], right: []}];
    vm.model = [];
    $scope.sortableOptions = {
        update: function (e, ui) {
            console.log(ui.item.sortable.model);
            console.log(ui.item.sortable.droptargetModel[ui.item.sortable.dropindex]);
            if(!ui.item.sortable.received && ui.item.sortable.droptargetModel[ui.item.sortable.dropindex] && ui.item.sortable.droptargetModel[ui.item.sortable.dropindex].type === "layout" && ui.item.sortable.sourceModel[ui.item.sortable.index].type === "layout"){
                toastr.success("Layout within layout are not allowed", 'error');
                ui.item.sortable.cancel();
            }
            // if the element is removed from the first container
            if ($(e.target).hasClass('first') &&
                    ui.item.sortable.droptarget &&
                    e.target != ui.item.sortable.droptarget[0]) {
                // clone the original model to restore the removed item
                if ($(e.target).hasClass('layout')) {
                    vm.layouts = vm.layouts.slice();

                } else if ($(e.target).hasClass('header')) {
                    vm.headers = vm.headers.slice();
                } else if ($(e.target).hasClass('item')) {
                    vm.items = vm.items.slice();
                }
            }
        },
        receive: function (e, ui) {
        },
        over: function (e, ui) {
        },
        handle: ".fa.fa-arrows",
        placeholder: "placeholder-over",
        connectWith: ".apps-container"
    };
    $scope.getView = function (item) {
        /*
         you can return a different url
         to load a different template dynamically
         based on the provided item
         */
        if (item) {
            if (item.type === "header") {
                return 'nestable_item_1.html';
            } else if (item.type === "layout") {
                return 'layout.html';
            }
        }
        return null;
    };
    vm.test = function (index) {
        //console.log(index);
    }
    vm.remove = function (index) {
        //console.log($scope.items[index]);
        $scope.items.splice(index, 1);
    };
    vm.getName = function () {
        return vm.name;
    };
    vm.setName = function (name) {
        vm.name = name;
    };
}
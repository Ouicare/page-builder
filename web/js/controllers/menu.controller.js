app.controller('MenuController',MenuController);
function MenuController($scope) {
    var vm = $scope;
  vm.name = 'menu';
//vm.headers = [{title:'Header 1',locked:true},{title:'Header 2',locked:true}];
  vm.getName = function() {
    return vm.name;
  };

  vm.setName = function(name) {
    vm.name = name;
  };
  }
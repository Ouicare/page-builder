app.controller('ModelEntityController', ModelEntityController);
function ModelEntityController($scope,$http,toastr) {
    var vm = $scope;
    vm.entity ={title:'',label:'',description: '',type:'',attributes:[]};
    vm.modelAttributes = [];
    vm.getAttributes= function(item){
        vm.entity.attributes = [];
        $http.get(Routing.generate('api_entity_model_get_fields',{model: item})).success(function (data, status, headers, config) {
            vm.modelAttributes = data;
        }).error(function (error, status, headers, config) {

        });
    };
    vm.addAttribute = function(){
        vm.entity.attributes.push({'label':'','name':''});
    }
    vm.removeAttribute = function(index){
        vm.entity.attributes.splice(index, 1);
    }
    vm.hasAttributes = function(){
        return vm.modelAttributes.length > 0;
    }
    vm.save = function(){
        console.log(vm.entity);
        $http.post(Routing.generate('api_entity_model_post'),
        {data: vm.entity}
                ).success(function (data, status, headers, config) {
           toastr.success('Success', "Modèle enregistré");
        }).error(function (error, status, headers, config) {
            toastr.error('Error', error);
        });
    }
}
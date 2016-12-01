var app = angular.module('myApp',[]);
 app.controller('PageBuilderController',PageBuilderController);
function PageBuilderController() {
    var that = this;
  that.content = 'Testing Drag and Drop using Angular'; ;

  that.getContent = function() {
    return that.content;
  };

  that.setContent = function(content) {
    that.content = content;
  };
  }
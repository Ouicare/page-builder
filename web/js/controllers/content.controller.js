app.controller('ContentController',ContentController);
function ContentController($scope) {
            //$scope.items = [{title:'Item 1'},{title:'Item 2'},{title:'Item 3'},{title:'Item 4'},{title:'Item 5'},{title:'Item 6'}];
    //$scope.items = [];
  $scope.content = 'content';
$scope.options = {
    height: 300,
    focus: true,
    airMode:true,
    disableDragAndDrop: true,
    toolbar: [
            ['edit',['undo','redo']],
            ['headline', ['style']],
            ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
            ['fontface', ['fontname']],
            ['textsize', ['fontsize']],
            ['fontclr', ['color']],
            ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link','picture','video','hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
  };
 $scope.getContent = function() {
    return $scope.content;
  };
  

  $scope.setContent = function(content) {
    $scope.content = content;
  };
  }
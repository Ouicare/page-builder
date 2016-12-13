app.controller('ContentController', ContentController);
function ContentController($scope) {
    $scope.content = 'content';
    $scope.options = {
        height: 300,
        focus: true,
        airMode: true,
        disableDragAndDrop: true,
        toolbar: [
            ['edit', ['undo', 'redo']],
            ['headline', ['style']],
            ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
            ['fontface', ['fontname']],
            ['textsize', ['fontsize']],
            ['fontclr', ['color']],
            ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    };
    $scope.getContent = function () {
        return $scope.content;
    };


    $scope.setContent = function (content) {
        $scope.content = content;
    };
}
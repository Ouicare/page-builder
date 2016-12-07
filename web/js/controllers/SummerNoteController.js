app.controller('SummerNoteController', function ($scope) {
    $scope.options = {
        placeholder: 'Votre texte ici',
        modules: $.extend($.summernote.options.modules, {"Models": Models}),
    };
});

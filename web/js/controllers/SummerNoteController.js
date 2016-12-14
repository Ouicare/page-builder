/*var ModelsButton = function (context) {
 var ui = $.summernote.ui;

 // create button
 var button = ui.button({
 contents: '<i class="fa fa-sitemap"/> Modéles',
 tooltip: 'hello',
 click: function () {
 // invoke insertText method with 'hello' on editor module.
 context.invoke('editor.insertText', 'hello');
 }
 });

 return button.render();   // return button as jquery object
 }*/

app.controller('SummerNoteController', function ($scope) {
    $scope.options = {
        placeholder: 'Votre texte ici',
        modules: $.extend($.summernote.options.modules, {"Models": Models}),
    };
    /*  $scope.options = {
     placeholder: 'Votre texte ici',
     toolbar: [
     ['style', ['style']],
     ['font', ['bold', 'italic', 'underline', 'clear']],
     ['fontname', ['fontname']],
     ['color', ['color']],
     ['para', ['ul', 'ol', 'paragraph']],
     ['height', ['height']],
     ['table', ['table']],
     ['insert', ['link', 'picture', 'hr']],
     ['view', ['fullscreen', 'codeview']],
     ['mybutton', ['model']],
     ['help', ['help']]
     ],
     buttons: {
     model: ModelsButton
     }
     };*/
});

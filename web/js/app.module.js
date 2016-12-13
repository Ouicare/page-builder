var app = angular.module('app', ['ui.sortable', 'summernote', 'tg.dynamicDirective', 'ngAnimate', 'toastr', 'angularBootstrapNavTree', 'isteven-multi-select']);
app.config(function ($httpProvider) {
    $httpProvider.defaults.transformRequest = function (data) {
        if (data === undefined) {
            return data;
        }
        return $.param(data);
    };
    $httpProvider.defaults.headers.post['Content-Type'] = ''
            + 'application/x-www-form-urlencoded; charset=UTF-8';
});
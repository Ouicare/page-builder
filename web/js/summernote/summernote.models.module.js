// Module Name is AutoLink
// @param {Object} context - states of editor
var Models = function (context) {

    var self = this;
    var ins;
    // you can get current editor's elements from layoutInfo
    var layoutInfo = context.layoutInfo;
    var $editor = layoutInfo.editor;
    var $editable = layoutInfo.editable;
    var $toolbar = layoutInfo.toolbar;
    var options = context.options;
    var lang = options.langInfo;
    var treeView;
    // ui is a set of renderers to build ui elements.
    var ui = $.summernote.ui;
    // this method will be called when editor is initialized by $('..').summernote();
    // You can attach events and created elements on editor elements(eg, editable, ...).
    this.initialize = function () {
        var $container = $editor;
        var path = Routing.generate('models_popup');
        var body = '<div class="content"></div>'
        var footer = '<button id="save" class="btn btn-success">Sauvegarder</button>'
        this.$dialog = ui.dialog({
            title: "Models",
            fade: options.dialogsFade,
            body: body,
            footer: footer,
            callback: function ($node) {
                $node.find('.modal-body').css({
                    'min-height': 100
                });
            }
        }).render().appendTo($container);


        // create button
        var button = ui.button({
            className: 'note-btn btn btn-default btn-sm',
            contents: 'Models',
            click: function (e) {
                context.invoke('editor.saveRange');
             if (treeView === undefined) {
            treeView = getData();
            }   
            angular.element(document).injector().invoke(function ($compile) {
                                var obj = $('.content');
                                var scope = obj.scope();
                                // generate dynamic content
                                obj.html($(treeView));
                                $compile(obj.contents())(scope);
                            });
                // show dialog
                show($container);
            }
        });
        // generate jQuery element from button instance.
        this.$button = button.render();
        $toolbar.append(this.$button);
    }
function getData(){
    var path = Routing.generate('models_popup');
               var data =  $.ajax({ type: "GET",   
                        url: path,   
                        async: false
                      }).responseText;
                return data;
}
    // show dialog
    function show($container) {
        return $.Deferred(function (deferred) {
            var $saveBtn = self.$dialog.find('#save');
            $saveBtn.click(function (event) {
                event.preventDefault();
                $(".modal").modal("hide");
                ins = angular.element($container.parent().find("#models")).scope().varmodel;
                context.invoke('editor.restoreRange');
                context.invoke('editor.focus');
                context.invoke('editor.insertText', ins);
            });
            ui.onDialogShown(self.$dialog, function () {
                context.triggerEvent('dialog.shown');
                console.log("dialog show");
            });

            ui.onDialogHidden(self.$dialog, function () {
                console.log("dialog hide");
                ui.hideDialog(self.$dialog);
                $saveBtn.off('click');
            });

            ui.showDialog(self.$dialog);
        });
    }
// this method will be called when editor is destroyed by $('..').summernote('destroy');
// You should detach events and remove elements on `initialize`.
    this.destroy = function () {
        this.$button.remove();
        this.$button = null;
        ui.hideDialog(this.$dialog);
        this.$dialog.remove();

    }
};


// Module Name is AutoLink
// @param {Object} context - states of editor
var Models = function (context) {

    var self = this;
    // you can get current editor's elements from layoutInfo
    var layoutInfo = context.layoutInfo;
    var $editor = layoutInfo.editor;
    var $editable = layoutInfo.editable;
    var $toolbar = layoutInfo.toolbar;
    var options = context.options;
    var lang = options.langInfo;

    // ui is a set of renderers to build ui elements.
    var ui = $.summernote.ui;

    // this method will be called when editor is initialized by $('..').summernote();
    // You can attach events and created elements on editor elements(eg, editable, ...).
    this.initialize = function () {
        var $container = options.dialogsInBody ? $(document.body) : $editor;

        var body = [
            '<p class="text-center">',
            '<a href="http://summernote.org/" target="_blank">Summernote @VERSION</a> · ',
            '<a href="https://github.com/summernote/summernote" target="_blank">Project</a> · ',
            '<a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a>',
            '</p>'
        ].join('');

        this.$dialog = ui.dialog({
            title: "title",
            fade: options.dialogsFade,
            body: body,
            footer: body,
            callback: function ($node) {
                $node.find('.modal-body').css({
                    'max-height': 300,
                    'overflow': 'scroll'
                });
            }
        }).render().appendTo($container);

        // create button
        var button = ui.button({
            contents: '<i class="fa fa-child"/> Models',
            tooltip: 'hello',
            click: function (e) {
                console.log("amin");
                var node = document.createElement("div");
                // @param {Node} node
                context.invoke('insertNode',node);
                //  context.invoke('editor.bold'); // invoke bold method of a module named editor
                //this.showModelsDialog(context);
                //ui.showDialog(self.$dialog);
            }
        });
        // generate jQuery element from button instance.
        this.$button = button.render();
        $toolbar.append(this.$button);
    }

    // this method will be called when editor is destroyed by $('..').summernote('destroy');
    // You should detach events and remove elements on `initialize`.
    this.destroy = function () {
        this.$button.remove();
        this.$button = null;
    }
};

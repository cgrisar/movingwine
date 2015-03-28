(function() {
    $.fn.dataTable.Header = function ( context ) {

        var text = this.text;

        header = $('<h4>')
                .addClass('ui dividing header')
                .html(text);

        this.node = function(){
            return header
        }
    };

    $.fn.dataTable.ext.feature.push({
        "cFeature": "H",
        "text": "Relationships",
        "sTag": "dt-Header",

        fnInit: function (settings) {
            var header = new $.fn.dataTable.Header(settings);
            return header.node()
        }

    })

}());
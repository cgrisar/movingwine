/*! DataTables Semantic-UI integration
 * 2014: Charles Grisar, datables.net/license
 */

/**
 * DataTables integration for Semantic-UI. This requires Semantic-UI and
 * DataTables 1.10 or newer.
 *
 * This file sets the defaults and adds options to DataTables to style its
 * controls using Semantic.
 */
(function(window, document, undefined){

    var factory = function( $, DataTable ) {
        "use strict";

        /* Set the defaults for DataTables initialisation */
        $.extend( true, DataTable.defaults, {
            lengthMenu:    [[10, 25, 50, -1], [10, 25, 50, "All"]],

            language: {
                search : "",
                searchPlaceholder: "Search:"
            },

            initComplete: function(settings){

                var table = $(".ui.table").DataTable();
                var tableName = settings.sInstance;

                /*
                * change the search filter
                */

                /* set the filter html-code */
                var filter = tableName + '_filter';
                var filter_ui =
                    '<div class="ui field">' +
                        '<div class="ui icon input" >' +
                            '<input type="text" aria-controls="' + tableName + '" id="' + filter + '" placeholder="Search...">' +
                            '<i class="search icon"></i>' +
                        '</div>' +
                    '</div>' +
                    '</p>';

                // add it and remove the "filter" class, having becoming obsolete
                $("div.filter").prepend(filter_ui).removeClass('filter');

                // and add event handler to the new filter selector
                $('#' + filter).on('keyup', function(){
                    table.search(this.value).draw(false)
                });

                /*
                * Change the length part
                */

                /* set the length html code */
                 var length = tableName + "_length";
                 var length_ui =
                     '<select class="ui dropdown" id="length_dropdown">' +
                         '<option value="">Show</option>' +
                         '<option value="0">0</option>' +
                         '<option value="10">10</option>' +
                         '<option value="25">25</option>' +
                         '<option value="50">50</option>' +
                         '<option value="-1">All</option>' +
                     '</select>';

                 // add it and remove the "filter" class, having becoming obsolete
                 $("div.length").prepend(length_ui).removeClass('length');

                 $('#length_dropdown').dropdown({
                    onChange: function(value, text){
                        table.page.len(value).draw();
                    }
                 });

            },

            dom:    '<"row"T>' +
                    '<"row"' +
                        '<"left floated eight wide column length">' +
                        '<"right floated eight wide column filter">' +
                    '>' +
                    '<"row"t>' +
                    '<"row"'+
                        '<"left floated eight wide column"i>' +
                        '<"right floated eight wide column"p>' +
                        '>',

            renderer: 'semantic'
        } );


        /* Default class modification */

        $.extend( DataTable.ext.classes, {
            sWrapper:       "dataTables_wrapper ui form dt-bootstrap",
            sFilter:        "ui icon input",
            sLengthSelect:  "ui selection dropdown",
            sPageButton:    "icon item",
            sSortAsc:       "sorted ascending",
            sSortDesc:      "sorted descending",
        } );


        /* Semantic paging button renderer */
        DataTable.ext.renderer.pageButton.semantic = function ( settings, host, idx, buttons, page, pages ) {
            var api     = new DataTable.Api( settings );
            var classes = settings.oClasses;
            var lang    = settings.oLanguage.oPaginate;
            var btnDisplay, btnClass;

            var attach = function( container, buttons ) {
                var i, ien, node, button;
                var clickHandler = function ( e ) {
                    e.preventDefault();
                    if ( !$(e.currentTarget).hasClass('disabled') ) {
                        api.page( e.data.action ).draw( false );
                    }
                };

                for ( i=0, ien=buttons.length ; i<ien ; i++ ) {
                    button = buttons[i];

                    if ( $.isArray( button ) ) {
                        attach( container, button );
                    }
                    else {
                        btnDisplay = '';
                        btnClass = '';

                        switch ( button ) {
                            case 'ellipsis':
                                btnDisplay = '...';
                                btnClass = 'disabled';
                                break;

                            case 'previous':
                                btnDisplay = '<i class="left arrow icon"></i>';
                                btnClass = (page > 0 ? '' : ' disabled');
                                break;

                            case 'next':
                                btnDisplay = '<i class="right arrow icon"></i>';
                                btnClass = (page < pages-1 ? '' : ' disabled');
                                break;

                            default:
                                btnDisplay = button + 1;
                                btnClass = page === button ?
                                    'active' : '';
                                break;
                        }

                        if ( btnDisplay ) {
                            node = $('<a>', {
                                'class': classes.sPageButton+' '+btnClass,
                                'aria-controls': settings.sTableId,
                                'tabindex': settings.iTabIndex,
                                'id': idx === 0 && typeof button === 'string' ?
                                settings.sTableId +'_'+ button :
                                    null
                            } )
                                .html( btnDisplay )

                                .appendTo( container );

                            settings.oApi._fnBindAction(
                                node, {action: button}, clickHandler
                            );
                        }
                    }
                }
            };

            attach(
                $(host).empty().html('<div class="ui borderless pagination menu"/>').children('div'),
                buttons
            );
        };


        /*
         * TableTools Semantic compatibility
         * Required TableTools 2.1+
         */
        if ( DataTable.TableTools ) {
            // Set the classes that TableTools uses to something suitable for Bootstrap
            $.extend( true, DataTable.TableTools.classes, {
                "container": "ui buttons",
                "buttons": {
                    "normal": "ui button",
                    "disabled": "ui disabled button"
                },
                "select": {
                    "row": "active"
                }
            } );

            $.extend(true, DataTable.TableTools.BUTTONS, {
               "print": {
                   "sButtonClass": "print icon",
                   "sToolTip": "Print Table"
               },
               "copy": {
                   "sButtonClass": "copy icon",
                   "sToolTip": "Copy Table"
               },
               "csv": {
                   "sButtonClass": "file text outline icon",
                   "sToolTip": "Save table als CSV"
               },
               "pdf": {
                   "sButtonClass": "file pdf outline icon",
                   "sToolTip": "Save table as PDF"
               },
               "xls": {
                   "sButtonClass": "file excel outline icon",
                   "sToolTip": "Save table as Excel"
               }
            });

            // Have the collection use a semantic compatible drop down
            $.extend( true, DataTable.TableTools.DEFAULTS.oTags, {
                "button": "div",
                "liner": "i",
                "collection": {
                    "container": "ul",
                    "button": "li",
                    "liner": "a"
                }
            } );

            $.extend( true, DataTable.TableTools.prototype, {
                "_fnButtonBase" : function ( o, bCollectionButton ){
                    var sTag, sLiner, sClass;

                    if ( bCollectionButton )
                    {
                        sTag = o.sTag && o.sTag !== "default" ? o.sTag : this.s.tags.collection.button;
                        sLiner = o.sLinerTag && o.sLinerTag !== "default" ? o.sLiner : this.s.tags.collection.liner;
                        sClass = this.classes.collection.buttons.normal;
                    }
                    else
                    {
                        sTag = o.sTag && o.sTag !== "default" ? o.sTag : this.s.tags.button;
                        sLiner = o.sLinerTag && o.sLinerTag !== "default" ? o.sLiner : this.s.tags.liner;
                        sClass = this.classes.buttons.normal;
                    }

                    var
                        nButton = document.createElement( sTag ),
                        nSpan = document.createElement( sLiner ),
                        masterS = this._fnGetMasterSettings();

                    nButton.setAttribute("class", "ui icon button");
                    nSpan.setAttribute("class", o.sButtonClass);

                    nButton.setAttribute('id', "ToolTables_"+this.s.dt.sInstance+"_"+masterS.buttonCounter );
                    nButton.appendChild( nSpan );

                    masterS.buttonCounter++;
                    return nButton;
                }
            })
        }

    }; // /factory


// Define as an AMD module if possible
    if ( typeof define === 'function' && define.amd ) {
        define( ['jquery', 'datatables'], factory );
    }
    else if ( typeof exports === 'object' ) {
        // Node/CommonJS
        factory( require('jquery'), require('datatables') );
    }
    else if ( jQuery ) {
        // Otherwise simply initialise as normal, stopping multiple evaluation
        factory( jQuery, jQuery.fn.dataTable );
    }


})(window, document);
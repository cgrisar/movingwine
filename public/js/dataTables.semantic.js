/**
 * Created by charlesgrisar on 15/12/14.
 */

var editor;

    $(document).ready(function()
    {
        $("#relationshipTable").dataTable({
            "dom": '<"row"' +
                        '<"left floated eight column length">' +
                        '<"right floated eight column filter">' +
                    '>' +
                    '<"row"t>' +
                    '<"row"'+
                        '<"left floated eight column info">' +
                        '<"right floated eight column paginate"p>' +
                    '>',

            "initComplete": function(settings, json) {

                // adapt the dataTables_wrapper class

                $(".dataTables_wrapper").addClass("ui form");


                // define the length node to be compatible with Semantic-UI

                var length =
                    '<select class="ui dropdown" id="length_dropdown">' +
                        '<option value="">Show</option>' +
                        '<option value="10">10</option>' +
                        '<option value="25">25</option>' +
                        '<option value="50">50</option>' +
                    '</select>';

                // add the dropdown

                $('div.length').prepend(length);


                // define the filter node to be compatible with Semantic-UI

                var filter =
                    '<div class="ui field">' +
                        '<div class="ui icon input" >' +
                            '<input type="text" aria-controls="recipe" id="recipe_filter" placeholder="Search...">' +
                            '<i class="search icon"></i>' +
                        '</div>' +
                    '</div>' +
                    '</p>';

                // add it

                $('div.filter').prepend(filter);

                // and add event handler to the new filter and length selector

                var table = $("#recipe").DataTable();

                $('#recipe_filter').on('keyup', function(){
                    table.search(this.value).draw(false)
                });

                $('#length_dropdown').dropdown({
                    onChange: function(value, text){
                        table.page.len(value).draw();
                    }
                });
            },

            "drawCallback": function(settings, json) {

                // adapt pagination

                $('.paginate_button.previous').replaceWith('<a class="icon item"><i class="left arrow icon"></i></a>');
                $('.paginate_button.next').replaceWith('<a class="icon item"><i class="right arrow icon"></i></a>');
                $('.paginate_button.current').removeClass('paginate_button current').addClass('active item');
                $('div.dataTables_paginate').removeClass('dataTables_paginate').addClass('ui pagination menu');
            },

            "ajax": "ajax/ingredients",

            "columns" : [
                {
                    "data": "ingredient"
                },
                {
                    "data": "quantity"
                }
            ],

            "tableTools": {
                "sRowSelect": "os",
                "aButtons": [
                    { "sExtends": "editor_create",  editor: editor },
                    { "sExtends": "editor_edit", editor: editor},
                    { "sExtends": "editor_remove", editor: editor}
                ]
            }
        });


   //     alert(plainArray);
    });
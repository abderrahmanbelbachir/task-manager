$( function() {
    initSortableEvents();
    $('select[name="project_id"]').on('change' , function() {
        console.log('changed project !');
        $.ajax({
            url: '/api/task/project/' + $(this).val(),
            type: 'GET'
        })
            .done(function (data) {
                $('#sortable').html(data);
                initSortableEvents();
            })
            .fail(function (error) {
                console.error('Error occured : ' , error);
            });
    })
} );

function initSortableEvents() {
    $( "#sortable" ).sortable({
        stop: function( event, ui ) {
            var droppedItem = ui.item;
            var priority = parseInt(droppedItem.index()) + 1;
            var task = droppedItem.attr('data-id');
            var inputs = {
                '_token': '{{csrf_token()}}',
            }

            $.ajax({
                url: '/api/task/priority/' + task + '/' + priority,
                type: 'PUT',
                data: inputs
            })
                .done(function () {
                    window.location.reload();
                })
                .fail(function (error) {
                    console.error('error occured : ' , error);
                });
        }
    });
    $( "#sortable" ).disableSelection();
}

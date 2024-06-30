$(document).ready(function() {
    var table = $('#studentTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#studentTable tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            var childTableHtml = tr.next('tr.child-row').find('table').clone().removeAttr('style');
            row.child(childTableHtml).show();
            tr.addClass('shown');
        }
    });
});
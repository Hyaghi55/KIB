$(document).ready(function() {
$('#dataTable').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],

        columnDefs: [
      { "width": "100px;", "targets": 0 },
      { "width": "100px;", "targets": 1 },
      { "width": "100px;", "targets": 2 },
      { "width": "100px;", "targets": 3 },
      { "width": "100px;", "targets": 4 },
      { "width": "100px;", "targets": 5 }
    ]

});
} );

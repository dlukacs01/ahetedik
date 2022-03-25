// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable-posts').DataTable({
      "order": [[ 0, "desc" ]] // Order on init. # is the column, starting at 0
  });
  $('#dataTable-headings').DataTable({
      "order": [[ 0, "desc" ]] // Order on init. # is the column, starting at 0
  });
  $('#dataTable-articles').DataTable({
      "order": [[ 0, "desc" ]] // Order on init. # is the column, starting at 0
  });
  $('#dataTable-works').DataTable({
      "order": [[ 0, "desc" ]] // Order on init. # is the column, starting at 0
  });
  $('#dataTable-stories').DataTable({
      "order": [[ 0, "desc" ]] // Order on init. # is the column, starting at 0
  });
  $('#dataTable-users').DataTable({
      "order": [[ 3, "asc" ]] // Order on init. # is the column, starting at 0
  });
});

// https://stackoverflow.com/questions/38402902/orderby-in-laravel-jquery-datatables

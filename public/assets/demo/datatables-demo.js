// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable-posts').DataTable({
      "order": [[ 0, "desc" ]], // Order on init. # is the column, starting at 0
      "language": {
          "url": '/assets/demo/dataTables.hungarian.json'
      }
  });
  $('#dataTable-headings').DataTable({
      "order": [[ 0, "desc" ]], // Order on init. # is the column, starting at 0
      "language": {
          "url": '/assets/demo/dataTables.hungarian.json'
      }
  });
  $('#dataTable-articles').DataTable({
      "order": [[ 0, "desc" ]], // Order on init. # is the column, starting at 0
      "language": {
          "url": '/assets/demo/dataTables.hungarian.json'
      }
  });
  // $('#dataTable-works').DataTable({
  //     "order": [[ 0, "desc" ]], // Order on init. # is the column, starting at 0
  //     "language": {
  //         "url": '/assets/demo/dataTables.hungarian.json'
  //     }
  // });
  $('#dataTable-stories').DataTable({
      "order": [[ 0, "desc" ]], // Order on init. # is the column, starting at 0
      "language": {
          "url": '/assets/demo/dataTables.hungarian.json'
      }
  });
  $('#dataTable-users').DataTable({
      "order": [[ 0, "asc" ]], // Order on init. # is the column, starting at 0
      "language": {
          "url": '/assets/demo/dataTables.hungarian.json'
      }
  });
});

// https://stackoverflow.com/questions/38402902/orderby-in-laravel-jquery-datatables

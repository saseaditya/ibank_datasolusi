<script>
  $(document).ready(function() {
    $('table.dataTables-search').DataTable({
        // "scrollX": true,
      "pagingType": "full_numbers",
      "lengthChange": false,
      "lengthMenu": [
        [5]
      ],
      // responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }
    });

    $('table.dataTables').DataTable({
        paging: false,        // Sembunyikan paging
        searching: false,     // Sembunyikan search bar
        info: false ,          // Sembunyikan jumlah data
        // "scrollX": true,
        "processing": true,
      "pagingType": "full_numbers",
      // "lengthMenu": [
      //   [25, 50, 75, 100, -1],
      //   [25, 50, 75, 100, "All"]
      // ],
      // responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      },
      // pageLength: "full",
      lengthChange: false
    });

      $('table.dataTables-SisaStok').DataTable({
          // "scrollX": true,
          "pagingType": "full_numbers",
          "lengthMenu": [
              [-1],
              ["All"]
          ],
          // responsive: true,
          language: {
              search: "_INPUT_",
              searchPlaceholder: "Search",
          }
      });

    $('table.dataTables-length').DataTable({
        "processing": true,
        // "scrollX": true,
      "pagingType": "full_numbers",
      // responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }
    });
  });
</script>

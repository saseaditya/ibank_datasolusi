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
        // "scrollX": true,
        "processing": true,
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, 75, -1],
        [10, 25, 50, 75, "All"]
      ],
      // responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }
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

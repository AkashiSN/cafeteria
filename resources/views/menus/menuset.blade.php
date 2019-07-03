@extends('layouts.default')

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Aセット</th>
      <th scope="col">Bセット</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">月</th>
      <td>選択...</td>
      <td>選択...</td>
    </tr>
    <tr>
      <th scope="row">火</th>
      <td>選択...</td>
      <td>選択...</td>
    </tr>
    <tr>
      <th scope="row">水</th>
      <td>選択...</td>
      <td>選択...</td>
    </tr>
  </tbody>
</table>
<script>
function addRowHandlers() {

    var table = document.getElementById("tableId");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler = 
            function(row) 
            {
                return function() { 
                                        var cell = row.getElementsByTagName("td")[0];
                                        var id = cell.innerHTML;
                                        alert("id:" + id);
                                 };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
    document.write("<p>" + id + "</p>");
}
</script>
@endsection
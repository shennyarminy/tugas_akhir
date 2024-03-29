<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" name="csrf_token" content="{{ csrf_token() }}">
  <style>
    table.static {
      position: relative;
      border: 1px solid #543535;
    }
    </style>
    <title>Cetak Data</title>
</head>
<body>
  <div class="form-group">
    <p  align="center"><b> Penerima Beasiswa PIP SD Negeri 11 Sandai</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
      <thead>
        <tr >
            <th>Rank</th>
            <th>Alternatif</th>
            <th>Optimasi</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($optimization as $opt => $val)
        <tr align="center">
            <td class="col-2">{{ $rank++ }}</td>
            <td class="col-2">{{ $alternatif[$opt][0] }}</td>
            <td class="col-2">{{ number_format((float)$optimization[$opt], 4, '.', '') }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
  </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<style>
#table1 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
 
#table1 td, #table1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#table1 tr:nth-child(even){background-color: #f2f2f2;}

#table1 tr:hover {background-color: #ddd;}

#table1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5e72e4;
  color: white;
}
</style>
</head>
<body>

<h3>Laporan Data Imunisasi</h3>

<table id="table1">
  <tr>
        <th>No</th>
        <th>Tanggal Imunisasi</th>
        <th>Nama Balita</th>
        <th>Jenis Imunisasi</th>
  </tr>


  @php
      $no=1;
  @endphp
  @foreach($imunisasi as $row )

  
              <tr>
                <td>{{ $no++}}</td>
                <td>{{date('d F Y',strtotime($row->tgl_imunisasi))}}</td>
              <td>{{$row->balita->nama_balita}}</td>
              <td>{{$row->jenis_imunisasi}}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>
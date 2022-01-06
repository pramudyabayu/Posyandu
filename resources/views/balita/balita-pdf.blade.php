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

<h3>Laporan Data Balita</h3>

<table id="table1">
  <tr>
        <th>No</th>
        <th>Nama Balita</th>
        <th>Anak Ke-</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>No KK</th>
        <th>NIK Balita</th>
        <th>BB Lahir</th>
        <th>TB Lahir</th>
        <th>KIA</th>
        <th>IMD</th>
        <th>Nama Ortu</th>
        <th>NIK Ortu</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>RT</th>
        <th>RW</th>
  </tr>


  @php
      $no=1;
  @endphp
  @foreach($balita as $row )

  
              <tr>
                <td>{{ $no++}}</td>
                <td>{{$row->nama_balita}}</td>
                <td>{{$row->anak_ke}}</td>
                <td>{{date('d F Y',strtotime($row->tgl_lahir))}}</td>
                <td>{{$row->jenis_kelamin}}</td>
                <td>{{$row->no_kk}}</td>
                <td>{{$row->nik_balita}}</td>
                <td>{{$row->bb_lahir}}</td>
                <td>{{$row->tb_lahir}}</td>
                <td>{{$row->kia}}</td>
                <td>{{$row->imd}}</td>
                <td>{{$row->nama_ortu}}</td>
                <td>{{$row->nik_ortu}}</td>
                <td>{{$row->no_hp}}</td>
                <td>{{$row->alamat}}</td>
                <td>{{$row->rt}}</td>
                <td>{{$row->rw}}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>
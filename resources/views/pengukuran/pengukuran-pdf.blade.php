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

<h3>Laporan Data Pengukuran</h3>

<table id="table1">
  <tr>
        <th>No</th>
        <th>Tanggal Pengukuran</th>
        <th>Nama Balita</th>
        <th>Usia</th>
        <th>Berat Badan</th>
        <th>Tinggi Badan</th>
        <th>Cara Ukur</th>
        <th>Vitamin A</th>
        <th>Asi</th>
        <th>PMT Ke-</th>
        <th>Sumber PMT</th>
        <th>Tanggal PMT</th>
  </tr>


  @php
      $no=1;
  @endphp
  @foreach($pengukuran as $row )
      <tr>
            <td>{{ $no++}}</td>
            <td>{{date('d F Y',strtotime($row->jadwal->tgl_pelayanan))}}</td>
            <td>{{$row->balita->nama_balita}}</td>
            <td>{{$row->usia}}</td>
            <td>{{$row->bb}}</td>
            <td>{{$row->tb}}</td>
            <td>{{$row->cara_ukur}}</td>
            <td>{{$row->vitamin_a}}</td>
            <td>{{$row->asi}}</td>
            <td>{{$row->pmt_ke}}</td>
            <td>{{$row->sumber_pmt}}</td>
            <td>{{$row->tgl_pemberian}}</td>
      </tr>
  @endforeach
  
</table>

</body>
</html>
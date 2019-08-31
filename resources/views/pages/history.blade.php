<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Riwayat Order</title>
     <style>
          #table{
               width: 100%;
          }
          th, td{
               text-align: center;
          }
     </style>
</head>
<body>
     <h3 class="title" style="text-align:center">
          Daftar Riwayat Pemesanan Driver
     </h3>
     <table border="1" cellpadding=10>
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama Driver</th>
                    <th>Jenis Transportasi</th>
                    <th>Dari</th>
                    <th>Tujuan</th>
                    <th>Tanggal Order</th>
               </tr>
          </thead>
          <tbody>
               @foreach ($orders as $order)
                    <tr>
                         <td>{{ $loop->index + 1 }}</td>
                         <td>{{ \App\User::where('id', $order->services['user_id'])->first()['name'] }}</td>
                         <td>{{ $order->transportation->name }}</td>
                         <td>{{ $order->location_now }}</td>
                         <td>{{ $order->location_target }}</td>
                         <td>{{ \Jenssegers\Date\Date::parse($order->created_at)->format('d F Y') }}</td>
                    </tr>
               @endforeach
          </tbody>
     </table>
</body>
</html>
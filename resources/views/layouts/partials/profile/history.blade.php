<div class="profile-wrapper">
     @if (count($user->order) > 0)
          <h3 class="title">Daftar Riwayat Pemesanan Driver</h3>
          <p>
               Download file berikut untuk mendapatkan daftar riwayat pemesanan driver yang pernah dilakukan
          </p>
          <a href="{{ route('history.get') }}" class="btn-link">
               <i class="fas fa-download"></i> Download
          </a>
          <table class="table table-stripped table-responsive" id="table-history" style="width:100%">
               <thead>
                    <th>No</th>
                    <th>Tujuan</th>
                    <th>Dari</th>
                    <th>Nama Sopir</th>
                    <th>Penumpang Dewasa</th>
                    <th>Penumpang Anak-Anak</th>
                    <th>Status</th>
               </thead>
               <tbody>
                    @foreach (\App\Order::with(['services'])->orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->limit(5)->get() as $data)
                         <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $data->location_target }}</td>
                              <td>{{ $data->location_now }}</td>
                              <td>
                                   @if ($data->services === null)
                                       -
                                   @else
                                   {{ $data->services->user->name }}
                                   @endif
                              </td>
                              <td>{{ $data->adult_passenger }}</td>
                              <td>{{ $data->children_passenger }}</td>
                              <td>{{ $data->status }}</td>
                         </tr>
                    @endforeach
               </tbody>
          </table>
          @else
          <h3 class="title">
               Tidak ada riwayat pemesanan driver
          </h3>
     @endif
</div>
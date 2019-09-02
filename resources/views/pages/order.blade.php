@if (auth()->user()->role_id === 3)
     @if (count($drivers) !== 0)
          @foreach ($drivers as $order)
          <div class="order-wrapper">
               <h3 class="title">
                    Permintaan ke {{ $order->location_target }}
               </h3>
               <div class="detail-order">
                    <p>Pemesan : {{ $order->user->name }}</p>
                    <p>Lokasi pemesan: {{ $order->location_now}}</p>
                    <p>Jumlah penumpang: {{ $order->adult_passenger }} Dewasa, {{$order->children_passenger}} Anak</p>
               </div>
               <form action="{{ route('order.update', $order->id) }}" method="post" id="form-take">
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn-link" data-link={{ route('notif.index') }}>
                         Ambil
                    </button>
               </form>
          </div>
          @endforeach
     @else
          <h3 class="title">Tidak ada notifikasi</h3>
     @endif

@else 
     @if (count($users) !== 0)
          @foreach ($users as $order)
               @if ($order->status === 'taken')
               <div class="order-wrapper">
                    <h3 class="title">
                    Tujuan: {{ $order->location_target}}
                    </h3>
                    <div class="detail-order">
                         <p>Telah diambil oleh <strong>{{ $order->services->user->name }}</strong>. Harap untuk menunggu</p>
                    </div>
               </div>
               @else
                    <div class="order-wrapper">
                         <h3 class="title">
                         Tujuan: {{ $order->location_target}}
                         </h3>
                         <div class="detail-order">
                              <p>Belum ada yang mengambil orderanmu</p>
                         </div>
                    </div>
               @endif
          @endforeach
     @else
          <h3 class="title">Tidak ada notifikasi</h3>
     @endif
@endif
{{-- @else
     @if (count($users) !== 0)
     @foreach ($users as $order)
     @if ($order->status === 'taken')
         <h3 class="title">
              Tujuan: {{ $order->location_target}}
         </h3>
         <div class="detail-order">
              <p>Telah diambil oleh {{ $order->services->user->name }}. Harap untuk menunggu</p>
         </div>
     @endif
     @endforeach
     @else
     <h3 class="title">Tidak ada notifikasi</h3>
     @endif
@endif --}}
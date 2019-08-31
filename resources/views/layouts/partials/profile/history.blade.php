<div class="profile-wrapper">
@if (count($user->order) > 0)
          <h3 class="title">Daftar Riwayat Pemesanan Driver</h3>
          <p>
               Download file berikut untuk mendapatkan daftar riwayat pemesanan driver yang pernah dilakukan
          </p>
          <a href="{{ route('history.get') }}" class="btn-link">
               <i class="fas fa-download"></i> Download
          </a>
          @else
          <h3 class="title">
               Tidak ada riwayat pemesanan driver
          </h3>
          @endif
     </div>
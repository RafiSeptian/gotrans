@if (auth()->user()->role_id !== 3)
<div class="profile-wrapper">
          <h3 class="title bold">
               Jadi Driver
          </h3>
          <p class="content">
               Mau jadi driver ? klik tombol dibawah untuk mengubah statusmu
          </p>
          <a href="{{ route('driver.get') }}" class="btn-link" id="register-driver">
               Daftar Menjadi Driver
          </a>
</div>
@else
     <div class="profile-wrapper">
          @include('layouts.forms.services')
     </div>
@endif

<div class="profile-wrapper">
     <h3 class="title">
          Hapus Akun
     </h3>
     <p class="content">
          Data - data pada akun ini akan hilang secara permanen
     </p>
     <form action="{{ route('user.destroy', $user->id) }}" method="post" id="form-delete-account">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <button type="submit" class="btn-link" id="btn-delete">
               Hapus
          </button>
     </form>
</div>
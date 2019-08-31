<form action="{{ route('user.update', auth()->user()->id) }}" method="post">
     <div class="group-form">
          <label for="old_password">Kata sandi lama</label>
          <div class="form-wrapper">
               <input type="text" name="old_password" id="old_password" placeholder="Masukan Kata Sandi Baru">
          </div>
     </div>
     <div class="group-form">
          <label for="password">Kata sandi baru</label>
          <div class="form-wrapper">
               <input type="text" name="password" id="password" placeholder="Masukan Kata Sandi Baru">
          </div>
     </div>
</form>
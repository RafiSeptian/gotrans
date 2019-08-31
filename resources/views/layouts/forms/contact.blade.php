<form action="{{ route('request.store') }}" method="post" class="form-contact">
     <div class="group-form">
          <label for="name">Nama lengkap</label>
          <div class="form-wrapper">
               <input type="text" name="name" id="name" placeholder="Masukan nama lengkap">
          </div>
     </div>

     <div class="group-form">
          <label for="email">E-mail</label>
          <div class="form-wrapper">
               <input type="email" name="email" id="email" placeholder="example@example.com">
          </div>
     </div>

     <div class="group-form">
          <label for="message">Pesan</label>
          <div class="form-wrapper">
               <textarea name="message" id="message" placeholder="Pesan..."></textarea>
          </div>
     </div>
     
     <button type="submit" class="btn-send">
          Kirim Pesan
     </button>
</form>
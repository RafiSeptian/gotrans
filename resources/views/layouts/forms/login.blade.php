<form action="{{ route('login') }}" method="post">
     {{ csrf_field() }}
     <div class="group-form">
          <label for="text">Username</label>
          <div class="form-wrapper">
               <input type="text" name="username" id="username">
          </div>
     </div>
     <div class="group-form">
          <label for="password">Password</label>
          <div class="form-wrapper">
               <input type="password" name="password" id="password">
          </div>
     </div>

     <div class="forgot-pass">
          <a href="#">Lupa Password ?</a>
     </div>

     <div class="sign-up">
          <a href="{{ route('register.show') }}" id="sign-up">Belum punya akun ?</a>
     </div>

     <button type="submit" class="btn-modal bgr-primary">
          Login
     </button>
</form>
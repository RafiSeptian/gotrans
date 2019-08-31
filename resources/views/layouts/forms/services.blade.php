<form action="{{ route('services.update', $user->services->id) }}" method="POST" class="form-services">

          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <div class="group-form">
               <h3 class="title">
                    Jurusan
               </h3>
               <div class="form-wrapper">
                    <input type="text" name="major" id="major" value="{{ $user->services->major }}">
               </div>
          </div>
          <button type="submit" class="btn-link p-left">
               Simpan
          </button>

     </form>
<form action="{{ route('driver.post') }}" method="POST" id="changerole" enctype="multipart/form-data">
     {{ csrf_field() }}

     
     <div class="group-form">
          <label for="transportation_id">Jenis Transportasi</label>
          <div class="form-wrapper">
               <select name="transportation_id" id="transportation_id">
                    <option value="" selected>
                         Pilih Jenis Transportasi
                    </option>
                    @foreach (\App\Transportation::all() as $data)
                         <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
               </select>
          </div>
     </div>

     <div class="group-form">
          <label for="major">Jurusan Transportasi</label>
          <div class="form-wrapper">
               <input type="text" name="major" id="major">
          </div>
     </div>

     <div class="group-form">
          <label for="plat_nomor">Plat Nomor Kendaraan</label>
          <div class="form-wrapper">
               <input type="text" name="plat_nomor" id="plat_nomor">
          </div>
     </div>

     <div class="group-form">
          <label for="merk">Merk Kendaraan</label>
          <div class="form-wrapper">
               <input type="text" name="merk" id="merk">
          </div>
     </div>

     <div class="group-form">
          <label for="ktp">Foto KTP</label>
          <div class="form-wrapper">
               <input type="file" name="ktp" id="ktp">
          </div>
     </div>

     <div class="group-form">
          <label for="sim">Foto SIM</label>
          <div class="form-wrapper">
               <input type="file" name="sim" id="sim">
          </div>
     </div>

     <div class="group-form">
          <label for="stnk">Foto STNK</label>
          <div class="form-wrapper">
               <input type="file" name="stnk" id="stnk">
          </div>
     </div>

     <div class="group-form">
          <label for="bpkb">Foto BPKB</label>
          <div class="form-wrapper">
               <input type="file" name="bpkb" id="bpkb">
          </div>
     </div>

     <div class="group-form">
          <label for="foto_kendaraan">Foto Kendaraan</label>
          <div class="form-wrapper">
               <input type="file" name="foto_kendaraan" id="foto_kendaraan">
          </div>
     </div>

     <button type="submit" class="btn-link p-right">
          Daftar
     </button>
</form>
     {{-- 
          Jenis kendaraan (matic, manual, kopling)
          KTP, SIM, STNK, BPKB, Foto kendaraan, Plat nomor, Merk kendaraan
     --}}
<form action="{{ route('order.store') }}" method="post" class="form-order">
    {{csrf_field()}}
    <div class="left">
        <div class="group-form">
            <i class="fa fa-map-marker"></i>
            <label for="location_now">
                Lokasi Sekarang
            </label>
            <div class="form-wrapper">
                <input type="text" name="location_now" id="location_now"
                    placeholder="Contoh: Jln.Arief Rahman Hakim no.35">
            </div>
        </div>
        <div class="group-form">
            <i class="fa fa-map-marker"></i>
            <label for="location_target">
                Tujuan
            </label>
            <div class="form-wrapper">
                <input type="text" name="location_target" id="location_target"
                    placeholder="Contoh: Jln.Arief Rahman Hakim no.35">
            </div>
        </div>
    </div>

    <div class="right">
        <div class="group-form">
            <i class="fa fa-car"></i>
            <label for="transportation_id">
                Pilih Kendaraan
            </label>
            <div class="form-wrapper">
                    <select name="transportation_id" id="transportation_id">
                        <option value="">Pilih Kendaraan</option>
                        @foreach (\App\Transportation::all() as $data)
                            <option value="{{ $data->id }}">{{$data->name}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="group-form">
            <i class="fa fa-users"></i>
            <label for="from">
                Jumlah Penumpang
            </label>
            <div class="double-form-input">
                <div class="group-form">
                    <div class="form-wrapper">
                        <input type="number" name="adult_passenger" id="adult_passenger" placeholder="Dewasa">
                    </div>
                </div>
                <div class="group-form">
                    <div class="form-wrapper">
                        <input type="number" name="children_passenger" id="children_passenger" placeholder="Anak">
                    </div>
                </div>
            </div>
        </div>
        <a href="#">
            <button class="btn-start order" id="order">
                <i class="fas fa-ticket-alt"></i> Pesan
            </button>
        </a>
    </div>
</form>
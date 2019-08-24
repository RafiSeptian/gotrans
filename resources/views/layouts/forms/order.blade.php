<form action="#" method="post" class="form-order">
    <div class="left">
        <div class="group-form">
            <i class="fa fa-map-marker"></i>
            <label for="from">
                Lokasi Sekarang
            </label>
            <div class="form-wrapper">
                <input type="text" name="from" id="from"
                    placeholder="Contoh: Jln.Arief Rahman Hakim no.35">
            </div>
        </div>
        <div class="group-form">
            <i class="fa fa-map-marker"></i>
            <label for="from">
                Tujuan
            </label>
            <div class="form-wrapper">
                <input type="text" name="from" id="from"
                    placeholder="Contoh: Jln.Arief Rahman Hakim no.35">
            </div>
        </div>
    </div>

    <div class="right">
        <div class="group-form">
            <i class="fa fa-car"></i>
            <label for="from">
                Pilih Kendaraan
            </label>
            <div class="form-wrapper">
                <input type="text" name="from" id="from" placeholder="Angkot">
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
                        <input type="number" name="adult" id="adult" placeholder="Dewasa">
                    </div>
                </div>
                <div class="group-form">
                    <div class="form-wrapper">
                        <input type="number" name="children" id="children" placeholder="Anak">
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
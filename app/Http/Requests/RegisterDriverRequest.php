<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transportation_id' => 'required',
            'major' => 'required|max:255',
            'plat_nomor' => 'required|max:255|unique:detail_drivers',
            'merk' => 'required',
            'ktp' => 'required|mimes:jpg,jpeg,png',
            'sim' => 'required|mimes:jpg,jpeg,png',
            'stnk' => 'required|mimes:jpg,jpeg,png',
            'bpkb' => 'required|mimes:jpg,jpeg,png',
            'foto_kendaraan' => 'required|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'transportation_id.required' => 'Jenis Kendaraan Harus Ada !',
            'major.required' => 'Kolom Jurusan Harus Diisi !',
            'plat_nomor.required' => 'Kolom Plat Nomor Harus Diisi !',
            'plat_nomor.unique' => 'Plat Nomor ini telah terdaftar, harap masukkan Plat Nomor lain !',
            'merk.required' => 'Kolom Merk Kendaraan Harus Diisi !',
            'ktp.required' => 'Harap untuk mencantumkan KTP !',
            'ktp.mimes' => 'Format gambar harus JPG, JPEG, atau PNG',
            'sim.required' => 'Harap untuk mencantumkan SIM !',
            'sim.mimes' => 'Format gambar harus JPG, JPEG, atau PNG',
            'stnk.required' => 'Harap untuk mencantumkan STNK !',
            'stnk.mimes' => 'Format gambar harus JPG, JPEG, atau PNG',
            'bpkb.required' => 'Harap untuk mencantumkan BPKB !',
            'bpkb.mimes' => 'Format gambar harus JPG, JPEG, atau PNG',
            'foto_kendaraan.required' => 'Harap untuk mencantumkan Foto Kendaraan !',
            'foto_kendaraan.mimes' => 'Format gambar harus JPG, JPEG, atau PNG',
        ];
    }
}

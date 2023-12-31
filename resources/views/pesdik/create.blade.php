@extends('layouts.master')

@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="callout callout-success alert alert-success alert-dismissible fade show" role="alert">
            <h5><i class="fas fa-check"></i> Sukses :</h5>
            {{session('sukses')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('warning'))
        <div class="callout callout-warning alert alert-warning alert-dismissible fade show" role="alert">
            <h5><i class="fas fa-info"></i> Informasi :</h5>
            {{session('warning')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="callout callout-danger alert alert-danger alert-dismissible fade show">
            <h5><i class="fas fa-exclamation-triangle"></i> Peringatan :</h5>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="/pesdik/tambah" method="POST" enctype="multipart/form-data">
            <h4><i class="nav-icon fas fa-child my-1 btn-sm-1"></i> Tambah Data Peserta Didik</h4>
            <hr>
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label for="nama">Nama Siswa</label>
                    <input value="{{old('nama')}}" name="nama" type="text" class="form-control" id="nama" placeholder="Nama Siswa" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control my-1 mr-sm-1 bg-light" id="jenis_kelamin" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="nisn">NISN</label>
                    <input value="{{old('nisn')}}" name="nisn" type="number" class="form-control" id="nisn" placeholder="NISN" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="induk">Induk</label>
                    <input value="{{old('induk')}}" name="induk" type="number" class="form-control" id="induk" placeholder="Induk" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="kelas">Kelas</label>
                    <input value="{{old('kelas')}}" name="kelas" type="text" class="form-control" id="kelas" placeholder="Kelas" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="tapel">Tapel</label>
                    <input value="{{old('tapel')}}" name="tapel" type="text" class="form-control" id="tapel" placeholder="Tapel" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                   
                    <label for="bank_untuk_pip">Bank Untuk PIP</label>
                    <input value="{{old('bank_untuk_pip')}}" name="bank_untuk_pip" type="text" class="form-control" id="bank_untuk_pip" placeholder="Bank Untuk PIP" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="kontak">NO Telpon</label>
                    <input value="{{old('kontak')}}" name="kontak" type="number" class="form-control" id="kontak" placeholder="nomer telpon" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <!-- <label for="kontak">Nomer HP</label>
                    <input value="{{old('kontak')}}" name="kontak" type="number" class="form-control" id="kontak" placeholder="Nomer HP" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')"> -->
                </div>
                <div class="col-md-6">
                    {{-- <label for="data_ayah_kandung">Nama Ayah Kandung</label>
                    <select name="data_ayah_kandung" class="form-control my-1 mr-sm-2 bg-light" id="data_ayah_kandung"  oninput="setCustomValidity('')">
                        <option value="">-- Pilih Nama Ayah Kandung --</option>
                        @foreach($data_ayah as $ayah)
                        <option value="{{$ayah->id}}"> {{$ayah->nama}}
                        </option>
                        @endforeach
                    </select> --}}
                    <label for="data_ayah_kandung">Nama Ayah</label>
                    <input value="{{old('data_ayah_kandung')}}" name="data_ayah_kandung" type="text" class="form-control" id="data_ayah_kandung" placeholder="Nama Ayah" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="data_ibu_kandung">Nama Ibu</label>
                    <input value="{{old('data_ibu_kandung')}}" name="data_ibu_kandung" type="text" class="form-control" id="data_ibu_kandung" placeholder="Nama Ibu" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="data_wali_murid">Nama Wali</label>
                    <input value="{{old('data_wali_murid')}}" name="data_wali_murid" type="text" class="form-control" id="data_wali_murid" placeholder="Nama Wali" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    {{-- <label for="data_ibu_kandung">Nama Ibu Kandung</label>
                    <select name="data_ibu_kandung" class="form-control my-1 mr-sm-2 bg-light" id="data_ibu_kandung"  oninput="setCustomValidity('')">
                        <option value="">-- Pilih Nama Ibu Kandung --</option>
                        @foreach($ibu as $ibui)
                        <option value="{{$ibui->id}}"> {{$ibui->nama}}
                        </option>
                        @endforeach
                    </select> --}}
                    {{-- <label for="data_wali_murid">Nama Wali</label>
                    <select name="data_wali_murid" class="form-control my-1 mr-sm-2 bg-light" id="data_wali_murid" oninput="setCustomValidity('')">
                        <option value="">-- Pilih Nama Wali --</option>
                        @foreach($data_wali as $wali)
                        <option value="{{$wali->id}}"> {{$wali->nama}}
                        </option>
                        @endforeach
                    </select> --}}
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input value="{{old('tempat_lahir')}}" name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input value="{{old('tanggal_lahir')}}" name="tanggal_lahir" type="date" class="form-control bg-light" id="tanggal_lahir" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="jenis_pendaftaran">Jenis Pendaftaran</label>
                    <select name="jenis_pendaftaran" class="form-control my-1 mr-sm-1 bg-light" id="jenis_pendaftaran" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                        <option value="">-- Pilih Jenis Pendaftaran --</option>
                        <option value="Siswa Baru">Siswa Baru</option>
                        <option value="Pindahan">Pindahan</option>
                    </select>
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input value="{{old('tanggal_masuk')}}" name="tanggal_masuk" type="date" class="form-control bg-light" id="tanggal_masuk" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPAN</button>
            <a class="btn btn-danger btn-sm" href="index" role="button"><i class="fas fa-undo"></i> BATAL</a>
        </form>
    </div>
</section>
@endsection
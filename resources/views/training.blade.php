@extends('layouts.index')
@section('content')
<div class="content">

    <!-- Wizard with validation -->
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">PENGAJUAN PERSETUJUAN VISA</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <form class="steps-validation" action="{{route('submit')}}" method="POST">
            @csrf
            <h6>Ketentuan</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Saya sebagai penjamin menyatakan: </label> <br>
                            <label>1. Bahwa data dan/atau dokumen/surat yang dilampirkan sebagai persyaratan dalam permohonan ini adalah benar isinya baik formil maupun materilnya;</label>
                            <label>2. Bahwa yang bersangkutan (orang asing) yang saya jamin selama berada di Indonesia tidak melakukan kegiatan yang berbahaya atau diduga akan berbahaya bagi keamanan dan ketertiban umum atau melanggar peraturan perundang-undangan yang berlaku;</label>
                            <label>3. Bahwa yang bersangkutan (orang asing) yang saya jamin tidak akan menyalahgunakan izin keimigrasian yang diberikan;</label>
                            <label>4. Atas semua biaya yang berkaitan dengan pemulangan/deportasi yang bersangkutan keluar wilayah Indonesia;</label>
                            <label>5. Bahwa apabila saya tidak melaksanakan kewajiban sebagaimana tersebut di atas, bersedia diproses sesuai ketentuan yang berlaku dan saya dan/atau perusahaan bersedia dikenakan sanksi administratif berupa tidak bisa menjadi penjamin/kuasa penjamin keberadaan dan kegiatan orang asing di Indonesia.</label>
                            <label>6. Bahwa apabila saya memberikan surat/data palsu/dipalsukan/keterangan yang tidak benar untuk memperoleh visa atau izin tinggal bagi dirinya atau orang lain maka saya telah melanggar Pasal 123 Huruf A UU No. 6 Tahun 2011 tentang keimigrasian dan bersedia diancam pidana maksimal 5 tahun penjara atau denda maksimal Rp 500.000.000,-;</label>
                            <label>7. Saya mengetahui ketentuan bahwa biaya PNBP kawat Persetujuan Visa yang telah dibayarkan tidak dapat ditarik kembali apabila terjadi penolakan terhadap permohonan Persetujuan Visa.</label>
                        </div>
                    </div>
                </div>

            </fieldset>

            <h6>Jenis Permohonan</h6>
            <fieldset class="content-group">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label col-lg-3">Kantor Permohonan Visa  <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <select class="select-search" name="office">
                                    <option value="DIREKTORAT JENDERAL IMIGRASI (SUBDIT VISA)">DIREKTORAT JENDERAL IMIGRASI (SUBDIT VISA)</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Jenis Layanan  <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <select class="select-search visa_type" id="visa_type" name="visa_type" required="required">
                                    <option value="">-- PILIH SALAH SATU --</option>
                                    @foreach ($visa_type as $v)
                                    <option value="{{$v->id}}">{{$v->visa_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Maksud Kedatangan/Tujuan  <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <select class="select-search visa_purpose" id="visa_purpose" name="purpose" required="required">
                                    <option value="0">-- PILIH SALAH SATU --</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3"></label>
                            <div class="col-lg-9">
                                <select class="select-search" id="subpurpose" name="sub_purpose" required="required">
                                    <option value="0">-- PILIH SALAH SATU --</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Indeks</label>
                            <div class="col-lg-9">
                                <button  class="form-control" disabled><p id="visa_code" style="float: left;"></p></button>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Lokasi Orang Asing Saat Ini <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <label class="radio-inline">
                                    <input type="radio" name="location" value="Di Wilayah Indonesia" class="styled" required="required">
                                    Di Wilayah Indonesia
                                </label>
        
                                <label class="radio-inline">
                                    <input type="radio" name="location" value="Di Luar Wilayah Indonesia" class="styled">
                                    Di Luar Wilayah Indonesia
                                </label>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Jenis Pembayaran <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <label class="radio-inline">
                                    <input type="radio" name="payment" value="Berbayar" class="styled" required="required">
                                    Berbayar
                                </label>
        
                                <label class="radio-inline">
                                    <input type="radio" name="payment" value="Berbayar" class="styled">
                                    Bebas Bea
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                

            </fieldset>

            <h6>Data Orang Asing</h6>
            <fieldset class="content-group">
                <div class="row">
                    <div class="col-md-6">
                        <legend class="text-bold">INFORMASI PRIBADI</legend>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Depan <span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="first_name" required="required">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Belakang </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="last_name" >
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tempat Lahir <span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="pob" required="required">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tanggal Lahir <span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="dob" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Jenis Kelamin <span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" class="styled" value="Pria" required>
                                    Pria
                                </label>
        
                                <label class="radio-inline">
                                    <input type="radio" name="sex" class="styled" value="Wanita">
                                    Wanita
                                </label>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Kebangsaan<span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <select class="select-search" name="nationality" required>
                                    <option value="">-- SILAKAN PILIH --</option>
                                    @foreach ($country as $c)
                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Status Sipil<span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <select name="marital" class="select-search" required>
                                    <option value="">-- SILAKAN PILIH --</option>
                                    <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                    <option value="MENIKAH">MENIKAH</option>
                                    <option value="JANDA">JANDA</option>
                                    <option value="DUDA">DUDA</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Profesi<span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <select name="profession" class="select-search" required>
                                    <option value="">-- SILAKAN PILIH --</option>
                                    <option value="ADMINISTRATIF">ADMINISTRATIF</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Email <span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Telepon <span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <input type="text" name="telpon" class="form-control" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Handphone <span class="text-danger">*   :</span></label>
                            <div class="col-lg-10">
                                <input type="text" name="handphone" class="form-control" required>
                            </div>
                        </div>
                        <br><br>

                    </div>
                    <div class="col-md-6">
                        <legend class="text-bold">DOKUMEN PERJALANAN</legend>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Jenis Dokumen Perjalanan <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <label class="radio-inline">
                                    <input type="radio" name="document_type" class="styled" value="Passport" required>
                                    Passport
                                </label>
        
                                <label class="radio-inline">
                                    <input type="radio" name="document_type" class="styled" value="Dokumen Perjalanan Lainnya">
                                    Dokumen Perjalanan Lainnya
                                </label>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">No Dokumen Perjalanan <span class="text-danger">*   :</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="document_no" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Tanggal Dikeluarkan <span class="text-danger">*   :</label>
                            <div class="col-lg-9">
                                <input type="date" class="form-control" name="issued" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Berlaku s.d <span class="text-danger">*   :</label>
                            <div class="col-lg-9">
                                <input type="date" class="form-control" name="expired" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Dikeluarkan di <span class="text-danger">*   :</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="authority" required>
                            </div>
                        </div>
                        <br><br>
                 
                        <legend class="text-bold">ALAMAT TINGGAL DI INDONESIA</legend>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Alamat <span class="text-danger">*   :</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Provinsi<span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <select name="province" class="select-search province" required>
                                    <option value="">-- SILAKAN PILIH --</option>
                                    @foreach ($provinces as $p)
                                    <option value="{{$p->prov_id}}">{{$p->prov_name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Kota/Kabupaten<span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <select name="district" class="select-search district" id="cities" required>
                                    <option value="">-- SILAKAN PILIH --</option>

                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Kecamatan<span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <select name="sub_district" class="select-search" id="district" required>
                                    <option value="">-- SILAKAN PILIH --</option>

                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Kantor Imigrasi Tujuan<span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                -
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Kode Pos <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <br><br>
                        <legend class="text-bold">INFORMASI TAMBAHAN</legend>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Izin Tinggal Terakhir Berlaku s.d <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="valid_until" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">No Register Izin Tinggal Terakhir <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="register_no" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Deskripsi kegiatan yang akan dilaksanakan oleh Orang Asing <span class="text-danger">*   :</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-10">Apakah Orang Asing yang akan Anda jamin pernah dideportasi dari Indonesia? <span class="text-danger">*   :</span></label>
                            <div class="col-lg-2" style="width: 200px">
                                <label class="radio-inline">
                                    <input type="radio" name="is_deported" class="styled" value="Ya" required>
                                    Ya
                                </label>
        
                                <label class="radio-inline">
                                    <input type="radio" name="is_deported" class="styled" value="Tidak">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-10">Apakah Orang Asing yang akan Anda jamin pernah melebihi izin tinggal yang diberikan di Indonesia? <span class="text-danger">*   :</span></label>

                            <div class="col-lg-2" style="width: 200px">
                                <label class="radio-inline">
                                    <input type="radio" name="is_overstay" class="styled" value="Ya" required>
                                    Ya
                                </label>
        
                                <label class="radio-inline">
                                    <input type="radio" name="is_overstay" value="Tidak" class="styled">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </fieldset>

            <h6>Data Penjamin</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <legend class="text-bold">INFO PERUSAHAAN (SESUAI DENGAN AKTE PERUSAHAAN)</legend>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Jenis Korporasi / Badan Usaha / Organisasi <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                PENANAMAN MODAL ASING (PMA)
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Bidang Usaha <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                PERDAGANGAN BESAR DAN ECERAN; REPARASI DAN PERAWAT
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Nama Korporasi / Badan Usaha / Organisasi <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                PT ECOMMERCE BALI PROFESSIONAL
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">NPWP <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                95.834.505.0-906.000
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">SIUP <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                0220805940641
                            </div>
                        </div>
                        <br>     
                        
                        <legend class="text-bold">AKUN</legend>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Email <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                ecommercebali20@gmail.com
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Telepon <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                08197873379
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Handphone <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                08197873379
                            </div>
                        </div>
                        <br>  
                        <div class="form-group">
                            <label class="control-label col-lg-4">Fax <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                0
                            </div>
                        </div>
                        <br>                          
                    </div>

                    <div class="col-md-6" >
                        <legend class="text-bold">IDENTITAS PIMPINAN</legend>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Nama Pimpinan <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                TRI TONCE YUSAK WIBAWA
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">No Identitas (NIK / PASPOR / KITAS / KITAP) <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                5103010609870002
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Tanggal Dikeluarkan <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                06-06-2019
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Berlaku s.d <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                06-06-2039
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Dikeluarkan di <span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                BADUNG
                            </div>
                        </div>
                        <br>

                        <legend class="text-bold">ALAMAT PERUSAHAAN</legend>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Alamat<span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                JALAN MERTANADI 86 E, BADUNG
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Provinsi<span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                BALI
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Kota / Kabupaten<span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                BADUNG
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Kecamatan<span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                KUTA UTARA
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Kode Pos<span class="text-danger">*   :</span></label>
                            <div class="col-lg-8">
                                80361
                            </div>
                        </div>
                        <br>
                        
                    
                </div>



                </div>
            </fieldset>

            <h6>Dokumen Pendukung</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <legend class="text-bold">KATEGORI DOKUMEN UTAMA</legend>
                        <div class="form-group">
                            <a onclick="Surat()">SURAT PERMOHONAN DAN JAMINAN (BAGI KORPORASI DITANDATANGANI OLEH DIREKSI/KOMISARIS/PIMPINAN) DIATAS MATERAI</a>
                            <br><br>
                            <a onclick="Sampul()">SAMPUL PASPOR</a>
                        </div>
                        <br>

                    </div>
                    <div class="col-md-8">
                        <legend class="text-bold">DOKUMEN</legend>

                        <div class="form-group" id="surat" style="display: none;">
                            <span>SURAT PERMOHONAN DAN JAMINAN (BAGI KORPORASI DITANDATANGANI OLEH DIREKSI/KOMISARIS/PIMPINAN) DIATAS MATERAI</span>
                            <br><br>
                            <div class="col-lg-10">
                                <input type="file" class="file-input-custom" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group" id="sampul" style="display: none;">
                            <span>SAMPUL PASPOR</span>
                            <br><br>
                            <div class="col-lg-10">
                                <input type="file" class="file-input-custom" accept="image/*">
                            </div>
                        </div>


                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    <!-- /wizard with validation -->

    <!-- Footer -->
    <div class="footer text-muted">
        &copy; {{date('Y')}}. <a href="#">Visa Online</a> by <a href="https://balivisas.com" target="_blank">Balivisas</a>
    </div>
    <!-- /footer -->

</div>

<script>
function Surat(){
  var x = document.getElementById("surat");
  if (x.style.display === "none") {
    x.style.display = "block";
  } 
}

function Sampul(){
  var x = document.getElementById("sampul");
  if (x.style.display === "none") {
    x.style.display = "block";
  } 
}
</script>
<script>
    $(document).ready(function(){
        $(document).on('change','.province', function(){
            var cat_id = $(this).val();
            var op="";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findCity')!!}',
                data:{'id':cat_id},
                success:function(data){
                    // console.log(data);
                    op+='<option value="0" selected disabled >-- PILIH SALAH SATU --</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        op+='<option value="'+data[i].city_id+'">'+data[i].city_name+' </option> ';
                    }
                    document.getElementById("cities").innerHTML = op;

                }
            });
        });

        $(document).on('change','.district',function(){
            var cat_id = $(this).val();
            var op="";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findDistrict')!!}',
                data:{'id':cat_id},
                success:function(data){
                    // console.log(data);
                    op+='<option value="0" selected disabled >-- PILIH SALAH SATU --</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        op+='<option value="'+data[i].dis_id+'">'+data[i].dis_name+' </option> ';
                    }
                    document.getElementById("district").innerHTML = op;

                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.visa_type',function(){
            // console.log("change");

            var cat_id =  $(this).val();
            // console.log(cat_id);
            // var div = $(this).parent();
            var op =" ";
            // const code =["211"];

            $.ajax({
                type:'get',
                url:'{!!URL::to('findPurpose')!!}',
                data:{'id':cat_id},
                success:function(data){
                    // console.log('success');
                    // console.log(data.length);

                    op+='<option value="0" selected disabled >-- PILIH SALAH SATU --</option>';
                    for(var i=0; i<data.length;i++)
                    {
                        op+='<option value="'+data[i].visa_code+'">'+data[i].purpose+' </option> ';
                        
                    }
                    // div.find('.visa_purpose').html(" ");
                    // div.find('.visa_purpose').append(op);
                    

                    document.getElementById("visa_purpose").innerHTML = op;
                    // document.getElementById("visa_code").innerHTML = code; 
                        // console.log(code);



                },
                error:function(){
                    
                }
            });
        });

        $(document).on('change','.visa_purpose',function(){
            var cat_id = $(this).val();
            // console.log(cat_id);
            var op ="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findSubPurpose')!!}',
                data:{'id':cat_id},
                success:function(data){
                    // console.log(data.length);
                    op+='<option value="0" selected disabled >-- PILIH SALAH SATU --</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        op+='<option value="'+data[i].sub_purpose+'">'+data[i].sub_purpose+'</option> '
                    }
                    document.getElementById("subpurpose").innerHTML = op;
                    document.getElementById("visa_code").innerHTML = cat_id; 

                }
            });
        });
    });
</script>
<script>
    // Show form
    var form = $(".steps-validation").show();


    // Initialize wizard
    $(".steps-validation").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="number">#index#</span> #title#',
        autoFocus: true,
        onStepChanging: function (event, currentIndex, newIndex) {

            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }

            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }

            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {

                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },

        onStepChanged: function (event, currentIndex, priorIndex) {

            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                form.steps("next");
            }

            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },

        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },

        onFinished: function (event, currentIndex) {
            // alert("sss!");
            form.submit();
        }
    });


    // Initialize validation
    $(".steps-validation").validate({
        ignore: 'input[type=hidden], .select2-input',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function(error, element) {
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            email: {
                email: true
            }
        }
    });
</script>
@endsection
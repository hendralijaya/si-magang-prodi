@extends('partials.main')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/test.css') }}">
@endsection

@section('container')
<div id="overlay" style="background-image:url(../pradita.png); background-size:cover; height: 100vh; width: 100vw">
    <div class="group-introduction" style="display: flex; justify-content: center; align-items:center; color:white; height: 100%; padding: 0; margin: 0;">
        <div class="detail-intro" style="font-weight: bold; border-radius: 10px; background-color:rgba(251, 251, 251, 0.127) ; box-shadow: 0px 8px 8px rgba(0, 0, 0, 1); " >
            <h5 style="text-align: center;">Kelompok 1</h5>
            <ol style="line-height: 40px; text-align: center;">
                <li>Bryan Elmer Purnomo - 2110101004</li>
                <li>David Eri Nugroho  - 2110101010</li>
                <li>Hendra Lijaya - 2110101023</li>
                <li>Yogi Valentino Nadeak - 2110101033</li>
                <li>Yohannes Linandy - 2110101034</li>
            </ol>
        </div>

    </div>
</div>

<div class="container">
    <div class="Mangang" style="margin-top: 20px">

        <h2> Tentang SI Magang Prodi </h2>
        <p>
            Halo semua! <br>
            Selamat datang di Website SI magang Prodi disini kalian dapat melihat progress atau pekerjaan magang kalian disini,
            Jika kalian tidak tau apa itu Sistem Informasi Magang dan kegunaan aplikasi ini, tenang hal itu akan dijelaskan.
        </p>

        <br>

        <h5> Apa itu Sistem Informasi Magang? </h5>
        <p>
            Sistem Informasi Magang adalah aplikasi magang yang sedang kita kerjakan dengan berbasis website.
            Di aplikasi ini kita membuat sebuah website untuk bisa mengakses data mahasiswa yang sedang melakukan kerja
            magang di sebuah perusahan yang telah di apply.
            Yang kemudian, mahasiswa yang sudah kerja di perusahan harus membuat
            sebuah laporan magang dan dosen pembimbing dapat
            memberi sebuah nilai ke mahasiswa melalui aplikasi Sistem Informasi magang ini.
        </p>

        <br>

        <h5> Apa kegunaan aplikasi website Sistem Informasi Magang? </h5>
        <p>
            Kegunaan aplikasi website ini belim ditentukan pasti akan tetapi ada beberapa yang sudah dicoba
            yang kegunaannya seperti ini:
        </p>
        <ol>
            <li> Mahasiswa dapat submit laporan di aplikasi ini dengan mudah. </li>
            <li> Mahasiswa dapat melihat hasil kerja magang. </li>
            <li> Mahasiswa dapat menulis buku aktivitas harian kerja praktek. </li>
            <li> Dosen dapat mencari mahasiswa dengan mudah. </li>
            <li> Dosen dapat menilai mahasiswa melalui aplikasi magang </li>
            <li> Kampus dapat memfilter mahasiswa yang memiliki perusahan maupun yang belum </li>
            <li> Kampus dapat mengirim informasi ke mahasiswa dengan mudah </li>
        </ol>

        <br>

        <br>
        </div>
    </div>
</div>

@endsection

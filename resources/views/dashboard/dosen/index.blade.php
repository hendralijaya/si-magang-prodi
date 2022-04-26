@extends('partials.main')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/test.css') }}">
@endsection

@section('container')

<div class="container">
    <div class="image">
    <img src="Pradita.png" alt="Pradita" />
    <div class="overlay" />
    </div>

      <div class="kelompok">
      <p> Kelompok 1 </p>
      <p> 1. Bryan Elmer Purnomo </p>
      <p> 2. David Eri Nugroho </p>
      <p> 3. Hendra Lijaya </p>
      <p> 4. Yogi Valentino Nadeak </p>
      <p> 5. Yohannes Linandy </p>
      </div>

  <p> </p>

  <div class="Mangang">

  <h2> Tentang SI Magang Prodi </h2>

  <p> 
  Halo semua selamat datang di Website SI magang Prodi disini kalian dapat melihat progress atau pekerjaan magang kalian disni,  
  Jika kalian tidak tau apa itu Sistem Informasi Magang dan kegunaan aplikasi ini, tenang hal itu akan dijelaskan. 
  </p>
  
  <h5> Apa itu Sistem Informasi Magang? </h5>

  Sistem Informasi Magang adalah aplikasi magang yang sedang kita kerjakan dengan berbasis website.
  Di aplikasi ini kita membuat sebuah website untuk bisa mengakses data mahasiswa yang sedang melakukan kerja
  magang di sebuah perusahan yang telah di apply.
  Yang kemudian, mahasiswa yang sudah kerja di perusahan harus membuat
  sebuah laporan magang dan dosen pembimbing dapat
  memberi sebuah nilai ke mahasiswa melalui aplikasi Sistem Informasi magang ini. 

  <h5> Apa kegunaan aplikasi website Sistem Informasi Magang? </h5>

  Kegunaan aplikasi website ini belim ditentukan pasti akan tetapi ada beberapa yang sudah dicoba
  yang kegunaannya seperti ini:
  <ol>
    <li> Mahasiswa dapat submit laporan di aplikasi ini dengan mudah. </li>
    <li> Mahasiswa dapat melihat hasil kerja magang. </li>
    <li> Mahasiswa dapat menulis buku aktivitas harian kerja praktek. </li>
    <li> Dosen dapat mencari mahasiswa dengan mudah. </li>
    <li> Dosen dapat menilai mahasiswa melalui aplikasi magang </li>
    <li> Kampus dapat memfilter mahasiswa yang memiliki perusahan maupun yang belum </li>
    <li> Kampus dapat mengirim informasi ke mahasiswa dengan mudah </li>
  </ol>

  </div>
  </main>
@endsection
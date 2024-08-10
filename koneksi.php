<?php
    $sambung = mysqli_connect("localhost","root","","dbbutatijahit");
    $sql = "select id, judul, deskrip, logo from tblheader";
    $hasil = mysqli_query($sambung, $sql);
    $row = mysqli_fetch_array($hasil);
    $judul1 = $row['judul'];
    $deskrip1 = $row['deskrip'];
    $logo1 = $row['logo'];

    $sambung = mysqli_connect("localhost","root","","dbbutatijahit");
    $sql = "select id, profil, nama, deskrip from tblprofil";
    $hasil = mysqli_query($sambung, $sql);
    $row = mysqli_fetch_array($hasil);
    $profil2 = $row['profil'];
    $nama2 = $row['nama'];
    $deskrip2 = $row['deskrip'];
    
    $sambung = mysqli_connect("localhost","root","","dbbutatijahit");
    $sql = "select id, judul, profil, nama, deskrip from tblteam";
    $hasil = mysqli_query($sambung, $sql);
    $row = mysqli_fetch_array($hasil);
    $judul3 = $row['judul'];
    $profil3 = $row['profil'];
    $nama3 = $row['nama'];
    $deskrip3 = $row['deskrip'];

    $sambung = mysqli_connect("localhost","root","","dbbutatijahit");
    $sql = "select id, judul, subjudul, deskrip from tblcarapesan";
    $hasil = mysqli_query($sambung, $sql);
    $row = mysqli_fetch_array($hasil);
    $judul4 = $row['judul'];
    $subjudul4 = $row['subjudul'];
    $deskrip4 = $row['deskrip'];

    $sambung = mysqli_connect("localhost","root","","dbbutatijahit");
    $sql = "select id, judul, gambar, deskrip from tblproduksi";
    $hasil = mysqli_query($sambung, $sql);
    $row = mysqli_fetch_array($hasil);
    $judul5 = $row['judul'];
    $gambar5 = $row['gambar'];
    $deskrip5 = $row['deskrip'];

    $sambung = mysqli_connect("localhost","root","","dbbutatijahit");
    $sql = "select id, konten1, konten2, konten3, konten4, konten5 from tbl_privacypolicy";
    $hasil = mysqli_query($sambung, $sql);
    $row = mysqli_fetch_array($hasil);
    $konten1 = $row['konten1'];
    $konten2 = $row['konten2'];
    $konten3 = $row['konten3'];
    $konten4 = $row['konten4'];
    $konten5 = $row['konten5'];
?>
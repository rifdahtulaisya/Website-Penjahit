<style>
    .footer {
        background-color: #617f46;
        color: #fff;
        padding: 20px;
        font-size: 14px;
        display: flex;
        flex-direction: column;
    }
    .footer-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 50px;
        padding-top: 20px;
        flex-wrap: wrap; /* Menambahkan flex-wrap untuk responsivitas */
    }
    .footer-bottom {
        padding-bottom: 30px;
    }
    .footer-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px; /* Menambahkan margin-bottom untuk ruang antar bagian */
    }
    .footer-logo img {
        width: 100%; /* Menggunakan 100% untuk memastikan responsivitas */
        max-width: 200px; /* Batas maksimum ukuran logo */
    }
    .footer-contact a, .footer-about a, .footer-about p {
        color: #fff;
        text-decoration: none;
        margin: 5px 0;
    }
    .social-links a {
        display: inline-block;
        margin-right: 10px;
    }
    .footer-bottom {
        display: flex;
        justify-content: space-between;
        width: 100%;
        flex-wrap: wrap; /* Menambahkan flex-wrap untuk responsivitas */
    }
    .modal-trigger-image {
        width: 100%; /* Atur lebar 100% untuk responsivitas */
        max-width: 200px; /* Batas maksimum ukuran */
        height: auto; /* Menjaga rasio aspek gambar */
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    .modal-dialog .modal-content .modal-body img.modal-product-image {
        max-width: 100%; /* Menurunkan ukuran maksimum gambar menjadi 100% untuk responsivitas */
        height: auto; /* Memastikan rasio aspek tetap */
        display: block; /* Memastikan gambar tampil sebagai blok */
        margin: 10px auto; /* Mempusatkan gambar dan memberikan sedikit ruang di atas dan bawah */
    }
    .modal-product-image {
        margin-top: 20px; /* Memberikan ruang antara teks detail dan gambar */
    }
    .h2-black {
        color: black;
    }
    .content {
        max-width: 100%; /* Menggunakan 100% untuk responsivitas */
        margin: auto;
        padding: 20px;
        border: 1px solid #dedede;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    table {
        width: 100%;
        margin-top: 20px;
    }
    td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }
    .text-black:hover {
        color: #0056b3; /* Warna saat hover */
    }
    .search {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        flex-wrap: wrap; /* Menambahkan flex-wrap untuk responsivitas */
    }
    .search-input {
        width: 100%; /* Menggunakan 100% untuk responsivitas */
        max-width: 300px; /* Batas maksimum lebar */
        padding: 10px;
        color: white;
        font-size: 16px;
        border-radius: 20px;
        border: 1px solid #617f46;
        background-color: #617f46;
        outline: none;
    }
    .search-input::placeholder {
        color: #dbdddf; /* Warna placeholder */
        opacity: 1; /* Pastikan teks placeholder terlihat jelas */
    }
    .search-button {
        padding: 5px 10px;
        margin-left: 0px;
        border: none;
        color: #617f46;
        font-size: 16px;
        cursor: pointer;
        border-radius: 20px;
        transition: background-color 0.2s;
        background-color: #ffffff;
    }

    /* Media Queries untuk Responsivitas */
    @media (max-width: 768px) {
        .footer-top, .footer-bottom {
            flex-direction: column;
            align-items: center;
        }
        .footer-section {
            margin-bottom: 30px;
        }
    }
    @media (max-width: 576px) {
        .footer-section {
            text-align: center;
        }
        .footer-contact a, .footer-about a, .footer-about p {
            margin: 10px 0;
        }
    }
</style>

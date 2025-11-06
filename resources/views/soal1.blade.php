<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Gaya Kustom dari Soal 1 */
        body {
            font-family: Arial, sans-serif;
        }
        .frame-orange {
            background-color: #ff7e3a; 
            color: white;
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            font-weight: bold;
        }
        .frame-light-pink {
            background-color: #ffe6e0; 
            padding: 15px;
            border: 1px solid #dee2e6;
            min-height: 120px; 
            display: flex; /* Tambahkan flex untuk konten Frame 6 */
            flex-direction: column; /* Konten vertikal */
            align-items: center; /* Konten tengah horizontal */
            justify-content: center; /* Konten tengah vertikal */
        }
        .frame-body {
            height: 100%;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        .blinking-text {
            animation: blink 1s step-end infinite;
            color: red; 
            font-weight: bold;
        }

        /* Gaya Navigasi */
        .navigation-buttons {
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            max-width: 980px;
        }
        
        /* Style untuk gambar yang diunggah */
        #displayImage {
            max-width: 90%;
            max-height: 80px; /* Batasi tinggi agar sesuai frame */
            margin-top: 8px;
            border: 2px solid #333;
            display: none; /* Sembunyikan sampai gambar dipilih */
        }
        #fileInput {
            margin-top: 5px;
            font-size: 10px;
            width: 90%; /* Sesuaikan lebar input file */
        }
    </style>
</head>
<body>
    <div class="container my-4">

        <!-- 1. Navigasi Soal -->
        <div class="navigation-buttons">
            <button class="btn btn-secondary disabled" disabled>
                &larr; Previous (Start)
            </button>
            <a href="{{ route('soal2.show') }}" class="btn btn-primary">
                Next (Soal 2) &rarr;
            </a>
        </div>
        
        <hr>

        <!-- 2. Konten Soal 1 -->
        <div class="row">
            <div class="col-12 p-0">
                <div class="frame-orange text-center">Fikri Ramadhani Jakarta</div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-md-6 p-0">
                <div class="frame-light-pink frame-body">
                    <p class="fw-bold">Second frame</p>
                    <p>Bulleted list of qualifications</p>
                    <ul><li>Jujur</li><li>Bertanggung jawab</li><li>Dapat bekerja sama</li></ul>
                </div>
            </div>

            <div class="col-md-6 p-0">
                <div class="frame-light-pink frame-body">
                    <p class="fw-bold">Third frame</p>
                    <p>Links to favourite sites</p>
                    <ul class="list-unstyled">
                        <li><a href="https://getbootstrap.com/">Bootstrap Official Site</a></li>
                        <li><a href="https://laravel.com/">Laravel Official Site (Blade)</a></li>
                        <li><a href="#">Situs Favorit Lain</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-0">

        <div class="row">
            <div class="col-md-4 p-0">
                <div class="frame-light-pink frame-body">
                    <p class="fw-bold">Fourth frame</p>
                    <p>Scrolling message</p>
                    <marquee direction="left" behavior="scroll" scrollamount="5" class="text-primary">Selamat Datang</marquee>
                </div>
            </div>

            <div class="col-md-4 p-0">
                <div class="frame-light-pink frame-body">
                    <p class="fw-bold">Fifth frame</p>
                    <p>Blinking reminders</p>
                    <p class="blinking-text text-center">!! PENTING: Jangan Lupa Kerjakan Tugas !!</p>
                </div>
            </div>

            <div class="col-md-4 p-0">
                <!-- FRAME KEENAM YANG BERUBAH -->
                <div class="frame-light-pink frame-body">
                    <p class="fw-bold">Sixth frame</p>
                    <p class="text-muted" style="font-size: 12px;">Pilih Gambar dari Komputer</p>
                    
                    <!-- Elemen Input File -->
                    <input type="file" id="fileInput" accept="image/*">
                    
                    <!-- Elemen Image untuk menampilkan gambar yang dipilih -->
                    <img id="displayImage" src="#" alt="Gambar yang Diunggah">
                </div>
            </div>
        </div>
        <hr class="my-0">
    </div>

    <!-- Script JavaScript untuk memproses file -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('fileInput');
            const displayImage = document.getElementById('displayImage');

            // Event listener saat file dipilih
            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                
                if (file) {
                    // Cek apakah file adalah gambar
                    if (file.type.startsWith('image/')) {
                        // Membuat objek FileReader untuk membaca file
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            // Setelah file dibaca, atur sumber (src) gambar dan tampilkan
                            displayImage.src = e.target.result;
                            displayImage.style.display = 'block';
                        }
                        
                        // Baca file sebagai URL data (base64)
                        reader.readAsDataURL(file);
                    } else {
                        // Jika bukan gambar, reset input dan sembunyikan gambar
                        alert('Silakan pilih file gambar (JPG, PNG, GIF, dll.)');
                        displayImage.style.display = 'none';
                        fileInput.value = ''; // Mengatur ulang input file
                    }
                } else {
                    // Jika pengguna membatalkan pilihan
                    displayImage.style.display = 'none';
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
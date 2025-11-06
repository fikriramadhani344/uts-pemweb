<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Soal DOM - Flower Basket</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: Georgia, "Times New Roman", serif;
      margin: 24px;
      background: #fff;
      color: #111;
    }

    h1 {
      font-size: 26px;
      margin-bottom: 12px;
    }

    .top-gallery {
      display: flex;
      gap: 12px;
      margin-bottom: 16px;
      align-items: flex-start;
    }

    .top-gallery img {
      width: 140px;
      height: 100px;
      object-fit: cover;
      border: 4px solid #fff;
      box-shadow: 0 0 0 2px rgba(0,0,0,0.08);
      cursor: pointer;
      transition: transform .12s ease;
    }

    .top-gallery img:hover { transform: scale(1.03); }

    .description {
      max-width: 900px;
      margin-bottom: 12px;
      line-height: 1.35;
    }

    .controls button {
      padding: 6px 10px;
      border: 1px solid #333;
      background: #f6f6f6;
      cursor: pointer;
      font-size: 13px;
    }

    .controls button:hover { background: #e9e9e9; }

    .basket-area {
      border: 3px solid #111;
      padding: 12px;
      min-height: 120px;
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
      background: #fff;
    }

    .basket-area .basket-item {
      width: 140px;
      height: 100px;
      object-fit: cover;
      border: 3px solid #222;
      cursor: pointer;
      box-sizing: border-box;
    }

    .status-line {
      margin-top: 8px;
      padding: 8px;
      border: 2px solid #222;
      background: #fff;
      max-width: 980px;
      font-weight: 500;
    }
    
    .navigation-buttons {
      margin-top: 20px;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      max-width: 980px;
    }

    @media (max-width: 520px) {
      .top-gallery { flex-direction: column; }
      .top-gallery img, .basket-area .basket-item { width: 100%; height: auto; }
    }
  </style>
</head>
<body>

  <div class="navigation-buttons">
    <a href="{{ route('soal1.show') }}" class="btn btn-primary">
      &larr; Previous (Soal 1)
    </a>
    <button class="btn btn-secondary disabled" disabled>
      Next (End) &rarr;
    </button>
  </div>
  
  <hr>

  <h1>Soal Essay: Document Object Model (Demo)</h1>

  <div class="top-gallery" id="gallery">
    <img src="{{ asset('thumbnails/flo1.jpg') }}" alt="bunga1" class="shop-item" data-name="Bunga A">
    <img src="{{ asset('thumbnails/flo2.jpg') }}" alt="bunga2" class="shop-item" data-name="Bunga B">
    <img src="{{ asset('thumbnails/flo3.jpg') }}" alt="bunga3" class="shop-item" data-name="Bunga C">
  </div>

  <p class="description" id="description">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    Klik gambar di atas untuk menambahkan salinan ke keranjang bunga. Klik gambar yang ada di keranjang untuk menghapusnya.
  </p>

  <div class="controls d-flex gap-2">
    <button id="changeTextColor" class="btn btn-sm btn-outline-dark">Change Text Color</button>
    <button id="changeBgColor" class="btn btn-sm btn-outline-dark">Change Background Color</button>
  </div>

  <div class="status-line" id="status">The flower basket currently contains 0 flowers.</div>

  <br>

  <div class="basket-area" id="basket" aria-live="polite"></div>

  <script>
    const gallery = document.getElementById('gallery');
    const basket = document.getElementById('basket');
    const status = document.getElementById('status');
    const desc = document.getElementById('description');
    const btnTextColor = document.getElementById('changeTextColor');
    const btnBgColor = document.getElementById('changeBgColor');

    function updateCount() {
      const n = basket.querySelectorAll('.basket-item').length;
      status.textContent = `The flower basket currently contains ${n} ${n === 1 ? 'flower.' : 'flowers.'}`;
    }

    gallery.addEventListener('click', e => {
      if (e.target.classList.contains('shop-item')) {
        const clone = e.target.cloneNode(true);
        clone.classList.replace('shop-item', 'basket-item');
        clone.title = 'Klik untuk menghapus bunga ini';
        clone.addEventListener('click', () => {
          clone.remove();
          updateCount();
        });
        basket.appendChild(clone);
        updateCount();
      }
    });

    btnTextColor.addEventListener('click', () => {
      const color = prompt('Masukkan warna teks (contoh: red, #ff0000, rgb(255,0,0))');
      if (color) desc.style.color = color;
    });

    btnBgColor.addEventListener('click', () => {
      const color = prompt('Masukkan warna latar belakang halaman (contoh: yellow, #ffff00, rgb(255,255,0))');
      if (color) document.body.style.backgroundColor = color;
    });

    updateCount();
  </script>
</body>
</html>
// products.js
const products = [
  // Brand: 910
  {
    id: 1,
    name: "910 Haze Veloce",
    brand: "910",
    type: "daily",
    price: 599000,
    features: ["lightweight", "cushioning"],
    description: "Sepatu lari jalan Cocok untuk daily training",
    rating: 4.5,
    image: "../assets/img/products/910/1.jpeg"
  },
  {
    id: 2,
    name: "910 Yuza Evo",
    brand: "910",
    type: "trail",
    price: 450000,
    features: ["stability", "waterproof"],
    description: "Sepatu trail running dengan daya tahan tinggi",
    rating: 4.6,
    image: "../assets/img/products/910/2.jpg"
  },
  {
    id: 3,
    name: "910 Takashi Run 1.5",
    brand: "910",
    type: "marathon",
    price: 500000,
    features: ["lightweight", "cushioning"],
    description: "Sepatu maraton dengan teknologi terbaru",
    rating: 4.9,
    image: "../assets/img/products/910/3.jpeg"
  },
  // Brand: Ortuseight
  {
    id: 4,
    name: "Ortuseight Hyperglide 1.4",
    brand: "ortuseight",
    type: "road",
    price: 600000,
    features: ["lightweight", "cushioning"],
    description: "Sepatu lari jalan dengan teknologi bantalan udara",
    rating: 4.4,
    image: "../assets/img/products/Ortus/1.jpg"
  },
  {
    id: 5,
    name: "Ortuseight Hyperfuse 2.0",
    brand: "ortuseight",
    type: "daily",
    price: 650000,
    features: ["cushioning"],
    description: "Sepatu dialy dengan daya tahan tinggi dan desain stylish",
    rating: 4.8,
    image: "../assets/img/products/Ortus/2.jpeg"
  },
  {
    id: 6,
    name: "Ortuseight Hypersonic 1.3",
    brand: "ortuseight",
    type: "marathon",
    price: 1000000,
    features: ["lightweight", "stability"],
    description: "Sepatu maraton dengan performa tinggi",
    rating: 4.7,
    image: "../assets/img/products/Ortus/3.jpeg"
  },
  // Brand: Ardiles
  {
    id: 7,
    name: "Ardiles Nfinity Raiton",
    brand: "ardiles",
    type: "road",
    price: 300000,
    features: ["lightweight", "bouncing"],
    description: "Sepatu lari jalan dengan harga terjangkau",
    rating: 4.0,
    image: "../assets/img/products/Ardiles/1.jpg"
  },
  {
    id: 8,
    name: "Ardiles Trail Gerbera 2.0",
    brand: "ardiles",
    type: "trail",
    price: 425000,
    features: ["stability"],
    description: "Sepatu trail running dengan daya tahan tinggi",
    rating: 4.2,
    image: "../assets/img/products/Ardiles/2.jpg"
  },
  {
    id: 9,
    name: "Ardiles Nfinity Urbeat Pro",
    brand: "ardiles",
    type: "daily",
    price: 700000,
    features: ["lightweight", "stability","cushioning"],
    description: "Sepatu SuperTrainer  dengan performa baik",
    rating: 4.3,
    image: "../assets/img/products/Ardiles/3.jpg"
  },
  // Brand: Mills
  {
    id: 10,
    name: "Mills Enermax Dynaplate",
    brand: "mills",
    type: "road",
    price: 500000,
    features: ["lightweight", "cushioning"],
    description: "Sepatu lari jalan dengan teknologi bantalan udara",
    rating: 4.4,
    image: "../assets/img/products/Mills/1.jpeg",
  },
  {
    id: 11,
    name: "Mills Treximo Saga",
    brand: "mills",
    type: "daily",
    price: 749000,
    features: ["waterproof", "stability"],
    description: "Sepatu trail running dengan grip superior",
    rating: 4.5,
    image: "../assets/img/products/Mills/2.jpg"
  },
  {
    id: 12,
    name: "mills dynaplate fineknit",
    brand: "mills",
    type: "marathon",
    price: 799000,
    features: ["lightweight", "stability"],
    description: "Sepatu maraton dengan daya tahan tinggi",
    rating: 4.6,
    image: "../assets/img/products/Mills/3.jpeg"
  },
  // Brand: Nike
  {
    id: 13,
    name: "Nike Air Zoom Pegasus 38",
    brand: "nike",
    type: "road",
    price: 1799000,
    features: ["lightweight", "cushioning"],
    description: "Sepatu lari jalan dengan teknologi Air Zoom",
    rating: 4.7,
    image: "../assets/img/products/Nike/1.webp"
  },
  {
    id: 14,
    name: "Nike Wildhorse 7",
    brand: "nike",
    type: "trail",
    price: 1999000,
    features: ["stability", "waterproof"],
    description: "Sepatu trail running dengan daya tahan tinggi",
    rating: 4.6,
    image: "../assets/img/products/Nike/2.jpeg"
  },
  {
    id: 15,
    name: "Nike ZoomX Vaporfly Next% 2",
    brand: "nike",
    type: "marathon",
    price: 3499000,
    features: ["lightweight", "cushioning"],
    description: "Sepatu maraton dengan teknologi carbon plate",
    rating: 4.9,
    image: "../assets/img/products/Nike/3.avif"
  },
  // Brand: New Balance
  {
    id: 16,
    name: "New Balance Fresh Foam 1080v11",
    brand: "new-balance",
    type: "road",
    price: 2299000,
    features: ["cushioning", "stability"],
    description: "Sepatu lari jalan dengan bantalan Fresh Foam",
    rating: 4.7,
    image: "../assets/img/products/NB/1.jpg"
  },
  {
    id: 17,
    name: "New Balance Fresh Foam Hierro v6",
    brand: "new-balance",
    type: "trail",
    price: 1999000,
    features: ["waterproof", "stability"],
    description: "Sepatu trail running dengan daya tahan tinggi",
    rating: 4.6,
    image: "../assets/img/products/NB/2.webp"
  },
  {
    id: 18,
    name: "New Balance FuelCell RC Elite v2",
    brand: "new-balance",
    type: "marathon",
    price: 3299000,
    features: ["lightweight", "cushioning"],
    description: "Sepatu maraton dengan teknologi carbon plate",
    rating: 4.8,
    image: "../assets/img/products/NB/3.png"
  },
  // // Brand: Asics
  // {
  //   id: 19,
  //   name: "Asics Gel-Nimbus 23",
  //   brand: "asics",
  //   type: "road",
  //   price: 2299000,
  //   features: ["cushioning", "stability"],
  //   description: "Sepatu lari jalan dengan teknologi GEL",
  //   rating: 4.7,
  //   image: "../ assets/img/products/Asics/1"
  // },
  // {
  //   id: 20,
  //   name: "Asics Gel-Trabuco 9",
  //   brand: "asics",
  //   type: "trail",
  //   price: 1999000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan daya tahan tinggi",
  //   rating: 4.6,
  //   image: "../ assets/img/products/Asics/2"
  // },
  // {
  //   id: 21,
  //   name: "Asics MetaSpeed Sky",
  //   brand: "asics",
  //   type: "marathon",
  //   price: 3299000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu maraton dengan teknologi carbon plate",
  //   rating: 4.9,
  //   image: "../ assets/img/products/Asics/3"
  // },
  // // Brand: Hoka
  // {
  //   id: 22,
  //   name: "Hoka Clifton 8",
  //   brand: "hoka",
  //   type: "road",
  //   price: 2199000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan bantalan maksimal",
  //   rating: 4.7,
  //   image: "../ assets/img/products/Hoka/1"
  // },
  // {
  //   id: 23,
  //   name: "Hoka Speedgoat 4",
  //   brand: "hoka",
  //   type: "trail",
  //   price: 2099000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan grip superior",
  //   rating: 4.6,
  //   image: "../ assets/img/products/Hoka/2"
  // },
  // {
  //   id: 24,
  //   name: "Hoka Carbon X 2",
  //   brand: "hoka",
  //   type: "marathon",
  //   price: 3299000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu maraton dengan teknologi carbon plate",
  //   rating: 4.8,
  //   image: "../ assets/img/products/Hoka/3"
  // },
  // // Brand: Mizuno
  // {
  //   id: 25,
  //   name: "Mizuno Wave Rider 25",
  //   brand: "mizuno",
  //   type: "road",
  //   price: 1999000,
  //   features: ["cushioning", "stability"],
  //   description: "Sepatu lari jalan dengan teknologi Wave",
  //   rating: 4.6,
  //   image: "../ assets/img/products/Mizuno/1"
  // },
  // {
  //   id: 26,
  //   name: "Mizuno Wave Daichi 6",
  //   brand: "mizuno",
  //   type: "trail",
  //   price: 1899000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan daya tahan tinggi",
  //   rating: 4.5,
  //   image: "../ assets/img/products/Mizuno/2"
  // },
  // {
  //   id: 27,
  //   name: "Mizuno Wave Rebellion",
  //   brand: "mizuno",
  //   type: "marathon",
  //   price: 2799000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu maraton dengan teknologi carbon plate",
  //   rating: 4.7,
  //   image: "../ assets/img/products/Mizuno/3"
  // },
  // // Brand: Puma
  // {
  //   id: 28,
  //   name: "Puma Velocity Nitro",
  //   brand: "puma",
  //   type: "road",
  //   price: 1799000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan teknologi Nitro",
  //   rating: 4.5,
  //   image: "../ assets/img/products/Puma/1"
  // },
  // {
  //   id: 29,
  //   name: "Puma Voyage Nitro",
  //   brand: "puma",
  //   type: "trail",
  //   price: 1899000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan daya tahan tinggi",
  //   rating: 4.4,
  //   image: "../ assets/img/products/Puma/2"
  // },
  // {
  //   id: 30,
  //   name: "Puma Deviate Nitro Elite",
  //   brand: "puma",
  //   type: "marathon",
  //   price: 2999000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu maraton dengan teknologi carbon plate",
  //   rating: 4.8,
  //   image: "../ assets/img/products/Puma/3"
  // },
  // // Brand: Brodo
  // {
  //   id: 31,
  //   name: "Brodo Sprinter",
  //   brand: "brodo",
  //   type: "road",
  //   price: 899000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan desain minimalis",
  //   rating: 4.3,
  //   image: "../ assets/img/products/Brodo/1"
  // },
  // {
  //   id: 32,
  //   name: "Brodo Trail Master",
  //   brand: "brodo",
  //   type: "trail",
  //   price: 1199000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan grip superior",
  //   rating: 4.5,
  //   image: "../ assets/img/products/Brodo/2"
  // },
  // {
  //   id: 33,
  //   name: "Brodo Endurance",
  //   brand: "brodo",
  //   type: "marathon",
  //   price: 1299000,
  //   features: ["lightweight", "stability"],
  //   description: "Sepatu maraton dengan daya tahan tinggi",
  //   rating: 4.4,
  //   image: "../ assets/img/products/Brodo/3"
  // },
  // // Brand: Saucony
  // {
  //   id: 34,
  //   name: "Saucony Ride 14",
  //   brand: "saucony",
  //   type: "road",
  //   price: 1899000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan bantalan PWRRUN",
  //   rating: 4.6,
  //   image: "../ assets/img/products/Saucony/1"
  // },
  // {
  //   id: 35,
  //   name: "Saucony Peregrine 11",
  //   brand: "saucony",
  //   type: "trail",
  //   price: 1999000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan daya tahan tinggi",
  //   rating: 4.7,
  //   image: "../ assets/img/products/Saucony/2"
  // },
  // {
  //   id: 36,
  //   name: "Saucony Endorphin Pro 2",
  //   brand: "saucony",
  //   type: "marathon",
  //   price: 2999000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu maraton dengan teknologi carbon plate",
  //   rating: 4.8,
  //   image: "../ assets/img/products/Saucony/3"
  // },
  // // Brand: Adidas
  // {
  //   id: 37,
  //   name: "Adidas Ultraboost 21",
  //   brand: "adidas",
  //   type: "road",
  //   price: 2499000,
  //   features: ["cushioning", "stability"],
  //   description: "Sepatu lari jalan dengan teknologi Boost",
  //   rating: 4.7,
  //   image: "../ assets/img/products/Adidas/1"
  // },
  // {
  //   id: 38,
  //   name: "Adidas Terrex Speed Ultra",
  //   brand: "adidas",
  //   type: "trail",
  //   price: 2199000,
  //   features: ["lightweight", "stability"],
  //   description: "Sepatu trail running dengan teknologi Continental",
  //   rating: 4.6,
  //   image: "../ assets/img/products/Adidas/2"
  // },
  // {
  //   id: 39,
  //   name: "Adidas Adizero Adios Pro 2",
  //   brand: "adidas",
  //   type: "marathon",
  //   price: 3299000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu maraton dengan teknologi carbon rods",
  //   rating: 4.9,
  //   image: "../ assets/img/products/Adidas/3"
  // },
  // // Brand: Brooks
  // {
  //   id: 40,
  //   name: "Brooks Ghost 14",
  //   brand: "brooks",
  //   type: "road",
  //   price: 1999000,
  //   features: ["cushioning", "stability"],
  //   description: "Sepatu lari jalan dengan bantalan DNA Loft",
  //   rating: 4.7,
  //   image: "../ assets/img/products/Brooks/1"
  // },
  // {
  //   id: 41,
  //   name: "Brooks Cascadia 16",
  //   brand: "brooks",
  //   type: "trail",
  //   price: 2099000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan traksi superior",
  //   rating: 4.6,
  //   image: "../ assets/img/products/Brooks/2"
  // },
  // {
  //   id: 42,
  //   name: "Brooks Adrenaline GTS 22",
  //   brand: "brooks",
  //   type: "road",
  //   price: 2199000,
  //   features: ["stability", "cushioning"],
  //   description: "Sepatu lari jalan dengan dukungan stabilitas",
  //   rating: 4.8,
  //   image: "../ assets/img/products/Brooks/3"
  // },
  // // Brand: On
  // {
  //   id: 43,
  //   name: "On Cloudflow",
  //   brand: "on",
  //   type: "road",
  //   price: 2199000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan teknologi CloudTec",
  //   rating: 4.6,
  //   image: "../ assets/img/products/On/1"
  // },
  // {
  //   id: 44,
  //   name: "On Cloudventure",
  //   brand: "on",
  //   type: "trail",
  //   price: 2299000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan grip superior",
  //   rating: 4.5,
  //   image: "../ assets/img/products/On/2"
  // },
  // {
  //   id: 45,
  //   name: "On Cloudflyer",
  //   brand: "on",
  //   type: "road",
  //   price: 2399000,
  //   features: ["stability", "cushioning"],
  //   description: "Sepatu lari jalan dengan dukungan stabilitas",
  //   rating: 4.7,
  //   image: "../ assets/img/products/On/3"
  // },
  // // Brand: Under Armour
  // {
  //   id: 46,
  //   name: "Under Armour HOVR Machina 2",
  //   brand: "under-armour",
  //   type: "road",
  //   price: 1999000,
  //   features: ["cushioning", "stability"],
  //   description: "Sepatu lari jalan dengan teknologi HOVR",
  //   rating: 4.5,
  //   image: "../ assets/img/products/UA/1"
  // },
  // {
  //   id: 47,
  //   name: "Under Armour HOVR Sonic 4",
  //   brand: "under-armour",
  //   type: "road",
  //   price: 1799000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan ringan dan responsif",
  //   rating: 4.4,
  //   image: "../ assets/img/products/UA/2"
  // },
  // {
  //   id: 48,
  //   name: "Under Armour Flow Velociti Wind",
  //   brand: "under-armour",
  //   type: "road",
  //   price: 2099000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan performa tinggi",
  //   rating: 4.6,
  //   image: "../ assets/img/products/UA/3"
  // },
  // // Brand: Salomon
  // {
  //   id: 49,
  //   name: "Salomon Speedcross 5",
  //   brand: "salomon",
  //   type: "trail",
  //   price: 1999000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running dengan grip superior",
  //   rating: 4.8,
  //   image: "../ assets/img/products/Salomon/1"
  // },
  // {
  //   id: 50,
  //   name: "Salomon Wildcross",
  //   brand: "salomon",
  //   type: "trail",
  //   price: 1899000,
  //   features: ["waterproof", "stability"],
  //   description: "Sepatu trail running untuk medan basah",
  //   rating: 4.7,
  //   image: "../ assets/img/products/Salomon/2"
  // },
  // {
  //   id: 51,
  //   name: "Salomon XA Pro 3D V8",
  //   brand: "salomon",
  //   type: "trail",
  //   price: 2199000,
  //   features: ["stability", "waterproof"],
  //   description: "Sepatu trail running dengan daya tahan tinggi",
  //   rating: 4.6,
  //   image: "../ assets/img/products/Salomon/3"
  // },
  // // Brand: Reebok
  // {
  //   id: 52,
  //   name: "Reebok Floatride Energy 3",
  //   brand: "reebok",
  //   type: "road",
  //   price: 1599000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan bantalan Floatride",
  //   rating: 4.4,
  //   image: "../ assets/img/products/Reebok/1"
  // },
  // {
  //   id: 53,
  //   name: "Reebok Nano X1",
  //   brand: "reebok",
  //   type: "casual",
  //   price: 1799000,
  //   features: ["stability", "cushioning"],
  //   description: "Sepatu lari santai untuk latihan serbaguna",
  //   rating: 4.5,
  //   image: "../ assets/img/products/Reebok/2"
  // },
  // {
  //   id: 54,
  //   name: "Reebok Forever Floatride Energy",
  //   brand: "reebok",
  //   type: "road",
  //   price: 1699000,
  //   features: ["lightweight", "cushioning"],
  //   description: "Sepatu lari jalan dengan bantalan responsif",
  //   rating: 4.3,
  //   image: "../ assets/img/products/Reebok/3"
  // },
];

// Format harga ke Rupiah
const formatPrice = (price) => {
  return "Rp" + price.toLocaleString("id-ID");
};

// Debounce util (boleh tetap ada jika mau pakai search, atau bisa dihapus)
// Debounce util
function debounce(func, wait) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(this, args), wait);
  };
}

document.addEventListener("DOMContentLoaded", () => {
  const productsGrid = document.querySelector(".products-grid");
  const paginationContainer = document.querySelector(".pagination");
  const sortSelect = document.getElementById("sort-by");
  const searchInput = document.querySelector(".search-box input[type='search']");

  if (!productsGrid || !paginationContainer) {
    console.error("Elemen products grid atau pagination tidak ditemukan.");
    return;
  }

  let currentPage = 1;
  const productsPerPage = 9;
  let filteredProducts = [...products];

  function renderProducts() {
    productsGrid.innerHTML = "";
    const startIndex = (currentPage - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;
    const paginatedProducts = filteredProducts.slice(startIndex, endIndex);

    if (paginatedProducts.length === 0) {
      productsGrid.innerHTML = `<div class="no-products"><p>Tidak ada produk yang sesuai.</p></div>`;
      return;
    }

    paginatedProducts.forEach(product => {
      const productCard = document.createElement("div");
      productCard.className = "product-card";
      productCard.innerHTML = `
        <div class="product-image">
          <img src="${product.image}" alt="${product.name}">
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <span>${product.rating}</span>
          </div>
        </div>
        <div class="product-info">
          <h3>${product.name}</h3>
          <p>${product.description}</p>
          <div class="product-footer">
            <span class="product-price">${formatPrice(product.price)}</span>
            <a href="../pages/product-detail.html?id=${product.id}" class="btn btn-sm">Detail <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      `;
      productsGrid.appendChild(productCard);
    });
  }

  function updatePagination() {
    const totalPages = Math.ceil(filteredProducts.length / productsPerPage);
    paginationContainer.innerHTML = `
      <button class="pagination-btn ${currentPage === 1 ? 'disabled' : ''}"><i class="fas fa-arrow-left"></i></button>
      ${Array.from({ length: totalPages }, (_, i) => `
        <button class="pagination-btn ${currentPage === i + 1 ? 'active' : ''}">${i + 1}</button>
      `).join('')}
      <button class="pagination-btn ${currentPage === totalPages ? 'disabled' : ''}"><i class="fas fa-arrow-right"></i></button>
    `;

    const paginationButtons = paginationContainer.querySelectorAll(".pagination-btn");
    paginationButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
        if (button.classList.contains("disabled")) return;

        if (button.querySelector(".fa-arrow-left")) {
          if (currentPage > 1) currentPage--;
        } else if (button.querySelector(".fa-arrow-right")) {
          if (currentPage < totalPages) currentPage++;
        } else {
          currentPage = index;
          if (currentPage > 0) currentPage--;
        }

        renderProducts();
        updatePagination();
      });
    });
  }

  // Fungsi filter dan search di-nonaktifkan agar tampil semua produk
  function applyFilters() {
    filteredProducts = [...products];

    // Sorting tetap aktif
    const sortValue = sortSelect ? sortSelect.value : 'popular';
    filteredProducts.sort((a, b) => {
      if (sortValue === 'price-low') return a.price - b.price;
      if (sortValue === 'price-high') return b.price - a.price;
      if (sortValue === 'newest') return b.id - a.id;
      if (sortValue === 'rating') return b.rating - a.rating;
      return b.rating - a.rating;
    });

    currentPage = 1;
    renderProducts();
    updatePagination();
  }

  if (sortSelect) {
    sortSelect.addEventListener("change", () => {
      applyFilters();
    });
  }

  // Search dinonaktifkan agar tidak mempengaruhi produk yang tampil
  if (searchInput) {
    searchInput.addEventListener("input", debounce(() => {
      // applyFilters(); // tidak dipanggil
    }, 300));
  }

  // Render pertama kali
  applyFilters();
});
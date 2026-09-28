/**
 * RunShoes - Cart JavaScript
 * This file contains functionality specific to the cart page
 */

document.addEventListener("DOMContentLoaded", () => {
    // Fungsi untuk memperbarui ringkasan keranjang belanja (subtotal, total keseluruhan, dll.)
    // Pastikan selector di sini (misal, ".summary-item:first-child span:last-child")
    // sesuai dengan struktur HTML Anda.
    function updateCartSummary() {
        console.log("updateCartSummary DIPANGGIL"); // Untuk debugging
        const totalElements = document.querySelectorAll(".cart-product-total");
        const subtotalElement = document.querySelector(".cart-summary .summary-item:first-child span:last-child");
        const shippingElement = document.querySelector(".cart-summary .summary-item:nth-child(2) span:last-child");
        const discountElement = document.querySelector(".cart-summary .summary-item:nth-child(3) span:last-child");
        const totalElement = document.querySelector(".cart-summary .summary-total span:last-child");

        if (!subtotalElement || !shippingElement || !discountElement || !totalElement) {
            console.error("Elemen DOM untuk ringkasan keranjang tidak ditemukan. Ringkasan tidak diperbarui.");
            return;
        }

        let subtotal = 0;
        totalElements.forEach((element) => {
            const valueString = element.textContent.replace(/[^\d]/g, "");
            if (valueString) {
                subtotal += Number.parseFloat(valueString);
            }
        });

        const shippingText = shippingElement.textContent.replace(/[^\d]/g, "");
        const shipping = shippingText ? Number.parseFloat(shippingText) : 0;

        let discount = 0;
        const currentDiscountText = discountElement.textContent;
        if (currentDiscountText && currentDiscountText !== "-") {
            const positiveDiscountValueString = currentDiscountText.replace(/[^\d]/g, "");
            if (positiveDiscountValueString) {
                discount = Number.parseFloat(positiveDiscountValueString);
            }
        }
        
        const total = subtotal + shipping - discount;

        console.log("Kalkulasi Ringkasan:", { subtotal, shipping, discount, total }); // Untuk debugging

        subtotalElement.textContent = `Rp${subtotal.toLocaleString("id-ID")}`;
        totalElement.textContent = `Rp${total.toLocaleString("id-ID")}`;
    }

    // Fungsi untuk memperbarui jumlah item di ikon keranjang dan teks
    function updateCartCount() {
        console.log("updateCartCount DIPANGGIL"); // Untuk debugging
        const cartTableBody = document.querySelector(".cart-table tbody");
        const cartItems = cartTableBody ? cartTableBody.querySelectorAll("tr") : [];
        
        const cartCountElements = document.querySelectorAll(".cart-count");
        const cartCountText = document.querySelector(".cart-count-text");
        const itemCount = cartItems.length;

        if (cartCountElements.length > 0) {
            cartCountElements.forEach((element) => {
                element.textContent = itemCount.toString();
            });
        }
        if (cartCountText) {
            cartCountText.textContent = `${itemCount} item`;
        }

        const cartItemsContainer = document.querySelector(".cart-items");
        const cartActions = document.querySelector(".cart-actions"); // Kontainer kupon dan "Lanjutkan Belanja"

        if (itemCount === 0) {
            if (cartItemsContainer) {
                const existingTable = cartItemsContainer.querySelector('.cart-table');
                if (existingTable) {
                    cartItemsContainer.innerHTML = `
                        <div class="empty-cart">
                            <i class="fas fa-shopping-bag"></i>
                            <h3>Keranjang Anda kosong</h3>
                            <p>Sepertinya Anda belum menambahkan apapun ke keranjang.</p>
                            <a href="products.html" class="btn btn-primary">Mulai Belanja</a>
                        </div>
                    `;
                }
            }
            if (cartActions) {
                cartActions.style.display = "none";
            }
        } else {
            if (cartActions) {
                cartActions.style.display = ""; // Atau "flex", "block" sesuai display awal
            }
        }
    }

    // Logika Kuantitas Item Keranjang
    const quantitySelectors = document.querySelectorAll(".quantity-selector");

    if (quantitySelectors.length > 0) {
        quantitySelectors.forEach((selector) => {
            const minusBtn = selector.querySelector(".minus");
            const plusBtn = selector.querySelector(".plus");
            const input = selector.querySelector(".quantity-input");
            const row = selector.closest("tr");
            const priceCell = row ? row.querySelector("td:nth-child(2)") : null; // Harga satuan
            const totalCell = row ? row.querySelector(".cart-product-total") : null; // Total per item

            if (minusBtn && plusBtn && input && priceCell && totalCell) {
                const priceText = priceCell.textContent.replace(/[^\d]/g, "");
                if (!priceText) {
                    console.error("Harga satuan tidak valid atau kosong untuk item:", row);
                    return; 
                }
                const price = Number.parseFloat(priceText);

                // Fungsi untuk mengupdate total SATU item ini dan kemudian memanggil updateCartSummary
                const updateItemTotalAndSummary = () => {
                    console.log(`updateItemTotalAndSummary dipanggil untuk input value: ${input.value}`); //Debug
                    let quantity = Number.parseInt(input.value, 10);
                    const minQuantity = Number.parseInt(input.min, 10) || 1;
                    // Hormati atribut max jika ada, jika tidak, anggap tak terbatas
                    const maxQuantity = input.hasAttribute("max") ? Number.parseInt(input.max, 10) : Infinity;

                    // Pastikan kuantitas valid dan dalam rentang min/max
                    if (isNaN(quantity) || quantity < minQuantity) {
                        quantity = minQuantity;
                        input.value = quantity.toString();
                    } else if (quantity > maxQuantity) {
                        quantity = maxQuantity;
                        input.value = quantity.toString();
                    }
                    
                    const total = price * quantity;
                    totalCell.textContent = `Rp${total.toLocaleString("id-ID")}`;
                    
                    // PENTING: Panggil updateCartSummary SETELAH total item ini diperbarui di DOM
                    updateCartSummary();
                };

                // Event listener untuk tombol minus
                minusBtn.addEventListener("click", () => {
                    let currentValue = parseInt(input.value, 10);
                    const minQuantity = parseInt(input.min, 10) || 1;
                    if (currentValue > minQuantity) {
                        input.value = (currentValue - 1).toString(); // Ubah nilai input dulu
                        updateItemTotalAndSummary(); // Baru update total
                    } else {
                        input.value = minQuantity.toString(); // Pastikan tidak kurang dari min
                        updateItemTotalAndSummary(); // Update juga jika sudah di min
                    }
                });

                // Event listener untuk tombol plus
                plusBtn.addEventListener("click", () => {
                    let currentValue = parseInt(input.value, 10);
                    const maxQuantity = input.hasAttribute("max") ? parseInt(input.max, 10) : Infinity;
                    if (currentValue < maxQuantity) {
                        input.value = (currentValue + 1).toString(); // Ubah nilai input dulu
                        updateItemTotalAndSummary(); // Baru update total
                    } else {
                        input.value = maxQuantity.toString(); // Pastikan tidak lebih dari max
                        updateItemTotalAndSummary(); // Update juga jika sudah di max
                    }
                });

                // Event listener untuk perubahan manual pada input
                input.addEventListener("change", () => {
                    // Validasi tambahan jika user mengetik manual dan keluar dari field (blur)
                    let currentValue = parseInt(input.value, 10);
                    const minQuantity = parseInt(input.min, 10) || 1;
                    const maxQuantity = input.hasAttribute("max") ? parseInt(input.max, 10) : Infinity;

                    if (isNaN(currentValue) || currentValue < minQuantity) {
                        input.value = minQuantity.toString();
                    } else if (currentValue > maxQuantity) {
                        input.value = maxQuantity.toString();
                    }
                    updateItemTotalAndSummary();
                });
                
                // PENTING: Hitung dan tampilkan total yang benar untuk item ini saat halaman dimuat
                updateItemTotalAndSummary(); 
            }
        });
    }

    // Logika Hapus Item Keranjang
    const removeButtons = document.querySelectorAll(".remove-item");
    if (removeButtons.length > 0) {
        removeButtons.forEach((button) => {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                const row = this.closest("tr");
                if (row) {
                    row.style.transition = "opacity 0.3s ease, max-height 0.3s ease, padding 0.3s ease, border 0.3s ease";
                    row.style.opacity = "0";
                    row.style.maxHeight = "0px"; // Efek collapse
                    row.style.paddingTop = "0";
                    row.style.paddingBottom = "0";
                    row.style.borderWidth = "0";

                    setTimeout(() => {
                        row.remove();
                        updateCartSummary(); // Perbarui ringkasan
                        updateCartCount();   // Perbarui jumlah item
                    }, 300); // Durasi harus sama dengan transisi CSS
                }
            });
        });
    }

    // Logika Terapkan Kupon
    const couponForm = document.querySelector(".coupon-form");
    if (couponForm) {
        const couponInput = couponForm.querySelector(".coupon-input");
        const couponButton = couponForm.querySelector("button"); // Asumsi tombol adalah direct child

        if (couponInput && couponButton) {
            couponForm.addEventListener("submit", (e) => {
                e.preventDefault();
                const couponCode = couponInput.value.trim();
                if (couponCode) {
                    setTimeout(() => { // Simulasi
                        const discountDisplayElement = document.querySelector(".cart-summary .summary-item:nth-child(3) span:last-child");
                        const subtotalForDiscountCalcElement = document.querySelector(".cart-summary .summary-item:first-child span:last-child");

                        if (!discountDisplayElement || !subtotalForDiscountCalcElement) {
                            console.error("Elemen diskon/subtotal tidak ditemukan untuk kupon.");
                            updateCartSummary(); // Coba update summary meskipun ada error kupon
                            return;
                        }

                        if (couponCode.toUpperCase() === "WELCOME10") {
                            const subtotalValueText = subtotalForDiscountCalcElement.textContent.replace(/[^\d]/g, "");
                            if (subtotalValueText) {
                                const subtotalValue = Number.parseFloat(subtotalValueText);
                                const discountAmount = Math.round(subtotalValue * 0.1);
                                discountDisplayElement.textContent = `-Rp${discountAmount.toLocaleString("id-ID")}`;
                                alert("Kupon berhasil diterapkan! Anda mendapatkan diskon 10%.");
                            } else {
                                alert("Subtotal tidak valid untuk menghitung diskon.");
                            }
                        } else {
                            // Anda mungkin ingin mereset diskon jika kupon tidak valid
                            // discountDisplayElement.textContent = "-";
                            alert("Kode kupon tidak valid atau sudah kadaluarsa.");
                        }
                        updateCartSummary(); // Selalu panggil updateCartSummary setelah logika kupon
                    }, 500);
                } else {
                    alert("Masukkan kode voucher terlebih dahulu.");
                }
            });
        }
    }

    // Panggilan awal untuk fungsi-fungsi utama saat halaman dimuat.
    // updateItemTotalAndSummary di dalam loop sudah memanggil updateCartSummary berkali-kali.
    // Panggilan updateCartCount di sini untuk memastikan tampilan jumlah item awal benar.
    // Panggilan updateCartSummary terakhir bisa sebagai pengaman, terutama jika keranjang awalnya kosong.
    updateCartCount();
    updateCartSummary(); 

    console.log("Inisialisasi keranjang selesai."); // Untuk debugging
});
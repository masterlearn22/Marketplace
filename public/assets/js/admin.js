import { Chart } from "@/components/ui/chart"
/**
 * RunShoes - Admin JavaScript
 * This file contains functionality specific to the admin panel
 */

document.addEventListener("DOMContentLoaded", () => {
  // Sidebar toggle
  const sidebarToggle = document.querySelector(".sidebar-toggle")
  const adminSidebar = document.querySelector(".admin-sidebar")
  const adminLayout = document.querySelector(".admin-layout")

  if (sidebarToggle && adminSidebar && adminLayout) {
    sidebarToggle.addEventListener("click", () => {
      adminSidebar.classList.toggle("active")
      adminLayout.classList.toggle("sidebar-collapsed")
    })
  }

  // User dropdown toggle
  const userDropdownBtn = document.querySelector(".user-dropdown-btn")
  const userDropdownMenu = document.querySelector(".user-dropdown-menu")

  if (userDropdownBtn && userDropdownMenu) {
    userDropdownBtn.addEventListener("click", () => {
      userDropdownMenu.classList.toggle("active")
    })

    // Close dropdown when clicking outside
    document.addEventListener("click", (e) => {
      if (!userDropdownBtn.contains(e.target) && !userDropdownMenu.contains(e.target)) {
        userDropdownMenu.classList.remove("active")
      }
    })
  }

  // Product modal
  const addProductBtn = document.getElementById("addProductBtn")
  const productModal = document.getElementById("productModal")
  const modalClose = document.querySelector(".modal-close")
  const cancelProductBtn = document.getElementById("cancelProductBtn")

  if (addProductBtn && productModal && modalClose && cancelProductBtn) {
    addProductBtn.addEventListener("click", () => {
      productModal.classList.add("active")
    })

    modalClose.addEventListener("click", () => {
      productModal.classList.remove("active")
    })

    cancelProductBtn.addEventListener("click", () => {
      productModal.classList.remove("active")
    })

    // Close modal when clicking outside
    productModal.addEventListener("click", (e) => {
      if (e.target === productModal) {
        productModal.classList.remove("active")
      }
    })
  }

  // Select all checkboxes
  const selectAllCheckbox = document.getElementById("select-all")
  const productCheckboxes = document.querySelectorAll(".product-checkbox")

  if (selectAllCheckbox && productCheckboxes.length > 0) {
    selectAllCheckbox.addEventListener("change", function () {
      productCheckboxes.forEach((checkbox) => {
        checkbox.checked = this.checked
      })
    })

    // Update select all checkbox when individual checkboxes change
    productCheckboxes.forEach((checkbox) => {
      checkbox.addEventListener("change", () => {
        const allChecked = Array.from(productCheckboxes).every((checkbox) => checkbox.checked)
        const someChecked = Array.from(productCheckboxes).some((checkbox) => checkbox.checked)

        selectAllCheckbox.checked = allChecked
        selectAllCheckbox.indeterminate = someChecked && !allChecked
      })
    })
  }

  // Initialize charts if Chart.js is available
  if (typeof Chart !== "undefined") {
    // Sales chart
    const salesChartCanvas = document.getElementById("salesChart")

    if (salesChartCanvas) {
      const salesChart = new Chart(salesChartCanvas, {
        type: "line",
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [
            {
              label: "Penjualan 2023",
              data: [
                12500000, 15000000, 18000000, 16500000, 21000000, 22500000, 19000000, 23500000, 25000000, 23000000,
                26000000, 28000000,
              ],
              borderColor: "#10b981",
              backgroundColor: "rgba(16, 185, 129, 0.1)",
              tension: 0.4,
              fill: true,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: (value) => "Rp" + value / 1000000 + "jt",
              },
            },
          },
        },
      })
    }

    // Products chart
    const productsChartCanvas = document.getElementById("productsChart")

    if (productsChartCanvas) {
      const productsChart = new Chart(productsChartCanvas, {
        type: "doughnut",
        data: {
          labels: [
            "Nike Air Zoom 1",
            "Adidas Ultraboost 2",
            "Asics Gel-Nimbus 3",
            "Brooks Ghost 4",
            "New Balance Fresh Foam 5",
          ],
          datasets: [
            {
              data: [35, 25, 20, 15, 5],
              backgroundColor: ["#10b981", "#3b82f6", "#f59e0b", "#ef4444", "#8b5cf6"],
              borderWidth: 0,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: "bottom",
              labels: {
                boxWidth: 12,
              },
            },
          },
        },
      })
    }
  }

  // Image upload preview
  const imageInputs = document.querySelectorAll('input[type="file"][accept*="image"]')

  if (imageInputs.length > 0) {
    imageInputs.forEach((input) => {
      input.addEventListener("change", function () {
        const file = this.files[0]
        if (file) {
          const reader = new FileReader()
          const uploadBox = this.closest(".image-upload-box")

          reader.onload = (e) => {
            // Create or update preview image
            let preview = uploadBox.querySelector(".upload-preview")
            if (!preview) {
              preview = document.createElement("div")
              preview.className = "upload-preview"
              uploadBox.appendChild(preview)
            }

            preview.style.backgroundImage = `url(${e.target.result})`
            uploadBox.querySelector(".upload-placeholder").style.display = "none"
          }

          reader.readAsDataURL(file)
        }
      })
    })
  }
})

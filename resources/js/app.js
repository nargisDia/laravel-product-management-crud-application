import "./bootstrap";

function debounce(func, wait, immediate) {
    let timeout;
    return function () {
        const context = this;
        const args = arguments;

        const later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };

        const callNow = immediate && !timeout;

        clearTimeout(timeout);
        timeout = setTimeout(later, wait);

        if (callNow) func.apply(context, args);
    };
}

function getCurrentActionUrl(path) {
    const baseUrl = window.location.origin + window.location.pathname;
    let actionUrl;
    if (baseUrl.charAt(baseUrl.length - 1) !== "/") {
        actionUrl = `${baseUrl}/${path}`;
    } else {
        actionUrl = baseUrl + path;
    }

    return actionUrl;
}

function updateProductImagePreview() {
    const productUpdateFormImage = document.getElementById(
        "product-edit-view-image"
    );

    const productUpdateFormImageInput =
        document.getElementById("product-image");

    if (!productUpdateFormImage || !productUpdateFormImageInput) {
        return;
    }

    productUpdateFormImageInput.addEventListener("change", function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                productUpdateFormImage.src = reader.result;
            });

            reader.readAsDataURL(file);
        }
    });
}

function deleteProduct() {
    const productsTable = document.getElementById("c-products-table");
    const productDeleteForm = document.getElementById("c-delete-product-form");

    if (!productsTable || !productDeleteForm) {
        return;
    }

    const handleDeleteProduct = function (e, productId) {
        e.preventDefault();
        let actionUrl = getCurrentActionUrl(productId);
        const actionForm = e.target;
        actionForm.action = actionUrl;
        actionForm.submit();
    };

    productsTable.addEventListener("click", function (e) {
        const productDeleteBtn = e.target.closest("#c-product-delete-btn");

        if (productDeleteBtn) {
            e.preventDefault();
            const productId = productDeleteBtn.dataset.productId;

            if (!productId) {
                return;
            }

            productDeleteForm.addEventListener("submit", (e) =>
                handleDeleteProduct(e, productId)
            );
        }
    });
}

function handleSearchProduct() {
    const searchInput = document.getElementById("c-search-product-input");
    const tBodyProducts = document.querySelector(".c-products-tbody");

    if (!searchInput || !tBodyProducts) {
        return;
    }

    const fetchSearchedData = debounce(async function (queryValue) {
        const actionUrl = getCurrentActionUrl(`search`);
        console.log(actionUrl);

        const res = await axios.get(actionUrl, {
            params: { query: queryValue },
        });

        if (!res.data) {
            return;
        }

        tBodyProducts.innerHTML = null;
        tBodyProducts.insertAdjacentHTML("afterbegin", res.data);
    }, 500);

    searchInput.addEventListener("input", function (e) {
        fetchSearchedData(e.target.value);
    });
}

document.addEventListener("DOMContentLoaded", function () {
    updateProductImagePreview();
    deleteProduct();
    handleSearchProduct();
});

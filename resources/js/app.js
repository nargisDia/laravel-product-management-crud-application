import "./bootstrap";

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

        const currentUrl = window.location.href;
        let actionUrl;
        if (currentUrl.charAt(currentUrl.length - 1) !== "/") {
            actionUrl = `${currentUrl}/${productId}`;
        } else {
            actionUrl = currentUrl + productId;
        }
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

document.addEventListener("DOMContentLoaded", function () {
    updateProductImagePreview();
    deleteProduct();
});

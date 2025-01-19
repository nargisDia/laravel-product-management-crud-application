import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
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
});


    <!-- Modal -->
    <div class="modal fade" id="product-delete-modal" tabindex="-1" aria-labelledby="product-delete-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5 d-flex align-items-center gap-1" id="product-delete-modal"> <span class="fs-2"><i class="bi bi-trash"></i></span> Confirm Deletion</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                
                    <p class="mb-0 text-center">Are you sure you want to delete this item? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="" method="POST" id="c-delete-product-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id="c-confirm-product-delete">Yes, I'm sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
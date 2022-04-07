<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Contact</h5>
                <span class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body">
                <form action="/php-projects/PHP-miniProject/contact.php" method="post" class="px-4 py-4">
                    <input type="hidden" name="idEdit" id="idEdit">
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">First Name</label>
                        <input type="text" class="form-control" name="first_nameEdit" id="first_nameEdit">
                    </div>
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">Last Name</label>
                        <input type="text" class="form-control" name="last_nameEdit" id="last_nameEdit">
                    </div>
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">Email</label>
                        <input type="email" class="form-control" name="emailEdit" id="emailEdit">
                    </div>
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">Age</label>
                        <input type="number" class="form-control" name="ageEdit" id="ageEdit">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-update">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
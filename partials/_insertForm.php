<form action="/php-projects/PHP-miniProject/contact.php" method="post" class="bg-light shadow rounded-3 py-5 px-5">
    <div class="mb-3 d-flex flex-row tag form-group">
        <label class="form-label my-auto">Mobile Number</label>
        <input type="number" class="form-control" name="phone_no" id="phone">
    </div>
    <div class="mb-3 d-flex flex-row tag form-group">
        <label class="form-label my-auto">First Name</label>
        <input type="text" class="form-control" name="first_name" id="first">
    </div>
    <div class="mb-3 d-flex flex-row tag form-group">
        <label class="form-label my-auto">Last Name</label>
        <input type="text" class="form-control" name="last_name" id="last">
    </div>
    <div class="mb-3 d-flex flex-row tag form-group">
        <label class="form-label my-auto">Age</label>
        <input type="number" class="form-control" name="age" id="age">
    </div>
    <div class="mb-3 d-flex flex-row tag form-group">
        <label class="form-label my-auto">Note</label>
        <textarea type="text" class="form-control" name="note" id="note"></textarea>
    </div>
    <div class="mb-3 d-flex flex-row tag form-group">
        <label class="form-label my-auto">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="text-end mt-5">
        <button type="submit" class="btn btn-submit col-5">Submit</button>
    </div>
</form>
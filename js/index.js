// Fade Alert script
setTimeout(() => {
    $(".alert-tag").fadeToggle(1000);
}, 1500);

// Submit Button Disabled till all fields are filled
$(function () {
    $('.btn-submit').attr('disabled', true);
    $('#age').change(function () {
        if ($('#first').val() != '' && $('#last').val() != '' && $('#email').val() != '' && $(
                '#age').val() != '') {
            $('.btn').attr('disabled', false);
        } else {
            $('.btn').attr('disabled', true);
        }
    });
});

// Format datatables
$(document).ready(function () {
    $('#myTable').DataTable();
});

// Edit Contact Form
edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
    element.addEventListener('click', (e) => {
        // console.log("edited", e.target.parentNode.parentNode.parentNode);
        tr = e.target.parentNode.parentNode.parentNode;
        fn = tr.getElementsByTagName("td")[0].innerText;
        ln = tr.getElementsByTagName("td")[1].innerText;
        el = tr.getElementsByTagName("td")[2].innerText;
        ag = tr.getElementsByTagName("td")[3].innerText;
        // console.log(fn, ln, el, ag);
        firstNameEdit.value = fn;
        lastNameEdit.value = ln;
        emailEdit.value = el;
        ageEdit.value = ag;
        idEdit.value = e.target.parentNode.id;
        // console.log(e.target.parentNode.id);
        $('#editModal').modal('toggle');
    })
})

// Delete Contact Form
deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
    element.addEventListener('click', (e) => {
        // console.log("Deleted", e.target.parentNode.parentNode.parentNode);
        id = e.target.parentNode.id.substr(1,);
        if (confirm("Are you sure want to Delete contact ?")) {
            // console.log("Yes")
            window.location = `/php-projects/PHP-miniProject/contact.php?delete=${id}`;
        } else {
            // console.log("No")
        }
    })
})
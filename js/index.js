// Fade Alert script
setTimeout(() => {
    $(".ms").fadeToggle(1000);
}, 2000);

// Submit Button Disabled till all fields are filled
// $(function () {
//     $('.btn-submit').attr('disabled', true);
//     $('#age').change(function () {
//         if ($('#first').val() != '' && $('#last').val() != '' && $('#email').val() != '' && $(
//                 '#age').val() != '') {
//             $('.btn').attr('disabled', false);
//         } else {
//             $('.btn').attr('disabled', true);
//         }
//     });
// });

// Show password
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

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
        ph = tr.getElementsByTagName("td")[0].innerText;
        fn = tr.getElementsByTagName("td")[1].innerText;
        ln = tr.getElementsByTagName("td")[2].innerText;
        ag = tr.getElementsByTagName("td")[3].innerText;
        nt = tr.getElementsByTagName("td")[4].innerText;
        el = tr.getElementsByTagName("td")[5].innerText;
        ct = tr.getElementsByTagName("td")[6].innerText;
        // console.log(fn, ln, el, ag);
        phone_noEdit.value = ph;
        first_nameEdit.value = fn;
        last_nameEdit.value = ln;
        ageEdit.value = ag;
        noteEdit.value = nt;
        emailEdit.value = el;
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
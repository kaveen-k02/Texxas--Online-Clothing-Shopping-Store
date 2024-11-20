function changeView() {
    var adminlogInBox = document.getElementById("adminlogInBox");
    var logInBox = document.getElementById("logInBox");

    adminlogInBox.classList.toggle("d-none");
    logInBox.classList.toggle("d-none");

}

function clogin() {

    var cemail = document.getElementById("email");
    var pass = document.getElementById("password");

    var f = new FormData();

    f.append("e", cemail.value);
    f.append("p", pass.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var rs = r.responseText;
            if (rs == "success") {
                window.location = "index.php";
            } else {
                alert(rs);
            }
        }
    }

    r.open("POST", "loginProcess.php", true);
    r.send(f);

}

function logOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var rs = r.responseText;
            if (rs == "success") {
                window.location.reload();
            }
        }
    };

    r.open("POST", "logoutProcess.php", true);
    r.send();
}

function adminlogin() {

    var adminemail = document.getElementById("adminemail");
    var adminpass = document.getElementById("adminpass");

    var f = new FormData();

    f.append("ae", adminemail.value);
    f.append("ap", adminpass.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var rs = r.responseText;
            if (rs == "success") {
                window.location = "adminPanel.php";
            } else {
                alert(rs);
            }
        }
    }

    r.open("POST", "adminloginProcess.php", true);
    r.send(f);

}

function addProduct() {
    var category = document.getElementById("category");
    var material = document.getElementById("material");
    var title = document.getElementById("title");
    var clr = document.getElementById("clr");
    var qty = document.getElementById("qty");
    var cost = document.getElementById("cost");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploader");

    var f = new FormData();

    f.append("ca", category.value);
    f.append("mat", material.value);
    f.append("t", title.value);
    f.append("col", clr.value);
    f.append("qty", qty.value);
    f.append("cost", cost.value);
    f.append("desc", desc.value);

    // Check if an image is selected
    if (image.files.length > 0) {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Product Added Successfully.") {
                alert(t);
                setTimeout(function () {
                    window.location.reload();
                }, 1000); // Delay the reload 
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);
}


function changeProductImage() {

    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 1) {

            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;

            }

        } else {
            alert(file_count + " files. You are proceed to upload only 1 image.");
        }

    }

}


function changeImage() {
    var view = document.getElementById("viewImg");//img tag
    var file = document.getElementById("profileimg");//file chooser

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);


    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);


}

function qty_inc(qty) {

    var input = document.getElementById("qty_input");

    if (input.value < qty) {

        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();

    } else {

        alert("Maximum quantity has achieved");
        input.value = qty;

    }

}

function qty_dec() {

    var input = document.getElementById("qty_input");

    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
    } else {
        alert("Minimum quantity has achieved");
        input.value = 1;
    }
}

window.addEventListener('DOMContentLoaded', function () {
    loadMainImg();
});
function loadMainImg(id) {
    var sample_img = document.getElementById("productImg").src;
    var main_img = document.getElementById("mainImg");

    main_img.style.backgroundImage = "url(" + sample_img + ")";

}

function addToCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();
}

function deleteFromCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Product has been removed") {
                alert(t);
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeCartProcess.php?id=" + id, true);
    r.send();
}


function deleteproduct(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Product has been Deleted") {
                alert(t);
                location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteProduct.php?id=" + id, true);
    r.send();
}

function deleteUser(email) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.readyState == 4) {
                var t = request.responseText;

                if (t == "User has removed Successfully") {
                    alert(t);
                    window.location.reload();
                } else {
                    alert(t);
                }
            }

        }
    }

    request.open("GET", "userDeleteProcess.php?email=" + email, true);
    request.send();

}

function deleteFeedback(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Your FeedBack has been removed") {
                alert(t);
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteFeedbackProcess.php?id=" + id, true);
    r.send();
}

function updateFeedback() {
    var fname = document.getElementById("feedback");

    var f = new FormData();
    f.append("fb", feedback.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "successfully Updated Your Feedback") {
                alert(t);
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateFeedbackProcess.php", true);
    r.send(f);


}

function updateProduct(pid) {
    var title = document.getElementById("title" + pid);
    var price = document.getElementById("price" + pid);
    var pid = pid;
    var qty = document.getElementById("qty" + pid);
    var f = new FormData();
    f.append("title", title.value);
    f.append("price", price.value);
    f.append("pid", pid);
    f.append("qty", qty.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "successfully Updated") {
                alert(t);
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);
}
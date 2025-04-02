function validateForm() {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let birthday = document.getElementById("birthday").value;
    let gender = document.querySelector('input[name="gender"]:checked');
    let country = document.getElementById("country").value;
    let about = document.getElementById("about").value;

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (firstName.length < 2 || firstName.length > 30) {
        alert("First Name phải từ 2-30 ký tự");
        return;
    }
    if (lastName.length < 2 || lastName.length > 30) {
        alert("Last Name phải từ 2-30 ký tự");
        return;
    }
    if (!emailPattern.test(email)) {
        alert("Email không hợp lệ");
        return;
    }
    if (password.length < 2 || password.length > 30) {
        alert("Password phải từ 2-30 ký tự");
        return;
    }
    if (!birthday) {
        alert("Vui lòng chọn ngày sinh");
        return;
    }
    if (!gender) {
        alert("Vui lòng chọn giới tính");
        return;
    }
    if (about.length > 10000) {
        alert("Thông tin giới thiệu không được quá 10000 ký tự");
        return;
    }
    alert("Complete!");
}
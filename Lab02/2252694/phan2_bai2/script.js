function calculate() {
    let num1 = parseFloat(document.getElementById("num1").value);
    let num2 = parseFloat(document.getElementById("num2").value);
    let operation = document.getElementById("operation").value;
    let result;
    
    if (isNaN(num1) || isNaN(num2)) {
        result = "Vui lòng nhập số hợp lệ";
    } else {
        switch (operation) {
            case "add":
                result = num1 + num2;
                break;
            case "subtract":
                result = num1 - num2;
                break;
            case "multiply":
                result = num1 * num2;
                break;
            case "divide":
                result = num2 !== 0 ? (num1 / num2) : "Không thể chia cho 0";
                break;
            case "power":
                result = Math.pow(num1, num2);
                break;
            default:
                result = "Lỗi!";
        }
    }
    document.getElementById("result").innerText = result;
}
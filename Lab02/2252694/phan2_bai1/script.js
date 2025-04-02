function createTable() {
    let container = document.getElementById("tableContainer");
    container.innerHTML = "";
    let table = document.createElement("table");
    table.classList.add("table", "table-bordered", "mt-3");
    table.id = "dynamicTable";
    for (let i = 0; i < 2; i++) {
        let row = table.insertRow();
        for (let j = 0; j < 2; j++) {
            let cell = row.insertCell();
            cell.innerText = `Hàng ${i + 1} Cột ${j + 1}`;
        }
    }
    container.appendChild(table);
}

function addRow() {
    let table = document.getElementById("dynamicTable");
    if (!table) return;
    let row = table.insertRow();
    let cols = table.rows[0].cells.length;
    for (let i = 0; i < cols; i++) {
        let cell = row.insertCell();
        cell.innerText = `Hàng ${table.rows.length} Cột ${i + 1}`;
    }
}

function addColumn() {
    let table = document.getElementById("dynamicTable");
    if (!table) return;
    for (let i = 0; i < table.rows.length; i++) {
        let cell = table.rows[i].insertCell();
        cell.innerText = `Hàng ${i + 1} Cột ${table.rows[i].cells.length}`;
    }
}

function deleteRow() {
    let table = document.getElementById("dynamicTable");
    if (!table) return;
    let index = document.getElementById("indexInput").value;
    if (index >= 1 && index <= table.rows.length) {
        table.deleteRow(index - 1);
    }
}

function deleteColumn() {
    let table = document.getElementById("dynamicTable");
    if (!table) return;
    let index = document.getElementById("indexInput").value;
    if (index >= 1 && table.rows[0] && index <= table.rows[0].cells.length) {
        for (let i = 0; i < table.rows.length; i++) {
            table.rows[i].deleteCell(index - 1);
        }
    }
}

function deleteTable() {
    let container = document.getElementById("tableContainer");
    container.innerHTML = "";
}
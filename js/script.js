var row = 1;

var selectedRow = null;

function displayData() {
    var formData = readFormData();

    if(selectedRow == null)
        insertNewRecord(formData);
    else
        updateRecord(formData);

    resetForm();
}

function readFormData() {
    
    var formData = {};

    formData["veg_name"] = document.getElementById("v_name").value;
    formData["veg_type"] = document.getElementById("v_type").value;
    formData["supp_name"] = document.getElementById("sp_name").value;
    formData["org_price"] = document.getElementById("o_price").value;
    formData["sel_price"] = document.getElementById("s_price").value;
    formData["qnt"] = document.getElementById("qnt").value;
    formData["total"] = document.getElementById("total").value;

    return formData;
}

function insertNewRecord(data) {
    
    var table = document.getElementById("tb").getElementsByTagName('tbody')[0];

    var newRow = table.insertRow(table.length);

    cell1 = newRow.insertCell(0);
    cell1.innerHTML = row;

    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.veg_name;

    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.veg_type;

    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.supp_name;

    cell5 = newRow.insertCell(4);
    cell5.innerHTML = data.org_price;

    cell6 = newRow.insertCell(5);
    cell6.innerHTML = data.sel_price;

    cell7 = newRow.insertCell(6);
    cell7.innerHTML = data.qnt;

    cell8 = newRow.insertCell(7);
    cell8.innerHTML = data.total;

    cell8 = newRow.insertCell(8);
    cell8.innerHTML = `<a href ="#" onClick="onEdit(this)">Edit</a>
                       <a href ="#" onClick="onDelete(this)">Delete</a> `;

    row++;
}


function resetForm() {
    
    document.getElementById("v_name").value = "";
    document.getElementById("v_type").value = "";
    document.getElementById("sp_name").value = "";
    document.getElementById("o_price").value = "";
    document.getElementById("s_price").value = "";
    document.getElementById("qnt").value = "";
    document.getElementById("total").value = "";
    var selectedRow = null;
}

function onEdit(td) {

    selectedRow = td.parentElement.parentElement;

    document.getElementById("v_name").value = selectedRow.cells[0].innerHTML; 
    document.getElementById("v_type").value = selectedRow.cells[1].innerHTML;
    document.getElementById("sp_name").value = selectedRow.cells[2].innerHTML;
    document.getElementById("o_price").value = selectedRow.cells[3].innerHTML;
    document.getElementById("s_price").value = selectedRow.cells[4].innerHTML; 
    document.getElementById("qnt").value = selectedRow.cells[5].innerHTML;
    document.getElementById("total").value = selectedRow.cells[6].innerHTML;
}

function updateRecord(formData) {
    
    selectedRow.cells[0].innerHTML = formData.veg_name;
    selectedRow.cells[1].innerHTML = formData.veg_type;
    selectedRow.cells[2].innerHTML = formData.supp_name;
    selectedRow.cells[3].innerHTML = formData.org_price;
    selectedRow.cells[4].innerHTML = formData.sel_price;
    selectedRow.cells[5].innerHTML = formData.qnt;
    selectedRow.cells[6].innerHTML = formData.total;
}


function onDelete(td) {
    
    if(confirm('Delete this record! Are you sure ?'))
    {
        row = td.parentElement.parentElement;
        document.getElementById("tb").deleteRow(row.rowIndex);
        resetForm();
    }
}


// script for hide the alert

// var toggle  = document.getElementById("cls");
// var content = document.getElementById("content");

// toggle.addEventListener("click", function() {
//   content.style.display = (content.dataset.toggled ^= 1) ? "block" : "none";
// });


// reset data on submiting
function resetCustFormData() {
    
    document.getElementById("cust_name").value = "";
    document.getElementById("c_add").value = "";
    document.getElementById("contact").value = "";
    document.getElementById("note").value = "";
}

// script For filling Total Automatically
function calculateTotal() {
    var sellingPrice = parseInt(document.getElementById('s_price').value);
    var Quantity = parseInt(document.getElementById('qnt').value);
    // var total = document.getElementById('total').value;

    if(!sellingPrice == "" && !Quantity == "") {
        var tot = sellingPrice*Quantity;
        document.getElementById('total').value = tot;
    }
}

// script for date and time

var d = new Date();
document.getElementById("time").innerHTML = d;

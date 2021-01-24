const verify = new ControlForm("index.php");

onload = function() {
    setList();
};

let tableName;
let currentTable;

document.getElementById("createTable").addEventListener('click', (e) => {
    e.preventDefault();
    console.log(this);
    
    if(tableName){
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {
                req: "createTable",
                tableName
            },
            success: function (response) {
                
                let res = JSON.parse(response);
                
                if(res['err'] == 1){
                    alert("File does Exists");
                }
                else{
                    setList();
                }
            }
        });
    }
    else{
        alert("Add a valid name");
    }
})

document.getElementById("table_name").addEventListener('input', (e) => {
    tableName = setTableName(e);
})

const setTableName = (e) =>{
    if(verify.verifyValue(e.target.value, /^[a-zA-Z\ ]{2,}$/)){
        e.target.className='valid'; 
        document.getElementById("errName").innerHTML = "";
        return e.target.value; 
    }
    else{
        document.getElementById("errName").innerHTML = "Must contain at least 2 alphabetical letters";
        e.target.className='invalid';
    }
}

const setList = () => {
    $.ajax({
        method: "GET",
        url: "index.php",
        data: {
            req: "getList",
        },
    }).done(function( data ) {
            let list = JSON.parse(data);
            let tNames = document.getElementById("list");
            
            tNames.innerHTML = "";

            list.forEach(element => {
                let para = document.createElement("li");
                let text = document.createTextNode(element.slice(0, element.length-5));
                
                let a = document.createElement('a');
                let aDel = document.createElement('a');
                let aSee = document.createElement('a');
                let i = document.createElement('i');
                let iDel = document.createElement('i');
                let iSee = document.createElement('i');
                let iText = document.createTextNode("playlist_add");
                let iTextDel = document.createTextNode("delete");
                let iTextSee = document.createTextNode("visibility");
                
                para.appendChild(text);

                i.appendChild(iText);
                i.classList.add("material-icons", "green-text", "modal-trigger");
                i.setAttribute("href", "#options")

                iDel.appendChild(iTextDel);
                iDel.classList.add("material-icons", "red-text");

                iSee.appendChild(iTextSee);
                iSee.classList.add("material-icons", "indigo-text");
                iSee.style.marginRight="5px";

                a.classList.add("secondary-content");
                aDel.classList.add("secondary-content");
                aSee.classList.add("secondary-content");

                aSee.addEventListener('click', function(){
                    callTable(element);
                })
                aDel.addEventListener('click', function(){
                    delTable(element);
                })

                aDel.appendChild(iDel);
                a.appendChild(i);
                aSee.appendChild(iSee);
                
                para.appendChild(aDel);
                para.appendChild(a);
                para.appendChild(aSee);
                para.classList.add("collection-item");
                tNames.appendChild(para);
            });      
    });
}

document.getElementById('setColumnSubmit').addEventListener('click', function(e){
    e.preventDefault();
    document.getElementById("setColumn").style.display="none";
    let table = document.getElementById("dataTable");
    let list = [];

    for(let i=0; i<table.rows.length; i++){
        list[i] = table.rows[i].cells[0].children[0].value
    }

    $.post("index.php", {
        req: "setColumn",
        table: currentTable,
        columns: list,
    },function (data) {
        console.log(data);   
    }); 
})

document.getElementById('setRowSubmit').addEventListener('click', function(e){
    e.preventDefault();
    document.getElementById("setRow").style.display="none";
    let table = document.getElementById("dataTableRow");
    let list = [];

    for(let i=0; i<table.rows.length; i++){
        list[i] = table.rows[i].cells[1].children[0].value
    }

    console.log(list);
    

    // $.post("index.php", {
    //     req: "setRow",
    //     table: currentTable,
    //     columns: list,
    // },function (data) {
    //     console.log(data);   
    // }); 
})

const callTable = (name) => {
    document.getElementById("table").innerHTML = "";

    $.post("index.php", 
    {
        req: "callTable",
        tableName: name,
    },function (data) {
        let list = JSON.parse(data);

        if(list['err'] == 1){
            alert("First dd columns of this table");
            currentTable = name;
            document.getElementById("setColumn").style.display="block";  
        }   
        else{
            document.getElementById("setColumn").style.display="none";
            document.getElementById("divTable").style.display="block";

            let table = document.getElementById('table');

            table.innerHTML = "";

            let tr = document.createElement('tr');
            list.data['column'].forEach(col => {
                let td = document.createElement('td');
                let text = document.createTextNode(col);
                td.appendChild(text);
                tr.appendChild(td);
            });
            table.appendChild(tr);
            
            list.data['row'].forEach(row => {
                let tr = document.createElement('tr');
                row.forEach(element => {
                    let td = document.createElement('td');
                    let text = document.createTextNode(element);
                    td.appendChild(text);
                    tr.appendChild(td);
                });
                table.appendChild(tr);
            });
        }
    });
}

const delTable = (name) => {
    $.post("index.php", 
    {
        req: "delTable",
        tableName: name,
    },function (data) {
        let file = JSON.parse(data);

        if(file['err'] == 1){
            alert("error");
        }
        else{
            setList();
        }
    });
}

////////////////////////////////////////////////////////////////
let nextName = 2;

const addCol = (tableID) => {
    let table = document.getElementById(tableID);
    let rowCount = table.rows.length;

    if (rowCount < 5) {
        let row = table.insertRow(rowCount);
        let colCount = table.rows[0].cells.length;

        for (let i = 0; i < colCount; i++) {
            if(i==0){
            let newcell = row.insertCell(i);
            newcell.classList.add("input-field");
            newcell.innerHTML = '<input type="text" required="required" id="col' + nextName + '" />'+'<label for="col' + nextName + '" >Column ' + nextName + ':</label>';
            nextName++;
            }
            else{
                let newcell = row.insertCell(i);
                newcell.innerHTML = '<td class="input-field"><button class="del btn-floating red waves-effect waves-light" type="button"><i class="material-icons">remove</i></button></td>'
            }
        }
    } else {
        alert("Maximum Columns are 10.");
    }
}

$("#dataTable").on('click', '.del', function () {
    $(this).closest('tr').remove();
    nextName--;
});

const addRow = (tableID) => {
    document.getElementById("setRow").style.display="block"; 

    let table = document.getElementById(tableID);
    let tr = document.createElement('tr');
    let title = document.createElement('td');
    let td = document.createElement('td');
    let td2 = document.createElement('td');
    let input = document.createElement('input');
    let but = document.createElement('button');
    let i = document.createElement('i');
    let text = document.createTextNode("remove");

    i.classList.add("material-icons");
    but.classList.add("del", "btn-floating", "red", "right", "waves-effect", "waves-light");
    title.classList.add("input-field");
    td.classList.add("input-field");
    td2.classList.add("input-field");

    i.appendChild(text);
    but.appendChild(i);
    td.appendChild(input);
    td2.appendChild(but);


    tr.appendChild(title);
    tr.appendChild(td);
    tr.appendChild(td2);

    table.appendChild(tr);
}

$("#dataTableRow").on('click', '.del', function () {
    $(this).closest('tr').remove();
});
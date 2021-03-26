let newName = "";

document.getElementById("newName").addEventListener('input', (e) => {
    newName = e.target.value;
})

const editStudent = (id) => {
    document.location = "index.php?id=" + id + "&newName=" + newName;
}

const deleteStudent = (id) => {
    document.location = "index.php?deleteId=" + id;
}
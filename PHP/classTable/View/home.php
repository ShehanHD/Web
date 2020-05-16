<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./lib/css/main.css">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col s12 m4 l4">
        <h3>Table List</h3>
        <ul class="collection" id="list">
            
        </ul>
        </div>

        <div class="col s12 m7 l7 offset-l1 offset-m1">
            <form>
            <div class="input-field">
                <input type="text" id="table_name" class="validate">
                <label for="table_name">Table Name</label>
                <span class="err" id="errName"></span>
            </div>
            <button style="width: 100%;" class="btn waves-effect waves-light" type="submit" id="createTable">Create Table</button>
            </form>


            <div style="margin-top: 10%; display: none" id="setColumn">
                <h4 class="center-align">Set columns</h4>
                <form>
                    <table style="margin-bottom: 5%" id="dataTable">
                        <tr>
                            <td class="input-field">
                                <input type="text" required="required" id="col1" />
                                <label for="col1">Column 1:</label>
                            </td>
                            <td class="input-field">
                                <button class="btn-floating red right-float waves-effect waves-light disabled" type="button"><i class="material-icons">remove</i></button>
                            </td>
                        </tr>
                    </table>
                    <button class="btn-floating green right-float waves-effect waves-light" type="button" onClick="addCol('dataTable')"><i class="material-icons">add</i></button>
                    <button class="btn right" type="submit" id="setColumnSubmit">Confirm</button>
                </form>
            </div>

            <div style="margin-top: 10%; display: none" id="setRow">
            <h4 class="center-align">Set Rows</h4>
                <form>
                    <table style="margin-bottom: 5%" id="dataTableRow">
                    </table>
                    <button class="btn-floating green right-float waves-effect waves-light" type="button" onClick="addRow('dataTableRow')"><i class="material-icons">add</i></button>
                    <button class="btn right" type="submit" id="setRowSubmit">Confirm</button>
                </form>
            </div>

            <div style="margin-top: 10%;  display: none" id="divTable">
                <table id="table">

                </table>
            </div>

        </div>
    </div>



    <div class="modal" id="options">
        <div class="modal-content container">
            <button class="btn waves-effect modal-close indigo waves-light edit" type="submit" id="editCol" onClick="addRow('dataTable')">Edit Column</button>
            <button class="btn waves-effect modal-close indigo waves-light edit" type="submit" id="editRow">Edit Row</button>
            <!-- <button class="btn waves-effect waves-light edit" type="submit" name="action">Add Column</button>
            <button class="btn waves-effect waves-light edit" type="submit" name="action">Add Column</button> -->
        </div>
        <div class="modal-footer">
            <a href="#" style="width: 30%" class="modal-close red btn sm">close</a>
        </div>
    </div>

</div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
    <script src="./lib/js/validate.js"></script>
    <script src="./lib/js/table.js"></script>


</body>
</html>
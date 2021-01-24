class FormControl {
    constructor() {
        this.returnData = [];
    }
    
    textField = (value, RegEx = /[\s\S]+/) => {
        return RegEx.test(value);
    }
    numberField = (value, RegEx = /[0-9]+/) => {
        return RegEx.test(value);
    }
    passwordField = (value, RegEx = /[\s\S]+/) => {
        return RegEx.test(value);
    }

    x = (data) => {
        this.returnData.push(data);
    }
    
    sendPOST = (url = "index.php", data) => {
        let self = this;
        $.ajax({
            method: "POST",
            url: url,
            data
        }).done(function (data) {
            self.x(data);
        }).fail(function (data) {
            self.x(data);
        });

        return self.returnData;
    }

    sendGET = (url = "index.php", data) => {
        let self = this;
        $.ajax({
            method: "GET",
            url: url,
            data
        }).done(function (data) {
            self.x(data);
        }).fail(function (data) {
            self.x(data);
        });

        return self.returnData;
    }
}


let x = new FormControl();
let test = "test"

let q = x.sendPOST("test.php", {test});


console.log(q);

document.write(q.ciao);

class ControlForm{
    path;

    constructor(path) {
        this.path = path;
    }

    verifyValue = (e, RegEx=/[\s\S]+/) => {
        return RegEx.test(e.target.value);
    }

    comparePass = (pass1, e) => {
        return pass1 === e.target.value ? true : false;
    }

    send = (method, data) => {
        $.ajax({
            type: method,
            url: path,
            data,
            success: function (response) {
                console.log(response);
            }
        });
    }
}

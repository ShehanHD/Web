class ControlForm{
    path;

    constructor(path) {
        this.path = path;
    }

    verifyValue = (value, RegEx=/[\s\S]+/) => {
        return RegEx.test(value);
    }

    comparePass = (pass1, e) => {
        return pass1 === e.target.value ? true : false;
    }
}

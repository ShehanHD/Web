<div class="modal" id="register">
        <div class="modal-content container">
            <span class="closebtn2 modal-close">&times;</span>
            <h5 class="center-align" style="margin-bottom:1%">REGISTRATION</h5>
            <form>
                <div class="input-field">
                    <input type="text" id="nome">
                    <label for="nome">Your Name</label>
                </div>
                <div class="input-field">
                    <input type="text" id="cognome">
                    <label for="cognome">Your Surname</label>
                </div>
                <div class="input-field">
                    <input type="text" id="indirizzo">
                    <label for="indirizzo">Your Address</label>
                </div>
                <div class="input-field">
                    <input type="text" id="CAP">
                    <label for="CAP">Your CAP</label>
                </div>
                <div class="input-field">
                    <input type="text" id="citta">
                    <label for="citta">Your City</label>
                </div>
                <div class="input-field">
                    <input type="text" id="paese">
                    <label for="paese">Your Conutry</label>
                </div>
                <div class="input-field">
                    <input type="tel" id="tel">
                    <label for="tel">Your Telephone number</label>
                </div>
                <div class="input-field">
                    <input type="email" id="email">
                    <label for="email">Your E-mail</label>
                </div>
                <div class="input-field">
                    <input type="password" id="pwd">
                    <label for="pwd">Your Password</label>
                </div>
                <div class="input-field">
                    <input type="password" id="pwd-repeat">
                    <label for="pwd-repeat">Repeat Your Password</label>
                </div>
                <div class="input-field">
                    <input type="number" id="cc">
                    <label for="cc">Your Credit card number</label>
                </div>
                <div class="input-field">
                    <input type="number" id="cc-tipo">
                    <label for="cc-tipo">Your Credit card type</label>
                </div>
                <div class="input-field">
                    <p>Exp. date</p>
                    <input type="month" id="scadenza" min="2020-01" max="2100-01" value="2020-01">
                </div>
                <div class="input-field">
                    <input type="number" id="cvv">
                    <label for="cvv">CVV</label>
                </div>

                <div class="input-field center">
                    <input type="submit" style="width: 100%;" class="btn-small indigo accent-2 white-text waves-effect waves-light" id="submit-register" value="Register">
                </div>  
            </form>
        </div>
</div>

<div class="modal" id="login">
    <div class="modal-content container">
        <span class="closebtn2 modal-close">&times;</span>
        <h5 style="padding-bottom: 3%; text-align: center">LOGIN</h5>
        <form>
            <div class="input-field">
                <input type="email" id="email-login">
                <label for="email-login">Your E-mail</label>
            </div>
            <div class="input-field">
                <input type="password" id="pwd-login">
                <label for="pwd-login">Your Password</label>
            </div>

            <div class="input-field center">
                <input type="submit" style="width: 100%;" class="btn-small indigo accent-2 white-text waves-effect waves-light" id="submit-login" value="Login">
            </div>
        </form>  
    </div>
</div>
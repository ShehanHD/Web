<div class="modal center-align" id="Carrello">
    <div class="container">
        <h1>Carrello</h1>


        <?php
        include("backend/Conf.php");

        if (isset($_SESSION['idu'])) {
            $idu = $_SESSION['idu'];

            $query = "select * from ordini, offerte where ordini.KsIDO=offerte.IDO and ordini.KsIDU = $idu";

            $result = mysqli_query($conn, $query);

            $num = mysqli_num_rows($result);

            $carrello = mysqli_fetch_assoc($result);

            if ($num != 0) {
        ?>
                <ul class="collection with-header">
                    <li class="collection-item">
                        <div><?php echo $carrello['Tipo'] ?><a href="backend/eleminaCarello.php?id=<?php echo $carrello['IDO'] ?>" class="secondary-content">
                                <div type="submit" class="material-icons red-text">cancel</div>
                            </a></div>
                    </li>
                </ul>
                <div class="input-field center">
                    <a type="submit" style="width: 100%;" class="btn-small red waves-effect waves-light modal-trigger" href="#contratto" id="submit-acquista">Acquista</a>
                </div>
            <?php
            } else {
            ?>
                <ul class="collection with-header">
                    <li class="collection-item">
                        Il tuo carrello è vuoto, inserisci una offerta!
                        </Il>
                </ul>
                <div class="input-field center">
                    <a type="submit" style="width: 100%;" class="btn-small disabled red waves-effect waves-light" id="submit-acquista">Acquista</a>
                </div>
            <?php
            }
        } else {
            ?>
            <ul class="collection with-header">
                <li class="collection-item">
                    Il tuo carrello è vuoto, inserisci una offerta!
                    </Il>
            </ul>
            <div class="input-field center">
                <a type="submit" style="width: 100%;" class="btn-small disabled red waves-effect waves-light" id="submit-acquista">Acquista</a>
            </div>
        <?php
        }

        ?>
    </div>
</div>
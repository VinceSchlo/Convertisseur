<?php
error_reporting(E_ALL);

ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use Devise\Money;
use Devise\Article;
use Devise\Converter;

if (isset($_POST['name'])){

    $firstItem = new Article($_POST['name'], $_POST['price'], $_POST['currency'], $_POST['qantity']);
    $secondItem = new Article($_POST['name2'], $_POST['price2'], $_POST['currency2'], $_POST['qantity2']);
    $thirdItem = new Article($_POST['name3'], $_POST['price3'], $_POST['currency3'], $_POST['qantity3']);

    $converter = new Converter();
    $currencyTotal = $_POST['currencyTotal'];
    $panier = [$firstItem, $secondItem, $thirdItem];
    $total = $converter->sum($panier, $currencyTotal);

    $allDevise = ["EUR", "USD", "YEN"];

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commande</title>
</head>
<body>

    <form action="" method="post">
        <div class="itemElement">
            <label for="name">Nom du produit</label>
            <input type="text" name="name" id="name" value="<?php if (isset($_POST['name'])) { echo $_POST['name'];} ?>">

            <label for="price">Prix</label>
            <input type="text" name="price" id="price" value="<?php if (isset($_POST['price'])) { echo $_POST['price'];} ?>">

            <label for="qantity">Quantité</label>
            <select name="qantity" id="qantity">
                <?php for ($i=1; $i < 6; $i++) { 
                    if (isset($_POST['qantity']) && $_POST['qantity'] == $i) { 
                        echo "<option value='$i' selected>$i</option>";
                    } else {
                        echo "<option value='$i'>$i</option>";
                    }
                    
                } ?>
            </select>

            <label for="currency">Devise</label>
            <select name="currency" id="currency">
                <option value='EUR'>EUR</option>
                <option value='USD'>USD</option>
                <option value='YEN'>YEN</option>
            </select>
        </div>

        <div class="itemElement">
            <label for="name2">Nom du produit</label>
            <input type="text" name="name2" id="name2" value="<?php if (isset($_POST['name2'])) { echo $_POST['name2'];} ?>">

            <label for="price2">Prix</label>
            <input type="text" name="price2" id="price2" value="<?php if (isset($_POST['price2'])) { echo $_POST['price2'];} ?>">

            <label for="qantity2">Quantité</label>
            <select name="qantity2" id="qantity2">
                <?php for ($i=1; $i < 6; $i++) { 
                    if (isset($_POST['qantity2']) && $_POST['qantity2'] == $i) { 
                        echo "<option value='$i' selected>$i</option>";
                    } else {
                        echo "<option value='$i'>$i</option>";
                    }
                    
                } ?>
            </select>

            <label for="currency2">Devise</label>
            <select name="currency2" id="currency2">
            <option value='EUR'>EUR</option>
                <option value='USD'>USD</option>
                <option value='YEN'>YEN</option>
            </select>
        </div>

        <div class="itemElement">
            <label for="name3">Nom du produit</label>
            <input type="text" name="name3" id="name3" value="<?php if (isset($_POST['name3'])) { echo $_POST['name3'];} ?>">

            <label for="price3">Prix</label>
            <input type="text" name="price3" id="price3" value="<?php if (isset($_POST['price3'])) { echo $_POST['price3'];} ?>">

            <label for="qantity3">Quantité</label>
            <select name="qantity3" id="qantity3">
                <?php for ($i=1; $i < 6; $i++) { 
                    if (isset($_POST['qantity3']) && $_POST['qantity3'] == $i) { 
                        echo "<option value='$i' selected>$i</option>";
                    } else {
                        echo "<option value='$i'>$i</option>";
                    }
                    
                } ?>
            </select>

            <label for="currency3">Devise</label>
            <select name="currency3" id="currency3">
            <option value='EUR'>EUR</option>
                <option value='USD'>USD</option>
                <option value='YEN'>YEN</option>
            </select>
        </div>
        <div>
            <label for="currencyTotal">Devise pour le total</label>
            <select name="currencyTotal" id="currencyTotal">
            <option value='EUR'>EUR</option>
                <option value='USD'>USD</option>
                <option value='YEN'>YEN</option>
            </select>
        </div>
        

        <input type="submit" value="Calculer le total">
    </form>

    <?php if (isset($firstItem)){ ?>
    <section>
        <table>
            <tr>
                <th>Nom</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Devise</th>
                <th>Total</th>
            </tr>
            <?php foreach ($panier as $article) { ?>
                <tr>
                    <td><?= $article->getName(); ?></td>
                    <td><?= $article->getQantity(); ?></td>
                    <td><?= $article->getPrice()->getAmount(); ?></td>
                    <td><?= $article->getPrice()->getCurrency(); ?></td>
                    <td><?= $article->getTotal(); ?></td>
                </tr>
            <?php } ?>
            
        </table>
        <h3>Total : <?= $total . ' ' . $currencyTotal ?> </h3>
    </section>
    <?php } ?>
</body>
</html>
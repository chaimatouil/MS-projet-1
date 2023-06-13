<?php

if (!empty($_POST)) {  // button search clicked

    // echo $_POST['search'];
    $produits = searchProduits($_POST['search']);
} else {
    $produits = getAllProduits();
}

<?php
require_once("./config.php");
require_once("./fonctions.php");

$multidimensionnel= [
    [
        "id" => 1,
        "nom" => "Benall sara",
        "age" => 70,
        "code_servis" => "cardio",
        "urgence" => "rouge"
        
    ],
    [
        "id" => 2,
        "nom" => "trabelsi ahmed",
        "age" =>45,
        "code_servis" => "DERMA",
        "urgence" => "vert"
    ],
    [
        "id" => 3,
        "nom" => "jlassi mohamed",
        "age" => 8,
        "code_servis" => "CARDIO",
        "urgence" => "rouge"
    ],
    [
        "id" => 4,
        "nom" => "ayari amal",
        "age" => 68,
        "code_servis" => "PEDIATRIE",
        "urgence" => "orange"
    ]
];

$urgence_rouge=filtreUrgence($multidimensionnel);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion_des_patients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="grille">

        <?php foreach ($multidimensionnel as $m): ?>

            <?php
                $badge = getBadgeService($m['code_servis']);

                $libelleurgence = getLibelleurgence($m['urgence']);

                $prix = calculerfacteur($m['age'],TARIF_BASE_CONSULTATION);
            ?>

            <article class="carte urgence-<?= strtolower($m['urgence']) ?>">

                <h2>
                    <?= htmlspecialchars($m['nom']) ?>
                    (<?= $m['age'] ?> ans)
                </h2>

                <span class="badge <?= $badge['classe'] ?>">
                    <?= htmlspecialchars($badge['libelle']) ?>
                </span>

                <p>
                    <strong>urgence :</strong>
                    <?= htmlspecialchars($libelleurgence) ?>
                </p>

                <p>
                    <strong>Facteur estimé :</strong>
                    <?= number_format($prix, 2) ?> TND
                </p>

            </article>
        <?php endforeach; ?>

    </div>

    <div class="recap">

        <h2>Récapitulatif</h2>

        <p>
            Nombre total de patients :
            <?= count($multidimensionnel) ?>
        </p>

        <p>Urgence Absolues :</p>

        <ul>
            <?php foreach ($urgence_rouge as $m): ?>
                <li>
                    <?= htmlspecialchars($m['nom']) ?>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</body>
</html>
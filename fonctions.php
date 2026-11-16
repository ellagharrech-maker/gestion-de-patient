<?php
function calculerfacteur(int $age, float $TARIF_BASE_CONSULTATION ): float
{
    $tot= TARIF_BASE_CONSULTATION ;
    if ($age> 65) {
        $tot=$tot+($tot*20/100);
    }
    return $tot ;


}

function getLibelleurgence(string $urgence): string
{
    switch ($urgence) {
        case 'rouge':
            return "Urgence absolue";

        case 'orange':
            return "Urgence relative";

        case 'vert':
            return "consultation standard";

        default:
            return "Urgence :Inconnu";
    }
}

function getBadgeService(string $cd_service): array
{
    switch ($cd_service) {
        case 'CARDIO':
            return [
                "libelle" => "cardiologie",
                "classe" => "badge-card"
            ];

        case 'DERMA':
            return [
                "libelle" => "dermatologie",
                "classe" => "badge-derma"
            ];

        case 'PEDIATRIE':
            return [
                "libelle" => "pediatrie",
                "classe" => "badge-pedia"
            ];

        default:
            return [
                "libelle" => "Inconnue",
                "classe" => "badge-inconnu"
            ];
    }
}
function filtreUrgence(array $multidimensionnel):array
{
    $doubtab = array_filter($multidimensionnel,fn($m) => $m["urgence"] == "rouge");

    return $doubtab;

};

?>



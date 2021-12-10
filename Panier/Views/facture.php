<?php
if (
    isset($_GET["id"])
) {
require("../Model/fpdf.php"); 
include '../Model/Panier.php';
include "../Controller/PanierC.php";

$Produit = new ItemC();
$commande= new CommandeC();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',24);
$pdf->Cell(190, 20,'Facture', 0, 0,'C');
$pdf->Ln();

$resultat=$commande->DetailCommande($_GET["id"]);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 50,'Nom', 0, 0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50, 50,'Prix', 0, 0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50, 50,'Quantite', 0, 0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40, 50,'Montant', 0, 0,'L');
$pdf->Ln();
foreach($resultat as $i){
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60, 5,$i['Nom'], 0, 0,'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(50, 5,$i['Prix'], 0, 0,'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(50, 5,$i['Quantite'], 0, 0,'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40, 5,$i['Prix']*$i['Quantite'], 0, 0,'L');
    $pdf->Ln();
}
$pdf->Output();
}
?>	
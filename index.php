<?php

    session_start();

    require_once 'dompdf/autoload.inc.php';

    use Dompdf\Dompdf;
    use Dompdf\Options;

    $options = new Options();
    $options->set('defaultFont', 'Times new roman');

    $pdf = new Dompdf();

    ob_start();

?>

<style>

/* * {
    margin: 0;
    padding: 0;
} */

</style>
<style>

    .float-right {
        float: right;
    }

    .wrapper {
        color: black;
        background-color: white;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-0.5 * var(--bs-gutter-x));
        margin-left: calc(-0.5 * var(--bs-gutter-x));
    }
    
    .col-1 {
        width: 8,33%;
        display: inline-block;
        vertical-align: top;
    }
    .col-3 {
        width: 25%;
        display: inline-block;
        vertical-align: top;
    }
    .col-4 {
        width: 33.33%;
        display: inline-block;
        vertical-align: top;
    }
    .col-5 {
        width: 41.66%;
        display: inline-block;
        vertical-align: top;
    }
    .col-badge {
        width: 270px;
        display: inline-block;
        vertical-align: top;
        margin-left: 40px;
        border: 2px solid darkcyan;
    }
    .col-6 {
        width: 49%;
        display: inline-block;
        vertical-align: top;
    }
    .col-8 {
        width: 66,66%;
        display: inline-block;
        vertical-align: top;
    }
    .col-12 {
        width: 100%;
        display: inline-block;
        vertical-align: top;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    .text-xl {
        font-size: x-large;
    }
    .text-lg {
        font-size: large;
    }
    .text-md {
        font-size: medium;
    }
    .text-sm {
        font-size: small;
    }
    .text-xs {
        font-size: x-small;
    }
    
    .text-center {
        text-align: center;
    }
    .text-right {
        text-align: right;
    }

    .my-2 {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }
    .mt-0 {
        margin-top: 0 !important;
    }
    .mt-1 {
        margin-top: 0.25rem !important;
    }
    .mt-2 {
        margin-top: 0.15rem !important;
    }
    .mt-3 {
        margin-top: 1rem !important;
    }
    .mr-3 {
        margin-right: 1rem !important;
    }
    .mt-4 {
        margin-top: 1.5rem !important;
    }
    .mt-5 {
        margin-top: 0.5rem !important;
    }
    .mt-6 {
        margin-top: 1rem !important;
    }
    .mb-3 {
        margin-bottom: 1rem !important;
    }
    .p-2 {
        padding: 0.5rem !important;
    }
    .p-3 {
        padding: 1rem !important;
    }
    .pt-1 {
        padding-top: 0.25rem !important;
    }
    .pt-2 {
        padding-top: 0.5rem !important;
    }
    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .bg-success {
        background-color: green;
    }
    .bg-warning {
        background-color: yellow;
    }
    .bg-danger {
        background-color: red;
    }
    .bg-light {
        background-color: #F7F7F7;
    }


    .h-50 {
        height: 385px;
        /* height: 501px; */
        max-height: 385px;
        /* max-height: 501px; */
        margin-bottom: 3px;
    }

    .benin {
        font-size: 1.20rem;
        font-weight: 500;
    }
    .parakou {
        font-size: 1.25rem;
        color: crimson;
        font-weight: 200;
    }
    .nom {
        font-weight: bold;
        font-size: 1.10rem;
        margin-left: 20px;
        margin-right: 20px;
    }
    .status {
        color: crimson;
        font-size: 1.20rem;
    }
    .poste {
        font-size: 1.10rem;
    }
    .signature {
        font-size: 1.1rem;
    }
    .py-4 {
        padding-top: 20px;
        padding-bottom: 0px;
    }
    .px-4 {
        padding-left: 0px;
        padding-right: 25px;
    }
    .mb-6 {
        margin-bottom: 2.5px;
    }
    .white {
        background-color: white;
    }
    /* .p-1 {
        padding: 3px;
    } */
    .bg-primary {
        background-color: #ddf6fb;
        border-radius: 6px;
    }
    .footer-bottom {
        position: relative;
        top: -1px;
    }
    .header {
        margin-top: 5px;
    }
</style>

<div class="row" style="margin-left: 0px;">

<?php

    $personnels = json_decode(file_get_contents("personnel.json"));
    $personnels = json_decode(json_encode($personnels), true);
    // echo "<pre>";
    // print_r($personnels);
    // exit;
    $i = 0;
    foreach($personnels as $personnel):

?>
    <?php if($i%4 == 0) echo '<br><p style="margin-top: 0px;"> </p>'; ?>
    <div class="col-badge bg-primary h-50">
        <div class="bg-primary">
            <br>
            <div class="header text-center">
                <div class="benin mb-6">REPUBLIQUE DU BENIN</div>
                <div class="parakou">Université de Parakou</div>
            </div>
            <div class="image row py-4 px-4">
                <div class="col-6" style="text-align: center; vertical-align: middle;">
                    <img src="logo.png" style="margin-left: 40px;" alt="" width="75%">
                </div>
                <div class="col-6" style="text-align: center; vertical-align: middle;">
                    <img src="img/<?= $personnel['photo'] ?>" style="border: 1px solid none;" alt="" width="70%">
                </div>
            </div>
            <div class="footer text-center">
                <div class="nom"><?= $personnel['nom'] ?></div>
                <div class="footer-bottom">
                    <div class="status mt-5"><?= isset($personnel['poste']) ? $personnel['poste'] : "Personnel administratif" ?></div>
                    <div class="poste mt-6">
                        <img src=".protect/signature.png" width="90" alt="signature">
                    </div>
                    <div class="signature mt-2">Le Recteur</div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $i++; 
        if($i%2 == 0 && $i != count($personnels)) echo '<br><p style="margin-bottom: 30px;"> </p>';
        if($i%4 == 0 && $i != count($personnels)) echo '<br><p style="page-break-after: always;"></p>';
    ?>

<?php
    endforeach;
?>

</div>

<?php
    $html = ob_get_clean();

    $pdf->loadHtml($html);

    $pdf->setPaper('A4', 'portrait');

    $pdf->render();

    $pdf->stream('badge.pdf', Array('Attachment' => 0));

?>
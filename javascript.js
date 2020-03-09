function CalculIMC() {
    var Taille = prompt('Entrez votre taille en M');
    var Poids = prompt('Entrez votre poids');
    var TailleX2 = Taille * Taille;
    var ResultatImc = Poids / TailleX2;
    alert("Votre IMC est de " + ResultatImc.toFixed(2));
    ResultatImc = '<?php echo $ResultatImc; ?>';
}
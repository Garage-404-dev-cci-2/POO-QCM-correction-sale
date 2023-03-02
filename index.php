<?php
require_once './class/Answer.php';
require_once './class/Question.php';
require_once './class/Qcm.php';
require_once './config/connexion.php';


function pretyDump($data){
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}

$qcm = new Qcm($db);
$qcm->getQuestions();

pretyDump($qcm);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM POO</title>
</head>
<body>

    <form action="./process/process_qcm.php" method="post">

        <?php $qcm->generate(); ?>

        <button type="submit">envoyer le questionnaire</button>
    </form>

</body>
</html>

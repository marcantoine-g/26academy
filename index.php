
<?php
$i = 1;
$curl = curl_init('http://developers.26academy.com/api/formations?PageID='.$i);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($curl);
if($data === false) {
    var_dump(curl_error($curl));
} else {
    $finished = 0; $inProgress = 0; $interested = 0;
    $data = json_decode($data, true);
    $result = [];
    $currentFormation = '';
    foreach ($data as $key => $value) {
        if(strcmp ($value["FormationId"], $currentFormation) != 0){
            print_r($currentFormation); die();
            array_push($result, [$currentFormation, '500$', 'Utilisateurs : ' . $finished.' finis, ' . $inProgress . ' en cours, et ' . $interested . ' intéréssés ']);
            print_r($result); die();
            $currentFormation = $value["FormationId"];
        }
        if($value['Status'] == 'finished') { $finished++;}
        if($value['Status'] == 'in progress') { $inProgress++;}
        if($value['Status'] == 'interested') { $interested++;}
    print_r($result);
    die();
    }
    // var_dump($data);
}
curl_close($curl);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TEST</h1>
</body>
</html>

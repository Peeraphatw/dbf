<?php
    $curl = curl_init();
    //curl_setopt($curl,CURLOPT_URL,'https://jsonplaceholder.typicode.com/users');
    curl_setopt($curl,CURLOPT_URL,'http://localhost:3000');
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl,CURLOPT_HTTPGET, array(
        'Content-Type : application/json',
        'Accept : application/json'
    ));
    
    $res = curl_exec($curl);
    curl_close($curl);
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./Home.css">

    <title>Document</title>
</head>

<body>
    <button class="btn btn-success" id="selectModeBtn" onclick="selectMode()">Select Mode</button>
    <table class="table table-dark table-hover table-responsive" id="table-api" value="table">
        <thead>
            <tr>
                <th>CUSCOD</th>
                <th>CUSTYP</th>
                <th>CUSNAM</th>
                <th>ADDR01</th>
                <th>ADDR02</th>
                <th>ADDR03</th>
                <th>ZIPCOD</th>
                <th>TELNUM</th>
                <th>CONTACT</th>
                <th>CUSNAM2</th>
                <th>TAXID</th>
                <th>SLMCOD</th>
                <th>PAYCOND</th>
                <th>Bs</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($res)) {
           
             foreach(json_decode($res) as $result){

                    foreach($result as $resultset){
                                                    ?>
            <tr style="cursor : pointer" id="content<?= $resultset->CUSCOD?>"
                onclick="appendSelect(<?= $resultset->CUSCOD?>)">
                <td>
                    <?= $resultset->CUSCOD?>
                </td>
                <td><?= $resultset->CUSTYP?></td>
                <td><?= $resultset->PRENAM?></td>
                <td><?= $resultset->CUSNAM?>il</td>
                <td><?= $resultset->ADDR01?></td>
                <td><?= $resultset->ADDR02?></td>
                <td><?= $resultset->ADDR03?></td>
                <td><?= $resultset->ZIPCOD?></td>
                <td><?= $resultset->TELNUM?></td>
                <td><?= $resultset->CONTACT?></td>
                <td><?= $resultset->CUSNAM2?></td>
                <td><?= $resultset->TAXID?> Name</td>
                <td><?= $resultset->SLMCOD?></td>
                <td><?= $resultset->PAYCOND?></td>
            </tr>



            <?php } }    } ?>
        </tbody>

    </table>
    <script src="index.js"></script>
</body>

</html>
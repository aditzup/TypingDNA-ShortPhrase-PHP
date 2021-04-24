<?php

    //$apiKey= '{apiKey}';
    //$apiSecret = '{apiSecret}';

    $apiKey= '';
    $apiSecret = '';

    if($_POST['action'] == 'verify')
    {
        $base_url = 'https://api.typingdna.com/%s/%s';
        $id = hash('ripemd160', $_POST['username']);
        $ch = curl_init(sprintf($base_url, 'user', $id));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ":" . $apiSecret);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        curl_close($ch);
        var_dump($response);
        $obj = json_decode($response);
        //echo $obj->{"count"};
        $count = intval($obj->{"count"});
        if($count >= 3)
        {
            header('Location: authentication.php?userid='.$id);
        }
        else
        {
            echo $count ."enrollment";
            header('Location: enrollment.php?no=1&userid='.$id);
        }
        
    }
    if($_POST['action'] == 'enrollment')
    {
        $id = $_POST["userid"];
        $number=intval($_POST["number"])+1;

        $base_url = 'https://api.typingdna.com/%s/%s';
        $tp = $_POST["tp"];
        $quality = '2';

        $ch = curl_init(sprintf($base_url, 'auto', $id));
        $data = array('tp' => $tp, 'quality' => $quality);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ":" . $apiSecret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data) . "\n");

        $response = curl_exec($ch);
        curl_close($ch);
        //var_dump($response);
        //echo $number;

        if($number < 4)
        {
            header('Location: enrollment.php?no='.$number.'&userid='.$id);
        }
        else
        {
            header('Location: index.html');
        }
        
    }
    if($_POST['action'] == 'authenticate')
    {
        $id = $_POST["userid"];

        $base_url = 'https://api.typingdna.com/%s/%s';
        $tp = $_POST["tp"];
        $quality = '2';

        $ch = curl_init(sprintf($base_url, 'auto', $id));
        $data = array('tp' => $tp, 'quality' => $quality);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ":" . $apiSecret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data) . "\n");

        $response = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($response);
    
        $result = intval($obj->{"result"});

        if($result == 1)
        {
            header('Location: result.php?result=successful');
        }
        else
        {
            header('Location: result.php?result=unsucessful');
        }

        
    }

    

?>
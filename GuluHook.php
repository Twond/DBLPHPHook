<?php
function postToDiscord($message){
    $data = array("content" => $message, "username" => "Gulu Webhook");
    $curl = curl_init("WEBHOOK_BAĞLANTISI");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}

if (file_get_contents("php://input")){
    $data = json_decode(trim(file_get_contents('php://input')));
    if ($data->type == "upvote"){
        postToDiscord($data->user." oy verdi");
    }
    if ($data->type == "test"){
        postToDiscord("test başarılı");
    }
}else{
    postToDiscord("post yok, bir oç linki buldu sanırım");
}
?>

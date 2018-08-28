<?php
function DiscordYolla($message){
    $data = array("content" => $message, "username" => "Gulu Webhook");
    $curl = curl_init("https://discordapp.com/api/webhooks/484014693132926987/ELK5AyMwmdwU04blVMWPjH5VIPAhBdnwTiB6yCh2rhwgHONlp2izaHzdvslcqDi5b46S");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}

if (file_get_contents("php://input")){
    $data = trim(file_get_contents('php://input'));
    $data = json_decode($data);
    if ($data->type == "upvote"){
        DiscordYolla($data->user." oy verdi");
    }
    if ($data->type == "test"){
        DiscordYolla("test başarılı");
    }
}else{
    DiscordYolla("post yok, bir oç linki buldu sanırım");
}
?>

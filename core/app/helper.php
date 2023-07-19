<?php

//importent functions

function showDate($d){
    $date = date_format(date_create($d),"d-m-Y");
    return $date;
}

function makeQr($id=null){
    $long_text = base64_encode($id."?"."lol=N2Y4MTU3NWI0YTkxMmFhY2FkYTFkMDRiNjQzN2NiNGQ2MmNlYmZkYWYwNzJjZmZjNWYyZTRhMTZjYmFkODI0NmEcgq6cuGWmw1iaQf2aqRuQvjegeC5fJNpTRv6-2lzdZjaydG8VLnI-9JyGj0ZCE2pY-CL");
    $Ltext = str_replace('/','',$long_text);
    $url = route('card.check.verify', $Ltext);
    // $qrCode = 'https://qrcode.tec-it.com/API/QRCode?data='.$url;
    $qrCode = 'https://chart.googleapis.com/chart?cht=qr&chl='.$url.'&chs=355x355&choe=UTF-8&chld=L|2';
    return $qrCode;
}

// function makeQr($id=null){
//     $long_text = base64_encode("&lol=N2Y4MTU3NWI0YTkxMmFhY2FkYTFkMDRiNjQzN2NiNGQ2MmNlYmZkYWYwNzJjZmZjNWYyZTRhMTZjYmFkODI0NmEcgq6cuGWmw1iaQf2aqRuQvjegeC5fJNpTRv6-2lzdZjaydG8VLnI-9JyGj0ZCE2pY-CL");
//     $url = route('card.check.verify', $id).'?'.$long_text;
//     // $qrCode = 'https://qrcode.tec-it.com/API/QRCode?data='.$url;
//     $qrCode = 'https://chart.googleapis.com/chart?cht=qr&chl='.$url.'&chs=355x355&choe=UTF-8&chld=L|2';
//     return $qrCode;
// }

<?php
$ch = curl_init();
$url = 'https://centralresource.net/contract-jobs';
curl_setopt($ch, CURLOPT_URL, $url);
curl_exec($ch);
curl_close($ch);
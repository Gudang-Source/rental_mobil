<?php

function encrypt($text)
{
    $cryptKey = '12nei2oh4o98wqjsdkqww';
    $dev      = '4Duy4ND34B4M';
    $enkripsi = base64_encode($text);

    return $enkripsi;
}

function decrypt($text)
{
    $cryptKey = '12nei2oh4o98wqjsdkqww';
    $dev      = '4Duy4ND34B4M';
    $dekripsi = base64_decode($text);

    return $dekripsi;
}

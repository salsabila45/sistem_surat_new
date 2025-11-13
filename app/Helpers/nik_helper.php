<?php

if (!function_exists('censorNik')) {
    function censorNik($nik)
    {
        $nik = trim($nik);
        if (strlen($nik) < 16) {
            return $nik; // jika kurang dari 16 digit, kembalikan apa adanya
        }
        return substr($nik, 0, 7) . str_repeat('*', 9);
    }
}

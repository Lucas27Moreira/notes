<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Operations
{
    public static function encryptId($value)
    {
        return Crypt::encrypt($value);
    }

    public static function decryptId($value)
    {
        try {
            $value = Crypt::decrypt($value);
        } catch (DecryptException $e) {
            // Handle decryption error (e.g., log the error, return null, etc.)
            // return null;
            return redirect()->route('home');

        }
        return $value;
    }
}

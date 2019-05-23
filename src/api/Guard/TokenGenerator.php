<?php

namespace Core\Guard;

class TokenGenerator
{
    private const KEY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    public function getVerificationToken(int $length = 30): string
    {
        $token = '';
        $maxNumber = strlen(self::KEY);

        for($i = 0; $i < $length; $i++) {
            $token .= self::KEY[random_int(0, $maxNumber - 1)];
        }

        return $token;
    }
}

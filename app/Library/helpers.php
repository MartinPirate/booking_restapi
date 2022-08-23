<?php


use App\Models\Client;

if (!function_exists('generate_passport_num')) {
    /**
     * Generate client passport num
     * @return int
     * @throws Exception
     */
    function generate_passport_num(): int
    {
        $number = random_int(1000000, 9999999);
        if (passport_exist($number)) {
            return generate_passport_num();
        }

        return $number;
    }
}

if (!function_exists('passport_exist')) {
    /**
     * Checks if passport no already exists
     * @param $passport_num
     * @return bool
     */
    function passport_exist($passport_num): bool
    {
        return Client::wherePassportNum($passport_num)->exists();
    }
}




<?php
declare(strict_types=1);

class Finder
{

    /**
     * @return string
     */
    public static function wrapErrors($result)
    {
        $textResponse = 'Пропусков не обнаружено';
        if (!empty($result)) {
            $textResponse = "Потеряны: ".implode( ',', $result);
        }
        return $textResponse;
    }

    /**
     * @return array
     */
    public static function findMissedNumbers(array $numbers): array
    {
        $referenceArray = range(min($numbers), max($numbers));
        return array_diff($referenceArray, $numbers);
    }

}
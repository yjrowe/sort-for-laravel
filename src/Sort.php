<?php

namespace Aex\Sort;

use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;

class Sort
{
    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var Repository
     */
    protected $config;

    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config  = $config;
    }

    public static function quickSort($sortArray)
    {
        if (count($sortArray) <= 1) {
            return $sortArray;
        }

        $leftArray = $rightArray = [];
        $firstVal = array_shift($sortArray);

        foreach ($sortArray as $value) {
            if ($value <= $firstVal) {
                $leftArray[] = $value;
            } else {
                $rightArray[] = $value;
            }
        }

        return array_merge(self::quickSort($leftArray), [$firstVal], self::quickSort($rightArray));
    }

    public static function bubbleSort($sortArray)
    {
        if (count($sortArray) <= 1) {
            return $sortArray;
        }

        for ($i = 0; $i < count($sortArray) - 1; $i++) {
            for ($j = $i + 1; $j < count($sortArray); $j++) {
                if ($sortArray[$i] > $sortArray[$j]) {
                    $tmp = $sortArray[$j];
                    $sortArray[$j] = $sortArray[$i];
                    $sortArray[$i] = $tmp;
                }
            }
        }

        return $sortArray;
    }
}
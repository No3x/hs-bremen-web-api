<?php
/**
 * Created by IntelliJ IDEA.
 * User: czoeller
 * Date: 21.03.16
 * Time: 17:51
 */

namespace HsBremen\WebApi;

use HsBremen\WebApi\DivisionByZeroException;

class Calculator
{
    /**
     * Adds $a and $b.
     * @param $a
     * @param $b
     * @return int
     */
    public function add($a, $b) {
        return $a+$b;
    }

    public function substract($a, $b) {
        return $a-$b;
    }
    public function multiply($a, $b) {
        return $a*$b;
    }
    public function divide($a, $b) {
        if( 0 === $b ) {
            throw new DivisionByZeroException();
        }
        return $a / $b;
    }
}
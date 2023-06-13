<?php

namespace App\Service;

class CalculatorService {
    public function calculate($nombreA, $nombreB, $signe) {
        $operateurs = ['+', '-', '*', '/'];

        if (is_numeric($nombreA) && is_numeric($nombreB) && in_array($signe, $operateurs)) {
            switch ($signe) {
                case '+':
                    return $nombreA + $nombreB;
                case '-':
                    return $nombreA - $nombreB;
                case '*':
                    return $nombreA * $nombreB;
                case '/':
                    if ($nombreB != 0) {
                        return $nombreA / $nombreB;
                    }
                    break;
            }
        }

        return "Impossible de faire le calcul";
    }
}
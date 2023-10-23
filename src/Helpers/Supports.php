<?php

if (!function_exists('apenas_numeros')) {
    function apenas_numeros(string $str): string
    {
        preg_match_all('/\d+/', $str, $matches);
        return implode('', $matches[0]);
    }
}

if (!function_exists('dd')) {
    function dd(...$args)
    {
        $varName = 'Debug Info';
        $message = '';
        if (php_sapi_name() === 'cli') {
            $output = [];
            foreach ($args as $arg) {
                $data = dd_data($arg);
                $output = $data;
                if (!empty($message)) {
                    $output["Debug Message"] = $message;
                }
            }

            $output = json_encode($output, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            $output = "\033[33m" . $output . "\033[0m"; // Use cor amarela para destacar a saída
            echo $output . PHP_EOL;
        } else {
            echo "<pre>";
            foreach ($args as $arg) {
                $data = dd_data($arg);
                if (!empty($message)) {
                    echo "<strong>Debug Message:</strong> $message<br>";
                }
                echo "<strong>$varName:</strong><br>";
                print_r($data);
            }
            echo "</pre>";
        }
    }

}

if (!function_exists('dd_data')) {
    function dd_data($arg)
    {
        if (is_array($arg) && count($arg) >= 3) {
            list($data, $message, $varName) = $arg;
        } elseif (is_array($arg) && count($arg) == 2) {
            list($data, $varName) = $arg;
        } elseif (is_array($arg) && count($arg) == 1) {
            $data = $arg[0];
        } else {
            $data = $arg;
        }
        return $data;
    }
}
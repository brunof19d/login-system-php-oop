<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

$builder = new DI\ContainerBuilder();

try {
    return $builder->build();
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

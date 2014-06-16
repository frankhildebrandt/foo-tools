<?php

namespace Frahil\FooTools\StringStorage;

/**
 * Interface StringStorageInterface
 *
 * provides methods for persisting a single string
 *
 * @package Frahil\FooTools\StringStorage
 */
interface StringStorageInterface {

    /**
     * Persists the given string into the storage
     *
     * @param string $data
     *
     * @return void
     */
    public function store($data);

    /**
     * Fetches the persisted string from the storage
     *
     * @return string | null
     */
    public function fetch();
} 
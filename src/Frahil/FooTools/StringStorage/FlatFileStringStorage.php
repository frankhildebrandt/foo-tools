<?php

namespace Frahil\FooTools\StringStorage;


class FlatFileStringStorage implements StringStorageInterface
{
    /**
     * @var string
     */
    private $filename;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Persists the given string into the storage
     *
     * @param string $data
     *
     * @return void
     */
    public function store($data)
    {
        file_put_contents($this->filename, $data);
    }

    /**
     * Fetches the persisted string from the storage
     *
     * @return string | null
     */
    public function fetch()
    {
        if (file_exists($this->filename)) {
            return file_get_contents($this->filename);
        }
        return '';
    }
}
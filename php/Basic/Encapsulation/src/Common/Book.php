<?php

namespace Basic\Encapsulation\Common;

class Book
{
    private static $instance;
    private $entries = [];

    private function __construct()
    {
        static::$instance = $this;
    }

    public static function getInstance()
    {
        if (static::$instance) {
            return static::$instance;
        }

        return new static;
    }

    public function getEntries()
    {
        return $this->entries;
    }

    public function addEntry(BookEntry $candidateBookEntry) {
        $index = $this->findIndex($candidateBookEntry);

        if ($index !== false) {
            array_splice($this->entries, $index, 1);
        }

        $this->entries[] = $candidateBookEntry;
    }

    private function findIndex(BookEntry $search)
    {
        $foundIndex = false;

        /** @var BookEntry $entry */
        foreach ($this->entries as $index => $entry) {
            if ($entry->isEqualTo($search)) {
                $foundIndex = $index;
                break;
            }
        }

        return $foundIndex;
    }
}
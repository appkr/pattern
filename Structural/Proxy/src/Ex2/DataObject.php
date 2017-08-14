<?php

namespace Structural\Proxy\Ex2;

class DataObject
{
    const DATABASE_FILE = 'database.txt';
    private $table = [];

    public function __construct()
    {
        if (! file_exists(self::DATABASE_FILE)) {
            file_put_contents(self::DATABASE_FILE, serialize($this->table), LOCK_EX);
        }

        if (empty($this->table)) {
            $this->hydrate();
        }
    }

    public function save(HasId $model): bool
    {
        $key = $model->getId();
        $this->table[$key] = $model;
        $this->persist();

        return true;
    }

    public function delete(HasId $model): bool
    {
        $key = $model->getId();

        if (! array_key_exists($key, $this->table)) {
            return false;
        }

        unset($this->table[$key]);
        $this->persist();

        return true;
    }

    public function find(string $id)
    {
        if (! array_key_exists($id, $this->table)) {
            return null;
        }

        return $this->table[$id];
    }

    public function all(): array
    {
        return $this->table;
    }

    private function hydrate()
    {
        $this->table = unserialize(file_get_contents(self::DATABASE_FILE));
    }

    private function persist()
    {
        file_put_contents(self::DATABASE_FILE, serialize($this->table), LOCK_EX);
    }
}
<?php

namespace __VendorPrefix\Infrastructure\Shared\Repository;

/**
 * Vendor specific repository.
 *
 * Implement this repository if we need to execute raw SQL or vendor specific SQL
 * for better performance or other reasons.
 */
class VendorRepository
{
    private $pdo; // or RDBMS vendor specific driver, Doctrine DBAL connection, Mongo, ...
    private $metadata; // contains table name, column name and its type information

    public function __construct(\PDO $pdo, $metadata)
    {
        $this->pdo = $pdo;
        $this->metadata = $metadata;
    }

    /**
     * Persist.
     *
     * Pattern 1:
     * - SELECT ~
     * - INSERT ~ or UPDATE ~
     *
     * Pattern 2:
     * - INSERT ~ ON DUPLICATE KEY UPDATE ~
     */
    public function persist(array $row)
    {
        list($columnNames, $values, $placeholders1, $placeholders2) = $this->extract($row);

        // MySQL specific statement
        $insert = 'INSERT INTO %s (%s) VALUES (%s) ON DUPLICATE KEY UPDATE %s';
        $sql = sprintf($insert, $this->metadata->class, $columnNames, $placeholders1, $placeholders2);

        $statement = $this->pdo->prepare($sql);

        //$statement->bindParam($parameter, $variable, $type);
        $this->bindParams($statement, $values, $this->metadata);

        return $statement->execute();
    }

    public function persistAll(array $rows)
    {
    }

    public function insert(array $row)
    {
        // INSERT INTO ...
    }

    public function insertAll(array $rows)
    {
        // INSERT INTO ~ () VALUES (), (), ...
    }

    // [$propName => $value]
    public function update(array $props, $id)
    {
        return $this->updateBy($row, array('id' => $id));
    }

    // [$propName => $value], [$propName => $value]
    public function updateBy(array $props, array $criteria)
    {
        // UPDATE ...
    }

    // [$propName => $value]
    public function updateAll(array $props)
    {
        return $this->updateBy($props, array());
    }

    public function delete($id)
    {
        return $this->deleteBy(array('id' => $id));
    }

    public function deleteBy(array $criteria)
    {
        // DELETE FROM ...
    }

    public function deleteAll(array $ids)
    {
        return $this->deleteBy(array('id' => $ids));
    }
}

<?php

namespace MyProject\Models;

use MyProject\Services\Db;



abstract class ActiveRecordEntity
{
    /** @var int */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value) //магический метод__set(string $name, $value).если этот метод добавить в класс и попытаться задать ему несуществующее свойство, то вместо динамического добавления такого свойства, будет вызван этот метод. При этом в первый аргумент $name, попадёт имя свойства, а во второй аргумент $value – его значение. 
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    //метод underscoreToCamelCase() занимается преобразованием названий с БД в кемелкейс. Функция ucwords() делает из строки string_with_smth  String_With_Smth. Функция strreplace() убирает символы из строки, после этого StringWithSmth. Функция lcfirst() просто делает первую букву в строке маленькой. stringWithSmth. 
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }
    //Здесь в качестве класса передаем статически имя класса, объектами которого будут данные из таблицы, которую также указываем статически.

        /**
     * @param int $id
     * @return static|null
     */

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function getAllById(int $id): array 
    {
        $db = Db::getInstance();
        return $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
    }
   

    abstract protected static function getTableName(): string;

    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
        $this->update($mappedProperties);
    } else {
        $this->insert($mappedProperties);
    }
    }

    private function update(array $mappedProperties):void 
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column =>$value) {
        $param = ':param' . $index;//:param1
        $columns2params[] = $column . ' = ' . $param; //column1 = :param1
        $params2values[':param' .$index] = $value; //[:param1 => value1]
        $index++;
    }

    $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
    $db = Db::getInstance();
    $db->query($sql, $params2values, static::class);
    }

private function insert(array $mappedProperties): void
{
    $filteredProperties = array_filter($mappedProperties);

    $columns = [];
    $paramsNames = [];
    $params2values = [];
    foreach ($filteredProperties as $columnName => $value) {
        $columns[] = '`' . $columnName . '`';
        $paramName = ':' . $columnName;
        $paramsNames[] = $paramName;
        $params2values[$paramName] = $value;
    }

   $columnsViaSemicolon = implode(', ', $columns);
   $paramsNamesViaSemicolon = implode(', ', $paramsNames);
   $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';
   $db = Db::getInstance();
   $db->query($sql, $params2values, static::class);
   $this->id =$db->getLastInsertId();
   $this->refresh();
}

private function refresh(): void
{
    $objectFromDb = static::getById($this->id);
    $reflector = new \ReflectionObject($objectFromDb);
    $properties = $reflector->getProperties();

    foreach ($properties as $property) {
        $property->setAccessible(true);
        $propertyName = $property->getName();
        $this->$propertyName = $property->getValue($objectFromDb);
    }
}

private function mapPropertiesToDbFormat(): array
{
    $reflector = new \ReflectionObject($this);
    $properties = $reflector->getProperties();

    $mappedProperties = [];
    foreach ($properties as $property) {
        $propertyName = $property->getName();
        $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
        $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
    }

    return $mappedProperties;
}

private function camelCaseToUnderscore(string $source): string
{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
}
public function delete(): void
{
    $db = Db::getInstance();
    $db->query('DELETE FROM `' . static::getTableName() . '` WHERE id = :id', [':id' => $this->id]);
    $this->id = null;
}

public static function findOneByColumn(string $columnName, $value): ?self
{
    $db = Db::getInstance();
    $result = $db->query(
        'SELECT * FROM `' .static::getTableName() . '` WHERE `' . $columnName . '` = :value LIMIT 1;',
        [':value' => $value], static::class
    );
    if ($result === []) {
        return null;
    }
    return $result[0];
}
}
<?php
namespace MyProject\Services;

use MyProject\Exceptions\DbException;

class Db
{
	private static $instance;
	/** @var \PDO */
	private $pdo;

	private function __construct()
	{
		$dbOptions = (require __DIR__ . '/../../settings.php')['db'];

        try {

            $this->pdo = new \PDO(
			'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
			$dbOptions['user'],
			$dbOptions['password']

		);
		$this->pdo->exec('SET NAMES UTF8');
    } catch (\PDOException $e){
        throw new DbException('Error with connection to DB: ' . $e->getMessage());
    }
	}

	public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array 
    //Для получения статей из базы данных создать объекты этого класса и заполнить их свойства значениями из базы данных. stdClass – это такой встроенный класс в PHP, у которого нет никаких свойств и методов.
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className); //специальная константа - \PDO::FETCH_CLASS говорит о том, что нужно вернуть результат в виде объектов какого-то класса. Второй аргумент – это имя класса, которое мы можем передать в метод query().     Дальше в АктивРекордЕнтити где в методуе файндолл будем вкладывать имя таб и класс.

    }

    public static function getInstance(): self
    {
    	if (self::$instance === null) {
    		self::$instance = new self();
    	}

    	return self::$instance;

    }

    public function getLastInsertId(): int 
    {
        return (int) $this->pdo->lastInsertId();
    }
}

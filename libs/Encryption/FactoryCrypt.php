<?php

/**
 * 
 */
class FactoryCrypt{

	protected static $_hash_string;
	protected static $_saltPrefix = '2a';
	protected static $_defaultCost = 8;
	protected static $_saltLength = 22;

	/**
	 * Generate a random base64 encoded salt
	 * 
	 * @return string
	 */
	public static function generateRandomSalt() {
		// Salt seed
		$seed = uniqid(mt_rand(), true);
		// Generate salt
		$salt = base64_encode($seed);
		$salt = str_replace('+', '.', $salt);
		return substr($salt, 0, self::$_saltLength);
	}

	/**
	 * Build a hash string for crypt()
	 * 
	 * @param  integer $cost The hashing cost
	 * @param  string $salt  The salt
	 * 
	 * @return string
	 */
	protected static function __generateHashString($cost, $salt) {
		return sprintf('$%s$%02d$%s$', self::$_saltPrefix, $cost, $salt);
	}

	/**
	 * [getHashString description]
	 * @return [type] [description]
	 */
	public static function getHashString()
	{
		return self::$_hash_string;
	}

}
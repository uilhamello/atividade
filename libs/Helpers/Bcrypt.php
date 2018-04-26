<?php

/**
 * Baseado na classe Bcrypt do Thiago Belem 
 * @link   https://gist.github.com/3438461
 */
class Bcrypt extends FactoryCrypt{

	/**
	 * [hash description]
	 * @param  [type] $string [description]
	 * @param  [type] $cost   [description]
	 * @return [type]         [description]
	 */
	public static function hash($string, $cost = null) {
		if (empty($cost)) {
			$cost = self::$_defaultCost;
		}
		// Salt
		$salt = self::generateRandomSalt();
		// Hash string
		self::$_hash_string = self::__generateHashString((int)$cost, $salt);
		return crypt($string, self::$_hash_string);
	}
	
	/**
	 * Check a hashed string
	 * 
	 * @param  string $string The string
	 * @param  string $hash   The hash
	 * 
	 * @return boolean
	 */
	public static function check($string, $hash) {
		return (crypt($string, $hash) === $hash);
	}
}
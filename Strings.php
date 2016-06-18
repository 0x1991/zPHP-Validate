<?
declare(strict_types = 1);

namespace zPHP\Validate;

class Strings {

	/**
	 * @throws Exceptions\StrLenInvalid codes 0 if too short or 1 if too long
	 */
	static function checkLen (string $string, int $min, int $max, string $msgMin, string $msgMax) : string {
		$len = mb_strwidth($string);

		if ($len < $min)
			throw new Exceptions\StrLenInvalid($msgMin, 0);
		if ($len > $max)
			throw new Exceptions\StrLenInvalid($msgMax, 1);

		return $string;
	}
}
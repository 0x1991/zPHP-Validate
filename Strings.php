<?
declare(strict_types = 1);

namespace zPHP\Validate;

class Strings {

	/** @throws Exceptions\StrLenInvalid codes 0 if too short or 1 if too long */
	static function checkLen (string $string, int $min, int $max, string $msgMin, string $msgMax) : string {
		$len = mb_strwidth($string);

		if ($len < $min)
			throw new Exceptions\StrLenInvalid($msgMin, 0);
		if ($len > $max)
			throw new Exceptions\StrLenInvalid($msgMax, 1);

		return $string;
	}

	/**
	 * Examples: "0,32"->32; "-1.32"->-132; "1.212"->throw Exception
	 *
	 * @throws Exceptions\MoneyInvalid
	 */
	static function toMoneyKop (string $amount) : int {
		$amount = str_replace('+', '', str_replace(',', '.', $amount));
		if (!preg_match('/^(-)?([0-9]+)(\.([0-9]{0,2}))?$/', $amount))
			throw new Exceptions\MoneyInvalid;
		return (int)($amount * 100);
	}
}
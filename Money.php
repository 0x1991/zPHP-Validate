<?
declare(strict_types = 1);

namespace zPHP\Validate;

class Money {

	/**
	 * Examples: "0,32"->32; "-1.32"->-132; "1.212"->throw Exception
	 *
	 * @throws Exceptions\MoneyInvalid
	 */
	static function strToKop (string $amount) : int {
		$amount = str_replace('+', '', str_replace(',', '.', $amount));
		if (!preg_match('/^(-)?([0-9]+)(\.([0-9]{0,2}))?$/', $amount))
			throw new Exceptions\MoneyInvalid;
		return (int)($amount * 100);
	}
}
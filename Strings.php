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
	 * @param string $amount "0,32"->32; "-1.32"->-132; "1.212"->throw Exception
	 * @throws Exceptions\MoneyInvalid
	 */
	static function toMoneyKop (string $amount) : int {
		$amount = str_replace('+', '', str_replace(',', '.', $amount));
		if (!preg_match('/^(-)?([0-9]+)(\.([0-9]{0,2}))?$/', $amount))
			throw new Exceptions\MoneyInvalid;
		return (int)($amount * 100);
	}

	/** @param string[] $endingArray array('яблоко', 'яблока', 'яблок') */
	static function numEnding (int $number, array $strings) : string {
		$numberPr = $number % 100;
		if ($numberPr >= 11 && $numberPr <= 19)
			$res = $strings[2];
		else {
			$i = $numberPr % 10;
			switch ($i) {
				case 1:
					$res = $strings[0];
					break;
				case 2:
				case 3:
				case 4:
					$res = $strings[1];
					break;
				default:
					$res = $strings[2];

			}
		}
		return $res;
	}
}
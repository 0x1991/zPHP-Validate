<?
declare(strict_types = 1);

namespace zPHP\Validate;

class Phone {

	/**
	 * Convert to international format
	 *
	 * @throws Exceptions\PhoneInvalid
	 */
	static function toFormat (string $phone) : string {
		$phone = '+' . preg_replace('/[^0-9]/', '', $phone);
		if (!preg_match('/^\+([0-9]{1,3})([0-9]{10})$/', $phone))
			throw new Exceptions\PhoneInvalid;
		return $phone;
	}

	/** @throws Exceptions\PhoneInvalid */
	static function isRus (string $phone) : bool {
		$phone = self::toFormat($phone);
		return (bool)preg_match('/^\+7([0-9]{10,10})$/', $phone);
	}

	/**
	 * Удаление лишних символов и проверка на валидность
	 *
	 * Валидным считается номер состояший как минимум из 2х цифр.
	 * Если номер не валиден - метод вернет NULL.
	 */
	static function clean (string $number) : ? string {
		$number = preg_replace('/[^0-9\+]/', '', $number);
		if (!preg_match('/^(\+)?([0-9]{2,13})$/', $number))
			return NULL;

		return $number;
	}
}
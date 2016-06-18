<?
declare(strict_types = 1);

namespace zPHP\Validate;

class Email {

	/**
	 * @throws Exceptions\EmailInvalid
	 */
	static function prep (string $email) : string {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			throw new Exceptions\EmailInvalid;
		return $email;
	}
}
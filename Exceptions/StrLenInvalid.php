<?
declare(strict_types = 1);

namespace zPHP\Validate\Exceptions;

class StrLenInvalid extends Base {

	public function __construct (string $message, int $code) {
		parent::__construct($message, $code);
	}
}
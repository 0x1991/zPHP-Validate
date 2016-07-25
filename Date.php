<?
declare(strict_types = 1);

namespace zPHP\Validate;

class Date {

	/**
	 * @param string $format support %MONTH%/%DAYWEEK% for rus
	 * @param int    $time
	 * @param bool   $isNom  is nominative
	 * @return string|null
	 */
	static function rus (string $format, int $time, bool $isNom = TRUE) {
		$months = [
			$isNom ? 'январь' : 'января',
			$isNom ? 'февраль' : 'февраля',
			$isNom ? 'март' : 'марта',
			$isNom ? 'апрель' : 'апреля',
			$isNom ? 'май' : 'мая',
			$isNom ? 'июнь' : 'июня',
			$isNom ? 'июль' : 'июля',
			$isNom ? 'август' : 'августа',
			$isNom ? 'сентябрь' : 'сентября',
			$isNom ? 'октябрь' : 'октября',
			$isNom ? 'ноябрь' : 'ноября',
			$isNom ? 'декабрь' : 'декабря'
		];
		$days   = [
			'понедельник',
			'вторник',
			'среда',
			'четверг',
			'пятница',
			'суббота',
			'воскресенье'
		];

		$sArr = [
			'/%MONTH%/i',
			'/%DAYWEEK%/i'
		];
		$rArr = [
			$months[date('m', $time) - 1],
			$days[date('N', $time) - 1]
		];

		$format = preg_replace($sArr, $rArr, $format);
		$res    = date($format, $time);
		return $res === FALSE ? NULL : $res;
	}
}
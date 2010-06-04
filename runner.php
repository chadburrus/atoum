<?php

namespace mageekguy\tests\unit;

use \mageekguy\tests\unit;

require(__DIR__ . '/autoloader.php');

abstract class runner implements observable
{
	const testClass = '\mageekguy\tests\unit\test';

	const eventRunStart = 1;
	const eventRunStop = 2;

	protected $score = null;
	protected $observers = array();

	public function __construct()
	{
		$this->score = new unit\score();
	}

	public function addObserver(observer $observer)
	{
		$this->observers[] = $observer;
		return $this;
	}

	public function sendEventToObservers($event)
	{
		foreach ($this->observers as $observer)
		{
			$observer->manageObservableEvent($this, $event);
		}

		return $this;
	}

	public abstract function run();
}

?>
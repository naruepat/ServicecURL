<?php namespace Naruepat\Servicecurl;

class Servicecurl {

	public function checkpoint()
	{
		return 'checkpoint test'.Config::get('package::domain');
	}
}


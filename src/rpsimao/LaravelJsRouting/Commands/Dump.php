<?php namespace rpsimao\LaravelJsRouting\Commands;

use rpsimao\LaravelJsRouting\JSRouter;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class Dump extends Command {

	protected $name = 'laravel-js-routing:dump';

	protected $description = 'Export routes to a static js file for production. (default path : resources/assets/js/routes.js)';

	public function handle(){
		$content = JSRouter::generate();
		File::put($this->argument('path') ? $this->argument('path') : Config::get('LaravelJsRouting::dump_path'), $content);
	}

	protected function getArguments(){
		return array(
			array('path', InputArgument::OPTIONAL, 'Path', public_path ('js/routes.js')),
		);
	}
}
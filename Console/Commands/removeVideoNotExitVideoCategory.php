<?php

namespace Themes\Media\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class removeVideoNotExitVideoCategory extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'videoCategory:removeVideoNotExis';

	private $timeout = 7200;
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Remove record empty category (cat_id == 0).';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}


	public function handle() {
		\DB::transaction(function () {
		    $videos = Video::lists('string_id');
		    $videoCatNotExits = VideoCat::whereNotIn('video_id', $videos)->delete();
		    echo $videoCatNotExits ? 'Success' : 'Fail';
		});
	}


}
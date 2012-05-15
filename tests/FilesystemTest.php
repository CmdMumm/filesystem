<?php

use Illuminate\Filesystem;

class FilesystemTest extends PHPUnit_Framework_TestCase {

	public function testGetRetrievesFiles()
	{
		file_put_contents(__DIR__.'/file.txt', 'Hello World');
		$files = new Filesystem;
		$this->assertEquals('Hello World', $files->get(__DIR__.'/file.txt'));
		@unlink(__DIR__.'/file.txt');
	}


	public function testPutStoresFiles()
	{
		$files = new Filesystem;
		$files->put(__DIR__.'/file.txt', 'Hello World');
		$this->assertEquals('Hello World', file_get_contents(__DIR__.'/file.txt'));
		@unlink(__DIR__.'/file.txt');
	}


	public function testDeleteRemovesFiles()
	{
		file_put_contents(__DIR__.'/file.txt', 'Hello World');
		$files = new Filesystem;
		$files->delete(__DIR__.'/file.txt');
		$this->assertFalse(file_exists(__DIR__.'/file.txt'));
		@unlink(__DIR__.'/file.txt');
	}

}
<?php

namespace Ci4adminrbac\Commands;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class Install extends BaseCommand
{

	protected $group = 'Ci4adminrbac';
	protected $name = 'ci4adminrbac:install';
	protected $description = 'Install the module';
	protected $usage = 'ci4adminrbac:install';

	public function run(array $params)
	{
		try {
			CLI::write("Trying install module");

			$this->copyResources();
			$this->call("migrate", ["-all"]);
			$this->moduleSeeder();

			CLI::write("Module have been installed");
		} catch (\Exception  $e) {
			$this->showError($e);
		}
	}

	private function moduleSeeder()
	{
		CLI::write("Run seeder module");
		$seeder = Database::seeder();
		$seeder->call("Ci4adminrbac\Database\Seeds\AdminSeeder");
	}

	private function copyResources()
	{
		CLI::write("Copying assest to public directory");
		$sourcePath = realpath(__DIR__ . "/../../resources\dist");
		$destPath = realpath(ROOTPATH . "public");

		$this->copy($sourcePath, $destPath, ["mix-manifest.json"]);
	}

	public function copy($source, $target, $skipFiles = [])
	{
		if (!is_dir($source)) {
			return copy($source, $target);
		}

		$it = new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS);
		$ri = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::SELF_FIRST);
		$this->ensureDirectoryExists($target);

		$result = true;
		/** @var RecursiveDirectoryIterator $ri */
		foreach ($ri as $file) {

			$fileName = $file->getFilename();

			$skip = false;
			foreach ($skipFiles as $skipFile) {
				if (strcasecmp($skipFile, $fileName) == 0) {
					$skip = true;
				}
			}

			if ($skip) {
				continue;
			}

			$targetPath = $target . DIRECTORY_SEPARATOR . $ri->getSubPathName();
			if ($file->isDir()) {
				$this->ensureDirectoryExists($targetPath);
			} else {
				$result = $result && copy($file->getPathname(), $targetPath);
			}
		}

		return $result;
	}

	public function ensureDirectoryExists($directory)
	{
		if (!is_dir($directory)) {
			if (file_exists($directory)) {
				throw new \RuntimeException(
					$directory . ' exists and is not a directory.'
				);
			}
			if (!@mkdir($directory, 0777, true)) {
				throw new \RuntimeException(
					$directory . ' does not exist and could not be created.'
				);
			}
		}
	}
}

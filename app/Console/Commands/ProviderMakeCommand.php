<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 11/15/18
 * Time: 11:01 PM
 */

namespace App\Console\Commands;


use Illuminate\Console\GeneratorCommand;

class ProviderMakeCommand extends GeneratorCommand
{
  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'make:provider';
  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create a new service provider class';
  /**
   * The type of class being generated.
   *
   * @var string
   */
  protected $type = 'Provider';

  /**
   * Get the stub file for the generator.
   *
   * @return string
   */
  protected function getStub()
  {
    return __DIR__ . '/stubs/provider.stub';
  }

  /**
   * Get the default namespace for the class.
   *
   * @param string $rootNamespace
   *
   * @return string
   */
  protected function getDefaultNamespace($rootNamespace)
  {
    return $rootNamespace . '\Providers';
  }
}
<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 11/15/18
 * Time: 10:19 PM
 */

if (!function_exists('config_path')) {
  /**
   * Get the configuration path.
   *
   * @param  string $path
   * @return string
   */
  function config_path($path = '')
  {
    return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
  }
}
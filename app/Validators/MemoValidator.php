<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class MemoValidator.
 *
 * @package namespace App\Validators;
 */
class MemoValidator extends LaravelValidator
{

  const RULE_CREATE = 'create';
  const RULE_UPDATE = 'update';

  /**
   * Validation Rules
   *
   * @var array
   */
  protected $rules = [
    ValidatorInterface::RULE_CREATE => [
      'student_id' => 'required',
      'student_name' => 'required',
      'student_email' => 'required',
      'starts_at' => 'required',
      'ends_at' => 'required',
      'material_id' => 'required'
    ],
    ValidatorInterface::RULE_UPDATE => [],
  ];
}

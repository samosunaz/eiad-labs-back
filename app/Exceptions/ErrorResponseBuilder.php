<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 12/09/18
 * Time: 19:30
 */

namespace App\Exceptions;


class ErrorResponseBuilder
{

    private $errorStatus;
    private $message;

    public function __construct($errorStatus, $message)
    {
        $this->errorStatus = $errorStatus;
        $this->message = $message;
    }

    /**
     * @param mixed $errorStatus
     */
    public function setErrorStatus($errorStatus): void
    {
        $this->errorStatus = $errorStatus;
    }

    /**
     * @return mixed
     */
    public function getErrorStatus()
    {
        return $this->errorStatus;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function __toString()
    {
        $errorResponse = [];
        $errorResponse['status'] = $this->errorStatus;
        $errorResponse['message'] = $this->message;
        return json_encode($errorResponse);
    }
}
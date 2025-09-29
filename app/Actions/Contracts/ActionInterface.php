<?php

namespace App\Actions\Contracts;

interface ActionInterface
{
    /**
     * Perform the action.
     *
     * @param mixed ...$args Optional arguments for the action
     * @return mixed
     */
    public function perform(...$args);
}
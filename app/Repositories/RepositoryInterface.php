<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function paginateRequest(array $requestParams);
}

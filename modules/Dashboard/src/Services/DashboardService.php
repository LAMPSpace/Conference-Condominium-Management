<?php

namespace Modules\Dashboard\src\Services;

use App\Services\BaseService;
use Modules\Dashboard\src\Repositories\DashboardRepository;

class DashboardService extends BaseService
{
    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }
}

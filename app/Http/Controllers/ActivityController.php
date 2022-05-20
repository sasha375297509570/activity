<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Commands\SaveActivitiesCommand;
use App\Queries\GetAllActivitiesQuery;
use Ecotone\Modelling\CommandBus;
use Ecotone\Modelling\QueryBus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivityController extends Controller
{
    /**
     *
     * @param CommandBus $commandBus
     * @param QueryBus $queryBus
     * @param ActivityRepositoryInterface $activityRepository        
     */
    public function __construct(
        private CommandBus $commandBus, 
        private QueryBus $queryBus, 
        private ActivityRepositoryInterface $activityRepository
    ) {    	
    }

    /**
     *     
     * @param Request $request
     * @return bool
     */
    public function create(Request $request): bool
    {       
        $validated = $request->validate([
            'params.url' => 'required|url',
            'params.date' => 'required|date',     
        ]);

       return $this->commandBus->send(new SaveActivitiesCommand($request->params['url'], $request->params['date']));;
    }

    /**
     *     
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function show(Request $request): LengthAwarePaginator
    {
        return $this->queryBus->send(new GetAllActivitiesQuery($this->activityRepository));        
    }
}

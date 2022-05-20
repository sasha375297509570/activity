<?php

namespace App\Handlers;

use Ecotone\Modelling\Attribute\CommandHandler;
use Ecotone\Modelling\Attribute\QueryHandler;
use App\Commands\SaveActivitiesCommand;
use App\Queries\GetAllActivitiesQuery;
use App\Models\Activity;
use App\Repositories\DbActivityRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivitiesHandler
{	
    /**
     *
     * @param DbActivityRepository $activityRepository         
     */
    public function __construct(private DbActivityRepository $activityRepository)
    {       
    }

    /**
     *
     * @param SaveActivitiesCommand $command
     * @return bool     
     */
    #[CommandHandler]
    public function saveActivities(SaveActivitiesCommand $command): bool
    {
        $activity = new Activity();
        $activity->url = $command->getUrl();
        $activity->accured_at = $command->getDate();
        
        return $activity->save();        
    }

	/**
     *
     * @param GetAllActivitiesQuery $query
     * @return LengthAwarePaginator        
     */
    #[QueryHandler]
    public function getActivities(GetAllActivitiesQuery $query): LengthAwarePaginator
    {       
        return $this->activityRepository->findDataOfActivity();
    }
}

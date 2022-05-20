<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class DbActivityRepository implements ActivityRepositoryInterface
{
	/**
     *
     * @return LengthAwarePaginator
     */
	public function findDataOfActivity(): LengthAwarePaginator
	{
		return Activity::select('url', DB::raw('count(*) as total'),  DB::raw('max(accured_at) as accured_at'))
		    ->groupBy('url')
		    ->orderBy('id')
		    ->paginate(Activity::select('url')->groupBy('url')->get()->count());
	}
}

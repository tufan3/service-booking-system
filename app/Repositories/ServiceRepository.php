<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Service;

class ServiceRepository
{
    public function getService()
    {
        return Service::active()->get();
    }

    public function storeService($request){
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;
        $service->save();
        return $service;
    }

    public function updateService($request, $service){
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->status = $request->status;
        $service->save();

        return $service;
    }

    public function destroyService($service){
        $service->delete();

        return $service;
    }

}

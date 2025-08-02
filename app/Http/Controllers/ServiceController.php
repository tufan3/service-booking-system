<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Repositories\ServiceRepository;

class ServiceController extends Controller
{

    protected $ServiceRepository;

    public function __construct(ServiceRepository $ServiceRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
    }
    public function index()
    {
        $services = $this->ServiceRepository->getService();

        return response()->json([
            'success' => true,
            'data' => $services,
        ]);
    }

    public function store(ServiceRequest $request)
    {
        $service = $this->ServiceRepository->storeService($request);

        return response()->json([
            'success' => true,
            'data' => $service,
            'message' => 'Service created successfully',
        ], 201);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $service = $this->ServiceRepository->updateService($request, $service);


        return response()->json([
            'success' => true,
            'data' => $service,
            'message' => 'Service updated successfully',
        ]);
    }

    public function destroy(Service $service)
    {
        $service = $this->ServiceRepository->destroyService($service);

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully',
        ]);
    }
}

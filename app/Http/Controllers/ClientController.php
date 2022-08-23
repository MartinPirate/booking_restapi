<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Interfaces\ClientRepositoryInterface;
use App\Traits\ResponseAPI;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{

    use ResponseAPI;

    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {

        $this->clientRepository = $clientRepository;
    }

    public function index(): JsonResponse
    {

        $clients = $this->clientRepository->getAllClients();

        $clients = ClientResource::collection($clients);

        return $this->success('List of All Clients', $clients);
    }

}

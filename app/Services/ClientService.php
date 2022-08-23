<?php

namespace App\Services;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\DeleteClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ClientService implements ClientRepositoryInterface
{

    public function getClientById(int $id): Client
    {
        return Client::whereId($id)->first();
    }

    public function getAllClients() : Collection
    {
        return Client::all();
    }

    public function getClientBookings($id): array
    {
        // TODO: Implement getClientBookings() method.
    }

    public function deleteClient(DeleteClientRequest $request): mixed
    {
        // TODO: Implement deleteClient() method.
    }

    public function createClient(CreateClientRequest $request): array
    {
        // TODO: Implement createClient() method.
    }

    public function updateClient(UpdateClientRequest $request): array
    {
        // TODO: Implement updateClient() method.
    }
}

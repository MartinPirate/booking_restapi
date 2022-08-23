<?php

namespace App\Interfaces;


use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\DeleteClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Booking;
use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

interface ClientRepositoryInterface
{

    /**
     * @param int $id
     * @return Client
     */
    public function getClientById(int $id): Client;


    /**
     *return all clients
     * @return Collection
     */
    public function getAllClients(): Collection;

    /**
     * @param $id
     * @return Array<Booking>
     */
    public function getClientBookings($id): array;


    /**
     * @param DeleteClientRequest $request
     * @return mixed
     */
    public function deleteClient(DeleteClientRequest $request): mixed;

    /**
     * @param CreateClientRequest $request
     * @return Array<Client>
     */
    public function createClient(CreateClientRequest $request): array;


    /**
     * @param UpdateClientRequest $request
     * @return Array<Client>
     */
    public function updateClient(UpdateClientRequest $request): array;
}

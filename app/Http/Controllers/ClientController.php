<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginationEnabled = config('clientsmanagement.enablePagination');
        if ($paginationEnabled) {
            $clients = Client::paginate(config('clientsmanagement.paginateListSize'));
        } else {
            $clients = Client::all();
        }

        return view('client.show-clients', compact('clients'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('client.create-client');
    }

    /**
     * @param \App\Http\Requests\ClientStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStoreRequest $request)
    {
        $client = [];
        if($request->validated()) {
            if ($request->file('image')) {
                $fileName = time().'.'.$request->image->getClientOriginalExtension();
                $filePath = $request->file('image')->storeAs('uploads/clients/images', $fileName);
                $asset['image'] = $fileName;
            }

            $client['businessname'] = $request->input('businessname');
            $client['firstname'] = $request->input('firstname');
            $client['middlename'] = $request->input('middlename');
            $client['lastname'] = $request->input('lastname');
            $client['phone'] = $request->input('phone');
            $client['email'] = $request->input('email');
            $client['address'] = $request->input('address');
            $client['rcno'] = $request->input('rcno');
            $client['industry'] = $request->input('industry');
            $client['country'] = $request->input('country');
            $client['sex'] = $request->input('sex');
            $client['website'] = $request->input('website');
            Client::create($client);
        }

        return redirect()->route('client.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Client $client)
    {
        return view('client.show-client', compact('client'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Client $client)
    {
        return view('client.edit-client', compact('client'));
    }

    /**
     * @param \App\Http\Requests\ClientUpdateRequest $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());

        $request->session()->flash('client.id', $client->id);

        return redirect()->route('client.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    {
        $client->delete();

        return redirect()->route('client.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetStoreRequest;
use App\Http\Requests\AssetUpdateRequest;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginationEnabled = config('assetsmanagement.enablePagination');
        if ($paginationEnabled) {
            $assets = Asset::paginate(config('assetsmanagement.paginateListSize'));
        } else {
            $assets = Asset::all();
        }

        return view('asset.show-assets', compact('assets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('asset.create-asset');
    }

    /**
     * @param \App\Http\Requests\AssetStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetStoreRequest $request)
    {
        $asset = [];

        if($request->validated()) {
            if ($request->file('image')) {
                $fileName = time().'_'.$request->image->getClientOriginalName();
                $filePath = $request->file('image')->storeAs('uploads/assets/images', $fileName);
                $asset['image'] = $fileName;
            }

            $asset['name'] = $request->input('name');
            $asset['description'] = $request->input('description');
            $asset['location'] = $request->input('location');
            Asset::create($asset);
        }


        return redirect()->route('asset.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Asset $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Asset $asset)
    {
        return view('asset.show-asset', compact('asset'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Asset $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Asset $asset)
    {
        return view('asset.edit-asset', compact('asset'));
    }

    /**
     * @param \App\Http\Requests\AssetUpdateRequest $request
     * @param \App\Models\Asset $asset
     * @return \Illuminate\Http\Response
     */
    public function update(AssetUpdateRequest $request, Asset $asset)
    {
        $asset->update($request->validated());

        $request->session()->flash('asset.id', $asset->id);

        return redirect()->route('asset.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Asset $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Asset $asset)
    {
        $asset->delete();

        return redirect()->route('asset.index');
    }
}

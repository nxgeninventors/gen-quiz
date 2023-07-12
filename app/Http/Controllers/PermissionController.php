<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct()
    {
        // $this->middleware('can:permission list', ['only' => ['index', 'show']]);
        // $this->middleware('can:permission create', ['only' => ['create', 'store']]);
        // $this->middleware('can:permission edit', ['only' => ['edit', 'update']]);
        // $this->middleware('can:permission delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = (new Permission)->newQuery();

        if (request()->has('search')) {
            $permissions->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $permissions->orderBy($attribute, $sort_order);
        } else {
            $permissions->latest();
        }

        $permissions = $permissions->paginate(5)->onEachSide(2);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePermissionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->all());

        return redirect()->route('permissions.index')
                        ->with('message', __('Permission created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\View\View
     */
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePermissionRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('permissions.index')
                        ->with('message', __('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
                        ->with('message', __('Permission deleted successfully'));
    }
}

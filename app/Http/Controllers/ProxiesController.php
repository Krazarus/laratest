<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProxy;
use App\Proxy;
use Illuminate\Http\Request;

class ProxiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proxies = Proxy::all();
        return view('proxies.proxies', [ 'proxies' => $proxies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proxies = User::findOrFail($id);
        return view('proxies.edit', compact('proxies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreProxy $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proxy = Proxy::findOrFail($id);
        return view('proxies.edit', compact('proxy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProxy $request, $id)
    {
        $proxy = Proxy::findOrFail($id);
        $proxy->update($request->all());
        return redirect()->route('proxies.index', $proxy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

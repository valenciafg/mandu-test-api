<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Models\Division;
use App\Http\Resources\Division as DivisionResource;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $division = Division::all()->superior_division;
        // return new DivisionResource($division);
        return new DivisionResource(Division::with('superior_division', 'subdivisions')->get());
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
        try {
            $division = Division::create($request->all());
            if ($request->subdivisions && !empty($request->subdivisions)) {
                $subdivisions = Division::findMany($request->subdivisions);
                $division->subdivisions()->saveMany($subdivisions);
            }
            return new DivisionResource($division);
        } catch (PDOException $e) {
            return $e->getMessage();
        } catch(QueryException $e) {
            return $e;
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return new DivisionResource(Division::find($id));
    }

    public function showSuperiorDivision($id)
    {
        //
        return new DivisionResource(Division::find($id)->superior_division);
        // return $this->hasOne('App\Models\Division', '');
    }

    public function showSubdivisions($id)
    {
        //
        return new DivisionResource(Division::find($id)->subdivisions);
        // return $this->hasOne('App\Models\Division', '');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $division = Division::findOrFail($id);
        $division->update($request->all());
        $division->save();
        return new DivisionResource($division);
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
        $division = Division::findOrFail($id);
        if ($division->delete()) {
            return new DivisionResource($division);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Side;
use Illuminate\Http\Request;

class SideController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Side  $side
     * @return \Illuminate\Http\Response
     */
    public function destroy(Side $side)
    {
        $side->delete();

        toastr()->success('Side Removed Successfully');

        return redirect()->back();
    }
}

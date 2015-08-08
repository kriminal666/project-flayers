<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests;
use App\Http\Requests\FlyerRequest;
use App\Http\Utils\Country;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


        $flyers = Flyer::all();


        return View('flyers.show', array('flyers' => Country::getCountryNames($flyers)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FlyerRequest|Request $request
     * @return Response
     */
    public function store(FlyerRequest $request)
    {

        $flyer = Flyer::create($request->all());

        flash()->success('Success', 'your flyer has been created');

        return Redirect::to(url('/' . $flyer->zip . '/' . $flyer->street));

    }

    /**
     * Apply photo to referenced flyer
     *
     * @param $zip
     * @param $street
     * @param Request $request
     */
    public function addPhoto($zip, $street, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required | mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = Photo::fromForm($request->file('photo'));


        Flyer::locatedAt($zip, $street)->addPhoto($photo);



    }

    /**
     * @param UploadedFile $photo
     * @param $id
     */
    public function storeImages(UploadedFile $photo, $id)
    {

        $filename = time() . $photo->getClientOriginalName();
        $path = public_path('images/home_pics');
        $photo->move($path, $filename);

        $image = new Photo();
        $image->flyer_id = $id;
        $image->path = $filename;
        $image->save();


    }

    /**
     * Display the specified resource.
     *
     * @param $zip
     * @param $street
     * @return Response
     * @internal param int $id
     */
    public function show($zip, $street)
    {

        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show_one', compact('flyer'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $flyer = Flyer::whereId($id)->first();

        View::make('flyers.create', array('flyer' => $flyer));

        return View('flyers.create', array('flyer' => $flyer));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FlyerRequest|Request $request
     * @return Response
     * @internal param int $id
     */
    public function update(FlyerRequest $request)
    {

        $flyer = Flyer::whereId($request->id)->first();
        $flyer->fill($request->all());
        $flyer->save();
        flash()->success('Success', 'your flyer has been updated');
        return Redirect::to(url('/' . $flyer->zip . '/' . $flyer->street));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        $flyer = Flyer::whereId($id)->first();

        //Delete the pics
        if (!$this->deleteImages($flyer->id)) {
            flash()->error('Error', 'ERROR deleting the photos!');

            return back();
        }

        $flyer->forceDelete($id);

        flash()->success('Deleted', 'The Flayer has been deleted');


        return back();
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteImages($id)
    {
        $photos = Photo::whereFlyer_id($id)->get();

        foreach ($photos as $image) {

            if (!File::Delete(public_path('images/home_pics/') . $image->path)) {
                return false;
            }

        }

        return true;

    }
}

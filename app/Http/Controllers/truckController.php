<?php namespace App\Http\Controllers;


// from the article
use Illuminate\Support\Facades\Input;

use Validator;
use Response;
use App\Post;
use View;

// end of article

use App\Http\Requests\CreatetruckRequest;
use App\Http\Requests\UpdatetruckRequest;
use App\Repositories\truckRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;


class truckController extends AppBaseController
{
    /** @var  truckRepository */
    private $truckRepository;

    public function __construct(truckRepository $truckRepo)
    {
        $this->truckRepository = $truckRepo;
    }

    public function changeStatus ()
    {
      $id = Input::get('id');

      $truck = Truk::findOrFail($id);
      $truck->favorite = !$truck->favorite;
      $truck->save();

      return response()->json($truck);
    }

    /**
     * Display a listing of the truck.
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
        $this->truckRepository->pushCriteria(new RequestCriteria($request));
        $trucks = $this->truckRepository->all();
        //return view('trucks.index')
        return view('trucks.index')
            ->with('trucks', $trucks);
        //return view('home', ['trucks' =>$trucks]);
    }
    /**
     * Show the form for creating a new truck.
     * @return Response
     */
    public function create()
    {
        return view('trucks.create');
        //return view('vendor.home');
        //return view('home', ['trucks' =>$trucks]);
    }

    /**
     * Store a newly created truck in storage.
     * @param CreatetruckRequest $request
     * @return Response
     */
    public function store(CreatetruckRequest $request)
    {
        $input = $request->all();
        $truck = $this->truckRepository->create($input);
        Flash::success('Truck saved successfully.');
        return redirect(route('trucks.index'));
        //return redirect(route('vendor.home'));
        //return view('home', ['trucks' =>$trucks]);
    }

    /**
     * Display the specified truck.
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

        $truck = $this->truckRepository->findWithoutFail($id);

        if (empty($truck))
         {
            Flash::error('Truck not found');

            return redirect(route('trucks.index'));
            //return redirect(route('vendor.home'));
          }
        return view('trucks.show')->with('truck', $truck);
        //return view('trucks.index')->with('truck', $truck);
        //return view('vendor.home')->with('truck', $truck);
    }

    /**
     * Show the form for editing the specified truck.
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $truck = $this->truckRepository->findWithoutFail($id);

        if (empty($truck))
        {
            Flash::error('Truck not found');
            return redirect(route('trucks.index'));
            //return redirect(route('vendor.home'));
        }
        return view('trucks.edit')->with('truck', $truck);
        //return view('vendor.home')->with('truck', $truck);
    }

      /**
     * Update the specified truck in storage.
     *
     * @param  int              $id
     * @param UpdatetruckRequest $request
     * @return Response
     */
    public function update($id, UpdatetruckRequest $request)
    {
        $truck = $this->truckRepository->findWithoutFail($id);

        if (empty($truck))
        {
          Flash::error('Truck not found');
          return redirect(route('trucks.index'));
        }

        $truck = $this->truckRepository->update($request->all(), $id);
        Flash::success('Truck updated successfully.');
        return redirect(route('trucks.index'));
        //return redirect(route('vendor.home'));
    }
    /**
     * Remove the specified truck from storage.     *
     * @param  int $id     *
     * @return Response
     */
    public function destroy($id)
    {
        $truck = $this->truckRepository->findWithoutFail($id);
        if (empty($truck))
         {
            Flash::error('Truck not found');
            return redirect(route('trucks.index'));
            //return redirect(route('vendor.home'));
          }
        $this->truckRepository->delete($id);
        Flash::success('Truck deleted successfully.');
        return redirect(route('trucks.index'));
        //return redirect(route('vendor.home'));
    }
}

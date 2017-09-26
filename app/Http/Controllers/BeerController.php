<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;

class BeerController extends Controller
{
	private $beers = [];

	public function __construct()
	{
		// Data borrowed from https://punkapi.com/documentation/v2
		// because unfortunately it doesn't provide meta data for pagination.

		// Documentation for collections can be found at https://laravel.com/docs/5.2/collections

		$this->beers = collect(json_decode(file_get_contents(storage_path('data.json'))))->keyBy('id');
	}

	public function index(Request $request)
	{
		// Paginate the collection

		$page = $request->get('page', 1);
		$perPage = 24;

		$pagination = new LengthAwarePaginator(
			$this->beers->forPage($page, $perPage),
			$this->beers->count(),
			$perPage,
			$page
		);

		// Return the view from resources/views directory (dots represent slashes)

		return view('beer.index', [
			'pagination' => $pagination
		]);
	}

	public function show($id)
	{
		// Find the right beer from the collection

		$beer = $this->beers->get($id);

		dd($beer);

		// TODO: Return the view
	}

	// TODO: Impliment search and random actions
}

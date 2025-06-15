<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Search extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function fetch()
{
    $query = $this->request->getPost('query');

    if (empty($query)) {
        return view('search', ['error' => 'Please enter a search term.']);
    }

    $apiKey = '50853103-edb53b11dadff2c20d8b7ee31';
    $url = "https://pixabay.com/api/?key={$apiKey}&q=" . urlencode($query) . "&image_type=photo";

    $response = @file_get_contents($url);

    if ($response === FALSE) {
        // Show error message on the search page view
        return view('search', ['error' => 'Failed to fetch data from Pixabay API.']);
    }

    $data = json_decode($response, true);

    if (!isset($data['hits']) || empty($data['hits'])) {
        return view('search', ['error' => 'No results found for your query.']);
    }

    return view('search_result', ['images' => $data['hits']]);
}

}

<?php
namespace App\Interfaces\Sections;

interface SectionsRepositoryInterface
{
    // get all sections
        public  function index();

        // Store Sections
        public function store($request);

        //Update Sections
    public function update($request);

    //Delete Sections
    public function destroy($request);

    // destroy Sections
    public function show($id);


}

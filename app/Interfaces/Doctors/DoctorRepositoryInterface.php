<?php

namespace App\Interfaces\Doctors;

interface DoctorRepositoryInterface
{
    // get Doctor
    public function index();

    // create Doctor
    public function create();

    // store Doctor
    public function store($request);

    // update Doctor
    public function update($request);

    // destroy Doctor
    public function destroy($request);

    // edit Doctor
    public function edit($idt);

    // update_password
    public function update_password($idt);

    // update_status
    public function update_status($request);

}

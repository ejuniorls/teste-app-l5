<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AgendaService
{
    public function getPeople()
    {
        try {
            $request = Http::get('http://localhost:8080/api/people');
//            return json_decode($request);
            return json_decode($request);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function storePeople($name, $email, $phone, $cpf)
    {
        try {
            $response = Http::post('http://localhost:8080/api/people', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'cpf' => $cpf
            ]);

            return $response->json();

        } catch (\Exception $e) {
            return $e->getMessage();
//            dd($e->getMessage());
        }
    }
}

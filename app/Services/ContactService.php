<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ContactService
{

    public function getAllContacts()
    {
        try {
            $response = Http::get('http://localhost:8000/api/contacts');
            return json_decode($response);

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function getContact($id)
    {
        try {
            $response = Http::get("http://localhost:8000/api/contacts/$id");
            return json_decode($response);

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function createContact($name, $email, $phone, $cpf)
    {
        try {
            $response = Http::post('http://localhost:8000/api/contacts', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'cpf' => $cpf
            ]);

            return $response->json();

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }


    public function updateContact($id, $name, $email, $phone, $cpf)
    {
        try {
            $response = Http::put("http://localhost:8000/api/contacts/$id", [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'cpf' => $cpf
            ]);

            return $response->json();

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function deleteContact($id)
    {
        try {
            $response = Http::delete("http://localhost:8000/api/contacts/$id");

            return $response->json();

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

}

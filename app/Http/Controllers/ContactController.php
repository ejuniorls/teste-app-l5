<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ContactService $contactService)
    {
        $contacts = $contactService->getAllContacts();

        $contactInfo = $request->session()->get('contactInfo');

        return view('contacts.index', [
            'contacts' => $contacts,
            'contactInfo' => $contactInfo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request, ContactService $contactService)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = str_replace(['(', ')', '-', ' '], '', $request->phone);
        $cpf = str_replace(['.', '-', ''], '', $request->cpf);

        $contact = $contactService->createContact($name, $email, $phone, $cpf);

        $code = array_column($contact, 'code');

        if (!empty($code)) {
            $request
                ->session()
                ->flash('contactInfo', [
                    'mensagem' => 'Não foi possível criar o contato!',
                    'alert' => 'alert-danger'
                ]);
        } else {
            $request
                ->session()
                ->flash('contactInfo', [
                    'mensagem' => 'Contato criado com sucesso!',
                    'alert' => 'alert-success'
                ]);
        }

        return redirect(route('index_contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->contact = new ContactService();
        $contact = $this->contact->getContact($id);

        return view('contacts.create', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactRequest $request, $id, ContactService $contactService)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = str_replace(['(', ')', '-', ' '], '', $request->phone);
        $cpf = str_replace(['.', '-', ''], '', $request->cpf);

        $contact = $contactService->updateContact($id, $name, $email, $phone, $cpf);

        $code = array_column($contact, 'code');

        if (!empty($code)) {
            $request
                ->session()
                ->flash('contactInfo', [
                    'mensagem' => 'Não foi possível atualizar o contato!',
                    'alert' => 'alert-danger'
                ]);
        } else {
            $request
                ->session()
                ->flash('contactInfo', [
                    'mensagem' => 'Contato atualizado com sucesso!',
                    'alert' => 'alert-success'
                ]);
        }

        return redirect(route('index_contacts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ContactService $contactService)
    {
        $contactService->deleteContact($id);

        return redirect(route('index_contacts'));
    }
}

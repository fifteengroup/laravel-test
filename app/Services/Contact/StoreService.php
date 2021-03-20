<?php

namespace App\Services\Contact;

use App\{Contact, ContactAddress};
use Illuminate\Support\Facades\DB;

class StoreService
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function run()
    {
        DB::transaction(function () use(&$contact){
            //Store Contact information
            $contact = new Contact();
            $contact->first_name = $this->data['first_name'];
            $contact->last_name = $this->data['last_name'];
            $contact->company_id = $this->data['company_id'];
            $contact->contact_role_id = $this->data['contact_role_id'];
            $contact->save();

            //Stores Addresses tied to this contact
            if (isset($this->data['address']) && is_array($this->data['address'])) {
                foreach ($this->data['address'] as $key => $value) {
                    $address = new ContactAddress();
                    $address->address = $value;
                    $address->post_code = $this->data['post_code'][$key];
                    $address->contact_id = $contact->id;
                    $address->save();
                }
            }
        });

        return $contact;
    }
}

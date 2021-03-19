<?php
namespace App\Services\Contact;

use Illuminate\Support\Arr;

class UpdateService
{
    protected $contact;
    protected $data;
    protected $contact_address;

    const UPDATE_FIELDS = ['first_name', 'last_name', 'company_id', 'contact_role_id'];

    public function __construct($contact, $data, $contact_address)
    {
        $this->contact = $contact;
        $this->contact_address = $contact_address;
        $this->data = $data;
    }

    public function run()
    {
        $this->updateModel($this->contact, self::UPDATE_FIELDS, $this->data);
        if (isset($this->data['address']) && is_array($this->data['address'])) {
            foreach ($this->data['address'] as $key => $value) {
                $this->contact_address->updateOrCreate([
                    'contact_id' => $this->contact->id,
                    'address' => $value,
                ], [
                    'address' => $value,
                    'post_code' => $this->data['post_code'][$key],
                ]);
            }
        }
    }

    private function updateModel($model, $update_fields, $data)
    {
        foreach ($update_fields as $key) {
            if (Arr::has($data, $key)) {
                $model->setAttribute($key, $data[$key]);
            }
        }
        //wiil only get updated if the model has changed
        $model->save();
    }
}
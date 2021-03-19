
<?php

namespace App\Services\Contact;

use Illuminate\Support\Arr;

class UpdateService
{
    protected $contact;
    protected $data;

    const UPDATE_FIELDS = ['address', 'post_code', 'contact_id'];

    public function __construct($contact, $data)
    {
        $this->contact = $contact;
        $this->data = $data;
    }

    public function run()
    {
        $this->updateModel($this->contact, self::UPDATE_FIELDS, $this->data);
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
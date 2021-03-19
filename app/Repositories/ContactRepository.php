<?php
namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Contact;


/**
 * summary
 */
class ContactRepository implements ContactRepositoryInterface
{
    /**
     * summary
     */
    public function __construct()
    {

    }

    public function all()
    {
    	return Contact::with('addresses')->paginate(15);
    }

    public function findById($contact_id)
    {
        return Contact::with('addresses')->where('id', $contact_id)->firstOrFail();
    }

}

 ?>
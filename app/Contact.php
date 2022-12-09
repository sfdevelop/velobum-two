<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contact
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $addresses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereAddresses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereTel($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    public $primaryKey = 'id';
    public $timestamps = false;

    protected function UpdateContacts($email, $tel, $addresses) {
        $contact = Contact::find(1);
        $contact->email = $email;
        $contact->tel = $tel;
        $contact->addresses = $addresses;
        if ($contact->save()) {
            return true;
        }
        return false;
    }

    protected function GetContacts() {
        return Contact::find(1);
    }

    public static function GetContactsForPublic() {
        return Contact::find(1);
    }

    public static function GetEmail() {
        return Contact::find(1);
    }
}

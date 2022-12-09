<?php
namespace App\Composers;

use App\TextPage;
use App\Contact;
use Illuminate\View\View;

class FooterComposer {
    private $about;
    private $contacts;

    public function __construct() {
        $this->contacts = Contact::GetContactsForPublic();
        $this->about = TextPage::GetDataForPublic(1);
    }

    public function compose(View $view) {
        $view->with([
            'contacts' => $this->contacts,
            'about' => $this->about,
        ]);
    }
}
<?php

namespace App\Services;


class MailchimpNewsletter {

    public function __construct(protected ApiClient $client){



    }


    public function subscribe(string $email, string $list = null){

        $list ??= config('services.mailchimp.lists.subscribers');


        return $this->client()->lists->addListMember($list ,[
            'email_address' => request('email'),
            'ststus' => 'subscribed',
        ]);
    }


}

?>

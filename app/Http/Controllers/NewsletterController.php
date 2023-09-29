<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{


    public function __invoke(MailchimpNewsletter $newsletter){

        request()->validate([
            'email' => 'required|email'
        ]);

        $mailchimp = new \MailchimpMarketing\ApiClient();


        try{

            $newsletter = new Newsletter;
            $newsletter->subscribe(request('email'));

        } catch(\Exeption $e){

            \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);

        }

        return redirect('/')->with('success', 'You are now signed uo for our newsletter!');

    }

}


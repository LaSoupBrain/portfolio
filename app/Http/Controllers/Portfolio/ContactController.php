<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;

/**
 * Class ContactController
 *
 * @package App\Http\Controllers\Portfolio
 *
 * @author Ali, Muamar
 */
class ContactController extends Controller
{
    /**
     * Display the contact page.
     *
     * @author Ali, Muamar
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('Portfolio.pages.contact.index');
    }
}

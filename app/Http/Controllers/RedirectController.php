<?php

namespace App\Http\Controllers;

use App\Services\ShortLinkService;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index(ShortLinkService $shortLinkService, string $link) {
        return $shortLinkService->redirectShortLink($link);    
    }
}

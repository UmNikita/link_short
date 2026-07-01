<?php

namespace App\Services;

use App\Models\Link;

class ShortLinkService
{

    public function redirectShortLink(string $shortLink) {
        $link = Link::where('short_link', $shortLink)->firstOrFail();
    
        $link->clicks()->create([
            'ip' => request()->ip(),
        ]);

        return redirect($link->original_link);
    }

    public function getShortLink(int $userId): string {
        
        $linkCount = Link::count();        
        $shortLink = $this->generateShortCode($userId, $linkCount);
        return $shortLink;
    }

    public function alreadyExists(int $userId, string $url): bool
    {
        return Link::query()
            ->where('user_id', $userId)
            ->where('original_link', $url)
            ->exists();
    }

    private function generateShortCode($userId, $linkCount) {
        $data = time() . ':' . $userId . ':' . $linkCount;
        return hash('xxh32', $data);
    }
}
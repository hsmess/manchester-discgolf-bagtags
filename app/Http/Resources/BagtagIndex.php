<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BagtagIndex extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lt = $this->users->latest()->get()->where('user.id' != $this->owner->id)->first()->created_at;
        return [
            'tag_number' => $this->tag_number,
            'owner' => $this->owner->name,
            'lastActivity' => $this->users->latest()->get()->first()->created_at->diffForHumans() ?? "N/A",
            'lastTransfer' => [
                'ymd' => $lt->format('Y-m-d') ?? null,
                'human' => $lt->format('F j, Y') ?? "N/A"
            ]
        ];
    }
}

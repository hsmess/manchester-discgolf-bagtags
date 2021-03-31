<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bagtag extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lt = $this->users->sortByDesc('pivot.created_at')->filter(function ($item){
           return $item->id != $this->owner()->id;
        })->first();
        if($lt != null)
        {
            $ltu = $lt->pivot->created_at;
        }
        else{
            $ltu = null;
        }
        if($this->currently_unassigned)
        {
            return [
                'id' => $this->id,
                'tag_number' => $this->tag_number,
                'owner' => 'Unassigned',
                'lastActivity' => $this->users->sortByDesc('pivot.created_at')->first()->pivot->created_at->diffForHumans() ?? "N/A",
                'lastTransfer' => [
                    'ymd' => $ltu != null ? $ltu->format('Y-m-d') : null,
                    'human' => $ltu != null ? $ltu->format('F j, Y') : null
                ]
            ];
        }
        else{
            return [
                'id' => $this->id,
                'tag_number' => $this->tag_number,
                'owner' => $this->owner()->name,
                'lastActivity' => $this->users->sortByDesc('pivot.created_at')->first()->pivot->created_at->diffForHumans() ?? "N/A",
                'lastTransfer' => [
                    'ymd' => $ltu != null ? $ltu->format('Y-m-d') : null,
                    'human' => $ltu != null ? $ltu->format('F j, Y') : null
                ]
            ];
        }

    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\HasApiTokens;

class User extends JsonResource
{
    use HasApiTokens;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

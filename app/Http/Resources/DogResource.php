<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='dogs';

    public function toArray($request)
    {
        return [
            'name'=> $this -> resource->name,
            'color'=> $this -> resource->color,
            'age' => $this -> resource->age,
            'owner_id'=> new OwnerResource($this -> resource->owner),
            'breed_id'=>new BreedResource($this -> resource->breed),
            'user_id'=>new UserResource($this -> resource->user)
        ];
    }
}

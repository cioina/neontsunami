<?php

namespace App;

class Series extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'series';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors and mutators
    |--------------------------------------------------------------------------
    */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

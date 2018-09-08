<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Заполняемые поля для тега
     *
     * @var array
     */
    protected $fillable = [
      'name'
    ];
    /**
     * Получить статью связанные с этим тэгом
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blog() {
        return $this->belongsToMany('App\Blog')->withTimestamps();
    }
}

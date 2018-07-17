<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'news_wall',
        'slug'
    ];
    protected $dates = ['published_at'];

    /**
     * Переопределение метода для генерации slug url
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * Статья пренадлежит пользователю
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App/User');
    }
    /**
     * Выборка опубликованных статей
     *
     * @param $query
     */
    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Выборка статей в очередь на публикацию
     *
     * @param $query
     */
    public function scopeUnPublished($query){
        $query->where('published_at', '>', Carbon::now());
    }
    /**
     * Даёт аттрибут времени для статьи
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date) {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d\TH:i', $date)->format('Y-m-d H:i');
    }
    /**
     * Красивое отображение даты и времени
     *
     * @return mixed
     */
    public function  getBeautifulDateAttribute() {
        Carbon::setLocale(config('app.locale'));
        if($this->published_at > Carbon::now()->subMonth()) {
            return $this->published_at->diffForHumans();
        }
        return $this->published_at->toDateTimeString('Y-m-d');
    }

}

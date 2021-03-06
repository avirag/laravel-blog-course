<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use GrahamCampbell\Markdown\Facades\Markdown;
use App\Comment;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published_at', 'category_id', 'image', 'view_count'];

    protected $dates = ['published_at'];

    public function author()
    {
       return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsNumber($label = 'Comment')
    {
        $commentsNumber = $this->comments->count();
        return $commentsNumber . ' ' . \Str::plural($label, $commentsNumber);
    }

    public function createComment(array $data)
    {
        $this->comments()->create($data);
    }

    public function createTags($tagString)
    {
        $tags = explode(",", $tagString);
        $tagIds = [];

        foreach ($tags as $tag)
        {
            $newTag = Tag::firstOrCreate(
                ['slug' => \Str::slug($tag)], ['name' => ucwords(trim($tag))]
            );
            $newTag->save();

            $tagIds[] = $newTag->id;
        }

        $this->tags()->detach();
        $this->tags()->attach($tagIds);

        // or
        // $this->tags()->sync($tagIds);
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: null;
    }

    public function getImageUrlAttribute()
    {
        $imageUrl = "";

        if(!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->image;

            if(file_exists($imagePath)) {
                $imageUrl = asset("{$directory}/" . $this->image);
            }
        }

        return $imageUrl;
    }

    public function getImageThumbUrlAttribute()
    {
        $imageUrl = "";

        if(!is_null($this->image)) {
            $directory = config('cms.image.directory');
            $ext = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".jpg", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;

            if(file_exists($imagePath)) {
                $imageUrl = asset("{$directory}/" . $thumbnail);
            }
        }

        return $imageUrl;
    }

    public function getDateAttribute()
    {
        return is_null($this->published_at) ? "" : $this->published_at->diffForHumans();
    }

    public function getBodyHtmlAttribute()
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : null;
    }

    public function getExcerptHtmlAttribute()
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : null;
    }

    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        $index = 1;
        $count = count($this->tags);
        foreach ($this->tags as $tag) {
            $anchors[] = '<a href="' . route('tag', $tag->slug) . '">' . $tag->name . '</a>';
            $index++;
        }

        return implode(', ', $anchors);
    }

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if($showTimes) {
            $format = $format . " H:i:s";
        }
        return $this->created_at->format($format);
    }

    public function publicationLabel()
    {
        if(!$this->published_at) {
            return '<span class="label label-warning">Draft</span>';
        } elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Schedule</span>';
        } else {
            return '<span class="label label-success">Published</span>';
        }

    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['month']) && $month = $filter['month']) {
//            $query->whereRaw('month(published_at) = ?', [Carbon::parse($month)->month]);
            $query->whereMonth('published_at', [$month]);
        }

        if (isset($filter['year']) && $year = $filter['year']) {
//            $query->whereRaw('year(published_at) = ?', [$year]);
            $query->whereYear('published_at', $year);
        }

        if (isset($filter['term']) && $term = $filter['term']) {
            $query->where(function($q) use ($term) {
                $q->whereHas('author', function($qa) use ($term) {
                    $qa->where('name', 'LIKE', "%{$term}%");
                });

                $q->orWhereHas('category', function($qc) use ($term) {
                    $qc->where('title', 'LIKE', "%{$term}%");
                });

                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('excerpt', 'LIKE', "%{$term}%");
            });
        }
    }

    public static function archives()
    {
        if (env("DB_CONNECTION") === "pgsql") {
            return static::selectRaw('count(id) as post_count, extract(year from published_at) year, extract(month from published_at) month')
                ->published()
                ->groupBy('year', 'month')
                ->orderByRaw('min(published_at) desc')
                ->get();
        } else {
            return static::selectRaw('count(id) as post_count, year(published_at) year, month(published_at) month')
                ->published()
                ->groupBy('year', 'month')
                ->orderByRaw('min(published_at) desc')
                ->get();
        }

    }
}

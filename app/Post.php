<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable = ['title','contenido','date','description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();
        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {

        if($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();

    }

    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;
    }

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if($ids == null){return;}
        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if($value == null)
        {
            return $this->setDraft();
        }
        return $this->setPublic();
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if($value == null)
        {
            return $this->setStandart();
        }
        return $this->setFeatured();
    }


    #---------------------------------
    #fuente:
    #laravel.com/docs/5.4/eloquent-mutators#defining-a-mutator
    #ejemplo:
    #Defining A Mutator
    #---------------------------------

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }

    #==== recien empieza a trrabajar este metodo
    #==== jeje me adelante
    public function getCategoryTitle()
    {
        return ($this->category != null) ? $this->category->title  :   'Sin Categoria';
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ?   implode(', ', $this->tags->pluck('title')->all())
            : 'Sin Etiqueta';
    }

    # Proposito:
    # evita problemas si hay alguna categoria vacia
    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    #=====lo usamos para editar / la fecha del post
    # usado en el frontend
    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }



    #===== BUTTONS PREV, NEXT STARTS ====================================
    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
        #=== 1,2,3,4  5
    }
    public function getPrevious()
    {
        $postID = $this->hasPrevious(); //ID
        return self::find($postID);
    }
    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
        #  5 6 7 8
    }
    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }
    #===== BUTTONS PREV, NEXT ENDS ====================================

    #========= RELATED POST  =========================================
    public function related()
    {
        return self::all()->except($this->id);
    }


    #=========  CATEGORY  ==================================
    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    #=========  POPULAR POSTS  ==================================
    public static function getPopularPosts()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }


    #=========  FEATURED POSTS  =================================
    public static function getFeaturedPosts()
    {
        return self:: where('is_featured', 1)->take(3)->get();

    }






}

<?php

namespace App\Traits;


trait HasHashIds
{
    /**
     * Cached hashslug
     * @var null|string
     */
    private $slug = null;
    /**
     * Cached HashIds instance
     * @var null|\Hashids\Hashids
     */
    private static $hashIds = null;

    /**
     * Returns a chached Hashids instanse
     * or initialises it with salt
     *
     * @return \Hashids\Hashids
     */
    private static function getHashids()
    {
        if (is_null(static::$hashIds)) {
            $minSlugLength = 5;
            if (!empty(static::$minSlugLength)) {
                if (isset(static::$minSlugLength)) {
                    $minSlugLength = static::$minSlugLength;
                }
            }
            if (isset(static::$modelSalt)) {
                $modelSalt = static::$modelSalt;
            } else {
                $modelSalt = get_called_class();
            }
            if (isset(static::$alphabet)) {
                $alphabet = static::$alphabet;
            } else {
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            }
            $salt = config('hashslug.appsalt', env('APP_KEY')) . $modelSalt;

            // This is impotant!
            // Don't use a weak hash, otherwise
            // your app key can be exposed
            // http://carnage.github.io/2015/08/cryptanalysis-of-hashids
            $salt = hash('sha256', $salt);
            static::$hashIds = new \Hashids\Hashids($salt, $minSlugLength, $alphabet);
        }
        return static::$hashIds;
    }

    /**
     * Hashslug calculated from id
     * @return string
     */
    public function slug()
    {
        if (is_null($this->slug)) {
            $hashids = $this->getHashids();
            $this->slug = $hashids->encode($this->{$this->getKeyName()});
        }
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'hashslug';
    }

    public function getRouteKey()
    {
        return $this->slug();
    }

    /**
     * Used in implicit model binding AND
     * used in explicit model binding if no callback
     * is specified, eg: Route::model('post', Post::class)
     *
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function resolveRouteBinding($slug)
    {
        $id = static::decodeSlug($slug);
        return parent::where($this->getKeyName(), $id)->first();
    }

    /**
     * Decodes slug to id
     * @param  string $slug
     * @return int|null
     */
    private static function decodeSlug($slug)
    {
        $hashids = static::getHashids();
        $decoded = $hashids->decode($slug);
        if (!isset($decoded[0])) {
            return null;
        }
        return (int)$decoded[0];
    }

    /**
     * Wrapper around Model::findOrFail
     *
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function findBySlugOrFail($slug)
    {
        $id = static::decodeSlug($slug);
        return static::findOrFail($id);
    }

    /**
     * Wrapper around Model::find
     *
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function findBySlug($slug)
    {
        $id = static::decodeSlug($slug);
        return static::find($id);
    }
}
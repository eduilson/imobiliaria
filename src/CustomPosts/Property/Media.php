<?php
namespace Imobiliaria\CustomPosts\Property;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Imobiliaria\CustomPosts\Property;

/**
 * Class Price
 * @package Imobiliaria\CustomPosts\Property
 */
class Media{

    static public function fields(){

        Container::make('post_meta', __('Media', 'imobiliaria'))
            ->where('post_type', '=', Property::$slug)
            ->add_fields([
                Field::make('image', 'cover', __('Cover', 'imobiliaria'))
                    ->set_type(['image']),
                Field::make('media_gallery', 'gallery', __('Gallery', 'imobiliaria') )
                    ->set_type(['image', 'video'])
                    ->set_duplicates_allowed(false)
            ]);
    }
}
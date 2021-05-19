<?php
namespace Imobiliaria\CustomPosts\Property;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Imobiliaria\CustomPosts\Property;

/**
 * Class Price
 * @package Imobiliaria\CustomPosts\Property
 */
class Details{

    static public function fields(){

        Container::make('post_meta', __('Details', 'imobiliaria'))
            ->where('post_type', '=', Property::$slug)
            ->add_fields([
                Field::make('text', 'code', __('Property code', 'imobiliaria')),
                Field::make('select', 'type', __('Property type', 'imobiliaria') )
                    ->set_options([
                        'Residential' => __('Residential', 'imobiliaria'),
                        'Commercial' => __('Commercial', 'imobiliaria'),
                    ])->set_width(33),
                Field::make('select', 'subtype', __('Property subtype', 'imobiliaria') )
                    ->set_options([
                        'Residential' => __('Residential', 'imobiliaria'),
                        'Commercial' => __('Commercial', 'imobiliaria'),
                    ])->set_width(33),
                Field::make('select', 'category', __('Property category', 'imobiliaria') )
                    ->set_options([
                        'Residential' => __('Residential', 'imobiliaria'),
                        'Commercial' => __('Commercial', 'imobiliaria'),
                    ])->set_width(33),
            ]);
    }
}
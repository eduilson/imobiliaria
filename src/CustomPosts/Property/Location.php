<?php
namespace Imobiliaria\CustomPosts\Property;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Imobiliaria\CustomPosts\Property;

/**
 * Class Price
 * @package Imobiliaria\CustomPosts\Property
 */
class Location{

    static public function fields(){

        Container::make('post_meta', __('Location', 'imobiliaria'))
            ->where('post_type', '=', Property::$slug)
            ->add_fields([
                Field::make('text', 'country', __('Country', 'imobiliaria'))->set_width(33),
                Field::make('text', 'state', __('State', 'imobiliaria'))->set_width(33),
                Field::make('text', 'city', __('City', 'imobiliaria'))->set_width(33)->set_width(33),
                Field::make('text', 'postal_code', __('Postal code', 'imobiliaria'))->set_width(33),
                Field::make('text', 'zone', __('Zone', 'imobiliaria'))->set_width(33),
                Field::make('text', 'neighborhood', __('Neighborhood', 'imobiliaria'))->set_width(33),
                Field::make('text', 'address', __('Address', 'imobiliaria'))->set_width(50),
                Field::make('text', 'street_number', __('Street number', 'imobiliaria'))->set_width(25),
                Field::make('text', 'complement', __('Complement', 'imobiliaria'))->set_width(25),
                Field::make('text', 'latitude', __('Latitude', 'imobiliaria'))->set_width(33),
                Field::make('text', 'longitude', __('Longitude', 'imobiliaria'))->set_width(33),
                Field::make('text', 'virtual_tour_link', __('Virtual tour link', 'imobiliaria'))->set_width(33),
                Field::make('checkbox', 'show_map', __('Show map?', 'imobiliaria')),
                Field::make('checkbox', 'show_neighborhood', __('Show neighborhood?', 'imobiliaria')),
                Field::make('checkbox', 'show_address', __('Show address?', 'imobiliaria'))
                    ->set_conditional_logic( array(
                        array(
                            'field' => 'show_neighborhood',
                            'value' => true,
                        )
                    )),
            ]);
    }
}
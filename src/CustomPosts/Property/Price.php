<?php

namespace Imobiliaria\CustomPosts\Property;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Imobiliaria\CustomPosts\Property;

/**
 * Class Price
 * @package Imobiliaria\CustomPosts\Property
 */
class Price{

    static function fields(){
        Container::make('post_meta', __('Price', 'imobiliaria'))
            ->where('post_type', '=', Property::$slug)
            ->add_fields([
                Field::make('select', 'transaction_type', __('Transaction Type', 'imobiliaria'))
                    ->set_options([
                        'For Sale' => __('For Sale', 'imobiliaria'),
                        'For Rent' => __('For Rent', 'imobiliaria'),
                        'Sale/Rent' => __('Sale/Rent', 'imobiliaria')
                    ]),

                Field::make('text', 'rental_price', __('Rental Price', 'imobiliaria'))
                    ->set_attribute('type', 'number')
                    ->set_conditional_logic([
                        [
                            'field' => 'transaction_type',
                            'value' => 'For Rent',
                            'compare' => '!='
                        ]
                    ]),

                Field::make('text', 'list_price', __('List Price', 'imobiliaria'))
                    ->set_attribute('type', 'number')
                    ->set_conditional_logic([
                        [
                            'field' => 'transaction_type',
                            'value' => 'For Sale',
                            'compare' => '!='
                        ]
                    ]),

                Field::make('checkbox', 'accept_exchange', __('Accept exchange?', 'imobiliaria'))
                    ->set_option_value('yes'),

                Field::make('textarea', 'exchange_details', __('Exchange details', 'imobiliaria'))
                    ->set_conditional_logic( array(
                        array(
                            'field' => 'accept_exchange',
                            'value' => true,
                        )
                    )),
            ]);
    }
}
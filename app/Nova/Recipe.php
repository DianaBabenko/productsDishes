<?php

namespace App\Nova;

use App\Http\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Recipe extends Resource
{
    use ImageTrait;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Recipe';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('description'),

            Image::make('Attachment')
                ->store(function (Request $request) {
                    $name = Str::slug(Str::random(15)) . '_' . time();
                    $filename = $name . '.' . $request->attachment->getClientOriginalExtension();
                    $request->attachment->storeAs('/uploads/recipes', $filename, ['disk' => 'recipes']);

                    return [
                        'image' => $filename,
                    ];
                })->onlyOnForms(),

            Text::make('image', function() {
                return view('nova.photo', [
                    'image' => $this,
                ])->render();
            })->asHtml(),

            Number::make('Person Count', 'personCount'),
            Number::make('Ingredients Number', 'ingredientsNumber'),
            Number::make('Cook time (m)', 'cookTime'),

            BelongsTo::make(  'Subcategory', 'subcategory', RecipeSubcategory::class),
            BelongsTo::make('User', 'user', User::class),
            Select::make('Status')->options([
                \App\Models\Product::STATUS_ACTIVE => 'active'       ,
                \App\Models\Product::STATUS_FORBIDDEN => 'in progress' ,
                \App\Models\Product::STATUS_AVAILABLE => 'denied'
            ]),

//            BelongsToMany::make('Products', 'productIngredients')->fields(new IngredientRecipe)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}

<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFavourites;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportCrud;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Exceptions\ErrorException;
use Illuminate\Support\Collection;

/**
 * Class Product
 *
 * @property bool $featured
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property string $destination
 * @property string $exhibitor_id
 * @property string $product_id
 * @property string $type
 * @property int $cost
 * @property int $dynamic_cost
 * @property-read int $vat
 * @property int $dynamic_vat
 * @property int $vat_percentage
 * @property-read int $total
 * @property-read int $dynamic_total
 * @property string $shippable
 * @property string $publish
 * @property array $actions
 * @property-read string $currency
 * @property string $active
 * @property \Carbon\Carbon $valid_from
 * @property \Carbon\Carbon $valid_to
 * @property-read string $avatar
 * @property-read string $content_capture_qr_code
 * @property-read string $content_capture_image
 * @property-read string $content_capture_pdf
 * @property-read \Buzz\Control\Campaign\CustomType $custom_type
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\Seminar $seminar
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\OrderProduct[] $order_products
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 */
class Product extends SdkObject
{
    use SupportCrud,
        Translatable,
        WithAnswerHelpers,
        WithPropertyHelpers,
        HasFavourites,
        HasFiles;

    /**
     * @return array
     * @throws ErrorException
     */
    public function fetchForApp(string $exhibitor_id = null): array
    {
        return $this->api()->get('app/fetch-products', [
            'exhibitor_id' => $exhibitor_id,
            'page'         => request('page'),
            'per_page'     => request('per_page'),
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fetchFilters(): Collection
    {
        return collect($this->api()->get('app/fetch-product-filters'));
    }
}

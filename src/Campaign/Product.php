<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFavourites;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportCrud;
use Buzz\EssentialsSdk\Exceptions\ErrorException;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class Product
 *
 * @property bool $featured
 * @property string $custom_type_id
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
 * @property Carbon $valid_from
 * @property Carbon $valid_to
 * @property-read string $avatar
 * @property-read string $content_capture_qr_code
 * @property-read string $content_capture_image
 * @property-read string $content_capture_pdf
 * @property-read CustomType $custom_type
 * @property-read Exhibitor $exhibitor
 * @property-read Seminar $seminar
 * @property-read Answer[] $answers
 * @property-read OrderProduct[] $order_products
 * @property-read Property[] $properties
 */
class Product extends SdkObject
{
    use HasFavourites,
        HasFiles,
        SupportCrud,
        Translatable,
        WithAnswerHelpers,
        WithPropertyHelpers;

    /**
     * @throws ErrorException
     */
    public function fetchForApp(string $entityListId): array
    {
        return $this->api()->get("app/fetch/$entityListId/products", [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    public function fetchFilters(string $entityListId): Collection
    {
        return collect($this->api()->get("app/fetch/$entityListId/product-filters"));
    }
}

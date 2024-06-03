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

/**
 * Class Product
 *
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
 * @property int $vat_percentage
 * @property-read int $total
 * @property string $shippable
 * @property string $publish
 * @property array $actions
 * @property-read string $currency
 * @property string $active
 * @property \DateTime $valid_from
 * @property \DateTime $valid_to
 * @property-read string $content_capture_qr_code
 * @property-read string $content_capture_image
 * @property-read string $content_capture_pdf
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
}

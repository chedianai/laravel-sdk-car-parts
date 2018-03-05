<?php
/**
 * Created by PhpStorm.
 * User: keal
 * Date: 2018/3/1
 * Time: 上午10:57
 */

namespace Chedianai\LaravelCarParts;

use CarParts\Kernel\Contracts\Arrayable;
use CarParts\Kernel\Contracts\ResponseFormatted;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as LaravelCollection;

class Collection extends LaravelCollection implements Arrayable, ResponseFormatted
{
    public function __construct($items)
    {
        $array = json_decode($items->getBodyContents(), true);

        if (JSON_ERROR_NONE === json_last_error()) {
            $array =  (array) $array;
        } else {
            $array = [];
        }

        parent::__construct($array);
    }

    public function format()
    {
        if (isset($this->items['meta'])) {
            return new LengthAwarePaginator(
                $this->items['data'],
                $this->items['meta']['total'],
                $this->items['meta']['per_page'],
                $this->items['meta']['current_page']);
        }

        return new LaravelCollection($this->items['data']);
    }
}

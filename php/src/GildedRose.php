<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    public $items;

    private array $names = [
        'item1' => 'Aged Brie',
        'item2' => 'Backstage passes to a TAFKAL80ETC concert',
        'item3' => 'Sulfuras, Hand of Ragnaros'
    ];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    private function subDay($item)
    {
        $item->sell_in--;
    }

    private function isExpired($item)
    {
        return $item->sell_in < 0;
    }

    private function handleOutdated($item)
    {
        if ($item->name == $this->names['item1'] && $item->quality < 50) {
            $item->quality++;
        }

        if ($item->name == $this->names['item2']) {
            $item->quality = 0;
        }

        if (!in_array($item->name, $this->names) && $item->quality > 0) {
            $item->quality--;
        }
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name == $this->names['item1']) {
                $item->quality++;
            }

            if ($item->name == $this->names['item2']) {
                $item->quality++;
                if ($item->sell_in < 11) {
                    $item->quality++;
                }
                if ($item->sell_in < 6) {
                    $item->quality++;
                }
            }

            if ($item->name == $this->names['item3']) {
                continue;
            }

            if (!in_array($item->name, $this->names)) {
                $item->quality--;
            }

            if ($item->quality > 50) {
                $item->quality = 50;
            }

            if ($item->quality < 0) {
                $item->quality = 0;
            }

            $this->subDay($item);

            if ($this->isExpired($item)) {
                $this->handleOutdated($item);
            }
        }
    }

    public function getItem()
    {
        return $this->items;
    }
}

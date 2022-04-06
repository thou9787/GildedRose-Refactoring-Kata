<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @test
     */
    public function qualityNeverIsNegative()
    {
        $items = [new Item("foo", 0, 0)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(0, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function sulfurasCouldNotBeSold()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 10, 0)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(10, $gildedRose->items[0]->sell_in);
    }

    /**
     * @test
     */
    public function sulfurasCouldNotDecreaseQuality()
    {
        $items = [new Item("Sulfuras, Hand of Ragnaros", 10, 10)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(10, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function qualityCouldNotBeMoreThanFifty()
    {
        $items = [new Item("Aged Brie", 10, 50)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(50, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function itemWithDatePassedQualityDecreaseByTwice()
    {
        $items = [new Item("foo", -1, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(38, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function agedBrieIncreaseQualityWhenItGetsOlder()
    {
        $items = [new Item("Aged Brie", 1, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(41, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function agedBrieIncreaseByTwoQualityWhenDatePassed()
    {
        $items = [new Item("Aged Brie", -1, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(42, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function agedBrieIncreaseByTwoQualityWhenDatePassedAndNotMoreThanFifty()
    {
        $items = [new Item("Aged Brie", -1, 50)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(50, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesIncreaseQualityByTwoWhenSellInLessThanTen()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(42, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesIncreaseQualityByTwoWhenSellInLessThanSix()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 6, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(42, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesIncreaseQualityByThreeWhenSellInLessThanFive()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(43, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesIncreaseQualityByTwoWhenSellInLessThanSixAndNotMoreThanFifty()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 6, 49)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(50, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesIncreaseQualityByThreeWhenSellInLessThanFiveAndNotMoreThanFifty()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 48)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(50, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesQualityDropsToZeroAfterConcert()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 0, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(0, $gildedRose->items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesQualityIncreaseQualityByOneWhenDateIsMoreThan10()
    {
        $items = [new Item("Backstage passes to a TAFKAL80ETC concert", 11, 40)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame(41, $gildedRose->items[0]->quality);
    }
}

package com.gildedrose;

public class Item {

    public String name;

    public int sellIn;

    public int quality;

    public Item(String name, int sellIn, int quality) {
        this.name = name;
        this.sellIn = sellIn;
        this.quality = quality;
    }

    @Override
    public String toString() {
        return this.name + ", " + this.sellIn + ", " + this.quality;
    }

    protected void increaseQuality() {
        if (quality < 50) {
            quality = quality + 1;
        }
    }

    protected void decreaseQuality() {
        if (quality > 0) {
            quality = quality - 1;
        }
    }

    protected void updateAgedBrieItem() {
        sellIn = sellIn - 1;
        increaseQuality();
        if (sellIn < 0) {
            increaseQuality();
        }
    }

    protected void updateBackstageItem() {
        sellIn = sellIn - 1;
        increaseQuality();
        if (sellIn < 10) {
            increaseQuality();
        }
        if (sellIn < 5) {
            increaseQuality();
        }
        if (sellIn < 0) {
            quality = 0;
        }
    }

    protected void updateNormalItem() {
        sellIn = sellIn - 1;
        decreaseQuality();
        if (sellIn < 0) {
            decreaseQuality();
        }
    }
}

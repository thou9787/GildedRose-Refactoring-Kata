package com.gildedrose;

public class BackstageItem extends Item {
    public BackstageItem(String name, int sellIn, int quality) {
        super(name, sellIn, quality);
    }

    protected void update() {
        this.sellIn = this.sellIn - 1;
        increaseQuality();
        if (this.sellIn < 10) increaseQuality();
        if (this.sellIn < 5) increaseQuality();
        if (this.sellIn < 0) this.quality = 0;
    }
}

package com.gildedrose;

public class AgedBrieItem extends Item {
    public AgedBrieItem(String name, int sellIn, int quality) {
        super(name, sellIn, quality);
    }

    protected void update() {
        this.sellIn = this.sellIn - 1;
        increaseQuality();
        if (this.sellIn < 0) increaseQuality();
    }

}

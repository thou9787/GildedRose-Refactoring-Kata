package com.gildedrose;

public class NormalItem extends Item {
    public NormalItem(String name, int sellIn, int quality) {
        super(name, sellIn, quality);
    }

    protected void update() {
        this.sellIn = this.sellIn - 1;
        decreaseQuality();
        if (this.sellIn < 0) {
            decreaseQuality();
        }
    }
}

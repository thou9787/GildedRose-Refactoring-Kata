package com.gildedrose;

public class ConjuredItem extends Item {
    public ConjuredItem(String name, int sellIn, int quality) {
        super(name, sellIn, quality);
    }

    protected void update() {
        this.sellIn = this.sellIn - 1;
        for (int i = 0; i < 2; i++) {
            decreaseQuality();
            if (this.sellIn < 0) decreaseQuality();
        }
    }
}

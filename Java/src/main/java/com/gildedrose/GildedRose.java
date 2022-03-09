package com.gildedrose;

class GildedRose {
    Item[] items;

    public GildedRose(Item[] items) {
        this.items = items;
    }

    public void updateQuality() {
        for (Item item : items) {
            if (item.name.equals("Sulfuras, Hand of Ragnaros")) {
                continue;
            }

            if (item.name.equals("Aged Brie")) {
                item.updateAgedBrieItem();
            } else if (item.name.equals("Backstage passes to a TAFKAL80ETC concert")) {
                item.updateBackstageItem();
            } else {
                item.updateNormalItem();
            }
        }
    }
}

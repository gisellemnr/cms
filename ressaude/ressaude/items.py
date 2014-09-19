# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/en/latest/topics/items.html

import scrapy

class RessaudebhItem(scrapy.Item):
    year = scrapy.Field()
    number = scrapy.Field()
    description = scrapy.Field()
    link = scrapy.Field()

class RessaudespItem(scrapy.Item):
    year = scrapy.Field()
    number = scrapy.Field()
    description = scrapy.Field()
    link = scrapy.Field()

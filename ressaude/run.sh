#!/bin/bash

# Crawls the websites for the municipal health councils of BH and SP collecting
# all resolutions and stores them in the respective xml files.
# OBS: The xml format is being used because the json exporter does not seem to
# support utf-8 encoding.
scrapy crawl RessaudeBH -o bh.xml
scrapy crawl RessaudeSP -o sp.xml


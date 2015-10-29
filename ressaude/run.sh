#!/bin/bash

# Crawls the websites for the municipal health councils of BH and SP collecting
# all resolutions and stores them in the respective csv files.

# OBS: Using CSV because it can be imported into the tables by phpMyAdmin

scrapy crawl RessaudeBH -o bh.csv
scrapy crawl RessaudeSP -o sp.csv



# -*- coding: utf-8 -*-

# Scrapy settings for ressaude project
#
# For simplicity, this file contains only the most important settings by
# default. All the other settings are documented here:
#
#     http://doc.scrapy.org/en/latest/topics/settings.html
#

BOT_NAME = 'ressaude'

SPIDER_MODULES = ['ressaude.spiders']
NEWSPIDER_MODULE = 'ressaude.spiders'

DOWNLOAD_DELAY = 5

# Crawl responsibly by identifying yourself (and your website) on the user-agent
#USER_AGENT = 'ressaude (+http://www.yourdomain.com)'

# coding=utf-8

import scrapy
import re

from ressaude.items import ResolutionItem

class RessaudespSpider(scrapy.Spider):
    name = "RessaudeSP"
    allowed_domains = ["www.prefeitura.sp.gov.br"]
    start_urls = [
      "http://www.prefeitura.sp.gov.br/cidade/secretarias/saude/conselho_municipal/index.php?p=6027"
    ]

    def parse(self, response):
	for elmt in response.xpath("//p[@align='justify']"):
	    if elmt.xpath("a[@href]"):
		item = ResolutionItem()
                city = 'São Paulo'.decode('latin-1').encode('utf-8')
		desc = elmt.xpath('text()').extract()[0].strip()
		link = elmt.xpath("a/@href").extract()
		name = elmt.xpath("a[@href]/strong/text()").extract()[0]
		info = re.search("\w[0-9]*/[0-9]*", name).group(0)
		numbers = re.split("/", info)
		year = numbers[1]
		number = numbers[0]
                # Adding fields in the correct order.
                item['city'] = city
                item['number'] = number
                item['description'] = desc
                item['year'] = year
                item['link'] = link
		yield item


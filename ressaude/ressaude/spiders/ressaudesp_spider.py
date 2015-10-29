# coding=latin-1

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
                item['city'] = 'São Paulo'.decode('latin-1').encode('utf-8')
		item['description'] = elmt.xpath('text()').extract()[0].strip()
		item['link'] = elmt.xpath("a/@href").extract()
		name = elmt.xpath("a[@href]/strong/text()").extract()[0]
		info = re.search("\w[0-9]*/[0-9]*", name).group(0)
		numbers = re.split("/", info)
		item['year'] = numbers[1]
		item['number'] = numbers[0]
		yield item


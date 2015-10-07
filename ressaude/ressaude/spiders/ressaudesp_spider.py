import scrapy
import re

from ressaude.items import RessaudespItem

class RessaudespSpider(scrapy.Spider):
    name = "RessaudeSP"
    allowed_domains = ["www.prefeitura.sp.gov.br"]
    start_urls = [
      "http://www.prefeitura.sp.gov.br/cidade/secretarias/saude/conselho_municipal/index.php?p=6027"
    ]

    def parse(self, response):
	for elmt in response.xpath("//p[@align='justify']"):
	    if elmt.xpath("a[@href]"):
		item = RessaudespItem()
		item['description'] = elmt.xpath('text()').extract()[0]
		item['link'] = elmt.xpath("a/@href").extract()
		name = elmt.xpath("a[@href]/strong/text()").extract()[0]
		info = re.search("\w[0-9]*/[0-9]*", name).group(0)
		numbers = re.split("/", info)
		item['year'] = numbers[1]
		item['number'] = numbers[0]
		yield item


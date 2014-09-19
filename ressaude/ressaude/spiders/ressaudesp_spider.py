import scrapy
import urlparse

from ressaude.items import RessaudespItem

class RessaudespSpider(scrapy.Spider):
    name = "RessaudeSP"
    allowed_domains = ["www.prefeitura.sp.gov.br"]
    start_urls = [
      "http://www.prefeitura.sp.gov.br/cidade/secretarias/saude/conselho_municipal/index.php?p=6027"
    ]

    def parse(self, response):
	for elmt in response.xpath("//div[@id='PORTLET_CONTEUDO_0']/table/tbody/tr/td/p"):
	    year = elmt.xpath("a/text()").extract()[0]
	    link = elmt.xpath("a/@href").extract()[0]
	    request = scrapy.Request(link, callback=self.parse_subpage)
	    request.meta['year'] = year
	    yield request

    def parse_subpage(self, response):
	for elmt in response.xpath("//div[@id='PORTLET_CONTEUDO_0']/table/tbody/tr"):
	    col_1 = elmt.xpath('td')[0]
	    col_2 = elmt.xpath('td')[1]
	    item = RessaudebhItem()
	    item['year'] = response.meta['year']
	    #print item['year']
	    number_info = col_1
	    if col_1.xpath('p'):
		number_info = col_1.xpath('p')
	    if number_info.xpath('a'):
		if number_info.xpath('a/span'):
		  item['number'] = number_info.xpath('a/span/text()').extract()[0]
		else:
		  item['number'] = number_info.xpath('a/text()').extract()[0]
		link = number_info.xpath('a/@href').extract()[0]
		item['link'] = urlparse.urljoin(response.url, link)
	    else:
	      item['number'] = number_info.xpath('text()').extract()[0]
	      item['link'] = ''
	    #print item['number']
	    if col_2.xpath('span'):
		item['description'] = col_2.xpath('span/text()').extract()[0]
	    elif col_2.xpath('p'):
		item['description'] = col_2.xpath('p/text()').extract()[0]
	    else:
		item['description'] = col_2.xpath('text()').extract()[0]
	    yield item



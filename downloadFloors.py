__author__ = 'Alex Beals'
__purpose__ = 'Raw_Download Floor Plans'

import requests, urllib, os

base_url_1 = 'http://www.dartmouth.edu/~orl/images/floor-plans-03/'
base_url_2 = 'http://www.dartmouth.edu/~orl/images/floor-plans-06/'
prefixes_1 = ['bissell','cohen']
prefixes_2 = ['brow','litt','andr','mccu','mort','zimm','ledy','fayn','faym','fays','ripl','wood','smit','whee','rich','masn','masm','mass','lord','stre','gile','hitc','berr','bild','raun','byrn','gold','thom','maxw','chan','mcla','topl','newh','lodg']

def check_valid(url):
	r = requests.head(url)
	return (r.status_code == 200)

os.chdir('housing-plans')

for prefix in prefixes_1:
	os.mkdir(prefix)
	for i in xrange(0,5):
		if (check_valid(base_url_1 + prefix + '-' + str(i) + '.pdf')):
			urllib.urlretrieve(base_url_1 + prefix + '-' + str(i) + '.pdf', prefix + '/Floor ' + str(i) + '.pdf')

for prefix in prefixes_2:
	os.mkdir(prefix)
	for i in xrange(0,5):
		if (check_valid(base_url_2 + prefix + '-' + str(i) + '.pdf')):
			urllib.urlretrieve(base_url_2 + prefix + '-' + str(i) + '.pdf', prefix + '/Floor ' + str(i) + '.pdf')
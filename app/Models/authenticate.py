import xmlrpc.client

import sys
url = 'https://tracktrace-hom.trackerp.com'
db = 'tracktrace-hom'
username = sys.argv[1] 
password = sys.argv[2]

common = xmlrpc.client.ServerProxy('{}/xmlrpc/2/common'.format(url))
# common.version()

uid = common.authenticate(db, username, password, {})

if uid:
   
    models = xmlrpc.client.ServerProxy('{}/xmlrpc/2/object'.format(url))
    print(models.execute_kw(db, uid, password, 'product.product', 'search_read', []))
else:
    print("....... Authentication Failure ........................", uid)
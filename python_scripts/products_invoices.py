import xmlrpc.client
import json
import sys
url = 'https://tracktrace-hom.trackerp.com'
db = 'tracktrace-hom'
username = sys.argv[1] 
password = sys.argv[2]
id_invoice = sys.argv[3]

common = xmlrpc.client.ServerProxy('{}/xmlrpc/2/common'.format(url))
# common.version()

uid = common.authenticate(db, username, password, {})

if uid:
    models = xmlrpc.client.ServerProxy('{}/xmlrpc/2/object'.format(url))
    ids = models.execute_kw(db, uid, password, 'account.move', 'search_read', [[["id","=",id_invoice]]],{'fields': ['invoice_line_ids']})
    data = []
    for data in ids:
        data = models.execute_kw(db, uid, password, 'account.move.line', 'search_read', [[["id","=",ids[0]['invoice_line_ids']]]],{'fields': ['product_id','quantity','price_unit','tax_ids','price_subtotal']})
    print(json.dumps(data))
else:
    print("....... Authentication Failure ........................", uid)






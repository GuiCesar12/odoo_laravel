import xmlrpc.client
import json
import sys
url = 'https://tracktrace-hom.trackerp.com'
db = 'tracktrace-hom'
username = sys.argv[1] 
password = sys.argv[2]
id_logado = sys.argv[3]

common = xmlrpc.client.ServerProxy('{}/xmlrpc/2/common'.format(url))
# common.version()

uid = common.authenticate(db, username, password, {})

if uid:
   
    models = xmlrpc.client.ServerProxy('{}/xmlrpc/2/object'.format(url))
    print(json.dumps(models.execute_kw(db, uid, password, 'contract.contract', 'search_read', [[["partner_id.id","=",id_logado]]])))
else:
    print("....... Authentication Failure ........................", uid)
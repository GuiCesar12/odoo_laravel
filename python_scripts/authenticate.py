import xmlrpc.client
import json
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
    print(json.dumps(models.execute_kw(db, uid, password, 'res.users', 'search_read', [[['login','=',username]]],{'fields' : ['login']})))
else:
    print("....... Authentication Failure ........................", uid)
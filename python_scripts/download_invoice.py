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
    # print(json.dumps(models.execute_kw(db, uid, password, "account.invoice", "read", ['id','=',id_invoice],{'fields': ['name', 'invoice_date', 'amount_total']})))
    invoice_ids = models.execute_kw(db, uid, password, 'account.move', 'search', [[['id', '=', id_invoice]]])
    invoice = models.execute_kw(db, uid, password, 'account.move', 'read', [invoice_ids],{'fields': ['name', 'invoice_date', 'amount_total']})
    pdf_file = models.execute_kw(db, uid, password, 'account.move', 'invoice_print', [[invoice_ids], 'pdf'])
    print(json.dumps(pdf_file))
    filename = '{}_{}.pdf'.format(invoice['name'], invoice['invoice_date'])
    with open(filename, 'wb') as f:
        f.write(pdf_file)
    # print(json.dumps(models.execute_kw(db, uid, password, 'account.move', 'search', [[['state', '=', 'posted']]])))
else:
    print("....... Authentication Failure ........................", uid)







#     import xmlrpc.client

# # Connect to the Odoo instance
# # Create a new XML-RPC client object
# models = xmlrpc.client.ServerProxy('{}/xmlrpc/2/object'.format(url))

# # Find the invoice you want to download
# invoice_ids = models.execute_kw(db, uid, password, 'account.move', 'search', [[['state', '=', 'posted'], ['type', '=', 'out_invoice']]])

# # Download the PDF file for the first invoice in the list
# invoice = models.execute_kw(db, uid, password, 'account.move', 'read', [invoice_ids[0]], {'fields': ['name', 'invoice_date', 'amount_total']})
# pdf_file = models.execute_kw(db, uid, password, 'account.move', 'invoice_print', [invoice_ids[0], 'pdf'])

# # Save the PDF file to disk
# filename = '{}_{}.pdf'.format(invoice['name'], invoice['invoice_date'])
# with open(filename, 'wb') as f:
#     f.write(pdf_file)
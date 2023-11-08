import xmlrpc.client
import json
import sys
url = 'https://tracktrace-hom.trackerp.com'
db = 'tracktrace-hom'
username = sys.argv[1] 
password = sys.argv[2]
id_contrato = sys.argv[3]
numero_cartao = sys.argv[4] 
cvv = sys.argv[5]

nome_cartao = sys.argv[6]
mes = sys.argv[7] 
ano = sys.argv[8] 
mes = str(mes)
ano = str(ano)
id_contrato = int(id_contrato)
lista = []
numero_cartao_edit = ''
nome_c = ''
if len(sys.argv[3]) != 16:
    numero_cartao_edit = sys.argv[3] + sys.argv[4] + sys.argv[5]+sys.argv[6]
    numero_cartao =  numero_cartao_edit
    count = 9
    for i in sys.argv[9:]:
        try:
            int(sys.argv[count])
            lista.append(sys.argv[count])
        except:
            nome_c += sys.argv[count]
        count +=1
else:
    count = 6
    for i in sys.argv[6:]:
        try:
            int(sys.argv[count])
            lista.append(sys.argv[count])
        except:
            nome_c += sys.argv[count]
        count +=1

mes = str(sys.argv[-2])
ano = str(sys.argv[-1])
nome_cartao = nome_c
print(nome_cartao, mes,ano)

print(lista)
print(sys.argv)
common = xmlrpc.client.ServerProxy('{}/xmlrpc/2/common'.format(url))
# common.version()

uid = common.authenticate(db, username, password, {})

if uid:
   
    models = xmlrpc.client.ServerProxy('{}/xmlrpc/2/object'.format(url))
    models.execute_kw(db, uid, password, 'contract.contract', 'write', [[id_contrato],{'nome_cartao':nome_cartao,'numero_cartao':numero_cartao,'code_cvv':cvv,'valid_date_y':ano,'valid_date_m':mes}])
    print(json.dumps(models.execute_kw(db, uid, password, 'contract.contract', 'name_get', [[id_contrato]])))
    print(nome_cartao)
else:
    print("....... Authentication Failure ........................", uid)
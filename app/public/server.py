from pyModbusTCP.server import ModbusServer, DataBank
from random import uniform
import json



with open('configuration.json','r') as f:
    data = json.load(f)

def initialiser_adresse_register(x):
    return [data["mot"][x]["adresse"]]
     
def initialiser_adresse_coil(x):
   return [data["bit"][x]["adresse"]]
     
def acceder_adresse_register(x):
    return data["mot"][x]["adresse"]

def acceder_adresse_coil(x):
    return data["bit"][x]["adresse"]

def acceder_valeur_register(x):
    return data["mot"][x]["valeur"]

def acceder_valeur_coil(x):
    return data["bit"][x]["valeur"]



adresse_ip = data["serveur"][0]["adresse"]
port = data["serveur"][0]["port"]

server = ModbusServer(adresse_ip,port,no_block=True)


try:
    print("Start server")
    server.start()
    print("Server is online")
    for i in range  (len(data["mot"])):
        
    
        initialiser_adresse_register(i)
        DataBank.set_words(acceder_adresse_register(i),[acceder_valeur_register(i)])
        
    for i in range  (len(data["bit"])):
   
        initialiser_adresse_coil(i)
        DataBank.set_bits(acceder_adresse_coil(i),[acceder_valeur_coil(i)])

    
    
    while True:
        continue
        
        
        
        
        
except:
    print("shutdown server")
    server.stop
    print("server offline")

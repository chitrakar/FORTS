import sys

import numpy as np
import mysql.connector
import MySQLdb as mdb

def recommend(id):
    con = mdb.connect("localhost", "root", "","foodordering1")
    
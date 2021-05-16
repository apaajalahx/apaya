#!/bin/python3
from functools import partial
import sys
import os
from tkinter import *
from matplotlib import pyplot as plt
import pandas as pd
import numpy as np
import matplotlib
matplotlib.use("TKAgg")
# source asli https://github.com/ryanbrandt/regressioncalculator
# edit bagian perhitungan x dan y dan menghapus graph

def leastSquares():

    # get regression line
    def myLine(x, x_vec):
        a = x_vec[1, 0]
        return x_vec[0, 0] + (x*a)

    # graph line against data
    def graphMe(x, y, x_vec):
        y_reg = y.astype(float)
        # gaph y-vals
        for i in range(len(y)):
            y_reg[i] = myLine(x[i], x_vec)

        # generate plot
        plt.figure("Regression Plot")
        plt.scatter(x, y, color="blue")
        plt.plot(x, y_reg, color="red")
        plt.xlabel('x-axis')
        plt.ylabel('y-axis')
        plt.title("Regression line (red) vs Data (blue)")

        plt.show()

        # hard reset app w system call
    def restartRegression():
        python = sys.executable
        os.execl(python, python, * sys.argv)

    # out computed line to UI
    def printMe(myLine):
        master.geometry("700x400")
        Label(master, text="Regression Line:",
              background="bisque").grid(column=0, row=4)
        Label(master, text=myLine, background="bisque").grid(column=0, row=5)
        Label(master, text="Press input new data for a new regression line",
              background="yellow").grid(column=0, row=6)

    # main computational method
    def computations(x, y):
        # need equal x and y
        try:
            if len(x) != len(y):
                master.geometry("800x400")
                L = Label(
                    master, text="Need equal number of x and y-values, press input new data and restart", background="red")
                L.grid(column=0, row=4)

                raise ValueError("User must input equal amount of x and y-values")

            # FUCK NUMPY WE USE FUCKING MANUAL CALC
            x2 = 0
            for _x in x:
                x2 += int(_x) * int(_x)
            
            ex = 0
            for _x in x:
                ex += int(_x)
            ey = 0
            for _y in y:
                ey += int(_y)
            ex2 = ex*ex
            # get eyx data hhhhh
            eyx = 0
            for i in range(0,len(y)):
                eyx += int(y[i])*int(x[i])
            n = len(y)
            nilai_y = (ey*x2-ex*eyx)/(n*x2-ex2)
            nilai_x = (n*eyx-ex*ey)/(n*x2-ex2)
            print(nilai_y,nilai_x)
            # get line, call print utility
            myLine = "y = " + str(nilai_y) + " + x" + str(nilai_x)
            printMe(myLine)
        except Exception as e:
            exc_type, exc_obj, exc_tb = sys.exc_info()
            fname = os.path.split(exc_tb.tb_frame.f_code.co_filename)[1]
            print(exc_type, fname, exc_tb.tb_lineno, e)
        #command_with_args = partial(graphMe, df, )
        #Button(master, text="Graph Me", command=command_with_args,
         #      highlightbackground="bisque").grid(row=7, column=0)

    # grab user input and pass to perform computations
    def getInt():
        x_vals = pd.Series(e1.get().split(","))
        y_vals = pd.Series(e2.get().split(","))
        try:
            computations(x_vals, y_vals)
        except Exception as e:
            print(e)
        except ValueError as a:
            print(a)
        except:
            print("unknow error")

    # generate GUI
    master = Tk()
    master.title("Regression Calculator")
    master.geometry("600x400")
    master.configure(background="bisque")

    # label elements
    Label(master, text="Enter values as comma-seperated",
          background="bisque").grid(row=0)
    Label(master, text="x-values:", background="bisque").grid(row=1)
    Label(master, text="y-values:", background="bisque").grid(row=2)

    # input elements
    e1 = Entry(master, background="bisque", highlightthickness=0)
    e2 = Entry(master, background="bisque", highlightthickness=0)
    e1.grid(row=1, column=1)
    e2.grid(row=2, column=1)

    # button elements
    Button(master, text="Quit", command=master.quit,
           highlightbackground="bisque").grid(row=3, column=0, sticky=W, pady=4)
    Button(master, text="Submit", command=getInt, highlightbackground="bisque").grid(
        row=3, column=1, sticky=W, pady=4)
    Button(master, text="Input New Data", command=restartRegression,
           highlightbackground="bisque").grid(row=3, column=2, sticky=W, pady=4)

    master.call('wm', 'attributes', '.', '-topmost', '1')

    mainloop()


# run app
leastSquares()  # run app

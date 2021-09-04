import tkinter as tk
import matplotlib.pyplot as plt
from pandas import DataFrame
from matplotlib.backends.backend_tkagg import FigureCanvasTkAgg
import sys, os

class Application(tk.Frame):
    def __init__(self,master=None):
        super().__init__(master)
        self.master = master
        self.pack()
        self.create_widget()

    def create_widget(self):
        try:
            month = {'Month': [1,2,3,4,5,6,7,8,9,10,11,12],
            'Total':[10,20,30,40,50,60,70,80,90,100,110,120]}
            df_1 = DataFrame(month,columns=['Month','Total'])
            figure = plt.figure(figsize=(5,4),dpi=100)
            ax = figure.add_subplot(1,1,1)
            bar = FigureCanvasTkAgg(figure,self.master)
            bar.get_tk_widget().pack(side=tk.LEFT,fill=tk.BOTH)
            df_1 = df_1[['Month','Total']].groupby(by='Month',sort=False).sum()
            df_1.plot(kind='line', legend=True, ax=ax, color='r',marker='o', fontsize=10)
            ax.set_title('GA TAU APAAN')
        except Exception as e:
            exc_type, exc_object, exc_tb = sys.exc_info()
            fname = os.path.split(exc_tb.tb_frame.f_code.co_filename)[1]
            print(f'Error type : {exc_type}')
            print(f'Error At Line: {exc_tb.tb_lineno}, File: {fname} ')
            print(f'Error Massage: {e}')
        except KeyboardInterrupt:
            exit()
    def on_delete(self):
        self.master.destroy()
        exit()

root = tk.Tk()
app = Application(master=root)
root.wm_protocol("WM_DELETE_WINDOW",app.on_delete)
app.mainloop()
